<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510234349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP produit_gestion_id');
        $this->addSql('ALTER TABLE produit_gestion DROP FOREIGN KEY FK_18F9DEC9F347EFB');
        $this->addSql('DROP INDEX UNIQ_18F9DEC9F347EFB ON produit_gestion');
        $this->addSql('ALTER TABLE produit_gestion DROP produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD produit_gestion_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit_gestion ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit_gestion ADD CONSTRAINT FK_18F9DEC9F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18F9DEC9F347EFB ON produit_gestion (produit_id)');
    }
}
