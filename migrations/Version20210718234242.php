<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210718234242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(25) NOT NULL, last_name VARCHAR(25) NOT NULL, street_address VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_phone (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, type VARCHAR(10) NOT NULL, number VARCHAR(10) NOT NULL, INDEX IDX_8A7AE2E69395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_phone ADD CONSTRAINT FK_8A7AE2E69395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');

        // insert customer data
        $this->addSql('insert into customer (first_name, last_name) values ("Billy", "Bob");');
        $this->addSql('insert into customer (first_name, last_name, street_address) values ("Trevor", "Smart", "820 Sixth Avenue");');
        $this->addSql('insert into customer (first_name, last_name) values ("Joe", "Dirte");');
        $this->addSql('insert into customer (first_name, last_name, street_address) values ("Frank", "Sinatra", "123 Somewhere Street");');
        $this->addSql('insert into customer (first_name, last_name, street_address) values ("John", "Adams", "7750 Massachusetts Avenue");');
        // insert phone data
        $this->addSql('insert into customer_phone (customer_id, type, number) values (2, "mobile", "3432615594");');
        $this->addSql('insert into customer_phone (customer_id, type, number) values (3, "mobile", "1234567890");');
        $this->addSql('insert into customer_phone (customer_id, type, number) values (2, "home", "1987654320");');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_phone DROP FOREIGN KEY FK_8A7AE2E69395C3F3');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_phone');
    }
}
