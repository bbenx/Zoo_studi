<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasherInterface
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $etablissement = $this->getReference(EtablissementFixtures::ETABLISSEMENT_REFERENCE);

        $user = new Users();
        $user->setEmail('admin@mail.com');
        $user->setEtablissement($etablissement);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user, 'Admin'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user = new Users();
        $user->setEmail('employe@mail.com');
        $user->setEtablissement($etablissement);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user, 'Admin'));
        $user->setRoles(['ROLE_VETERINAIRE']);
        $manager->persist($user);
        $manager->flush();

        $user = new Users();
        $user->setEmail('veterinaire@mail.com');
        $user->setEtablissement($etablissement);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user, 'Admin'));
        $user->setRoles(['ROLE_EMPLOYE']);
        $manager->persist($user);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EtablissementFixtures::class,
        ];
    }
}
