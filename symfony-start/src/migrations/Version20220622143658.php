<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622143658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attraction ADD create_username VARCHAR(255) DEFAULT NULL, ADD update_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel ADD create_username VARCHAR(255) DEFAULT NULL, ADD update_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD create_username VARCHAR(255) DEFAULT NULL, ADD update_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE save_messages ADD create_username VARCHAR(255) DEFAULT NULL, ADD update_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD create_username VARCHAR(255) DEFAULT NULL, ADD update_username VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attraction DROP create_username, DROP update_username');
        $this->addSql('ALTER TABLE hotel DROP create_username, DROP update_username');
        $this->addSql('ALTER TABLE room DROP create_username, DROP update_username');
        $this->addSql('ALTER TABLE save_messages DROP create_username, DROP update_username');
        $this->addSql('ALTER TABLE user DROP create_username, DROP update_username');
    }
}
