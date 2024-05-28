<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EtablissementFixtures extends Fixture
{
    public const ETABLISSEMENT_REFERENCE = 'etablissement';

    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasherInterface
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $etablissement = new Etablissement();
        $etablissement->setNom($faker->company());
        $etablissement->setDescription($faker->text(200));
        $manager->persist($etablissement);
        $manager->flush();

        $this->addReference(self::ETABLISSEMENT_REFERENCE, $etablissement);
    }
}
