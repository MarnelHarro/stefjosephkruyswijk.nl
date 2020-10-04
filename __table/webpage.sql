CREATE TABLE IF NOT EXISTS `webpage` (
  `domain` varchar(63) NOT NULL,
  `pathandfile` varchar(150) NOT NULL,
  `title` varchar(100) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `added` int(10) unsigned NOT NULL,
  `keywords` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`domain`,`pathandfile`),
  UNIQUE KEY `domain` (`domain`,`pathandfile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
