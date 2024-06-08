<?php

namespace App\DataFixtures;

use App\Entity\Habitats;
use App\Entity\Users; // Ajoutez cette ligne
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HabitatFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


            $habitat = new Habitats();
            $habitat->setNom('Désert du Sahara');
            $habitat->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/desert_sahara.webp');
            $habitat->setDescription('Plongez dans les paysages arides et mystérieux du désert du Sahara. Apprenez comment les animaux survivent dans cet environnement extrême, entre dunes et oasis.');
            $habitat->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat);
            $this->addReference('habitat_1', $habitat);
            $manager->flush();

            $habitat2 = new Habitats();
            $habitat2->setNom($faker->word());
            $habitat2->setImage('https://picsum.photos/200/300'); // Assigner l'utilisateur
            $habitat2->setDescription($faker->sentence());
            $habitat2->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat2);
            $this->addReference('habitat_2', $habitat2);
            $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }

}
