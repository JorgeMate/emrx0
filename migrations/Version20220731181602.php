<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220731181602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE insurance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(127) NOT NULL, code VARCHAR(10) DEFAULT NULL, contact VARCHAR(127) DEFAULT NULL, tel VARCHAR(31) DEFAULT NULL, email VARCHAR(127) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, slug VARCHAR(127) NOT NULL, enabled TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_640EAF4C989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD insurance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBD1E63CD1 FOREIGN KEY (insurance_id) REFERENCES insurance (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBD1E63CD1 ON patient (insurance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBD1E63CD1');
        $this->addSql('DROP TABLE insurance');
        $this->addSql('DROP INDEX IDX_1ADAD7EBD1E63CD1 ON patient');
        $this->addSql('ALTER TABLE patient DROP insurance_id');
    }
}
