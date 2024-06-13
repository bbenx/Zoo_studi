<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->createManualUsers($manager);

        $roles = [
            ['ROLE_USER', 'ROLE_EMPLOYE'],
            ['ROLE_USER', 'ROLE_VETERINAIRE'],
        ];

        for ($i = 0; $i < 25; $i++) {
            $randomRoles = $roles[array_rand($roles)];
            $randomPassword = $this->faker->password;

            $user = new Users();
            $user->setEmail($this->faker->email());
            $user->setEtablissement($this->getReference('etablissement_1'));
            $user->setRoles($randomRoles);
            $user->setPlainPassword($randomPassword);

            $manager->persist($user);
            $this->setReference('user_' . ($i + 6), $user); 
        }

        $manager->flush();
    }

    private function createManualUsers(ObjectManager $manager): void
    {
        $user1 = new Users();
        $user1->setEmail('superadmin@gmail.com');
        $user1->setEtablissement($this->getReference('etablissement_1'));
        $user1->setRoles(['ROLE_USER', 'ROLE_EMPLOYE', 'ROLE_VETERINAIRE','ROLE_ADMIN']);
        $user1->setPlainPassword('password');

        $manager->persist($user1);
        $this->setReference('user_1', $user1); 

        $user2 = new Users();
        $user2->setEmail('employe@gmail.com');
        $user2->setEtablissement($this->getReference('etablissement_1'));
        $user2->setRoles(['ROLE_USER', 'ROLE_EMPLOYE']);
        $user2->setPlainPassword('employe');

        $manager->persist($user2);
        $this->setReference('user_2', $user2); 

        $user3 = new Users();
        $user3->setEmail('veto@gmail.com');
        $user3->setEtablissement($this->getReference('etablissement_1'));
        $user3->setRoles(['ROLE_USER', 'ROLE_VETERINAIRE']);
        $user3->setPlainPassword('veto');

        $manager->persist($user3);
        $this->setReference('user_3', $user3); 

        $user4 = new Users();
        $user4->setEmail('admin@gmail.com');
        $user4->setEtablissement($this->getReference('etablissement_1'));
        $user4->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user4->setPlainPassword('admin');

        $manager->persist($user4);
        $this->setReference('user_4', $user4); 

    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}
