<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240524072739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Supprime la table nourriture';
    }

    public function up(Schema $schema): void
    {
        // Supprimer la table nourriture
        $this->addSql('DROP TABLE IF EXISTS nourriture');
    }
}
