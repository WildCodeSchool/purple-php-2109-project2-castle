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

INSERT INTO `trooper` (`type`, `vigor`) VALUES (1, 5);
INSERT INTO `trooper` (`type`, `vigor`) VALUES (2, 5);
INSERT INTO `trooper` (`type`, `vigor`) VALUES (3, 5);
