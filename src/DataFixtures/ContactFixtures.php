<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 50; $i++){
            $contact = new Contact();
            $contact->setEmail($this->faker->email())
                    ->setSubject('Demande n°' . $i +1)
                    ->setMessage($this->faker->text());
    
            $manager->persist($contact);
        }
        $manager->flush();
    }
}