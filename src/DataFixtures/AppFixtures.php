<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {

        $etablissement = new Etablissement();
        $etablissement->setNom('Zoo Arcadia')
                    ->setDescription('Découvrez un monde fascinant où la nature rencontre l\'aventure');

        $manager->persist($etablissement);
        $manager->flush();
        $this->addReference('etablissement_1', $etablissement);

    }

}
