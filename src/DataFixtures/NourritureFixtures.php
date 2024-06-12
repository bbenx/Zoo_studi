<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use App\Entity\Nourriture;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NourritureFixtures extends Fixture implements DependentFixtureInterface
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

        for ($i = 0; $i < 200; $i++) {
            $animal = $faker->randomElement($animaux);
            $user = $faker->randomElement($users);

            $nourriture = new Nourriture();
            $nourriture->setAnimal($animal);
            $nourriture->setUser($user);
            $nourriture->setType($faker->word());
            $nourriture->setQuantite($faker->numberBetween(1, 50));
            $nourriture->setDatePassage(new \DateTime());

            $manager->persist($nourriture);

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
