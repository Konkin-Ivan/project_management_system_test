<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240922160833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE4BF5633B');
        $this->addSql('DROP INDEX IDX_2FB3D0EE4BF5633B ON project');
        $this->addSql('ALTER TABLE project DROP customer, CHANGE developer_title_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE9395C3F3 ON project (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9395C3F3');
        $this->addSql('DROP INDEX IDX_2FB3D0EE9395C3F3 ON project');
        $this->addSql('ALTER TABLE project ADD customer VARCHAR(255) NOT NULL, CHANGE customer_id developer_title_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE4BF5633B FOREIGN KEY (developer_title_id) REFERENCES developer (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE4BF5633B ON project (developer_title_id)');
    }
}
