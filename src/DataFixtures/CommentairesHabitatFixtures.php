<?php

namespace App\DataFixtures;

use App\Entity\CommentairesHabitats;
use App\Entity\Habitats;
use App\Entity\Users; 
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
        $users = $this->doctrine->getRepository(Users::class)->findAll(); 

        if (empty($habitats) || empty($users)) {
            throw new \Exception('Aucun habitat ou utilisateur trouvé dans la base de données.');
        }

        // Créer 25 commentaires répartis sur les habitats existants
        for ($i = 0; $i < 100; $i++) {
            $habitat = $faker->randomElement($habitats);
            $user = $faker->randomElement($users);

            $commentaire = new CommentairesHabitats();
            $commentaire->setHabitat($habitat);
            $commentaire->setUser($user); 
            $commentaire->setAvis($faker->sentence());
            $commentaire->setEtat($faker->word());
            $commentaire->setAmelioration($faker->sentence());
            $commentaire->setCreationDate(new \DateTimeImmutable());
            $commentaire->setModificationDate(new \DateTime());

            $manager->persist($commentaire);


        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UsersFixtures::class,
            HabitatFixtures::class,
        ];
    }

}
