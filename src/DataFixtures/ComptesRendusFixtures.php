<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use App\Entity\ComptesRendus;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ComptesRendusFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // Récupérer tous les animaux existants
        $animaux = $this->doctrine->getRepository(Animaux::class)->findAll();

        // Récupérer tous les utilisateurs existants
        $users = $this->doctrine->getRepository(Users::class)->findAll(); 

        if (empty($animaux) || empty($users)) {
            throw new \Exception('Aucun animal ou utilisateur trouvé dans la base de données.');
        }

        for ($i = 0; $i < 100; $i++) {
            $animal = $faker->randomElement($animaux);
            $user = $faker->randomElement($users);

            $compteRendu = new ComptesRendus();
            $compteRendu->setAnimal($animal);
            $compteRendu->setUser($user);
            $compteRendu->setEtatAnimal($faker->randomElement(['Très bon', 'Bon', 'Satisfaisant', 'Urgent']));
            $compteRendu->setDetailEtat($faker->sentence());
            $numWords = $faker->numberBetween(1, 3);
            $compteRendu->setTypeNourriture(implode(' ', $faker->words($numWords)));
            $compteRendu->setGrammageNourriture($faker->numberBetween(10, 100)*50);
            $compteRendu->setDatePassage(new \DateTime());

            $manager->persist($compteRendu);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            UsersFixtures::class,
            AnimauxFixtures::class,
        ];
    }
}
