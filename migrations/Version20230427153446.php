<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427153446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_collecte (id INT AUTO_INCREMENT NOT NULL, id_evenement INT NOT NULL, id_user INT NOT NULL, id_produit INT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produitdemande (id INT AUTO_INCREMENT NOT NULL, id_evenement INT NOT NULL, id_produit INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E6ACE3B73');
        $this->addSql('DROP INDEX IDX_B26681E6ACE3B73 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP participation_id');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA4CCCDBA');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA76ED395');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FFD02F13');
        $this->addSql('DROP INDEX IDX_AB55E24FA4CCCDBA ON participation');
        $this->addSql('DROP INDEX IDX_AB55E24FA76ED395 ON participation');
        $this->addSql('DROP INDEX IDX_AB55E24FFD02F13 ON participation');
        $this->addSql('ALTER TABLE participation DROP user_id, DROP evenement_id, DROP action_participation_id');
        $this->addSql('ALTER TABLE users ADD civilite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produit_collecte');
        $this->addSql('DROP TABLE produitdemande');
        $this->addSql('ALTER TABLE evenement ADD participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E6ACE3B73 FOREIGN KEY (participation_id) REFERENCES participation (id)');
        $this->addSql('CREATE INDEX IDX_B26681E6ACE3B73 ON evenement (participation_id)');
        $this->addSql('ALTER TABLE participation ADD user_id INT DEFAULT NULL, ADD evenement_id INT DEFAULT NULL, ADD action_participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA4CCCDBA FOREIGN KEY (action_participation_id) REFERENCES action_participation (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FA4CCCDBA ON participation (action_participation_id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FA76ED395 ON participation (user_id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FFD02F13 ON participation (evenement_id)');
        $this->addSql('ALTER TABLE users DROP civilite');
    }
}
