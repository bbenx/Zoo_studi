<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnimauxFixtures extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


            $animaux = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_1"));
            $animaux->setPrenom('Oasis');
            $animaux->setRace('Dromadaire');
            $animaux->setImage('url');

            $manager->persist($animaux);
            $this->addReference('animaux_1', $animaux);
            $manager->flush();

            $animaux2 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_1"));
            $animaux2->setPrenom('Tempête');
            $animaux2->setRace('Dromadaire');
            $animaux2->setImage('url');

            $manager->persist($animaux2);
            $this->addReference('animaux_2', $animaux2);
            $manager->flush();

            $animaux3 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_1"));
            $animaux3->setPrenom('Tempête');
            $animaux3->setRace('Dromadaire');
            $animaux3->setImage('url');

            $manager->persist($animaux3);
            $this->addReference('animaux_3', $animaux3);
            $manager->flush();

            $animaux4 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_2"));
            $animaux4->setPrenom('Tempête');
            $animaux4->setRace('Dromadaire');
            $animaux4->setImage('url');

            $manager->persist($animaux4);
            $this->addReference('animaux_4', $animaux4);
            $manager->flush();

            $animaux5 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_2"));
            $animaux5->setPrenom('Tempête');
            $animaux5->setRace('Dromadaire');
            $animaux5->setImage('url');

            $manager->persist($animaux5);
            $this->addReference('animaux_5', $animaux5);
            $manager->flush();

            $animaux6 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_2"));
            $animaux6->setPrenom('Tempête');
            $animaux6->setRace('Dromadaire');
            $animaux6->setImage('url');

            $manager->persist($animaux6);
            $this->addReference('animaux_6', $animaux6);
            $manager->flush();

            $animaux7 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_3"));
            $animaux7->setPrenom('Tempête');
            $animaux7->setRace('Dromadaire');
            $animaux7->setImage('url');

            $manager->persist($animaux7);
            $this->addReference('animaux_7', $animaux7);
            $manager->flush();

            $animaux8 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_3"));
            $animaux8->setPrenom('Tempête');
            $animaux8->setRace('Dromadaire');
            $animaux8->setImage('url');

            $manager->persist($animaux8);
            $this->addReference('animaux_8', $animaux8);
            $manager->flush();

            $animaux9 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_3"));
            $animaux9->setPrenom('Tempête');
            $animaux9->setRace('Dromadaire');
            $animaux9->setImage('url');

            $manager->persist($animaux9);
            $this->addReference('animaux_9', $animaux9);
            $manager->flush();

            $animaux10 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_4"));
            $animaux10->setPrenom('Tempête');
            $animaux10->setRace('Dromadaire');
            $animaux10->setImage('url');

            $manager->persist($animaux10);
            $this->addReference('animaux_10', $animaux10);
            $manager->flush();

            $animaux11 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_4"));
            $animaux11->setPrenom('Tempête');
            $animaux11->setRace('Dromadaire');
            $animaux11->setImage('url');

            $manager->persist($animaux11);
            $this->addReference('animaux_11', $animaux11);
            $manager->flush();

            $animaux12 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_4"));
            $animaux12->setPrenom('Tempête');
            $animaux12->setRace('Dromadaire');
            $animaux12->setImage('url');

            $manager->persist($animaux12);
            $this->addReference('animaux_12', $animaux12);
            $manager->flush();

            $animaux13 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_4"));
            $animaux13->setPrenom('Tempête');
            $animaux13->setRace('Dromadaire');
            $animaux13->setImage('url');

            $manager->persist($animaux13);
            $this->addReference('animaux_13', $animaux13);
            $manager->flush();

            $animaux14 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_5"));
            $animaux14->setPrenom('Tempête');
            $animaux14->setRace('Dromadaire');
            $animaux14->setImage('url');

            $manager->persist($animaux14);
            $this->addReference('animaux_14', $animaux14);
            $manager->flush();

            $animaux15 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_5"));
            $animaux15->setPrenom('Tempête');
            $animaux15->setRace('Dromadaire');
            $animaux15->setImage('url');

            $manager->persist($animaux15);
            $this->addReference('animaux_15', $animaux15);
            $manager->flush();

            $animaux16 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_6"));
            $animaux16->setPrenom('Tempête');
            $animaux16->setRace('Dromadaire');
            $animaux16->setImage('url');

            $manager->persist($animaux16);
            $this->addReference('animaux_16', $animaux16);
            $manager->flush();

            $animaux17 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_6"));
            $animaux17->setPrenom('Tempête');
            $animaux17->setRace('Dromadaire');
            $animaux17->setImage('url');

            $manager->persist($animaux17);
            $this->addReference('animaux_17', $animaux17);
            $manager->flush();

            $animaux18 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_6"));
            $animaux18->setPrenom('Tempête');
            $animaux18->setRace('Dromadaire');
            $animaux18->setImage('url');

            $manager->persist($animaux18);
            $this->addReference('animaux_18', $animaux18);
            $manager->flush();

            $animaux19 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_7"));
            $animaux19->setPrenom('Tempête');
            $animaux19->setRace('Dromadaire');
            $animaux19->setImage('url');

            $manager->persist($animaux19);
            $this->addReference('animaux_19', $animaux19);
            $manager->flush();

            $animaux20 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_7"));
            $animaux20->setPrenom('Tempête');
            $animaux20->setRace('Dromadaire');
            $animaux20->setImage('url');

            $manager->persist($animaux20);
            $this->addReference('animaux_20', $animaux20);
            $manager->flush();

            $animaux21 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_7"));
            $animaux21->setPrenom('Tempête');
            $animaux21->setRace('Dromadaire');
            $animaux21->setImage('url');

            $manager->persist($animaux21);
            $this->addReference('animaux_21', $animaux21);
            $manager->flush();

            $animaux22 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_8"));
            $animaux22->setPrenom('Tempête');
            $animaux22->setRace('Dromadaire');
            $animaux22->setImage('url');

            $manager->persist($animaux22);
            $this->addReference('animaux_22', $animaux22);
            $manager->flush();

            $animaux23 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_8"));
            $animaux23->setPrenom('Tempête');
            $animaux23->setRace('Dromadaire');
            $animaux23->setImage('url');

            $manager->persist($animaux23);
            $this->addReference('animaux_23', $animaux23);
            $manager->flush();

            $animaux24 = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_8"));
            $animaux24->setPrenom('Tempête');
            $animaux24->setRace('Dromadaire');
            $animaux24->setImage('url');

            $manager->persist($animaux24);
            $this->addReference('animaux_24', $animaux24);
            $manager->flush();

    
    }

    public function getDependencies()
    {
        return [
            HabitatFixtures::class,
        ];
    }

}
