<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ServicesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $services = new Services();
        $services->setEtablissement($this->getReference('etablissement_1'));
        $services->setNom('Restauration');
        $services->setDescription('Venez savourer une pause gourmande dans nos restaurants ! Que vous soyez amateur de plats traditionnels ou de nouvelles saveurs, nos menus variés sauront satisfaire toutes les envies. Profitez d\'un cadre convivial et détendu, idéal pour recharger vos batteries entre deux visites des animaux. Petits et grands, laissez-vous tenter par nos délicieux repas préparés avec des ingrédients frais et de qualité. Bon appétit !');

        $manager->persist($services);
        $this->addReference('service_1', $services);
        $manager->flush();


        $services2 = new Services();
        $services2->setEtablissement($this->getReference('etablissement_1'));
        $services2->setNom('Visite guidée (gratuite)');
        $services2->setDescription('Découvrez le zoo comme jamais auparavant avec nos visites guidées gratuites ! Accompagné de nos experts passionnés, plongez dans l\'univers fascinant des animaux et apprenez des anecdotes surprenantes sur leurs habitudes et leurs habitats. C\'est une occasion unique d\'en savoir plus sur la biodiversité tout en vous amusant. Ne manquez pas cette expérience enrichissante et captivante pour toute la famille !');

        $manager->persist($services2);
        $this->addReference('service_2', $services2);
        $manager->flush();

        $services3 = new Services();
        $services3->setEtablissement($this->getReference('etablissement_1'));
        $services3->setNom('Visite petit train');
        $services3->setDescription('Embarquez pour une aventure unique à bord de notre petit train et explorez le zoo d\'une manière amusante et relaxante ! Pour seulement 5€, laissez-vous guider à travers les différents habitats et observez de près les animaux dans leur environnement naturel. C\'est une façon idéale de découvrir le zoo sans fatigue et de profiter d\'une vue panoramique. Une expérience incontournable pour petits et grands !');

        $manager->persist($services3);
        $this->addReference('service_3', $services3);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}