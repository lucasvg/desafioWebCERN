mysql -u root -p
CREATE DATABASE db_challengeWebCERN;
CREATE USER 'challengeWebCERN'@'localhost' IDENTIFIED BY 'pwd';
GRANT ALL ON db_challengeWebCERN.* TO 'challengeWebCERN'@'localhost';
FLUSH PRIVILEGES;
mysql -u challengeWebCERN -p
use db_challengeWebCERN

CREATE TABLE IF NOT EXISTS `preference` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) NOT NULL,
  `setting` text NOT NULL,
  `active` boolean NOT NULL,
  PRIMARY KEY (`id`)
);