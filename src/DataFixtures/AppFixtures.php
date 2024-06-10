<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Etablissement;
use App\Entity\Services;
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
        // $etablissement = $manager->getRepository(Etablissement::class)->findOneEtablissement();

        $etablissement = new Etablissement();
        $etablissement->setNom('Zoo Arcadia')
                    ->setDescription('Découvrez un monde fascinant où la nature rencontre l\'aventure');

        $manager->persist($etablissement);
        $manager->flush();
        $this->addReference('etablissement_1', $etablissement);


       // Users

        $user = new Users();
        $user->setEmail('superadmin@gmail.com');
        $user->setEtablissement($this->getReference('etablissement_1'));
        $user->setRoles(['ROLE_USER', 'ROLE_EMPLOYE', 'ROLE_ADMIN']);
        $user->setPlainPassword('password');

        $manager->persist($user);
        $this->addReference('user_1', $user);
        $manager->flush();

        $user2 = new Users();
        $user2->setEmail('employe@gmail.com');
        $user2->setEtablissement($this->getReference('etablissement_1'));
        $user2->setRoles(['ROLE_USER', 'ROLE_EMPLOYE']);
        $user2->setPlainPassword('employe');

        $manager->persist($user2);
        $this->addReference('user_2', $user2);
        $manager->flush();

        $user3 = new Users();
        $user3->setEmail('veto@gmail.com');
        $user3->setEtablissement($this->getReference('etablissement_1'));
        $user3->setRoles(['ROLE_USER', 'ROLE_VETERINAIRE']);
        $user3->setPlainPassword('veto');

        $manager->persist($user3);
        $this->addReference('user_3', $user3);
        $manager->flush();

        $user4 = new Users();
        $user4->setEmail('admin@gmail.com.com');
        $user4->setEtablissement($this->getReference('etablissement_1'));
        $user4->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user4->setPlainPassword('test');

        $manager->persist($user4);
        $this->addReference('user_4', $user4);
        $manager->flush();


        // Services
        $services = new Services();
        $services->setEtablissement($this->getReference('etablissement_1'));
        $services->setNom('Restauration');
        $services->setDescription('Venez savourer une pause gourmande dans nos restaurants ! Que vous soyez amateur de plats traditionnels ou de nouvelles saveurs, nos menus variés sauront satisfaire toutes les envies. Profitez d\'un cadre convivial et détendu, idéal pour recharger vos batteries entre deux visites des animaux. Petits et grands, laissez-vous tenter par nos délicieux repas préparés avec des ingrédients frais et de qualité. Bon appétit !');

        $manager->persist($services);
        $this->addReference('service_1', $services);
        $manager->flush();

        $services2 = new Services();
        $services2->setEtablissement($this->getReference('etablissement_1'));
        $services2->setNom('Restauration');
        $services2->setDescription('Venez savourer une pause gourmande dans nos restaurants ! Que vous soyez amateur de plats traditionnels ou de nouvelles saveurs, nos menus variés sauront satisfaire toutes les envies. Profitez d\'un cadre convivial et détendu, idéal pour recharger vos batteries entre deux visites des animaux. Petits et grands, laissez-vous tenter par nos délicieux repas préparés avec des ingrédients frais et de qualité. Bon appétit !');

        $manager->persist($services2);
        $this->addReference('service_2', $services2);
        $manager->flush();

        $services3 = new Services();
        $services3->setEtablissement($this->getReference('etablissement_1'));
        $services3->setNom('Restauration');
        $services3->setDescription('Venez savourer une pause gourmande dans nos restaurants ! Que vous soyez amateur de plats traditionnels ou de nouvelles saveurs, nos menus variés sauront satisfaire toutes les envies. Profitez d\'un cadre convivial et détendu, idéal pour recharger vos batteries entre deux visites des animaux. Petits et grands, laissez-vous tenter par nos délicieux repas préparés avec des ingrédients frais et de qualité. Bon appétit !');

        $manager->persist($services3);
        $this->addReference('service_3', $services3);
        $manager->flush();


        // contact
        for($i = 0; $i < 5; $i++){
        $contact = new Contact();
        $contact->setEmail($this->faker->email())
                ->setSubject('Demande n°' . $i +1)
                ->setMessage($this->faker->text());

        $manager->persist($contact);
    }
        $manager->flush();
    }

}
