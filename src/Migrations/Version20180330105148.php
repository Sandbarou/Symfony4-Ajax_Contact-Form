<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180330105148 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD cp_autocomplete_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045598F0A0D9 FOREIGN KEY (cp_autocomplete_id) REFERENCES cp_autocomplete (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C744045598F0A0D9 ON client (cp_autocomplete_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045598F0A0D9');
        $this->addSql('DROP INDEX UNIQ_C744045598F0A0D9 ON client');
        $this->addSql('ALTER TABLE client DROP cp_autocomplete_id');
    }
}
