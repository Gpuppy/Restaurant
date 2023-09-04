<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517130041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meal ADD meal_id INT NOT NULL, ADD image VARCHAR(255) DEFAULT NULL, ADD file INT NOT NULL');
        $this->addSql('ALTER TABLE meal ADD CONSTRAINT FK_E229E6EA88A25CA2 FOREIGN KEY (meal_id) REFERENCES meal (id)');
        $this->addSql('CREATE INDEX IDX_E229E6EA88A25CA2 ON meal (meal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meal DROP FOREIGN KEY FK_E229E6EA88A25CA2');
        $this->addSql('DROP INDEX IDX_E229E6EA88A25CA2 ON meal');
        $this->addSql('ALTER TABLE meal DROP meal_id, DROP image, DROP file');
    }
}
