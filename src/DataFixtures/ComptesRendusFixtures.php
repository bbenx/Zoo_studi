<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use App\Entity\ComptesRendus;
use App\Repository\UsersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ComptesRendusFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;
    private $userRepository;

    public function __construct(ManagerRegistry $doctrine, UsersRepository $userRepository)
    {
        $this->doctrine = $doctrine;
        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // Récupérer tous les animaux existants
        $animaux = $manager->getRepository(Animaux::class)->findAll();

        // Récupérer tous les utilisateurs vétérinaires existants
        $veterinaires = $this->userRepository->findByRole('ROLE_VETERINAIRE');

        if (empty($animaux) || empty($veterinaires)) {
            throw new \Exception('Aucun animal ou vétérinaire trouvé dans la base de données.');
        }

        for ($i = 0; $i < 300; $i++) {
            $animal = $faker->randomElement($animaux);
            $veterinaire = $faker->randomElement($veterinaires);

            $compteRendu = new ComptesRendus();
            $compteRendu->setAnimal($animal);
            $compteRendu->setUser($veterinaire);
            $compteRendu->setEtatAnimal($faker->randomElement(['Très bon', 'Bon', 'Satisfaisant', 'Urgent']));
            $compteRendu->setDetailEtat($faker->sentence());
            $numWords = $faker->numberBetween(1, 3);
            $compteRendu->setTypeNourriture(implode(' ', $faker->words($numWords)));
            $compteRendu->setGrammageNourriture($faker->numberBetween(10, 100) * 50);
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
