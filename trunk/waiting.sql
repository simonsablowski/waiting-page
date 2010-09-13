CREATE TABLE IF NOT EXISTS `waiting` (
  `user` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `event` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `waiting` (`user`, `date`, `event`) VALUES
('fbrccn', '2010-10-22 18:05:00', 'his departure to france');