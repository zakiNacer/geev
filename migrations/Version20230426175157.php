<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426175157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD action_participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92A4CCCDBA FOREIGN KEY (action_participation_id) REFERENCES action_participation (id)');
        $this->addSql('CREATE INDEX IDX_47CC8C92A4CCCDBA ON action (action_participation_id)');
        $this->addSql('ALTER TABLE action_participation ADD participation_id INT DEFAULT NULL, ADD action_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE action_participation ADD CONSTRAINT FK_90A7B0536ACE3B73 FOREIGN KEY (participation_id) REFERENCES participation (id)');
        $this->addSql('ALTER TABLE action_participation ADD CONSTRAINT FK_90A7B0539D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('CREATE INDEX IDX_90A7B0536ACE3B73 ON action_participation (participation_id)');
        $this->addSql('CREATE INDEX IDX_90A7B0539D32F035 ON action_participation (action_id)');
        $this->addSql('ALTER TABLE contact ADD full_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E6ACE3B73 FOREIGN KEY (participation_id) REFERENCES participation (id)');
        $this->addSql('CREATE INDEX IDX_B26681E6ACE3B73 ON evenement (participation_id)');
        $this->addSql('ALTER TABLE participation ADD user_id INT DEFAULT NULL, ADD evenement_id INT DEFAULT NULL, ADD action_participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA4CCCDBA FOREIGN KEY (action_participation_id) REFERENCES action_participation (id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FA76ED395 ON participation (user_id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FFD02F13 ON participation (evenement_id)');
        $this->addSql('CREATE INDEX IDX_AB55E24FA4CCCDBA ON participation (action_participation_id)');
        $this->addSql('ALTER TABLE produit ADD evenement_id INT DEFAULT NULL, ADD prod_distrub_p_id INT NOT NULL, ADD prod_category_p_id INT NOT NULL, ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B539BDA0 FOREIGN KEY (prod_distrub_p_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274719EF80 FOREIGN KEY (prod_category_p_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27FD02F13 ON produit (evenement_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC27B539BDA0 ON produit (prod_distrub_p_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC274719EF80 ON produit (prod_category_p_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27F347EFB ON produit (produit_id)');
        $this->addSql('ALTER TABLE users ADD role INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92A4CCCDBA');
        $this->addSql('DROP INDEX IDX_47CC8C92A4CCCDBA ON action');
        $this->addSql('ALTER TABLE action DROP action_participation_id');
        $this->addSql('ALTER TABLE action_participation DROP FOREIGN KEY FK_90A7B0536ACE3B73');
        $this->addSql('ALTER TABLE action_participation DROP FOREIGN KEY FK_90A7B0539D32F035');
        $this->addSql('DROP INDEX IDX_90A7B0536ACE3B73 ON action_participation');
        $this->addSql('DROP INDEX IDX_90A7B0539D32F035 ON action_participation');
        $this->addSql('ALTER TABLE action_participation DROP participation_id, DROP action_id');
        $this->addSql('ALTER TABLE contact DROP full_name');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E6ACE3B73');
        $this->addSql('DROP INDEX IDX_B26681E6ACE3B73 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP participation_id');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FFD02F13');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FA4CCCDBA');
        $this->addSql('DROP INDEX IDX_AB55E24FA76ED395 ON participation');
        $this->addSql('DROP INDEX IDX_AB55E24FFD02F13 ON participation');
        $this->addSql('DROP INDEX IDX_AB55E24FA4CCCDBA ON participation');
        $this->addSql('ALTER TABLE participation DROP user_id, DROP evenement_id, DROP action_participation_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FD02F13');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B539BDA0');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274719EF80');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27F347EFB');
        $this->addSql('DROP INDEX IDX_29A5EC27FD02F13 ON produit');
        $this->addSql('DROP INDEX UNIQ_29A5EC27B539BDA0 ON produit');
        $this->addSql('DROP INDEX UNIQ_29A5EC274719EF80 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27F347EFB ON produit');
        $this->addSql('ALTER TABLE produit DROP evenement_id, DROP prod_distrub_p_id, DROP prod_category_p_id, DROP produit_id');
        $this->addSql('ALTER TABLE users DROP role');
    }
}
