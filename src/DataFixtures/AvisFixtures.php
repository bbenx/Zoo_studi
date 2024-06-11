<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AvisFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 40; $i++) {
            $avi = new Avis();
            // Récupérez l'entité `Etablissement` à partir de la référence
            $etablissement = $this->getReference('etablissement_1');
            $avi->setEtablissement($etablissement);
            $avi->setPseudo($faker->userName);
            $avi->setCommentaire($faker->text(200));
            $avi->setStatut('validé');

            $manager->persist($avi);
        }

        $avi = new Avis();
        $etablissement = $this->getReference('etablissement_1');
        $avi->setEtablissement($etablissement);
        $avi->setPseudo('bbenx');
        $avi->setCommentaire('super zoo');
        $avi->setStatut('validé');

        $manager->persist($avi);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}
