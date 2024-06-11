<?php

namespace App\DataFixtures;

use App\Entity\Horaires;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HorairesFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager): void
    {

        $horaire = new Horaires();
        $horaire->setIdEtablissement($this->getReference('etablissement_1'));
        $horaire->setLundi('09:00 - 18:00');
        $horaire->setMardi('09:00 - 18:00');
        $horaire->setMercredi('09:00 - 18:00');
        $horaire->setJeudi('09:00 - 18:00');
        $horaire->setVendredi('09:00 - 21:00');
        $horaire->setSamedi('09:00 - 20:00');
        $horaire->setDimanche('09:00 - 17:00');


        $manager->persist($horaire);
        $this->addReference('horaire_1', $horaire);
        $manager->flush();

    }
    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}
