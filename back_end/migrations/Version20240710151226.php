<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240710151226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_detail (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, type VARCHAR(90) DEFAULT NULL, date DATETIME DEFAULT NULL, responsible_agency VARCHAR(120) DEFAULT NULL, religious_affiliation VARCHAR(90) DEFAULT NULL, cause VARCHAR(90) DEFAULT NULL, INDEX IDX_1C9F08C1DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT NOT NULL, person1_id INT DEFAULT NULL, person2_id INT DEFAULT NULL, gedcom_id INT DEFAULT NULL, INDEX IDX_A5E6215B3EF5821B (person1_id), INDEX IDX_A5E6215B2C402DF5 (person2_id), INDEX IDX_A5E6215BFCB7907E (gedcom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gedcom (id INT AUTO_INCREMENT NOT NULL, header_id INT NOT NULL, user_id INT DEFAULT NULL, trailer VARCHAR(4) NOT NULL, name VARCHAR(90) NOT NULL, creation_date DATE NOT NULL, last_modified_date DATE NOT NULL, UNIQUE INDEX UNIQ_DA5219DC2EF91FD8 (header_id), INDEX IDX_DA5219DCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, version_number VARCHAR(11) NOT NULL, version_form VARCHAR(20) NOT NULL, charactere_set VARCHAR(255) NOT NULL, receiving_system_name VARCHAR(20) DEFAULT NULL, source_version_number VARCHAR(15) DEFAULT NULL, source_name VARCHAR(90) DEFAULT NULL, source_business VARCHAR(90) DEFAULT NULL, source_name_data VARCHAR(90) DEFAULT NULL, source_name_data_date DATE DEFAULT NULL, source_name_data_copyright VARCHAR(248) DEFAULT NULL, file_creation_date DATETIME DEFAULT NULL, language VARCHAR(15) DEFAULT NULL, file_name VARCHAR(248) DEFAULT NULL, copyright VARCHAR(248) DEFAULT NULL, note VARCHAR(248) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual (id INT NOT NULL, child_to_family_id INT DEFAULT NULL, gedcom_id INT DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, INDEX IDX_8793FC172EF108B3 (child_to_family_id), INDEX IDX_8793FC17FCB7907E (gedcom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_event (id INT AUTO_INCREMENT NOT NULL, birth_detail_id INT DEFAULT NULL, death_detail_id INT DEFAULT NULL, individual_id INT DEFAULT NULL, death TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_690E2A0B7ED54915 (birth_detail_id), UNIQUE INDEX UNIQ_690E2A0B7F17C6DE (death_detail_id), INDEX IDX_690E2A0BAE271C0D (individual_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_event_detail (id INT AUTO_INCREMENT NOT NULL, event_detail_id INT NOT NULL, age_at_event VARCHAR(13) DEFAULT NULL, UNIQUE INDEX UNIQ_8A1BEC525E453D86 (event_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE name (id INT AUTO_INCREMENT NOT NULL, individual_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_5E237E06AE271C0D (individual_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE name_piece (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, prefix VARCHAR(30) DEFAULT NULL, given VARCHAR(120) DEFAULT NULL, nickname VARCHAR(30) DEFAULT NULL, surname_prefix VARCHAR(30) DEFAULT NULL, surname VARCHAR(120) DEFAULT NULL, suffix VARCHAR(30) DEFAULT NULL, INDEX IDX_8AEC596671179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, latitude VARCHAR(10) DEFAULT NULL, longitude VARCHAR(11) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(80) NOT NULL, lastname VARCHAR(80) NOT NULL, username VARCHAR(80) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_detail ADD CONSTRAINT FK_1C9F08C1DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B3EF5821B FOREIGN KEY (person1_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B2C402DF5 FOREIGN KEY (person2_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215BFCB7907E FOREIGN KEY (gedcom_id) REFERENCES gedcom (id)');
        $this->addSql('ALTER TABLE gedcom ADD CONSTRAINT FK_DA5219DC2EF91FD8 FOREIGN KEY (header_id) REFERENCES header (id)');
        $this->addSql('ALTER TABLE gedcom ADD CONSTRAINT FK_DA5219DCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE individual ADD CONSTRAINT FK_8793FC172EF108B3 FOREIGN KEY (child_to_family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE individual ADD CONSTRAINT FK_8793FC17FCB7907E FOREIGN KEY (gedcom_id) REFERENCES gedcom (id)');
        $this->addSql('ALTER TABLE individual_event ADD CONSTRAINT FK_690E2A0B7ED54915 FOREIGN KEY (birth_detail_id) REFERENCES individual_event_detail (id)');
        $this->addSql('ALTER TABLE individual_event ADD CONSTRAINT FK_690E2A0B7F17C6DE FOREIGN KEY (death_detail_id) REFERENCES individual_event_detail (id)');
        $this->addSql('ALTER TABLE individual_event ADD CONSTRAINT FK_690E2A0BAE271C0D FOREIGN KEY (individual_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE individual_event_detail ADD CONSTRAINT FK_8A1BEC525E453D86 FOREIGN KEY (event_detail_id) REFERENCES event_detail (id)');
        $this->addSql('ALTER TABLE name ADD CONSTRAINT FK_5E237E06AE271C0D FOREIGN KEY (individual_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE name_piece ADD CONSTRAINT FK_8AEC596671179CD6 FOREIGN KEY (name_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_detail DROP FOREIGN KEY FK_1C9F08C1DA6A219');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B3EF5821B');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B2C402DF5');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215BFCB7907E');
        $this->addSql('ALTER TABLE gedcom DROP FOREIGN KEY FK_DA5219DC2EF91FD8');
        $this->addSql('ALTER TABLE gedcom DROP FOREIGN KEY FK_DA5219DCA76ED395');
        $this->addSql('ALTER TABLE individual DROP FOREIGN KEY FK_8793FC172EF108B3');
        $this->addSql('ALTER TABLE individual DROP FOREIGN KEY FK_8793FC17FCB7907E');
        $this->addSql('ALTER TABLE individual_event DROP FOREIGN KEY FK_690E2A0B7ED54915');
        $this->addSql('ALTER TABLE individual_event DROP FOREIGN KEY FK_690E2A0B7F17C6DE');
        $this->addSql('ALTER TABLE individual_event DROP FOREIGN KEY FK_690E2A0BAE271C0D');
        $this->addSql('ALTER TABLE individual_event_detail DROP FOREIGN KEY FK_8A1BEC525E453D86');
        $this->addSql('ALTER TABLE name DROP FOREIGN KEY FK_5E237E06AE271C0D');
        $this->addSql('ALTER TABLE name_piece DROP FOREIGN KEY FK_8AEC596671179CD6');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE event_detail');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE gedcom');
        $this->addSql('DROP TABLE header');
        $this->addSql('DROP TABLE individual');
        $this->addSql('DROP TABLE individual_event');
        $this->addSql('DROP TABLE individual_event_detail');
        $this->addSql('DROP TABLE name');
        $this->addSql('DROP TABLE name_piece');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
