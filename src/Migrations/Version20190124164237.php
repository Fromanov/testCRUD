<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190124164237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Author');
        $this->addSql('ALTER TABLE Book MODIFY ID INT NOT NULL');
        $this->addSql('DROP INDEX ID ON Book');
        $this->addSql('ALTER TABLE Book DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE Book CHANGE NAME name VARCHAR(255) NOT NULL, CHANGE DESCRIPTION description VARCHAR(255) DEFAULT NULL, CHANGE FRONTPIC frontpic INT DEFAULT NULL, CHANGE id_author idauthor INT NOT NULL');
        $this->addSql('ALTER TABLE Book ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Author (ID INT AUTO_INCREMENT NOT NULL, NAME TEXT NOT NULL COLLATE latin1_swedish_ci, SURNAME TEXT NOT NULL COLLATE latin1_swedish_ci, SECNAME TEXT NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE book DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE book CHANGE name NAME TEXT NOT NULL COLLATE latin1_swedish_ci, CHANGE description DESCRIPTION TEXT NOT NULL COLLATE latin1_swedish_ci, CHANGE frontpic FRONTPIC INT NOT NULL, CHANGE idauthor ID_AUTHOR INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX ID ON book (ID)');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (YEAR)');
    }
}
