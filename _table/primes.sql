CREATE TABLE IF NOT EXISTS `primes` (
  `number` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
