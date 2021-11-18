DROP TABLE IF EXISTS `game` ;

DROP TABLE IF EXISTS `trooper` ;

DROP TABLE IF EXISTS `admin` ;

CREATE TABLE `game` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `score` INT NOT NULL,
  `round` INT NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `game` (`score`, `round`) VALUES (200,1);

CREATE TABLE `trooper` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` INT NOT NULL,
  `vigor` INT NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `trooper` (`type`, `vigor`) VALUES (0, 5);
INSERT INTO `trooper` (`type`, `vigor`) VALUES (1, 5);
INSERT INTO `trooper` (`type`, `vigor`) VALUES (2, 5);

CREATE TABLE `admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(255) NOT NULL,
  `pass` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `admin` (`user`, `pass`) VALUES ('admin', 'dearinstructor');

