<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131225142457 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE cfc_mailr_domain_model_activity (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_campaign (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_group (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_member (persistence_object_identifier VARCHAR(40) NOT NULL, recipientlist VARCHAR(40) DEFAULT NULL, unsubcampaign VARCHAR(40) DEFAULT NULL, bouncecampaign VARCHAR(40) DEFAULT NULL, email VARCHAR(255) NOT NULL, rating SMALLINT NOT NULL, optintime DATETIME NOT NULL, lastupdatetime DATETIME NOT NULL, language VARCHAR(255) NOT NULL, unsubtime DATETIME DEFAULT NULL, unsubreason VARCHAR(255) DEFAULT NULL, unsubreasontext VARCHAR(255) DEFAULT NULL, bouncetime DATETIME DEFAULT NULL, active VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_70A6F8BB3C405FF0 (recipientlist), INDEX IDX_70A6F8BB16CE28BB (unsubcampaign), INDEX IDX_70A6F8BB7DD3C0DE (bouncecampaign), PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_member_groups_join (mailr_member VARCHAR(40) NOT NULL, mailr_group VARCHAR(40) NOT NULL, INDEX IDX_692236983119EB13 (mailr_member), INDEX IDX_6922369894AB4F6E (mailr_group), PRIMARY KEY(mailr_member, mailr_group)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_recipientlist (persistence_object_identifier VARCHAR(40) NOT NULL, listname VARCHAR(255) NOT NULL, defaultfromname VARCHAR(255) NOT NULL, defaultreplytoemail VARCHAR(255) NOT NULL, defaultsubject VARCHAR(255) NOT NULL, description TEXT NOT NULL, company VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip VARCHAR(10) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, rating SMALLINT NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE cfc_mailr_domain_model_report (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) ENGINE = InnoDB");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member ADD CONSTRAINT FK_70A6F8BB3C405FF0 FOREIGN KEY (recipientlist) REFERENCES cfc_mailr_domain_model_recipientlist (persistence_object_identifier)");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member ADD CONSTRAINT FK_70A6F8BB16CE28BB FOREIGN KEY (unsubcampaign) REFERENCES cfc_mailr_domain_model_campaign (persistence_object_identifier)");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member ADD CONSTRAINT FK_70A6F8BB7DD3C0DE FOREIGN KEY (bouncecampaign) REFERENCES cfc_mailr_domain_model_campaign (persistence_object_identifier)");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member ADD CONSTRAINT FK_70A6F8BB47A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES typo3_party_domain_model_abstractparty (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member_groups_join ADD CONSTRAINT FK_692236983119EB13 FOREIGN KEY (mailr_member) REFERENCES cfc_mailr_domain_model_member (persistence_object_identifier)");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member_groups_join ADD CONSTRAINT FK_6922369894AB4F6E FOREIGN KEY (mailr_group) REFERENCES cfc_mailr_domain_model_group (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member DROP FOREIGN KEY FK_70A6F8BB16CE28BB");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member DROP FOREIGN KEY FK_70A6F8BB7DD3C0DE");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member_groups_join DROP FOREIGN KEY FK_6922369894AB4F6E");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member_groups_join DROP FOREIGN KEY FK_692236983119EB13");
		$this->addSql("ALTER TABLE cfc_mailr_domain_model_member DROP FOREIGN KEY FK_70A6F8BB3C405FF0");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_activity");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_campaign");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_group");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_member");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_member_groups_join");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_recipientlist");
		$this->addSql("DROP TABLE cfc_mailr_domain_model_report");
	}
}