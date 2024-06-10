<?php

namespace App\DataFixtures;

use App\Entity\Habitats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HabitatFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


            $habitat = new Habitats();
            $habitat->setNom('Désert du Sahara');
            $habitat->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/desert_sahara.webp');
            $habitat->setDescription('Plongez dans les paysages arides et mystérieux du désert du Sahara. Apprenez comment les animaux survivent dans cet environnement extrême, entre dunes et oasis.');
            $habitat->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat);
            $this->addReference('habitat_1', $habitat);
            $manager->flush();

            $habitat2 = new Habitats();
            $habitat2->setNom('Savane Africaine');
            $habitat2->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/savane_africaine.webp'); 
            $habitat2->setDescription('Explorez les vastes plaines de la savane africaine, où la nature s’étend à perte de vue. Vous pourrez y découvrir les majestueux lions, les rapides guépards, et bien d\'autres animaux emblématiques de cette région.');
            $habitat2->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat2);
            $this->addReference('habitat_2', $habitat2);
            $manager->flush();

            $habitat3 = new Habitats();
            $habitat3->setNom('Forêt Tropicale');
            $habitat3->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/Foret_tropicale.webp');
            $habitat3->setDescription('Entrez dans l\'univers luxuriant de la forêt tropicale, un écosystème dense et humide. Découvrez une incroyable diversité d\'animaux exotiques et colorés parmi les lianes et les arbres géants.');
            $habitat3->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat3);
            $this->addReference('habitat_3', $habitat3);
            $manager->flush();

            $habitat4 = new Habitats();
            $habitat4->setNom('Rivière Amazonienne');
            $habitat4->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/riviere_amazoniene.webp');
            $habitat4->setDescription('Parcourez les méandres de la rivière Amazonienne, la plus grande forêt tropicale du monde. Admirez une faune aquatique spectaculaire et des créatures terrestres uniques.');
            $habitat4->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat4);
            $this->addReference('habitat_4', $habitat4);
            $manager->flush();

            $habitat5 = new Habitats();
            $habitat5->setNom('Montagnes Rocheuses');
            $habitat5->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/montagne_rocheuse.webp'); 
            $habitat5->setDescription('Gravissez les hauteurs des Montagnes Rocheuses, où les sommets enneigés rencontrent les forêts alpines. Découvrez les animaux adaptés à la vie en altitude.');
            $habitat5->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat5);
            $this->addReference('habitat_5', $habitat5);
            $manager->flush();

            $habitat6 = new Habitats();
            $habitat6->setNom('Océan Pacifique');
            $habitat6->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/ocean_pacifique.webp'); 
            $habitat6->setDescription('Plongez dans les profondeurs de l\'Océan Pacifique et découvrez un monde sous-marin fascinant. Observez les poissons multicolores, les majestueuses tortues de mer et les impressionnants requins.');
            $habitat6->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat6);
            $this->addReference('habitat_6', $habitat6);
            $manager->flush();

            $habitat7 = new Habitats();
            $habitat7->setNom('Forêt Boréale');
            $habitat7->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/foret_boreale.webp'); 
            $habitat7->setDescription('Explorez les vastes étendues de la forêt boréale, une région froide mais riche en biodiversité. Rencontrez des animaux robustes et adaptés aux conditions hivernales.');
            $habitat7->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat7);
            $this->addReference('habitat_7', $habitat7);
            $manager->flush();

            $habitat8 = new Habitats();
            $habitat8->setNom('Prairie des Grandes Plaines');
            $habitat8->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/prairie.webp');
            $habitat8->setDescription('Parcourez les vastes étendues des Grandes Plaines, un écosystème riche en biodiversité avec des prairies infinies et des collines ondulantes. Rencontrez des bisons majestueux, des renards rusés et une multitude d\'autres espèces fascinantes.');
            $habitat8->setEtablissement($this->getReference('etablissement_1'));

            $manager->persist($habitat8);
            $this->addReference('habitat_8', $habitat8);
            $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }

}
