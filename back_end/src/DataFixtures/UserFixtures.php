<?php
 
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userPasswordHasher;
    
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setEmail("mail@yannickbrocart.com");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "Password123456$"));
        $userAdmin->setFirstname('Yannick');
        $userAdmin->setLastname('Brocart');
        $userAdmin->setUsername('yannickbrocart');
        $userAdmin->setIsVerified(true);
        $manager->persist($userAdmin);
        
        // Création d'un user
        $user = new User();
        $user->setEmail("mail@mariecerezo.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "Password123456$"));
        $user->setFirstname('Marie');
        $user->setLastname('Cerezo');
        $user->setUsername('mariecerezo');
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
   }
}