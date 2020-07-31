<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200730134356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chausson ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chausson ADD CONSTRAINT FK_16D72BBF4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_16D72BBF4827B9B2 ON chausson (marque_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chausson DROP FOREIGN KEY FK_16D72BBF4827B9B2');
        $this->addSql('DROP INDEX IDX_16D72BBF4827B9B2 ON chausson');
        $this->addSql('ALTER TABLE chausson DROP marque_id');
    }
}
