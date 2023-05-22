<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522161628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meals ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP images, DROP image_file, DROP name, CHANGE meals meals VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meals ADD images VARCHAR(255) DEFAULT NULL, ADD image_file VARCHAR(255) DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, DROP updated_at, CHANGE meals meals VARCHAR(255) NOT NULL');
    }
}
