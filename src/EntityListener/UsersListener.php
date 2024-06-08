<?php

namespace App\EntityListener;

use App\Entity\Users;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersListener
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function prePersist(Users $users)
    {
        $this->encodePassword($users);
    }

    public function preUpdate(Users $users)
    {
        $this->encodePassword($users);
    }

    private function encodePassword(Users $users)
    {
        if ($users->getPlainPassword() === null) {
            return;
        }
        $users->setPassword(
            $this->hasher->hashPassword(
                $users,
                $users->getPlainPassword()
            )
        );

        $users->setPlainPassword(null);
    }
}
