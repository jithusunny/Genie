-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', md5('admin'), 'master foo', 'foo@master.com', '9998887776');
