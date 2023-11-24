<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511054638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_exemplary (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, produit_gestion_id INT NOT NULL, INDEX IDX_93DCA0C5F347EFB (produit_id), UNIQUE INDEX UNIQ_93DCA0C523E5CACE (produit_gestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_exemplary ADD CONSTRAINT FK_93DCA0C5F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_exemplary ADD CONSTRAINT FK_93DCA0C523E5CACE FOREIGN KEY (produit_gestion_id) REFERENCES produit_gestion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_exemplary DROP FOREIGN KEY FK_93DCA0C5F347EFB');
        $this->addSql('ALTER TABLE produit_exemplary DROP FOREIGN KEY FK_93DCA0C523E5CACE');
        $this->addSql('DROP TABLE produit_exemplary');
    }
}
