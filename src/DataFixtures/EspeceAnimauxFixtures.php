<?php

namespace App\DataFixtures;

use App\Entity\EspeceAnimaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EspeceAnimauxFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $espece = new EspeceAnimaux();
        $espece->setNom('Girafe');
        $espece->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Girafe.jpg');

        $manager->persist($espece);
        $this->addReference('espece_1', $espece);
        $manager->flush();

        $espece2 = new EspeceAnimaux();
        $espece2->setNom('Gorille');
        $espece2->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Gorille.jpg');

        $manager->persist($espece2);
        $this->addReference('espece_2', $espece2);
        $manager->flush();

        $espece3 = new EspeceAnimaux();
        $espece3->setNom('Crocodile');
        $espece3->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/pexels-pixabay-60644.jpg');

        $manager->persist($espece3);
        $this->addReference('espece_3', $espece3);
        $manager->flush();

        $espece4 = new EspeceAnimaux();
        $espece4->setNom('Requin');
        $espece4->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Requin.jpg');

        $manager->persist($espece4);
        $this->addReference('espece_4', $espece4);
        $manager->flush();

        $espece5 = new EspeceAnimaux();
        $espece5->setNom('Rhinocéroce');
        $espece5->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Rhinoceroce.jpg');

        $manager->persist($espece5);
        $this->addReference('espece_5', $espece5);
        $manager->flush();

        $espece6 = new EspeceAnimaux();
        $espece6->setNom('Tigre Blanc');
        $espece6->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Tigre_blanc.jpg');

        $manager->persist($espece6);
        $this->addReference('espece_6', $espece6);
        $manager->flush();

        $espece7 = new EspeceAnimaux();
        $espece7->setNom('Tortue');
        $espece7->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Tortue.jpg');

        $manager->persist($espece7);
        $this->addReference('espece_7', $espece7);
        $manager->flush();

        $espece8 = new EspeceAnimaux();
        $espece8->setNom('Zebre');
        $espece8->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Zebre.jpg');

        $manager->persist($espece8);
        $this->addReference('espece_8', $espece8);
        $manager->flush();

    }
}
