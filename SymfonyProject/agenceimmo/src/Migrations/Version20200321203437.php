<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321203437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, famille_id INT NOT NULL, lieu_id INT NOT NULL, is_exclusif TINYINT(1) NOT NULL, titre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, piece INT NOT NULL, surface INT NOT NULL, prix INT NOT NULL, description VARCHAR(255) DEFAULT NULL, is_visible TINYINT(1) DEFAULT \'1\' NOT NULL, reference VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_45EDC386C54C8C93 (type_id), INDEX IDX_45EDC38697A77B84 (famille_id), INDEX IDX_45EDC3866AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_type (famille_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_7D8B23E397A77B84 (famille_id), INDEX IDX_7D8B23E3C54C8C93 (type_id), PRIMARY KEY(famille_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38697A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC3866AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE famille_type ADD CONSTRAINT FK_7D8B23E397A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE famille_type ADD CONSTRAINT FK_7D8B23E3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC38697A77B84');
        $this->addSql('ALTER TABLE famille_type DROP FOREIGN KEY FK_7D8B23E397A77B84');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3866AB213CC');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386C54C8C93');
        $this->addSql('ALTER TABLE famille_type DROP FOREIGN KEY FK_7D8B23E3C54C8C93');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE famille_type');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE type');
    }
}
