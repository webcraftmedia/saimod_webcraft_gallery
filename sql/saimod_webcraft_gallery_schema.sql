CREATE TABLE `webcraft_gallery` (
	`ID` INT(10) NOT NULL AUTO_INCREMENT,
	`gallery` INT(10) NOT NULL,
	`position` INT(10) NOT NULL DEFAULT '0',
	`heading` CHAR(255) NOT NULL,
	`description` TEXT NOT NULL,
	`file_cat` CHAR(50) NOT NULL,
	`file_id` CHAR(50) NOT NULL,
	PRIMARY KEY (`ID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=41;
