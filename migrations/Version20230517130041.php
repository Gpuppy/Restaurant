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
        $this->addSql('ALTER TABLE meals ADD meals_id INT NOT NULL, ADD image VARCHAR(255) DEFAULT NULL, ADD file INT NOT NULL');
        $this->addSql('ALTER TABLE meals ADD CONSTRAINT FK_E229E6EA88A25CA2 FOREIGN KEY (meals_id) REFERENCES meals (id)');
        $this->addSql('CREATE INDEX IDX_E229E6EA88A25CA2 ON meals (meals_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meals DROP FOREIGN KEY FK_E229E6EA88A25CA2');
        $this->addSql('DROP INDEX IDX_E229E6EA88A25CA2 ON meals');
        $this->addSql('ALTER TABLE meals DROP meals_id, DROP image, DROP file');
    }
}
