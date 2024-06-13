<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnimauxFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {



            $animaux = new Animaux();
            $animaux->setHabitat($this->getReference("habitat_2"));
            $animaux->setPrenom('Bebou');
            $animaux->setRace('Girafe');
            $animaux->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Bebou.webp');

            $manager->persist($animaux);
            $this->addReference('animaux_1', $animaux);
            $manager->flush();

            $animaux2 = new Animaux();
            $animaux2->setHabitat($this->getReference("habitat_2"));
            $animaux2->setPrenom('Jasper');
            $animaux2->setRace('Girafe');
            $animaux2->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Jasper.webp');

            $manager->persist($animaux2);
            $this->addReference('animaux_2', $animaux2);
            $manager->flush();

            $animaux3 = new Animaux();
            $animaux3->setHabitat($this->getReference("habitat_2"));
            $animaux3->setPrenom('Savannah');
            $animaux3->setRace('Girafe');
            $animaux3->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Savannah.webp');

            $manager->persist($animaux3);
            $this->addReference('animaux_3', $animaux3);
            $manager->flush();

            $animaux4 = new Animaux();
            $animaux4->setHabitat($this->getReference("habitat_2"));
            $animaux4->setPrenom('Stripes');
            $animaux4->setRace('Zèbres');
            $animaux4->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Stripes.webp');

            $manager->persist($animaux4);
            $this->addReference('animaux_4', $animaux4);
            $manager->flush();

            $animaux5 = new Animaux();
            $animaux5->setHabitat($this->getReference("habitat_2"));
            $animaux5->setPrenom('Zara');
            $animaux5->setRace('Zèbres');
            $animaux5->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Zara.webp');

            $manager->persist($animaux5);
            $this->addReference('animaux_5', $animaux5);
            $manager->flush();

            $animaux6 = new Animaux();
            $animaux6->setHabitat($this->getReference("habitat_2"));
            $animaux6->setPrenom('Ziggy');
            $animaux6->setRace('Zèbres');
            $animaux6->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Ziggy.webp');

            $manager->persist($animaux6);
            $this->addReference('animaux_6', $animaux6);
            $manager->flush();

            $animaux7 = new Animaux();
            $animaux7->setHabitat($this->getReference("habitat_2"));
            $animaux7->setPrenom('Tank');
            $animaux7->setRace('Rhinocéroce Blanc');
            $animaux7->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Tank.webp');

            $manager->persist($animaux7);
            $this->addReference('animaux_7', $animaux7);
            $manager->flush();

            $animaux8 = new Animaux();
            $animaux8->setHabitat($this->getReference("habitat_2"));
            $animaux8->setPrenom('Rhonda');
            $animaux8->setRace('Rhinocéroce Blanc');
            $animaux8->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Rhonda.webp');

            $manager->persist($animaux8);
            $this->addReference('animaux_8', $animaux8);
            $manager->flush();

            $animaux9 = new Animaux();
            $animaux9->setHabitat($this->getReference("habitat_2"));
            $animaux9->setPrenom('Buster');
            $animaux9->setRace('Rhinocéroce Blanc');
            $animaux9->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Buster.webp');

            $manager->persist($animaux9);
            $this->addReference('animaux_9', $animaux9);
            $manager->flush();

            $animaux10 = new Animaux();
            $animaux10->setHabitat($this->getReference("habitat_2"));
            $animaux10->setPrenom('Nova');
            $animaux10->setRace('Rhinocéroce Blanc');
            $animaux10->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Nova.webp');

            $manager->persist($animaux10);
            $this->addReference('animaux_10', $animaux10);
            $manager->flush();

            $animaux11 = new Animaux();
            $animaux11->setHabitat($this->getReference("habitat_2"));
            $animaux11->setPrenom('Dash');
            $animaux11->setRace('Antilope');
            $animaux11->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Dash.webp');

            $manager->persist($animaux11);
            $this->addReference('animaux_11', $animaux11);
            $manager->flush();

            $animaux12 = new Animaux();
            $animaux12->setHabitat($this->getReference("habitat_2"));
            $animaux12->setPrenom('Meadow');
            $animaux12->setRace('Antilope');
            $animaux12->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Meadow.webp');

            $manager->persist($animaux12);
            $this->addReference('animaux_12', $animaux12);
            $manager->flush();

            $animaux13 = new Animaux();
            $animaux13->setHabitat($this->getReference("habitat_2"));
            $animaux13->setPrenom('Nafi');
            $animaux13->setRace('Antilope');
            $animaux13->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Nala.webp');

            $manager->persist($animaux13);
            $this->addReference('animaux_13', $animaux13);
            $manager->flush();

            $animaux14 = new Animaux();
            $animaux14->setHabitat($this->getReference("habitat_2"));
            $animaux14->setPrenom('Leo');
            $animaux14->setRace('Antilope');
            $animaux14->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Leo.webp');

            $manager->persist($animaux14);
            $this->addReference('animaux_14', $animaux14);
            $manager->flush();

            $animaux15 = new Animaux();
            $animaux15->setHabitat($this->getReference("habitat_2"));
            $animaux15->setPrenom('Speedy');
            $animaux15->setRace('Autruche');
            $animaux15->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Speedy.webp');

            $manager->persist($animaux15);
            $this->addReference('animaux_15', $animaux15);
            $manager->flush();

            $animaux16 = new Animaux();
            $animaux16->setHabitat($this->getReference("habitat_2"));
            $animaux16->setPrenom('Olive');
            $animaux16->setRace('Autruche');
            $animaux16->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Olive.webp');

            $manager->persist($animaux16);
            $this->addReference('animaux_16', $animaux16);
            $manager->flush();

            $animaux17 = new Animaux();
            $animaux17->setHabitat($this->getReference("habitat_2"));
            $animaux17->setPrenom('Stretch');
            $animaux17->setRace('Autruche');
            $animaux17->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Stretch.webp');

            $manager->persist($animaux17);
            $this->addReference('animaux_17', $animaux17);
            $manager->flush();

            $animaux18 = new Animaux();
            $animaux18->setHabitat($this->getReference("habitat_2"));
            $animaux18->setPrenom('Ella');
            $animaux18->setRace('Autruche');
            $animaux18->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Ella.webp');

            $manager->persist($animaux18);
            $this->addReference('animaux_18', $animaux18);
            $manager->flush();

            $animaux19 = new Animaux();
            $animaux19->setHabitat($this->getReference("habitat_3"));
            $animaux19->setPrenom('Kong');
            $animaux19->setRace('Gorille');
            $animaux19->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Kong.webp');

            $manager->persist($animaux19);
            $this->addReference('animaux_19', $animaux19);
            $manager->flush();

            $animaux20 = new Animaux();
            $animaux20->setHabitat($this->getReference("habitat_3"));
            $animaux20->setPrenom('Tara');
            $animaux20->setRace('Gorille');
            $animaux20->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Tara.webp');

            $manager->persist($animaux20);
            $this->addReference('animaux_20', $animaux20);
            $manager->flush();

            $animaux21 = new Animaux();
            $animaux21->setHabitat($this->getReference("habitat_3"));
            $animaux21->setPrenom('Harambe');
            $animaux21->setRace('Gorille');
            $animaux21->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Harambe.webp');

            $manager->persist($animaux21);
            $this->addReference('animaux_21', $animaux21);
            $manager->flush();

            $animaux22 = new Animaux();
            $animaux22->setHabitat($this->getReference("habitat_3"));
            $animaux22->setPrenom('Kibi');
            $animaux22->setRace('Gorille');
            $animaux22->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/kibi.webp');

            $manager->persist($animaux22);
            $this->addReference('animaux_22', $animaux22);
            $manager->flush();

            $animaux23 = new Animaux();
            $animaux23->setHabitat($this->getReference("habitat_3"));
            $animaux23->setPrenom('Rio');
            $animaux23->setRace('Perroquet');
            $animaux23->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Rio.webp');

            $manager->persist($animaux23);
            $this->addReference('animaux_23', $animaux23);
            $manager->flush();

            $animaux24 = new Animaux();
            $animaux24->setHabitat($this->getReference("habitat_3"));
            $animaux24->setPrenom('Polly');
            $animaux24->setRace('Perroquet');
            $animaux24->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Poly.webp');

            $manager->persist($animaux24);
            $this->addReference('animaux_24', $animaux24);
            $manager->flush();

            $animaux25 = new Animaux();
            $animaux25->setHabitat($this->getReference("habitat_3"));
            $animaux25->setPrenom('Skittles');
            $animaux25->setRace('Perroquet');
            $animaux25->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Skittles.webp');

            $manager->persist($animaux25);
            $this->addReference('animaux_25', $animaux25);
            $manager->flush();

            $animaux26 = new Animaux();
            $animaux26->setHabitat($this->getReference("habitat_3"));
            $animaux26->setPrenom('Mango');
            $animaux26->setRace('Perroquet');
            $animaux26->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Mango.webp');

            $manager->persist($animaux26);
            $this->addReference('animaux_26', $animaux26);
            $manager->flush();

            $animaux27 = new Animaux();
            $animaux27->setHabitat($this->getReference("habitat_3"));
            $animaux27->setPrenom('Kiwi');
            $animaux27->setRace('Perroquet');
            $animaux27->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Kiwi.webp');

            $manager->persist($animaux27);
            $this->addReference('animaux_27', $animaux27);
            $manager->flush();

            $animaux28 = new Animaux();
            $animaux28->setHabitat($this->getReference("habitat_3"));
            $animaux28->setPrenom('Howly');
            $animaux28->setRace('Singe urleur');
            $animaux28->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Howly.webp');

            $manager->persist($animaux28);
            $this->addReference('animaux_28', $animaux28);
            $manager->flush();

            $animaux29 = new Animaux();
            $animaux29->setHabitat($this->getReference("habitat_3"));
            $animaux29->setPrenom('Delta');
            $animaux29->setRace('Singe urleur');
            $animaux29->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Delta.webp');

            $manager->persist($animaux29);
            $this->addReference('animaux_29', $animaux29);
            $manager->flush();

            $animaux30 = new Animaux();
            $animaux30->setHabitat($this->getReference("habitat_3"));
            $animaux30->setPrenom('Banjo');
            $animaux30->setRace('Singe urleur');
            $animaux30->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Banjo.webp');

            $manager->persist($animaux30);
            $this->addReference('animaux_30', $animaux30);
            $manager->flush();

            $animaux31 = new Animaux();
            $animaux31->setHabitat($this->getReference("habitat_3"));
            $animaux31->setPrenom('Lara');
            $animaux31->setRace('Singe urleur');
            $animaux31->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Lara.webp');

            $manager->persist($animaux31);
            $this->addReference('animaux_31', $animaux31);
            $manager->flush();

            $animaux32 = new Animaux();
            $animaux32->setHabitat($this->getReference("habitat_3"));
            $animaux32->setPrenom('Touki');
            $animaux32->setRace('Toucan');
            $animaux32->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Touki.webp');

            $manager->persist($animaux32);
            $this->addReference('animaux_32', $animaux32);
            $manager->flush();

            $animaux33 = new Animaux();
            $animaux33->setHabitat($this->getReference("habitat_3"));
            $animaux33->setPrenom('Pico');
            $animaux33->setRace('Toucan');
            $animaux33->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Pico.webp');

            $manager->persist($animaux33);
            $this->addReference('animaux_33', $animaux33);
            $manager->flush();

            $animaux34 = new Animaux();
            $animaux34->setHabitat($this->getReference("habitat_3"));
            $animaux34->setPrenom('Rainbow');
            $animaux34->setRace('Toucan');
            $animaux34->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Rainbow.webp');

            $manager->persist($animaux34);
            $this->addReference('animaux_34', $animaux34);
            $manager->flush();

            $animaux35 = new Animaux();
            $animaux35->setHabitat($this->getReference("habitat_3"));
            $animaux35->setPrenom('tiki');
            $animaux35->setRace('Toucan');
            $animaux35->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Tiki.webp');

            $manager->persist($animaux35);
            $this->addReference('animaux_35', $animaux35);
            $manager->flush();

            $animaux36 = new Animaux();
            $animaux36->setHabitat($this->getReference("habitat_3"));
            $animaux36->setPrenom('Jazz');
            $animaux36->setRace('Toucan');
            $animaux36->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Jazz.webp');

            $manager->persist($animaux36);
            $this->addReference('animaux_36', $animaux36);
            $manager->flush();

            $animaux37 = new Animaux();
            $animaux37->setHabitat($this->getReference("habitat_4"));
            $animaux37->setPrenom('Capri');
            $animaux37->setRace('Capybaras');
            $animaux37->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Capybaras/Capri.webp');

            $manager->persist($animaux37);
            $this->addReference('animaux_37', $animaux37);
            $manager->flush();

            $animaux38 = new Animaux();
            $animaux38->setHabitat($this->getReference("habitat_4"));
            $animaux38->setPrenom('Buddy');
            $animaux38->setRace('Capybaras');
            $animaux38->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Capybaras/Buddy.webp');

            $manager->persist($animaux38);
            $this->addReference('animaux_38', $animaux38);
            $manager->flush();

            $animaux39 = new Animaux();
            $animaux39->setHabitat($this->getReference("habitat_4"));
            $animaux39->setPrenom('Pip');
            $animaux39->setRace('Capybaras');
            $animaux39->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Capybaras/Pip.webp');

            $manager->persist($animaux39);
            $this->addReference('animaux_39', $animaux39);
            $manager->flush();

            $animaux40 = new Animaux();
            $animaux40->setHabitat($this->getReference("habitat_4"));
            $animaux40->setPrenom('Pelo');
            $animaux40->setRace('Aras');
            $animaux40->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Aras/Pelo.webp');

            $manager->persist($animaux40);
            $this->addReference('animaux_40', $animaux40);
            $manager->flush();

            $animaux41 = new Animaux();
            $animaux41->setHabitat($this->getReference("habitat_4"));
            $animaux41->setPrenom('Sky');
            $animaux41->setRace('Aras');
            $animaux41->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Aras/Sky.webp');

            $manager->persist($animaux41);
            $this->addReference('animaux_41', $animaux41);
            $manager->flush();

            $animaux42 = new Animaux();
            $animaux42->setHabitat($this->getReference("habitat_4"));
            $animaux42->setPrenom('Ruby');
            $animaux42->setRace('Aras');
            $animaux42->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Aras/Ruby.webp');

            $manager->persist($animaux42);
            $this->addReference('animaux_42', $animaux42);
            $manager->flush();

            $animaux43 = new Animaux();
            $animaux43->setHabitat($this->getReference("habitat_4"));
            $animaux43->setPrenom('Coco');
            $animaux43->setRace('Aras');
            $animaux43->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Aras/Coco.webp');

            $manager->persist($animaux43);
            $this->addReference('animaux_43', $animaux43);
            $manager->flush();

            $animaux44 = new Animaux();
            $animaux44->setHabitat($this->getReference("habitat_4"));
            $animaux44->setPrenom('Spike');
            $animaux44->setRace('Caïman');
            $animaux44->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Cai%CC%88mans/Spike.webp');

            $manager->persist($animaux44);
            $this->addReference('animaux_44', $animaux44);
            $manager->flush();

            $animaux45 = new Animaux();
            $animaux45->setHabitat($this->getReference("habitat_4"));
            $animaux45->setPrenom('Gator');
            $animaux45->setRace('Caïman');
            $animaux45->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Cai%CC%88mans/Gator.webp');

            $manager->persist($animaux45);
            $this->addReference('animaux_45', $animaux45);
            $manager->flush();

            $animaux46 = new Animaux();
            $animaux46->setHabitat($this->getReference("habitat_4"));
            $animaux46->setPrenom('Rex');
            $animaux46->setRace('Caïman');
            $animaux46->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Cai%CC%88mans/Rex.webp');

            $manager->persist($animaux46);
            $this->addReference('animaux_46', $animaux46);
            $manager->flush();

            $animaux47 = new Animaux();
            $animaux47->setHabitat($this->getReference("habitat_4"));
            $animaux47->setPrenom('Nile');
            $animaux47->setRace('Caïman');
            $animaux47->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Cai%CC%88mans/Nile.webp');

            $manager->persist($animaux47);
            $this->addReference('animaux_47', $animaux47);
            $manager->flush();

            $animaux48 = new Animaux();
            $animaux48->setHabitat($this->getReference("habitat_4"));
            $animaux48->setPrenom('Snappy');
            $animaux48->setRace('Caïman');
            $animaux48->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Rivie%CC%80re+Amazonienne/Cai%CC%88mans/Snappy.webp');

            $manager->persist($animaux48);
            $this->addReference('animaux_48', $animaux48);
            $manager->flush();

            $animaux49 = new Animaux();
            $animaux49->setHabitat($this->getReference("habitat_1"));
            $animaux49->setPrenom('Fenny');
            $animaux49->setRace('Fennec');
            $animaux49->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Fennecs/Fenny.webp');

            $manager->persist($animaux49);
            $this->addReference('animaux_49', $animaux49);
            $manager->flush();

            $animaux50 = new Animaux();
            $animaux50->setHabitat($this->getReference("habitat_1"));
            $animaux50->setPrenom('Sandy');
            $animaux50->setRace('Fennec');
            $animaux50->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Fennecs/Sandy.webp');

            $manager->persist($animaux50);
            $this->addReference('animaux_50', $animaux50);
            $manager->flush();

            $animaux51 = new Animaux();
            $animaux51->setHabitat($this->getReference("habitat_1"));
            $animaux51->setPrenom('Dusty');
            $animaux51->setRace('Fennec');
            $animaux51->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Fennecs/Dusty.webp');

            $manager->persist($animaux51);
            $this->addReference('animaux_51', $animaux51);
            $manager->flush();

            $animaux52 = new Animaux();
            $animaux52->setHabitat($this->getReference("habitat_1"));
            $animaux52->setPrenom('Flash');
            $animaux52->setRace('Fennec');
            $animaux52->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Fennecs/Flash.webp');

            $manager->persist($animaux52);
            $this->addReference('animaux_52', $animaux52);
            $manager->flush();

            $animaux53 = new Animaux();
            $animaux53->setHabitat($this->getReference("habitat_1"));
            $animaux53->setPrenom('Camelot');
            $animaux53->setRace('Dromadaire');
            $animaux53->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Dromadaires/Camelot.webp');

            $manager->persist($animaux53);
            $this->addReference('animaux_53', $animaux53);
            $manager->flush();

            $animaux54 = new Animaux();
            $animaux54->setHabitat($this->getReference("habitat_1"));
            $animaux54->setPrenom('Daisy');
            $animaux54->setRace('Dromadaire');
            $animaux54->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Dromadaires/Daisy.webp');

            $manager->persist($animaux54);
            $this->addReference('animaux_54', $animaux54);
            $manager->flush();

            $animaux55 = new Animaux();
            $animaux55->setHabitat($this->getReference("habitat_1"));
            $animaux55->setPrenom('Humpfrey');
            $animaux55->setRace('Dromadaire');
            $animaux55->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Dromadaires/Humpfrey.webp');

            $manager->persist($animaux55);
            $this->addReference('animaux_55', $animaux55);
            $manager->flush();

            $animaux56 = new Animaux();
            $animaux56->setHabitat($this->getReference("habitat_1"));
            $animaux56->setPrenom('Belle');
            $animaux56->setRace('Gazelle');
            $animaux56->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Gazelles/Belle.webp');

            $manager->persist($animaux56);
            $this->addReference('animaux_56', $animaux56);
            $manager->flush();
            
            $animaux57 = new Animaux();
            $animaux57->setHabitat($this->getReference("habitat_1"));
            $animaux57->setPrenom('Swift');
            $animaux57->setRace('Gazelle');
            $animaux57->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Gazelles/Swift.webp');

            $manager->persist($animaux57);
            $this->addReference('animaux_57', $animaux57);
            $manager->flush();
            
            $animaux58 = new Animaux();
            $animaux58->setHabitat($this->getReference("habitat_1"));
            $animaux58->setPrenom('Star');
            $animaux58->setRace('Gazelle');
            $animaux58->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Gazelles/Star.webp');

            $manager->persist($animaux58);
            $this->addReference('animaux_58', $animaux58);
            $manager->flush();
            
            $animaux59 = new Animaux();
            $animaux59->setHabitat($this->getReference("habitat_1"));
            $animaux59->setPrenom('Blazer');
            $animaux59->setRace('Gazelle');
            $animaux59->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Gazelles/Blazer.webp');

            $manager->persist($animaux59);
            $this->addReference('animaux_59', $animaux59);
            $manager->flush();
            
            $animaux60 = new Animaux();
            $animaux60->setHabitat($this->getReference("habitat_1"));
            $animaux60->setPrenom('Luna');
            $animaux60->setRace('Gazelle');
            $animaux60->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/De%CC%81sert+du+Sahara/Gazelles/Luna.webp');

            $manager->persist($animaux60);
            $this->addReference('animaux_60', $animaux60);
            $manager->flush();

            $animaux61 = new Animaux();
            $animaux61->setHabitat($this->getReference("habitat_5"));
            $animaux61->setPrenom('Rock');
            $animaux61->setRace('Mouflon');
            $animaux61->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Mouflons/Rock.webp');

            $manager->persist($animaux61);
            $this->addReference('animaux_61', $animaux61);
            $manager->flush();

            $animaux62 = new Animaux();
            $animaux62->setHabitat($this->getReference("habitat_5"));
            $animaux62->setPrenom('Cliff');
            $animaux62->setRace('Mouflon');
            $animaux62->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Mouflons/Cliff.webp');

            $manager->persist($animaux62);
            $this->addReference('animaux_62', $animaux62);
            $manager->flush();

            $animaux63 = new Animaux();
            $animaux63->setHabitat($this->getReference("habitat_5"));
            $animaux63->setPrenom('Boulder');
            $animaux63->setRace('Mouflon');
            $animaux63->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Mouflons/Boulder.webp');

            $manager->persist($animaux63);
            $this->addReference('animaux_63', $animaux63);
            $manager->flush();

            $animaux64 = new Animaux();
            $animaux64->setHabitat($this->getReference("habitat_5"));
            $animaux64->setPrenom('Alpine');
            $animaux64->setRace('Chèvre des montagnes rocheuses');
            $animaux64->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Chevres+des+montagnes+rocheuses/Alpine.webp');

            $manager->persist($animaux64);
            $this->addReference('animaux_64', $animaux64);
            $manager->flush();

            $animaux65 = new Animaux();
            $animaux65->setHabitat($this->getReference("habitat_5"));
            $animaux65->setPrenom('Blanca');
            $animaux65->setRace('Chèvre des montagnes rocheuses');
            $animaux65->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Chevres+des+montagnes+rocheuses/Blanca.webp');

            $manager->persist($animaux65);
            $this->addReference('animaux_65', $animaux65);
            $manager->flush();

            $animaux66 = new Animaux();
            $animaux66->setHabitat($this->getReference("habitat_5"));
            $animaux66->setPrenom('Summit');
            $animaux66->setRace('Chèvre des montagnes rocheuses');
            $animaux66->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Chevres+des+montagnes+rocheuses/Summit.webp');

            $manager->persist($animaux66);
            $this->addReference('animaux_66', $animaux66);
            $manager->flush();

            $animaux67 = new Animaux();
            $animaux67->setHabitat($this->getReference("habitat_5"));
            $animaux67->setPrenom('Nimble');
            $animaux67->setRace('Chèvre des montagnes rocheuses');
            $animaux67->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Chevres+des+montagnes+rocheuses/Nimble.webp');

            $manager->persist($animaux67);
            $this->addReference('animaux_67', $animaux67);
            $manager->flush();

            $animaux68 = new Animaux();
            $animaux68->setHabitat($this->getReference("habitat_5"));
            $animaux68->setPrenom('Foxy');
            $animaux68->setRace('Renard');
            $animaux68->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Renards/Foxy.webp');

            $manager->persist($animaux68);
            $this->addReference('animaux_68', $animaux68);
            $manager->flush();

            $animaux69 = new Animaux();
            $animaux69->setHabitat($this->getReference("habitat_5"));
            $animaux69->setPrenom('Rousty');
            $animaux69->setRace('Renard');
            $animaux69->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Renards/Rousty.webp');

            $manager->persist($animaux69);
            $this->addReference('animaux_69', $animaux69);
            $manager->flush();

            $animaux70 = new Animaux();
            $animaux70->setHabitat($this->getReference("habitat_5"));
            $animaux70->setPrenom('Ember');
            $animaux70->setRace('Renard');
            $animaux70->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Renards/Ember.webp');

            $manager->persist($animaux70);
            $this->addReference('animaux_70', $animaux70);
            $manager->flush();

            $animaux71 = new Animaux();
            $animaux71->setHabitat($this->getReference("habitat_5"));
            $animaux71->setPrenom('Vixen');
            $animaux71->setRace('Renard');
            $animaux71->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Renards/Vixen.webp');

            $manager->persist($animaux71);
            $this->addReference('animaux_71', $animaux71);
            $manager->flush();

            $animaux72 = new Animaux();
            $animaux72->setHabitat($this->getReference("habitat_5"));
            $animaux72->setPrenom('Slyce');
            $animaux72->setRace('Renard');
            $animaux72->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Montagnes+rocheuses/Renards/Slyce.webp');

            $manager->persist($animaux72);
            $this->addReference('animaux_72', $animaux72);
            $manager->flush();

            $animaux73 = new Animaux();
            $animaux73->setHabitat($this->getReference("habitat_6"));
            $animaux73->setPrenom('Sammy');
            $animaux73->setRace('Phoque');
            $animaux73->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Phoques/Sammy.webp');

            $manager->persist($animaux73);
            $this->addReference('animaux_73', $animaux73);
            $manager->flush();

            $animaux74 = new Animaux();
            $animaux74->setHabitat($this->getReference("habitat_6"));
            $animaux74->setPrenom('Finn');
            $animaux74->setRace('Phoque');
            $animaux74->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Phoques/Finn.webp');

            $manager->persist($animaux74);
            $this->addReference('animaux_74', $animaux74);
            $manager->flush();

            $animaux75 = new Animaux();
            $animaux75->setHabitat($this->getReference("habitat_6"));
            $animaux75->setPrenom('Splash');
            $animaux75->setRace('Phoque');
            $animaux75->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Phoques/Splash.webp');

            $manager->persist($animaux75);
            $this->addReference('animaux_75', $animaux75);
            $manager->flush();

            $animaux76 = new Animaux();
            $animaux76->setHabitat($this->getReference("habitat_6"));
            $animaux76->setPrenom('Echo');
            $animaux76->setRace('Dauphin');
            $animaux76->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Dauphins/Echo.webp');

            $manager->persist($animaux76);
            $this->addReference('animaux_76', $animaux76);
            $manager->flush();

            $animaux77 = new Animaux();
            $animaux77->setHabitat($this->getReference("habitat_6"));
            $animaux77->setPrenom('Flipper');
            $animaux77->setRace('Dauphin');
            $animaux77->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Dauphins/Flipper.webp');

            $manager->persist($animaux77);
            $this->addReference('animaux_77', $animaux77);
            $manager->flush();

            $animaux78 = new Animaux();
            $animaux78->setHabitat($this->getReference("habitat_6"));
            $animaux78->setPrenom('Dolly');
            $animaux78->setRace('Dauphin');
            $animaux78->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Dauphins/Dolly.webp');

            $manager->persist($animaux78);
            $this->addReference('animaux_78', $animaux78);
            $manager->flush();

            $animaux79 = new Animaux();
            $animaux79->setHabitat($this->getReference("habitat_6"));
            $animaux79->setPrenom('Marin');
            $animaux79->setRace('Dauphin');
            $animaux79->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Dauphins/Marin.webp');

            $manager->persist($animaux79);
            $this->addReference('animaux_79', $animaux79);
            $manager->flush();

            $animaux80 = new Animaux();
            $animaux80->setHabitat($this->getReference("habitat_6"));
            $animaux80->setPrenom('Shelly');
            $animaux80->setRace('Tortue Marine');
            $animaux80->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Tortues+Marines/Shelly.webp');

            $manager->persist($animaux80);
            $this->addReference('animaux_80', $animaux80);
            $manager->flush();

            $animaux81 = new Animaux();
            $animaux81->setHabitat($this->getReference("habitat_6"));
            $animaux81->setPrenom('Coral');
            $animaux81->setRace('Tortue Marine');
            $animaux81->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Tortues+Marines/Coral.webp');

            $manager->persist($animaux81);
            $this->addReference('animaux_81', $animaux81);
            $manager->flush();

            $animaux82 = new Animaux();
            $animaux82->setHabitat($this->getReference("habitat_6"));
            $animaux82->setPrenom('Squirt');
            $animaux82->setRace('Tortue Marine');
            $animaux82->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Tortues+Marines/Squirt.webp');

            $manager->persist($animaux82);
            $this->addReference('animaux_82', $animaux82);
            $manager->flush();

            $animaux83 = new Animaux();
            $animaux83->setHabitat($this->getReference("habitat_6"));
            $animaux83->setPrenom('Tide');
            $animaux83->setRace('Tortue Marine');
            $animaux83->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Tortues+Marines/Tide.webp');

            $manager->persist($animaux83);
            $this->addReference('animaux_83', $animaux83);
            $manager->flush();

            $animaux84 = new Animaux();
            $animaux84->setHabitat($this->getReference("habitat_6"));
            $animaux84->setPrenom('Misty');
            $animaux84->setRace('Tortue Marine');
            $animaux84->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Tortues+Marines/Misty.webp');

            $manager->persist($animaux84);
            $this->addReference('animaux_84', $animaux84);
            $manager->flush();

            $animaux85 = new Animaux();
            $animaux85->setHabitat($this->getReference("habitat_6"));
            $animaux85->setPrenom('Ray');
            $animaux85->setRace('Raie');
            $animaux85->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Raies/Ray.webp');

            $manager->persist($animaux85);
            $this->addReference('animaux_85', $animaux85);
            $manager->flush();

            $animaux86 = new Animaux();
            $animaux86->setHabitat($this->getReference("habitat_6"));
            $animaux86->setPrenom('Sting');
            $animaux86->setRace('Raie');
            $animaux86->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Raies/Sting.webp');

            $manager->persist($animaux86);
            $this->addReference('animaux_86', $animaux86);
            $manager->flush();

            $animaux87 = new Animaux();
            $animaux87->setHabitat($this->getReference("habitat_6"));
            $animaux87->setPrenom('Glimmer');
            $animaux87->setRace('Raie');
            $animaux87->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Oce%CC%81an+Pacifique/Raies/Glimmer.webp');

            $manager->persist($animaux87);
            $this->addReference('animaux_87', $animaux87);
            $manager->flush();

            $animaux88 = new Animaux();
            $animaux88->setHabitat($this->getReference("habitat_7"));
            $animaux88->setPrenom('Snowy');
            $animaux88->setRace('Ours Blanc');
            $animaux88->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Ours+Blancs/Snowy.webp');

            $manager->persist($animaux88);
            $this->addReference('animaux_88', $animaux88);
            $manager->flush();

            $animaux89 = new Animaux();
            $animaux89->setHabitat($this->getReference("habitat_7"));
            $animaux89->setPrenom('Arctic');
            $animaux89->setRace('Ours Blanc');
            $animaux89->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Ours+Blancs/Arctic.webp');

            $manager->persist($animaux89);
            $this->addReference('animaux_89', $animaux89);
            $manager->flush();

            $animaux90 = new Animaux();
            $animaux90->setHabitat($this->getReference("habitat_7"));
            $animaux90->setPrenom('Blizzard');
            $animaux90->setRace('Ours Blanc');
            $animaux90->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Ours+Blancs/Blizzard.webp');

            $manager->persist($animaux90);
            $this->addReference('animaux_90', $animaux90);
            $manager->flush();

            $animaux91 = new Animaux();
            $animaux91->setHabitat($this->getReference("habitat_7"));
            $animaux91->setPrenom('Polar');
            $animaux91->setRace('Ours Blanc');
            $animaux91->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Ours+Blancs/Polar.webp');

            $manager->persist($animaux91);
            $this->addReference('animaux_91', $animaux91);
            $manager->flush();

            $animaux92 = new Animaux();
            $animaux92->setHabitat($this->getReference("habitat_7"));
            $animaux92->setPrenom('Ice');
            $animaux92->setRace('Ours Blanc');
            $animaux92->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Ours+Blancs/Ice.webp');

            $manager->persist($animaux92);
            $this->addReference('animaux_92', $animaux92);
            $manager->flush();

            $animaux93 = new Animaux();
            $animaux93->setHabitat($this->getReference("habitat_7"));
            $animaux93->setPrenom('Whiskers');
            $animaux93->setRace('Lynx');
            $animaux93->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Lynx/Whiskers.webp');

            $manager->persist($animaux93);
            $this->addReference('animaux_93', $animaux93);
            $manager->flush();

            $animaux94 = new Animaux();
            $animaux94->setHabitat($this->getReference("habitat_7"));
            $animaux94->setPrenom('Lanou');
            $animaux94->setRace('Lynx');
            $animaux94->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Lynx/Lanou.webp');

            $manager->persist($animaux94);
            $this->addReference('animaux_94', $animaux94);
            $manager->flush();

            $animaux95 = new Animaux();
            $animaux95->setHabitat($this->getReference("habitat_7"));
            $animaux95->setPrenom('Shadow');
            $animaux95->setRace('Lynx');
            $animaux95->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Lynx/Shadow.webp');

            $manager->persist($animaux95);
            $this->addReference('animaux_95', $animaux95);
            $manager->flush();

            $animaux96 = new Animaux();
            $animaux96->setHabitat($this->getReference("habitat_7"));
            $animaux96->setPrenom('Frost');
            $animaux96->setRace('Lynx');
            $animaux96->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Lynx/Frost.webp');

            $manager->persist($animaux96);
            $this->addReference('animaux_96', $animaux96);
            $manager->flush();

            $animaux97 = new Animaux();
            $animaux97->setHabitat($this->getReference("habitat_7"));
            $animaux97->setPrenom('Dasher');
            $animaux97->setRace('Caribou');
            $animaux97->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Caribou/Dasher.webp');

            $manager->persist($animaux97);
            $this->addReference('animaux_97', $animaux97);
            $manager->flush();

            $animaux98 = new Animaux();
            $animaux98->setHabitat($this->getReference("habitat_7"));
            $animaux98->setPrenom('Blitzen');
            $animaux98->setRace('Caribou');
            $animaux98->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Caribou/Blitzen.webp');

            $manager->persist($animaux98);
            $this->addReference('animaux_98', $animaux98);
            $manager->flush();

            $animaux99 = new Animaux();
            $animaux99->setHabitat($this->getReference("habitat_7"));
            $animaux99->setPrenom('Cornet');
            $animaux99->setRace('Caribou');
            $animaux99->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Caribou/Cornet.webp');

            $manager->persist($animaux99);
            $this->addReference('animaux_99', $animaux99);
            $manager->flush();

            $animaux100 = new Animaux();
            $animaux100->setHabitat($this->getReference("habitat_7"));
            $animaux100->setPrenom('Frosty');
            $animaux100->setRace('Renard Arctique');
            $animaux100->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Renards+Arctiques/Frosty.webp');

            $manager->persist($animaux100);
            $this->addReference('animaux_100', $animaux100);
            $manager->flush();

            $animaux101 = new Animaux();
            $animaux101->setHabitat($this->getReference("habitat_7"));
            $animaux101->setPrenom('Snowflake');
            $animaux101->setRace('Renard Arctique');
            $animaux101->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Renards+Arctiques/Snowflake.webp');

            $manager->persist($animaux101);
            $this->addReference('animaux_101', $animaux101);
            $manager->flush();

            $animaux102 = new Animaux();
            $animaux102->setHabitat($this->getReference("habitat_7"));
            $animaux102->setPrenom('Blanco');
            $animaux102->setRace('Renard Arctique');
            $animaux102->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Renards+Arctiques/Blanco.webp');

            $manager->persist($animaux102);
            $this->addReference('animaux_102', $animaux102);
            $manager->flush();

            $animaux103 = new Animaux();
            $animaux103->setHabitat($this->getReference("habitat_7"));
            $animaux103->setPrenom('Winter');
            $animaux103->setRace('Renard Arctique');
            $animaux103->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Renards+Arctiques/Winter.webp');

            $manager->persist($animaux103);
            $this->addReference('animaux_103', $animaux103);
            $manager->flush();

            $animaux104 = new Animaux();
            $animaux104->setHabitat($this->getReference("habitat_7"));
            $animaux104->setPrenom('Aurora');
            $animaux104->setRace('Renard Arctique');
            $animaux104->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+Bore%CC%81ale/Renards+Arctiques/Aurora.webp');

            $manager->persist($animaux104);
            $this->addReference('animaux_104', $animaux104);
            $manager->flush();

            $animaux105 = new Animaux();
            $animaux105->setHabitat($this->getReference("habitat_8"));
            $animaux105->setPrenom('Thunder');
            $animaux105->setRace('Bison');
            $animaux105->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Bisons/Thunder.webp');

            $manager->persist($animaux105);
            $this->addReference('animaux_105', $animaux105);
            $manager->flush();

            $animaux106 = new Animaux();
            $animaux106->setHabitat($this->getReference("habitat_8"));
            $animaux106->setPrenom('Buffy');
            $animaux106->setRace('Bison');
            $animaux106->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Bisons/Buffy.webp');

            $manager->persist($animaux106);
            $this->addReference('animaux_106', $animaux106);
            $manager->flush();

            $animaux107 = new Animaux();
            $animaux107->setHabitat($this->getReference("habitat_8"));
            $animaux107->setPrenom('Rocky');
            $animaux107->setRace('Bison');
            $animaux107->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Bisons/Rocky.webp');

            $manager->persist($animaux107);
            $this->addReference('animaux_107', $animaux107);
            $manager->flush();

            $animaux108 = new Animaux();
            $animaux108->setHabitat($this->getReference("habitat_8"));
            $animaux108->setPrenom('Spirit');
            $animaux108->setRace('Mustang');
            $animaux108->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Mustangs/Spirit.webp');

            $manager->persist($animaux108);
            $this->addReference('animaux_108', $animaux108);
            $manager->flush();

            $animaux109 = new Animaux();
            $animaux109->setHabitat($this->getReference("habitat_8"));
            $animaux109->setPrenom('Blaze');
            $animaux109->setRace('Mustang');
            $animaux109->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Mustangs/Blaze.webp');

            $manager->persist($animaux109);
            $this->addReference('animaux_109', $animaux109);
            $manager->flush();

            $animaux110 = new Animaux();
            $animaux110->setHabitat($this->getReference("habitat_8"));
            $animaux110->setPrenom('Stormy');
            $animaux110->setRace('Mustang');
            $animaux110->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Mustangs/Stormy.webp');

            $manager->persist($animaux110);
            $this->addReference('animaux_110', $animaux110);
            $manager->flush();

            $animaux111 = new Animaux();
            $animaux111->setHabitat($this->getReference("habitat_8"));
            $animaux111->setPrenom('Lightning');
            $animaux111->setRace('Mustang');
            $animaux111->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Mustangs/Lightninh.webp');

            $manager->persist($animaux111);
            $this->addReference('animaux_111', $animaux111);
            $manager->flush();

            $animaux112 = new Animaux();
            $animaux112->setHabitat($this->getReference("habitat_8"));
            $animaux112->setPrenom('Bambi');
            $animaux112->setRace('Cerf de Virginie');
            $animaux112->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Cerfs+de+Virginie/Bambi.webp');

            $manager->persist($animaux112);
            $this->addReference('animaux_112', $animaux112);
            $manager->flush();

            $animaux113 = new Animaux();
            $animaux113->setHabitat($this->getReference("habitat_8"));
            $animaux113->setPrenom('Rodger');
            $animaux113->setRace('Cerf de Virginie');
            $animaux113->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Cerfs+de+Virginie/Rodger.webp');

            $manager->persist($animaux113);
            $this->addReference('animaux_113', $animaux113);
            $manager->flush();

            $animaux114 = new Animaux();
            $animaux114->setHabitat($this->getReference("habitat_8"));
            $animaux114->setPrenom('Buck');
            $animaux114->setRace('Cerf de Virginie');
            $animaux114->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Cerfs+de+Virginie/Buck.webp');

            $manager->persist($animaux114);
            $this->addReference('animaux_114', $animaux114);
            $manager->flush();

            $animaux115 = new Animaux();
            $animaux115->setHabitat($this->getReference("habitat_8"));
            $animaux115->setPrenom('Willow');
            $animaux115->setRace('Cerf de Virginie');
            $animaux115->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Cerfs+de+Virginie/Willow.webp');

            $manager->persist($animaux115);
            $this->addReference('animaux_115', $animaux115);
            $manager->flush();

            $animaux116 = new Animaux();
            $animaux116->setHabitat($this->getReference("habitat_8"));
            $animaux116->setPrenom('Fawn');
            $animaux116->setRace('Cerf de Virginie');
            $animaux116->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Cerfs+de+Virginie/Fawn.webp');

            $manager->persist($animaux116);
            $this->addReference('animaux_116', $animaux116);
            $manager->flush();

            $animaux117 = new Animaux();
            $animaux117->setHabitat($this->getReference("habitat_8"));
            $animaux117->setPrenom('Howler');
            $animaux117->setRace('Coyote');
            $animaux117->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Coyotes/Howler.webp');

            $manager->persist($animaux117);
            $this->addReference('animaux_117', $animaux117);
            $manager->flush();

            $animaux118 = new Animaux();
            $animaux118->setHabitat($this->getReference("habitat_8"));
            $animaux118->setPrenom('Rusty');
            $animaux118->setRace('Coyote');
            $animaux118->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Coyotes/Rusty.webp');

            $manager->persist($animaux118);
            $this->addReference('animaux_118', $animaux118);
            $manager->flush();

            $animaux119 = new Animaux();
            $animaux119->setHabitat($this->getReference("habitat_8"));
            $animaux119->setPrenom('Sly');
            $animaux119->setRace('Coyote');
            $animaux119->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Coyotes/Sly.webp');

            $manager->persist($animaux119);
            $this->addReference('animaux_119', $animaux119);
            $manager->flush();

            $animaux120 = new Animaux();
            $animaux120->setHabitat($this->getReference("habitat_8"));
            $animaux120->setPrenom('Nalu');
            $animaux120->setRace('Coyote');
            $animaux120->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Priaire+des+grands+plaines/Coyotes/Nalu.webp');

            $manager->persist($animaux120);
            $this->addReference('animaux_120', $animaux120);
            $manager->flush();

            $animaux121 = new Animaux();
            $animaux121->setHabitat($this->getReference("habitat_2"));
            $animaux121->setPrenom('Dumbo');
            $animaux121->setRace('Elephant');
            $animaux121->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Elephants/Dumbo.webp');

            $manager->persist($animaux121);
            $this->addReference('animaux_121', $animaux121);
            $manager->flush();

            $animaux122 = new Animaux();
            $animaux122->setHabitat($this->getReference("habitat_2"));
            $animaux122->setPrenom('Babar');
            $animaux122->setRace('Elephant');
            $animaux122->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Elephants/Babar.webp');

            $manager->persist($animaux122);
            $this->addReference('animaux_122', $animaux122);
            $manager->flush();

            $animaux123 = new Animaux();
            $animaux123->setHabitat($this->getReference("habitat_2"));
            $animaux123->setPrenom('Nala');
            $animaux123->setRace('Lionne');
            $animaux123->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Lions/Nala.webp');

            $manager->persist($animaux123);
            $this->addReference('animaux_123', $animaux123);
            $manager->flush();

            $animaux124 = new Animaux();
            $animaux124->setHabitat($this->getReference("habitat_2"));
            $animaux124->setPrenom('Simba');
            $animaux124->setRace('Lion');
            $animaux124->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Lions/Simba.webp');

            $manager->persist($animaux124);
            $this->addReference('animaux_124', $animaux124);
            $manager->flush();

            $animaux125 = new Animaux();
            $animaux125->setHabitat($this->getReference("habitat_2"));
            $animaux125->setPrenom('Kiara');
            $animaux125->setRace('Lionne');
            $animaux125->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Lions/Kiara.webp');

            $manager->persist($animaux125);
            $this->addReference('animaux_125', $animaux125);
            $manager->flush();

    }

    public function getDependencies()
    {
        return [
            HabitatFixtures::class,
        ];
    }

}
