--
-- Table structure for table `tz_members`
--
--Primary key is incremental and UNIQUE key doesn't have any duplicates
CREATE TABLE `tz_members` (
  `id` int(11) NOT NULL auto_increment,
  `usr` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `pass` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `hash` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `regIP` varchar(25) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL auto_increment,
`file` VARCHAR( 100 ) NOT NULL ,
`type` VARCHAR( 10 ) NOT NULL ,
`size` INT NOT NULL,
  `usr` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `file` (`file`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
`usr` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `comment` text NOT NULL,
  `time` varchar(30) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
`file` VARCHAR( 100 ) NOT NULL ,
`type` VARCHAR( 10 ) NOT NULL ,
`size` INT NOT NULL,
  `regIP` varchar(25) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `file` (`file`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;