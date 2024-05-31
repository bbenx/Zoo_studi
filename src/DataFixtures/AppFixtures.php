<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Récupérer l'établissement 
        $etablissement = $manager->getRepository(Etablissement::class)->findOneEtablissement();

       // Users
       for ($i = 0; $i<10; $i++){
        $user = new Users();
        $user->setEmail($this->faker->email())
        ->setEtablissement($etablissement)
        ->setRoles(['ROLE_USER', 'ROLE_EMPLOYE', 'ROLE_ADMIN'])
        ->setPlainPassword('password');

        $manager->persist($user);
       }
        $manager->flush();
    }
}
