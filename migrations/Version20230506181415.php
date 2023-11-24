<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230506181415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_AB55E24FFD02F13 (evenement_id), INDEX IDX_AB55E24FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_gestion (id INT AUTO_INCREMENT NOT NULL, participation_id INT NOT NULL, produit_id INT NOT NULL, etat_produit INT NOT NULL, INDEX IDX_18F9DEC96ACE3B73 (participation_id), UNIQUE INDEX UNIQ_18F9DEC9F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_gestion ADD CONSTRAINT FK_18F9DEC96ACE3B73 FOREIGN KEY (participation_id) REFERENCES participation (id)');
        $this->addSql('ALTER TABLE produit_gestion ADD CONSTRAINT FK_18F9DEC9F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FFD02F13');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA76ED395');
        $this->addSql('ALTER TABLE produit_gestion DROP FOREIGN KEY FK_18F9DEC96ACE3B73');
        $this->addSql('ALTER TABLE produit_gestion DROP FOREIGN KEY FK_18F9DEC9F347EFB');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE produit_gestion');
    }
}
