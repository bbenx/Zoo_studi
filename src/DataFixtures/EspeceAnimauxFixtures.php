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
        $espece->setNom('Bisons');
        $espece->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Bisons.webp');

        $manager->persist($espece);
        $this->addReference('espece_1', $espece);
        $manager->flush();

        $espece2 = new EspeceAnimaux();
        $espece2->setNom('Crocodiles');
        $espece2->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Crocodiles.webp');

        $manager->persist($espece2);
        $this->addReference('espece_2', $espece2);
        $manager->flush();

        $espece3 = new EspeceAnimaux();
        $espece3->setNom('Girafes');
        $espece3->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Girafes.webp');

        $manager->persist($espece3);
        $this->addReference('espece_3', $espece3);
        $manager->flush();

        $espece4 = new EspeceAnimaux();
        $espece4->setNom('Gorilles');
        $espece4->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Gorilles.webp');

        $manager->persist($espece4);
        $this->addReference('espece_4', $espece4);
        $manager->flush();

        $espece5 = new EspeceAnimaux();
        $espece5->setNom('Renards');
        $espece5->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Renards.webp');

        $manager->persist($espece5);
        $this->addReference('espece_5', $espece5);
        $manager->flush();

        $espece6 = new EspeceAnimaux();
        $espece6->setNom('Tortues Marines');
        $espece6->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Tortues+Marines.webp');

        $manager->persist($espece6);
        $this->addReference('espece_6', $espece6);
        $manager->flush();

        $espece7 = new EspeceAnimaux();
        $espece7->setNom('Zebres');
        $espece7->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Zebres.webp');

        $manager->persist($espece7);
        $this->addReference('espece_7', $espece7);
        $manager->flush();

        $espece8 = new EspeceAnimaux();
        $espece8->setNom('Ours Blanc');
        $espece8->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Ours+Blanc.webp');

        $manager->persist($espece8);
        $this->addReference('espece_8', $espece8);
        $manager->flush();

    }
}
