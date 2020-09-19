<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture 
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // regular user
        $user = new User();
        $user->setEmail("adam@example.com");
        $user->setFirstName("Adam");
        $user->setLastName("De Guire");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'test'
        ));
        $manager->persist($user);

        // admin user
        $user = new User();
        $user->setEmail("admin@example.com");
        $user->setFirstName("Admin");
        $user->setLastName("De Guire");
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
