<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;


#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private ResetPasswordHelperInterface $resetPasswordHelper,
        private EntityManagerInterface $entityManager) { }


    #[Route('', name: 'app_forgot_password_request')]
    public function request(Request $request, MailerInterface $mailer, 
    TranslatorInterface $translator): Response {
        $response = new Response();
        if ($this->processSendingPasswordResetEmail(
            json_decode($request->getContent())->email,
            $mailer,
            $translator)) return $response->setStatusCode(Response::HTTP_OK);
        else return $response->setStatusCode(Response::HTTP_NOT_FOUND);
    }


    #[Route('/check-email', name: 'app_check_email')]
    public function checkEmail(): void { 
        if (null === ($resetToken = $this->getTokenObjectFromSession())) {
            $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
        }
     }


    #[Route('/reset', name: 'app_reset_password')]
    public function reset(Request $request, UserPasswordHasherInterface $passwordHasher) : Response {
        $response = new Response();

        $token = json_decode($request->getContent())->token;
        if ($token === null) throw $this->createNotFoundException('No reset password token found.');
        
        if (null === ($user = $this->resetPasswordHelper->validateTokenAndFetchUser($token)))
            return $this->redirectToRoute('app_forgot_password_request');

        $newPassword = json_decode($request->getContent())->newPassword;
        $this->resetPasswordHelper->removeResetRequest($token);
        $encodedPassword = $passwordHasher->hashPassword(
            $user,
            $newPassword);
        $user->setPassword($encodedPassword);
        $this->entityManager->flush();
        $this->cleanSessionAfterReset();
        return $response->setStatusCode(Response::HTTP_OK);
        }

        private function processSendingPasswordResetEmail(string $emailFormData, MailerInterface $mailer, TranslatorInterface $translator): RedirectResponse{
        
            $user = $this->entityManager->getRepository(User::class)->findOneBy(
                ['email' => $emailFormData]);
            if (!$user) return $this->redirectToRoute('app_check_email');
            if (!$resetToken = $this->resetPasswordHelper->generateResetToken($user))
                return $this->redirectToRoute('app_check_email');
            
            $email = (new TemplatedEmail())
                ->from(new Address('familytreeworkshop@yannickbrocart.com',
                    'L\'équipe de Family Tree Workshop'))
                ->to($user->getEmail())
                ->subject('Your password reset request')
                ->htmlTemplate('reset_password/reset_email.html.twig')
                ->context([
                    'resetToken' => $resetToken,
                    'user' => $user]);
            $mailer->send($email);
            $this->setTokenObjectInSession($resetToken);
            return $this->redirectToRoute('app_check_email');
        }

    }