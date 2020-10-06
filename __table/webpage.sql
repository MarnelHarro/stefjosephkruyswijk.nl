CREATE TABLE IF NOT EXISTS `example` (
  `string` varchar(255) NOT NULL,
  `integer` int(16) unsigned NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`string`,`integer`),
  UNIQUE KEY `domain` (`integer`,`text`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
