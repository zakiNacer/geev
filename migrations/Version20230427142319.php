<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427142319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274719EF80');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FD02F13');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B539BDA0');
        $this->addSql('DROP INDEX IDX_29A5EC27F347EFB ON produit');
        $this->addSql('DROP INDEX UNIQ_29A5EC27B539BDA0 ON produit');
        $this->addSql('DROP INDEX UNIQ_29A5EC274719EF80 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27FD02F13 ON produit');
        $this->addSql('ALTER TABLE produit DROP evenement_id, DROP prod_distrub_p_id, DROP prod_category_p_id, DROP produit_id, DROP categorie_id, DROP quantity, DROP id_evenement');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD evenement_id INT DEFAULT NULL, ADD prod_distrub_p_id INT NOT NULL, ADD prod_category_p_id INT NOT NULL, ADD produit_id INT NOT NULL, ADD categorie_id INT NOT NULL, ADD quantity INT NOT NULL, ADD id_evenement INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274719EF80 FOREIGN KEY (prod_category_p_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B539BDA0 FOREIGN KEY (prod_distrub_p_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27F347EFB ON produit (produit_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC27B539BDA0 ON produit (prod_distrub_p_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC274719EF80 ON produit (prod_category_p_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27FD02F13 ON produit (evenement_id)');
    }
}
