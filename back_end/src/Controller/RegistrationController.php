<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager, User $user): Response
    {
        $response = new Response();
        $user->setEmail(json_decode($request->getContent())->email);
        $user->setRoles(json_decode($request->getContent())->roles);
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                json_decode($request->getContent())->password));
        $user->setFirstname(json_decode($request->getContent())->firstname);
        $user->setLastname(json_decode($request->getContent())->lastname);
        $user->setUsername(json_decode($request->getContent())->username);
        $user->setIsVerified(false);
        $entityManager->persist($user);
        $entityManager->flush();

        // generate a signed url and email it to the user
        $this->emailVerifier->sendEmailConfirmation('app_register_verify_email', $user,
            (new TemplatedEmail())
            ->from(new Address('familytreeworkshop@yannickbrocart.com',
                'L\'équipe de Family Tree Workshop'))
            ->to($user->getEmail())
            ->subject('Please Confirm your Email')
            ->htmlTemplate('registration/confirmation_email.html.twig')
            ->context(['user' => $user]));
        return $response->setStatusCode(Response::HTTP_OK);
    }

    #[Route('/register/verifyemail', name: 'app_register_verify_email')]
    public function verifyUserEmail(Request $request, UserRepository $userRepository): Response
    {
        $response = new Response();
        $id = $request->query->get('id');
        $email = $request->query->get('email');
        
        // retrieves the user
        $user = $userRepository->findOneBy(['id' => intval($id)]);
        if (!$user) throw $this->createAccessDeniedException();
        
        // validate email confirmation link, sets User::isVerified=true and persists   
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            return $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }
}
