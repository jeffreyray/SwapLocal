-- $Id: install.mysql.utf8.sql 74 2010-12-01 22:04:52Z chdemko $


DROP TABLE IF EXISTS `#__swaplocal_currencies`;
 
CREATE TABLE `#__swaplocal_currencies` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255),
  `published` BOOLEAN NOT NULL DEFAULT '1',
  `created` DATETIME,
  `created_by` INT(11) unsigned,
  `checked_out` INT(11) unsigned,
  `checked_out_time` DATETIME,
  `params` TEXT,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__swaplocal_currencies` (`name`) VALUES
	('Federal Reserve Note'),
	('Ithaca Hours');





DROP TABLE IF EXISTS `#__swaplocal_bills`;
 
CREATE TABLE `#__swaplocal_bills` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `currency` int(11) unsigned,
  `denom` DEC(8,4) unsigned,
  `series` VARCHAR(32),
  `serial` VARCHAR(32),
  `zipcode` INT(5),
  `note` TEXT,
  `published` BOOLEAN NOT NULL DEFAULT '1',
  `created` DATETIME,
  `created_by` INT(11) unsigned,
  `checked_out` INT(11) unsigned,
  `checked_out_time` DATETIME,
  `params` TEXT,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#__swaplocal_business`;
 
CREATE TABLE `#__swaplocal_business` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `street` varchar(128),
  `city` varchar(128),
  `state` varchar(2),
  `zipcode` int(5) unsigned,
  `phone` varchar(32),
  `email` varchar(64),
  `url` varchar(255),
  `image` varchar(255),
  `description` text,
  `published` BOOLEAN NOT NULL DEFAULT '1',
  `created` DATETIME,
  `created_by` INT(11) unsigned,
  `checked_out` INT(11) unsigned,
  `checked_out_time` DATETIME,
  `params` TEXT,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__swaplocal_swaps`;
 
CREATE TABLE `#__swaplocal_swaps` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `timestamp` DATETIME,
  `bill` int(11) unsigned NOT NULL,
  `business` int(11) unsigned NOT NULL,
  `note` TEXT,
  `traveltime` int(11) unsigned,
  `traveldist` int(11) unsigned,
  `published` BOOLEAN NOT NULL DEFAULT '1',
  `created` DATETIME,
  `created_by` INT(11) unsigned,
  `checked_out` INT(11) unsigned,
  `checked_out_time` DATETIME,
  `params` TEXT,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
