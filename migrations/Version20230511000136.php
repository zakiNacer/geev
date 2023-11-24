<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511000136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD produit_gestion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2723E5CACE FOREIGN KEY (produit_gestion_id) REFERENCES produit_gestion (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2723E5CACE ON produit (produit_gestion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2723E5CACE');
        $this->addSql('DROP INDEX IDX_29A5EC2723E5CACE ON produit');
        $this->addSql('ALTER TABLE produit DROP produit_gestion_id');
    }
}
