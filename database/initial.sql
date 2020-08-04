CREATE TABLE IF NOT EXISTS `sessions`
(
    `id`         varchar(128)               NOT NULL,
    `ip_address` varchar(45)                NOT NULL,
    `timestamp`  int(10) unsigned DEFAULT 0 NOT NULL,
    `data`       blob                       NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`),
    PRIMARY KEY (`id`)
);

CREATE TABLE `accounts`
(
    `account_id`        BIGINT                      NOT NULL AUTO_INCREMENT,
    `type`              ENUM ('owner','contractor') NOT NULL,
    `first_name`        VARCHAR(150)                NOT NULL,
    `last_name`         VARCHAR(150)                NOT NULL,
    `email`             VARCHAR(150)                NOT NULL,
    `password`          VARCHAR(100)                NOT NULL,
    `date_registration` DATETIME                    NOT NULL,
    `date_last_login`   DATETIME                    NULL     DEFAULT NULL,
    `suspended`         BOOLEAN                     NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`account_id`)
) ENGINE = InnoDB;


CREATE TABLE `projects`
(
    `project_id`            BIGINT       NOT NULL AUTO_INCREMENT,
    `account_id`            INT          NOT NULL,
    `project_creation_date` DATETIME     NOT NULL,
    `active`                BOOLEAN      NOT NULL DEFAULT FALSE,
    `company`               VARCHAR(150) NOT NULL,
    `first_name`            VARCHAR(150) NOT NULL,
    `last_name`             VARCHAR(150) NOT NULL,
    `job_title`             VARCHAR(150) NULL     DEFAULT NULL,
    `city`                  VARCHAR(150) NOT NULL,
    `province`              VARCHAR(150) NULL     DEFAULT NULL,
    `email`                 VARCHAR(150) NOT NULL,
    `phone_number`          VARCHAR(150) NOT NULL,
    `title_of_project`      VARCHAR(150) NULL     DEFAULT NULL,
    `location`              VARCHAR(150) NULL     DEFAULT NULL,
    `construction_date`     DATE         NULL     DEFAULT NULL,
    `bid_closing_date`      DATE         NULL     DEFAULT NULL,
    `project_type`          VARCHAR(150) NULL     DEFAULT NULL,
    `project_stage`         VARCHAR(150) NULL     DEFAULT NULL,
    `link_to_documents`     VARCHAR(150) NULL     DEFAULT NULL,
    `description`           TEXT         NULL     DEFAULT NULL,
    `ocaa_number`           VARCHAR(150) NULL     DEFAULT NULL,
    `lca_number`            VARCHAR(150) NULL     DEFAULT NULL,
    `zone_location`         VARCHAR(150) NULL     DEFAULT NULL,
    `site_addresses`        VARCHAR(150) NULL     DEFAULT NULL,
    `closing_date`          DATE         NULL     DEFAULT NULL,
    `number_of_addenda`     INT          NULL     DEFAULT NULL,
    `obtain_bid_documents`  VARCHAR(150) NULL     DEFAULT NULL,
    `tender_stage`          VARCHAR(150) NULL     DEFAULT NULL,
    `funding`               VARCHAR(150) NULL     DEFAULT NULL,
    `procurement_type`      VARCHAR(150) NULL     DEFAULT NULL,
    `classification_type`   VARCHAR(150) NULL     DEFAULT NULL,
    `owner_type`            VARCHAR(150) NULL     DEFAULT NULL,
    `scope_of_work`         TEXT         NULL     DEFAULT NULL,
    PRIMARY KEY (`project_id`)
) ENGINE = InnoDB;

CREATE TABLE `admins`
(
    `admin_id`        BIGINT                      NOT NULL AUTO_INCREMENT,
    `first_name`        VARCHAR(150)                NOT NULL,
    `last_name`         VARCHAR(150)                NOT NULL,
    `email`             VARCHAR(150)                NOT NULL,
    `password`          VARCHAR(100)                NOT NULL,
    `date_last_login`   DATETIME                    NULL     DEFAULT NULL,
    PRIMARY KEY (`admin_id`)
) ENGINE = InnoDB;
