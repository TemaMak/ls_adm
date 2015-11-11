CREATE TABLE IF NOT EXISTS prefix_adm (
  `user_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `address` text NOT NULL,
  `name` text NOT NULL,
  `reciver_user_id` int(11) NOT NULL,
  `is_gift_send` tinyint(4) NOT NULL,
  `is_gift_recive` tinyint(4) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`year`),
  KEY `year` (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;