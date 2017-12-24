CREATE TABLE `organisers` (
	`id` varchar(255) NOT NULL,
	`meeting_id` varchar(255) NOT NULL,
	`user_id` varchar(255) NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `organisers_fk0` FOREIGN KEY (`meeting_id`) REFERENCES `meetings`(`id`),
	CONSTRAINT `organisers_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;