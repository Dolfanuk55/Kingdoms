-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.41 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4072
-- Date/time:                    2012-02-29 21:35:55
-- --------------------------------------------------------

-- Dumping structure for table blah.mw_blogs
DROP TABLE IF EXISTS `mw_blogs`;
CREATE TABLE IF NOT EXISTS `mw_blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `comments` text NOT NULL,
  `addDate` date NOT NULL DEFAULT '0000-00-00',
  `postdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rawpostdate` varchar(50) NOT NULL DEFAULT '',
  `allow` enum('0','1') NOT NULL DEFAULT '1',
  `notify` enum('0','1') NOT NULL DEFAULT '1',
  `v_count` int(5) NOT NULL DEFAULT '0',
  `archiveMonth` char(2) NOT NULL DEFAULT '',
  `archiveYear` char(4) NOT NULL DEFAULT '',
  `rss_date` varchar(35) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping structure for table blah.mw_comments
DROP TABLE IF EXISTS `mw_comments`;
CREATE TABLE IF NOT EXISTS `mw_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `comments` text NOT NULL,
  `rawpostdate` varchar(50) NOT NULL DEFAULT '',
  `addDate` date NOT NULL DEFAULT '0000-00-00',
  `postdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adminPost` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping structure for table blah.mw_favourites
DROP TABLE IF EXISTS `mw_favourites`;
CREATE TABLE IF NOT EXISTS `mw_favourites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping structure for table blah.mw_settings
DROP TABLE IF EXISTS `mw_settings`;
CREATE TABLE IF NOT EXISTS `mw_settings` (
  `id` tinyint(1) NOT NULL DEFAULT '1',
  `theme` varchar(50) NOT NULL DEFAULT 'standard',
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `website` varchar(100) NOT NULL DEFAULT '',
  `w_path` varchar(250) NOT NULL DEFAULT '',
  `blogname` varchar(200) NOT NULL DEFAULT '',
  `dateformat` varchar(20) NOT NULL DEFAULT 'D j M Y, G:ia',
  `timeOffset` varchar(4) NOT NULL DEFAULT '',
  `language` varchar(30) NOT NULL DEFAULT 'english.php',
  `total` int(3) NOT NULL DEFAULT '25',
  `hometotal` int(3) NOT NULL DEFAULT '5',
  `rssfeeds` int(5) NOT NULL DEFAULT '50',
  `totalArchives` tinyint(3) NOT NULL DEFAULT '18',
  `commentsOrder` char(3) NOT NULL DEFAULT 'asc',
  `enableCaptcha` enum('0','1') NOT NULL DEFAULT '1',
  `modR` enum('0','1') NOT NULL DEFAULT '0',
  `parseLinks` enum('0','1') NOT NULL DEFAULT '1',
  `meta_k` mediumtext NOT NULL,
  `meta_d` mediumtext NOT NULL,
  `bookmarks` varchar(50) NOT NULL DEFAULT '',
  `profile` mediumtext NOT NULL,
  `profileImage` varchar(50) NOT NULL DEFAULT '',
  `profileUpdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `imageWidth` tinyint(3) NOT NULL DEFAULT '90',
  `imageHeight` tinyint(3) NOT NULL DEFAULT '120',
  `adsense` text NOT NULL,
  `snap` text NOT NULL,
  `wysiwyg` enum('0','1') NOT NULL DEFAULT '1',
  `smtp` enum('0','1') NOT NULL DEFAULT '0',
  `smtp_host` varchar(100) NOT NULL DEFAULT 'localhost',
  `smtp_user` varchar(100) NOT NULL DEFAULT '',
  `smtp_pass` varchar(100) NOT NULL DEFAULT '',
  `smtp_port` varchar(5) NOT NULL DEFAULT '25',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table blah.mw_settings: 1 rows
INSERT INTO `mw_settings` (`id`, `theme`, `name`, `email`, `website`, `w_path`, `blogname`, `dateformat`, `timeOffset`, `language`, `total`, `hometotal`, `rssfeeds`, `totalArchives`, `commentsOrder`, `enableCaptcha`, `modR`, `parseLinks`, `meta_k`, `meta_d`, `bookmarks`, `profile`, `profileImage`, `profileUpdate`, `imageWidth`, `imageHeight`, `adsense`, `snap`, `wysiwyg`, `smtp`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`) VALUES
	(1, 'standard', 'Your Name or Username', 'you@yoursite.com', 'Website Name', 'http://www.yoursite.com/weblog', 'Your Blog Name', 'D j M Y, G:ia', '0', 'english.php', 25, 5, 50, 15, 'asc', '1', '0', '1', '', '', '1,2,6,13,15', '', '', '2012-02-29 22:34:35', 90, 120, '', '', '1', '0', 'localhost', '', '', '25');
