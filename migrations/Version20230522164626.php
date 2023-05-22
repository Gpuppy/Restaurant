<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522164626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meals ADD price INT NOT NULL, ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP images, DROP image_file, CHANGE meals meals VARCHAR(255) DEFAULT NULL, CHANGE name created_at VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meals ADD images VARCHAR(255) DEFAULT NULL, ADD image_file VARCHAR(255) DEFAULT NULL, DROP price, DROP updated_at, CHANGE meals meals VARCHAR(255) NOT NULL, CHANGE created_at name VARCHAR(255) NOT NULL');
    }
}
