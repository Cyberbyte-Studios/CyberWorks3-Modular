CREATE TABLE IF NOT EXISTS `cw_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `steam_id` varchar(64) DEFAULT NULL,
  `super_user` TINYINT(1) NULL DEFAULT '0',
  `profilePicture` text DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;