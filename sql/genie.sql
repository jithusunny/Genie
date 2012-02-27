-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2012 at 12:42 AM
-- Server version: 5.0.24
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `genie`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_user`
--

CREATE TABLE IF NOT EXISTS `g_user` (
  `u_id` int(11) NOT NULL auto_increment,
  `uname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY  (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `g_user`
--

INSERT INTO `g_user` (`u_id`, `uname`, `password`) VALUES
(1, 'anoop', 'toffy'),
(2, 'jithu', 'sunny'),
(3, 'syam', 'krishnan');
