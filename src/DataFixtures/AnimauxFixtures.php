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
            $animaux->setHabitat($this->getReference("habitat_1"));
            $animaux->setPrenom('Bebou');
            $animaux->setRace('Girafe');
            $animaux->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Bebou.webp');

            $manager->persist($animaux);
            $this->addReference('animaux_1', $animaux);
            $manager->flush();

            $animaux2 = new Animaux();
            $animaux2->setHabitat($this->getReference("habitat_1"));
            $animaux2->setPrenom('Jasper');
            $animaux2->setRace('Girafe');
            $animaux2->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Jasper.webp');

            $manager->persist($animaux2);
            $this->addReference('animaux_2', $animaux2);
            $manager->flush();

            $animaux3 = new Animaux();
            $animaux3->setHabitat($this->getReference("habitat_1"));
            $animaux3->setPrenom('Savannah');
            $animaux3->setRace('Girafe');
            $animaux3->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Savannah.webp');

            $manager->persist($animaux3);
            $this->addReference('animaux_3', $animaux3);
            $manager->flush();

            $animaux4 = new Animaux();
            $animaux4->setHabitat($this->getReference("habitat_1"));
            $animaux4->setPrenom('Stripes');
            $animaux4->setRace('Zèbres');
            $animaux4->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Stripes.webp');

            $manager->persist($animaux4);
            $this->addReference('animaux_4', $animaux4);
            $manager->flush();

            $animaux5 = new Animaux();
            $animaux5->setHabitat($this->getReference("habitat_1"));
            $animaux5->setPrenom('Zara');
            $animaux5->setRace('Zèbres');
            $animaux5->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Zara.webp');

            $manager->persist($animaux5);
            $this->addReference('animaux_5', $animaux5);
            $manager->flush();

            $animaux6 = new Animaux();
            $animaux6->setHabitat($this->getReference("habitat_1"));
            $animaux6->setPrenom('Ziggy');
            $animaux6->setRace('Zèbres');
            $animaux6->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Zebres/Ziggy.webp');

            $manager->persist($animaux6);
            $this->addReference('animaux_6', $animaux6);
            $manager->flush();

            $animaux7 = new Animaux();
            $animaux7->setHabitat($this->getReference("habitat_1"));
            $animaux7->setPrenom('Tank');
            $animaux7->setRace('Rhinocéroce Blanc');
            $animaux7->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Tank.webp');

            $manager->persist($animaux7);
            $this->addReference('animaux_7', $animaux7);
            $manager->flush();

            $animaux8 = new Animaux();
            $animaux8->setHabitat($this->getReference("habitat_1"));
            $animaux8->setPrenom('Rhonda');
            $animaux8->setRace('Rhinocéroce Blanc');
            $animaux8->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Rhonda.webp');

            $manager->persist($animaux8);
            $this->addReference('animaux_8', $animaux8);
            $manager->flush();

            $animaux9 = new Animaux();
            $animaux9->setHabitat($this->getReference("habitat_1"));
            $animaux9->setPrenom('Buster');
            $animaux9->setRace('Rhinocéroce Blanc');
            $animaux9->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Buster.webp');

            $manager->persist($animaux9);
            $this->addReference('animaux_9', $animaux9);
            $manager->flush();

            $animaux10 = new Animaux();
            $animaux10->setHabitat($this->getReference("habitat_1"));
            $animaux10->setPrenom('Nova');
            $animaux10->setRace('Rhinocéroce Blanc');
            $animaux10->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Rhinoce%CC%81roce+Blanc/Nova.webp');

            $manager->persist($animaux10);
            $this->addReference('animaux_10', $animaux10);
            $manager->flush();

            $animaux11 = new Animaux();
            $animaux11->setHabitat($this->getReference("habitat_1"));
            $animaux11->setPrenom('Dash');
            $animaux11->setRace('Antilope');
            $animaux11->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Dash.webp');

            $manager->persist($animaux11);
            $this->addReference('animaux_11', $animaux11);
            $manager->flush();

            $animaux12 = new Animaux();
            $animaux12->setHabitat($this->getReference("habitat_1"));
            $animaux12->setPrenom('Meadow');
            $animaux12->setRace('Antilope');
            $animaux12->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Meadow.webp');

            $manager->persist($animaux12);
            $this->addReference('animaux_12', $animaux12);
            $manager->flush();

            $animaux13 = new Animaux();
            $animaux13->setHabitat($this->getReference("habitat_1"));
            $animaux13->setPrenom('Nala');
            $animaux13->setRace('Antilope');
            $animaux13->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Nala.webp');

            $manager->persist($animaux13);
            $this->addReference('animaux_13', $animaux13);
            $manager->flush();

            $animaux14 = new Animaux();
            $animaux14->setHabitat($this->getReference("habitat_1"));
            $animaux14->setPrenom('Leo');
            $animaux14->setRace('Antilope');
            $animaux14->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Antilopes/Leo.webp');

            $manager->persist($animaux14);
            $this->addReference('animaux_14', $animaux14);
            $manager->flush();

            $animaux15 = new Animaux();
            $animaux15->setHabitat($this->getReference("habitat_1"));
            $animaux15->setPrenom('Speedy');
            $animaux15->setRace('Autruche');
            $animaux15->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Speedy.webp');

            $manager->persist($animaux15);
            $this->addReference('animaux_15', $animaux15);
            $manager->flush();

            $animaux16 = new Animaux();
            $animaux16->setHabitat($this->getReference("habitat_1"));
            $animaux16->setPrenom('Olive');
            $animaux16->setRace('Autruche');
            $animaux16->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Olive.webp');

            $manager->persist($animaux16);
            $this->addReference('animaux_16', $animaux16);
            $manager->flush();

            $animaux17 = new Animaux();
            $animaux17->setHabitat($this->getReference("habitat_1"));
            $animaux17->setPrenom('Stretch');
            $animaux17->setRace('Autruche');
            $animaux17->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Stretch.webp');

            $manager->persist($animaux17);
            $this->addReference('animaux_17', $animaux17);
            $manager->flush();

            $animaux18 = new Animaux();
            $animaux18->setHabitat($this->getReference("habitat_1"));
            $animaux18->setPrenom('Ella');
            $animaux18->setRace('Autruche');
            $animaux18->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Autruches/Ella.webp');

            $manager->persist($animaux18);
            $this->addReference('animaux_18', $animaux18);
            $manager->flush();

            $animaux19 = new Animaux();
            $animaux19->setHabitat($this->getReference("habitat_2"));
            $animaux19->setPrenom('Kong');
            $animaux19->setRace('Gorille');
            $animaux19->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Kong.webp');

            $manager->persist($animaux19);
            $this->addReference('animaux_19', $animaux19);
            $manager->flush();

            $animaux20 = new Animaux();
            $animaux20->setHabitat($this->getReference("habitat_2"));
            $animaux20->setPrenom('Tara');
            $animaux20->setRace('Gorille');
            $animaux20->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Tara.webp');

            $manager->persist($animaux20);
            $this->addReference('animaux_20', $animaux20);
            $manager->flush();

            $animaux21 = new Animaux();
            $animaux21->setHabitat($this->getReference("habitat_2"));
            $animaux21->setPrenom('Harambe');
            $animaux21->setRace('Gorille');
            $animaux21->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/Harambe.webp');

            $manager->persist($animaux21);
            $this->addReference('animaux_21', $animaux21);
            $manager->flush();

            $animaux22 = new Animaux();
            $animaux22->setHabitat($this->getReference("habitat_2"));
            $animaux22->setPrenom('Kibi');
            $animaux22->setRace('Gorille');
            $animaux22->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Gorilles/kibi.webp');

            $manager->persist($animaux22);
            $this->addReference('animaux_22', $animaux22);
            $manager->flush();

            $animaux23 = new Animaux();
            $animaux23->setHabitat($this->getReference("habitat_2"));
            $animaux23->setPrenom('Rio');
            $animaux23->setRace('Perroquet');
            $animaux23->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Rio.webp');

            $manager->persist($animaux23);
            $this->addReference('animaux_23', $animaux23);
            $manager->flush();

            $animaux24 = new Animaux();
            $animaux24->setHabitat($this->getReference("habitat_2"));
            $animaux24->setPrenom('Polly');
            $animaux24->setRace('Perroquet');
            $animaux24->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Poly.webp');

            $manager->persist($animaux24);
            $this->addReference('animaux_24', $animaux24);
            $manager->flush();

            $animaux25 = new Animaux();
            $animaux25->setHabitat($this->getReference("habitat_2"));
            $animaux25->setPrenom('Skittles');
            $animaux25->setRace('Perroquet');
            $animaux25->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Skittles.webp');

            $manager->persist($animaux25);
            $this->addReference('animaux_25', $animaux25);
            $manager->flush();

            $animaux26 = new Animaux();
            $animaux26->setHabitat($this->getReference("habitat_2"));
            $animaux26->setPrenom('Mango');
            $animaux26->setRace('Perroquet');
            $animaux26->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Mango.webp');

            $manager->persist($animaux26);
            $this->addReference('animaux_26', $animaux26);
            $manager->flush();

            $animaux27 = new Animaux();
            $animaux27->setHabitat($this->getReference("habitat_2"));
            $animaux27->setPrenom('Kiwi');
            $animaux27->setRace('Perroquet');
            $animaux27->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Perroquets/Kiwi.webp');

            $manager->persist($animaux27);
            $this->addReference('animaux_27', $animaux27);
            $manager->flush();

            $animaux28 = new Animaux();
            $animaux28->setHabitat($this->getReference("habitat_2"));
            $animaux28->setPrenom('Howly');
            $animaux28->setRace('Singe urleur');
            $animaux28->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Howly.webp');

            $manager->persist($animaux28);
            $this->addReference('animaux_28', $animaux28);
            $manager->flush();

            $animaux29 = new Animaux();
            $animaux29->setHabitat($this->getReference("habitat_2"));
            $animaux29->setPrenom('Delta');
            $animaux29->setRace('Singe urleur');
            $animaux29->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Delta.webp');

            $manager->persist($animaux29);
            $this->addReference('animaux_29', $animaux29);
            $manager->flush();

            $animaux30 = new Animaux();
            $animaux30->setHabitat($this->getReference("habitat_2"));
            $animaux30->setPrenom('Banjo');
            $animaux30->setRace('Singe urleur');
            $animaux30->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Banjo.webp');

            $manager->persist($animaux30);
            $this->addReference('animaux_30', $animaux30);
            $manager->flush();

            $animaux31 = new Animaux();
            $animaux31->setHabitat($this->getReference("habitat_2"));
            $animaux31->setPrenom('Lara');
            $animaux31->setRace('Singe urleur');
            $animaux31->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Singes+Urleurs/Lara.webp');

            $manager->persist($animaux31);
            $this->addReference('animaux_31', $animaux31);
            $manager->flush();

            $animaux32 = new Animaux();
            $animaux32->setHabitat($this->getReference("habitat_2"));
            $animaux32->setPrenom('Touki');
            $animaux32->setRace('Toucan');
            $animaux32->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Touki.webp');

            $manager->persist($animaux32);
            $this->addReference('animaux_32', $animaux32);
            $manager->flush();

            $animaux33 = new Animaux();
            $animaux33->setHabitat($this->getReference("habitat_2"));
            $animaux33->setPrenom('Pico');
            $animaux33->setRace('Toucan');
            $animaux33->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Pico.webp');

            $manager->persist($animaux33);
            $this->addReference('animaux_33', $animaux33);
            $manager->flush();

            $animaux34 = new Animaux();
            $animaux34->setHabitat($this->getReference("habitat_2"));
            $animaux34->setPrenom('Rainbow');
            $animaux34->setRace('Toucan');
            $animaux34->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Rainbow.webp');

            $manager->persist($animaux34);
            $this->addReference('animaux_34', $animaux34);
            $manager->flush();

            $animaux35 = new Animaux();
            $animaux35->setHabitat($this->getReference("habitat_2"));
            $animaux35->setPrenom('tiki');
            $animaux35->setRace('Toucan');
            $animaux35->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Tiki.webp');

            $manager->persist($animaux35);
            $this->addReference('animaux_35', $animaux35);
            $manager->flush();

            $animaux36 = new Animaux();
            $animaux36->setHabitat($this->getReference("habitat_2"));
            $animaux36->setPrenom('Jazz');
            $animaux36->setRace('Toucan');
            $animaux36->setImage('https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Foret+tropicale/Toucans/Jazz.webp');

            $manager->persist($animaux36);
            $this->addReference('animaux_36', $animaux36);
            $manager->flush();

            $animaux37 = new Animaux();
            $animaux37->setHabitat($this->getReference("habitat_3"));
            $animaux37->setPrenom('Capri');
            $animaux37->setRace('Capybaras');
            $animaux37->setImage('url');

            $manager->persist($animaux37);
            $this->addReference('animaux_37', $animaux37);
            $manager->flush();

            $animaux38 = new Animaux();
            $animaux38->setHabitat($this->getReference("habitat_3"));
            $animaux38->setPrenom('Buddy');
            $animaux38->setRace('Capybaras');
            $animaux38->setImage('url');

            $manager->persist($animaux38);
            $this->addReference('animaux_38', $animaux38);
            $manager->flush();

            $animaux39 = new Animaux();
            $animaux39->setHabitat($this->getReference("habitat_3"));
            $animaux39->setPrenom('Pip');
            $animaux39->setRace('Capybaras');
            $animaux39->setImage('url');

            $manager->persist($animaux39);
            $this->addReference('animaux_39', $animaux39);
            $manager->flush();

            $animaux40 = new Animaux();
            $animaux40->setHabitat($this->getReference("habitat_3"));
            $animaux40->setPrenom('Pelo');
            $animaux40->setRace('Aras');
            $animaux40->setImage('url');

            $manager->persist($animaux40);
            $this->addReference('animaux_40', $animaux40);
            $manager->flush();

            $animaux41 = new Animaux();
            $animaux41->setHabitat($this->getReference("habitat_3"));
            $animaux41->setPrenom('Sky');
            $animaux41->setRace('Aras');
            $animaux41->setImage('url');

            $manager->persist($animaux41);
            $this->addReference('animaux_41', $animaux41);
            $manager->flush();

            $animaux42 = new Animaux();
            $animaux42->setHabitat($this->getReference("habitat_3"));
            $animaux42->setPrenom('Ruby');
            $animaux42->setRace('Aras');
            $animaux42->setImage('url');

            $manager->persist($animaux42);
            $this->addReference('animaux_42', $animaux42);
            $manager->flush();

            $animaux43 = new Animaux();
            $animaux43->setHabitat($this->getReference("habitat_3"));
            $animaux43->setPrenom('Coco');
            $animaux43->setRace('Aras');
            $animaux43->setImage('url');

            $manager->persist($animaux43);
            $this->addReference('animaux_43', $animaux43);
            $manager->flush();

            $animaux44 = new Animaux();
            $animaux44->setHabitat($this->getReference("habitat_3"));
            $animaux44->setPrenom('Spike');
            $animaux44->setRace('Caîman');
            $animaux44->setImage('url');

            $manager->persist($animaux44);
            $this->addReference('animaux_44', $animaux44);
            $manager->flush();

            $animaux45 = new Animaux();
            $animaux45->setHabitat($this->getReference("habitat_3"));
            $animaux45->setPrenom('Gator');
            $animaux45->setRace('Caîman');
            $animaux45->setImage('url');

            $manager->persist($animaux45);
            $this->addReference('animaux_45', $animaux45);
            $manager->flush();

            $animaux46 = new Animaux();
            $animaux46->setHabitat($this->getReference("habitat_3"));
            $animaux46->setPrenom('Rex');
            $animaux46->setRace('Caîman');
            $animaux46->setImage('url');

            $manager->persist($animaux46);
            $this->addReference('animaux_46', $animaux46);
            $manager->flush();

            $animaux47 = new Animaux();
            $animaux47->setHabitat($this->getReference("habitat_3"));
            $animaux47->setPrenom('Nile');
            $animaux47->setRace('Caîman');
            $animaux47->setImage('url');

            $manager->persist($animaux47);
            $this->addReference('animaux_47', $animaux47);
            $manager->flush();

            $animaux48 = new Animaux();
            $animaux48->setHabitat($this->getReference("habitat_3"));
            $animaux48->setPrenom('Snappy');
            $animaux48->setRace('Caîman');
            $animaux48->setImage('url');

            $manager->persist($animaux48);
            $this->addReference('animaux_48', $animaux48);
            $manager->flush();

            $animaux49 = new Animaux();
            $animaux49->setHabitat($this->getReference("habitat_4"));
            $animaux49->setPrenom('Fenny');
            $animaux49->setRace('Fennec');
            $animaux49->setImage('url');

            $manager->persist($animaux49);
            $this->addReference('animaux_49', $animaux49);
            $manager->flush();

            $animaux50 = new Animaux();
            $animaux50->setHabitat($this->getReference("habitat_4"));
            $animaux50->setPrenom('Sandy');
            $animaux50->setRace('Fennec');
            $animaux50->setImage('url');

            $manager->persist($animaux50);
            $this->addReference('animaux_50', $animaux50);
            $manager->flush();

            $animaux51 = new Animaux();
            $animaux51->setHabitat($this->getReference("habitat_4"));
            $animaux51->setPrenom('Dusty');
            $animaux51->setRace('Fennec');
            $animaux51->setImage('url');

            $manager->persist($animaux51);
            $this->addReference('animaux_51', $animaux51);
            $manager->flush();

            $animaux52 = new Animaux();
            $animaux52->setHabitat($this->getReference("habitat_4"));
            $animaux52->setPrenom('Flash');
            $animaux52->setRace('Fennec');
            $animaux52->setImage('url');

            $manager->persist($animaux52);
            $this->addReference('animaux_52', $animaux52);
            $manager->flush();

            $animaux53 = new Animaux();
            $animaux53->setHabitat($this->getReference("habitat_4"));
            $animaux53->setPrenom('Camelot');
            $animaux53->setRace('Dromadaire');
            $animaux53->setImage('url');

            $manager->persist($animaux53);
            $this->addReference('animaux_53', $animaux53);
            $manager->flush();

            $animaux54 = new Animaux();
            $animaux54->setHabitat($this->getReference("habitat_4"));
            $animaux54->setPrenom('Daisy');
            $animaux54->setRace('Dromadaire');
            $animaux54->setImage('url');

            $manager->persist($animaux54);
            $this->addReference('animaux_54', $animaux54);
            $manager->flush();

            $animaux55 = new Animaux();
            $animaux55->setHabitat($this->getReference("habitat_4"));
            $animaux55->setPrenom('Humpfrey');
            $animaux55->setRace('Dromadaire');
            $animaux55->setImage('url');

            $manager->persist($animaux55);
            $this->addReference('animaux_55', $animaux55);
            $manager->flush();

            $animaux56 = new Animaux();
            $animaux56->setHabitat($this->getReference("habitat_4"));
            $animaux56->setPrenom('Belle');
            $animaux56->setRace('Gazelle');
            $animaux56->setImage('url');

            $manager->persist($animaux56);
            $this->addReference('animaux_56', $animaux56);
            $manager->flush();
            
            $animaux57 = new Animaux();
            $animaux57->setHabitat($this->getReference("habitat_4"));
            $animaux57->setPrenom('Swift');
            $animaux57->setRace('Gazelle');
            $animaux57->setImage('url');

            $manager->persist($animaux57);
            $this->addReference('animaux_57', $animaux57);
            $manager->flush();
            
            $animaux58 = new Animaux();
            $animaux58->setHabitat($this->getReference("habitat_4"));
            $animaux58->setPrenom('Star');
            $animaux58->setRace('Gazelle');
            $animaux58->setImage('url');

            $manager->persist($animaux58);
            $this->addReference('animaux_58', $animaux58);
            $manager->flush();
            
            $animaux59 = new Animaux();
            $animaux59->setHabitat($this->getReference("habitat_4"));
            $animaux59->setPrenom('Blazer');
            $animaux59->setRace('Gazelle');
            $animaux59->setImage('url');

            $manager->persist($animaux59);
            $this->addReference('animaux_59', $animaux59);
            $manager->flush();
            
            $animaux60 = new Animaux();
            $animaux60->setHabitat($this->getReference("habitat_4"));
            $animaux60->setPrenom('Luna');
            $animaux60->setRace('Gazelle');
            $animaux60->setImage('url');

            $manager->persist($animaux60);
            $this->addReference('animaux_60', $animaux60);
            $manager->flush();

            $animaux61 = new Animaux();
            $animaux61->setHabitat($this->getReference("habitat_5"));
            $animaux61->setPrenom('Rock');
            $animaux61->setRace('Mouflon');
            $animaux61->setImage('url');

            $manager->persist($animaux61);
            $this->addReference('animaux_61', $animaux61);
            $manager->flush();

            $animaux62 = new Animaux();
            $animaux62->setHabitat($this->getReference("habitat_5"));
            $animaux62->setPrenom('Cliff');
            $animaux62->setRace('Mouflon');
            $animaux62->setImage('url');

            $manager->persist($animaux62);
            $this->addReference('animaux_62', $animaux62);
            $manager->flush();

            $animaux63 = new Animaux();
            $animaux63->setHabitat($this->getReference("habitat_5"));
            $animaux63->setPrenom('Boulder');
            $animaux63->setRace('Mouflon');
            $animaux63->setImage('url');

            $manager->persist($animaux63);
            $this->addReference('animaux_63', $animaux63);
            $manager->flush();

            $animaux64 = new Animaux();
            $animaux64->setHabitat($this->getReference("habitat_5"));
            $animaux64->setPrenom('Alpine');
            $animaux64->setRace('Chèvre des montagnes rocheuses');
            $animaux64->setImage('url');

            $manager->persist($animaux64);
            $this->addReference('animaux_64', $animaux64);
            $manager->flush();

            $animaux65 = new Animaux();
            $animaux65->setHabitat($this->getReference("habitat_5"));
            $animaux65->setPrenom('Blanca');
            $animaux65->setRace('Chèvre des montagnes rocheuses');
            $animaux65->setImage('url');

            $manager->persist($animaux65);
            $this->addReference('animaux_65', $animaux65);
            $manager->flush();

            $animaux66 = new Animaux();
            $animaux66->setHabitat($this->getReference("habitat_5"));
            $animaux66->setPrenom('Summit');
            $animaux66->setRace('Chèvre des montagnes rocheuses');
            $animaux66->setImage('url');

            $manager->persist($animaux66);
            $this->addReference('animaux_66', $animaux66);
            $manager->flush();

            $animaux67 = new Animaux();
            $animaux67->setHabitat($this->getReference("habitat_5"));
            $animaux67->setPrenom('Nimble');
            $animaux67->setRace('Chèvre des montagnes rocheuses');
            $animaux67->setImage('url');

            $manager->persist($animaux67);
            $this->addReference('animaux_67', $animaux67);
            $manager->flush();

            $animaux68 = new Animaux();
            $animaux68->setHabitat($this->getReference("habitat_5"));
            $animaux68->setPrenom('Foxy');
            $animaux68->setRace('Renard');
            $animaux68->setImage('url');

            $manager->persist($animaux68);
            $this->addReference('animaux_68', $animaux68);
            $manager->flush();

            $animaux69 = new Animaux();
            $animaux69->setHabitat($this->getReference("habitat_5"));
            $animaux69->setPrenom('Rousty');
            $animaux69->setRace('Renard');
            $animaux69->setImage('url');

            $manager->persist($animaux69);
            $this->addReference('animaux_69', $animaux69);
            $manager->flush();

            $animaux70 = new Animaux();
            $animaux70->setHabitat($this->getReference("habitat_5"));
            $animaux70->setPrenom('Ember');
            $animaux70->setRace('Renard');
            $animaux70->setImage('url');

            $manager->persist($animaux70);
            $this->addReference('animaux_70', $animaux70);
            $manager->flush();

            $animaux71 = new Animaux();
            $animaux71->setHabitat($this->getReference("habitat_5"));
            $animaux71->setPrenom('Vixen');
            $animaux71->setRace('Renard');
            $animaux71->setImage('url');

            $manager->persist($animaux71);
            $this->addReference('animaux_71', $animaux71);
            $manager->flush();

            $animaux72 = new Animaux();
            $animaux72->setHabitat($this->getReference("habitat_5"));
            $animaux72->setPrenom('Slyce');
            $animaux72->setRace('Renard');
            $animaux72->setImage('url');

            $manager->persist($animaux72);
            $this->addReference('animaux_72', $animaux72);
            $manager->flush();

            






    }

    public function getDependencies()
    {
        return [
            HabitatFixtures::class,
        ];
    }

}
