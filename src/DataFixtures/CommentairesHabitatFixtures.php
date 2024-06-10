<?php

namespace App\DataFixtures;

use App\Entity\CommentairesHabitats;
use App\Entity\Habitats;
use App\Entity\Users; // Ajoutez cette ligne
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentairesHabitatFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupérer tous les habitats existants
        $habitats = $this->doctrine->getRepository(Habitats::class)->findAll();

        // Récupérer tous les utilisateurs existants
        $users = $this->doctrine->getRepository(Users::class)->findAll(); // Assurez-vous qu'il y a des utilisateurs

        if (empty($habitats) || empty($users)) {
            throw new \Exception('Aucun habitat ou utilisateur trouvé dans la base de données.');
        }

        // Créer 25 commentaires répartis sur les habitats existants
        for ($i = 0; $i < 25; $i++) {
            $habitat = $faker->randomElement($habitats);
            $user = $faker->randomElement($users); // Assurez-vous qu'un utilisateur est assigné

            $commentaire = new CommentairesHabitats();
            $commentaire->setHabitat($this->getReference("habitat_1"));
            $commentaire->setUser($user); // Assigner l'utilisateur
            $commentaire->setAvis($faker->sentence());
            $commentaire->setEtat($faker->word());
            $commentaire->setAmelioration($faker->sentence());
            $commentaire->setCreationDate(new \DateTimeImmutable());
            $commentaire->setModificationDate(new \DateTime());

            $manager->persist($commentaire);

            // Log the creation of each commentaire
            echo sprintf("Commentaire for habitat %d created: %s\n", $habitat->getId(), $commentaire->getAvis());
        }

        $manager->flush();
        echo "Fixtures loaded successfully.\n";
    }

    public function getDependencies()
    {
        return [
            HabitatFixtures::class,
        ];
    }

}
