<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622153332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_ad CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE gearbox gearbox VARCHAR(255) NOT NULL, CHANGE energy energy VARCHAR(255) NOT NULL, CHANGE fuel fuel VARCHAR(255) NOT NULL, CHANGE year year VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE mileage mileage INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD phone_number VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_ad CHANGE price price INT NOT NULL, CHANGE gearbox gearbox VARCHAR(50) NOT NULL, CHANGE energy energy VARCHAR(50) NOT NULL, CHANGE fuel fuel VARCHAR(50) NOT NULL, CHANGE year year VARCHAR(4) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE mileage mileage VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE user DROP phone_number');
    }
}
