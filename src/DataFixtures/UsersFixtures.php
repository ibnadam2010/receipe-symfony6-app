<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker\Factory;

class UsersFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder,
    private SluggerInterface $slugger)
    {}

    public function load(ObjectManager $manager): void
    {
         $admin = new Users();
         $admin->setEmail('test1@test.com');
         $admin->setLastname('nom1');
         $admin->setFirstname('prenom1');
         $admin->setAddress('rue gambetta');
         $admin->setZipcode('33000');
         $admin->setCity('Bordeaux');
         $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'test123456'));
         $admin->setRoles(['ROLE_ADMIN']);
         $manager->persist($admin);

         $faker = Factory::create('fr_FR');

         $user = new Users();
         $user->setEmail($faker->email);
         $user->setLastname($faker->lastName);
         $user->setFirstname($faker->firstName);
         $user->setAddress($faker->address);
         $user->setZipcode($faker->postcode);
         $user->setCity($faker->city);
         $user->setPassword($this->passwordEncoder->hashPassword($user, 'test123456'));
         $user->setRoles(['ROLE_USER']);
         $manager->persist($user);

         $manager->flush();
    }
}
