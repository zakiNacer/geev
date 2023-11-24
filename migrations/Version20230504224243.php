<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504224243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
        
       
       
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2729D16715');
        $this->addSql('ALTER TABLE produit_demande DROP FOREIGN KEY FK_E06F5CDC6ACE3B73');
        $this->addSql('DROP TABLE produit_demande');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC276ACE3B73');
        $this->addSql('DROP INDEX IDX_29A5EC276ACE3B73 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC2729D16715 ON produit');
    }
}
