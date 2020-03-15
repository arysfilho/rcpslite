CREATE DATABASE rcp_lite CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS rcp_lite.`subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `state` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS rcp_lite.`fields` (
  `subs_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `value` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
