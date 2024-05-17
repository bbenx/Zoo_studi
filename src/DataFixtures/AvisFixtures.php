<?php
// src/DataFixtures/AvisFixtures.php
namespace App\DataFixtures;


use App\Entity\Avis;
use App\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Factory;

class AvisFixtures extends Fixture
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $Etablissement = $this->doctrine->getRepository(Etablissement::class)->find(2);
        if ($Etablissement)
            for ($i = 0; $i < 50; $i++) {
                $avis = new Avis();
                $avis->setEtablissement($Etablissement);
                $avis->setPseudo($faker->userName);
                $avis->setCommentaire($faker->paragraph);

                $creationDate = \DateTimeImmutable::createFromMutable($faker->dateTimeThisYear);
                $modificationDate = \DateTimeImmutable::createFromMutable($faker->dateTimeThisMonth);

                $avis->setCreationDate($creationDate);
                $avis->setModificationDate($modificationDate);
                $manager->persist($avis);
            }

        $manager->flush();
    }
}
