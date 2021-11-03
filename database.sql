CREATE TABLE `game` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `score` INT,
  `round` INT,
  PRIMARY KEY (`id`));

INSERT INTO `game` (`score`, `round`) VALUES (200,1);


CREATE TABLE `trooper` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_trooper` INT,
  `vigor` INT,
  `player` BOOLEAN,
  PRIMARY KEY (`id`));

INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (1, 5, true);
INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (2, 5, true);
INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (3, 5, true);
INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (1, 5, false);
INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (2, 5, false);
INSERT INTO `trooper` (`type_trooper`, `vigor`, `player`) VALUES (3, 5, false);
