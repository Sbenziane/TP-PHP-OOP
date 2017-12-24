CREATE TABLE `meetings` (
	`id` varchar(255) NOT NULL,
	`title` varchar(45) NOT NULL,
	`description` varchar(45) NOT NULL,
	`date_start` DATETIME NOT NULL,
	`date_end` DATETIME NOT NULL,
	`community_id` varchar(255) NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `meetings_fk0` FOREIGN KEY (`community_id`) REFERENCES `communities`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;