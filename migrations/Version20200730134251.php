<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200730134251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chaussure ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chaussure ADD CONSTRAINT FK_43D478974827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_43D478974827B9B2 ON chaussure (marque_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chaussure DROP FOREIGN KEY FK_43D478974827B9B2');
        $this->addSql('DROP INDEX IDX_43D478974827B9B2 ON chaussure');
        $this->addSql('ALTER TABLE chaussure DROP marque_id');
    }
}
