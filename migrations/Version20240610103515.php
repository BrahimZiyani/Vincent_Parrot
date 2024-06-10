<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240610103515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP id, CHANGE message_id message_id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (message_id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('ALTER TABLE review MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON review');
        $this->addSql('ALTER TABLE review DROP id, CHANGE review_id review_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_794381C6642B8210 ON review (admin_id)');
        $this->addSql('ALTER TABLE review ADD PRIMARY KEY (review_id)');
        $this->addSql('ALTER TABLE schedule MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON schedule');
        $this->addSql('ALTER TABLE schedule DROP id, CHANGE schedule_id schedule_id INT AUTO_INCREMENT NOT NULL, CHANGE monday monday DATE DEFAULT NULL, CHANGE tuesday tuesday DATE DEFAULT NULL, CHANGE wednesday wednesday DATE DEFAULT NULL, CHANGE thursday thursday DATE DEFAULT NULL, CHANGE friday friday DATE DEFAULT NULL, CHANGE saturday saturday DATE DEFAULT NULL, CHANGE sunday sunday DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBA0631C12 FOREIGN KEY (organiser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FBA0631C12 ON schedule (organiser_id)');
        $this->addSql('ALTER TABLE schedule ADD PRIMARY KEY (schedule_id)');
        $this->addSql('ALTER TABLE service MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON service');
        $this->addSql('ALTER TABLE service DROP id, CHANGE service_id service_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE service ADD PRIMARY KEY (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message MODIFY message_id INT NOT NULL');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('DROP INDEX IDX_B6BD307FF624B39D ON message');
        $this->addSql('DROP INDEX `primary` ON message');
        $this->addSql('ALTER TABLE message ADD id INT NOT NULL, CHANGE message_id message_id INT NOT NULL');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6642B8210');
        $this->addSql('DROP INDEX IDX_794381C6642B8210 ON review');
        $this->addSql('ALTER TABLE review ADD id INT AUTO_INCREMENT NOT NULL, CHANGE review_id review_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBA0631C12');
        $this->addSql('DROP INDEX IDX_5A3811FBA0631C12 ON schedule');
        $this->addSql('ALTER TABLE schedule ADD id INT AUTO_INCREMENT NOT NULL, CHANGE schedule_id schedule_id INT NOT NULL, CHANGE monday monday DATE NOT NULL, CHANGE tuesday tuesday DATE NOT NULL, CHANGE wednesday wednesday DATE NOT NULL, CHANGE thursday thursday DATE NOT NULL, CHANGE friday friday DATE NOT NULL, CHANGE saturday saturday DATE NOT NULL, CHANGE sunday sunday DATE NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE service ADD id INT AUTO_INCREMENT NOT NULL, CHANGE service_id service_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
