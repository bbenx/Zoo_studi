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

        for ($i = 0; $i < 50; $i++) {
            $avis = new Avis();
            $avis->setEtablissement($this->getReference(EtablissementFixtures::ETABLISSEMENT_REFERENCE));
            $avis->setPseudo($faker->userName());
            $avis->setCommentaire($faker->realText(random_int(140, 240)));
            $manager->persist($avis);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EtablissementFixtures::class,
        ];
    }
}
