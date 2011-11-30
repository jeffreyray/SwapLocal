DROP TABLE IF EXISTS `#__swaplocal_featured_business`;

CREATE TABLE `#__swaplocal_featured_business` (
  `swaplocal_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`swaplocal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#__swaplocal_business_rating`;

CREATE TABLE `#__swaplocal_business_rating` (
  `swaplocal_id` int(11) NOT NULL default '0',
  `rating_sum` int(10) unsigned NOT NULL default '0',
  `rating_count` int(10) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`swaplocal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
