-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 182.50.131.165
-- Generation Time: Mar 13, 2014 at 04:27 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `changemaker`
--
CREATE DATABASE `changemaker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `changemaker`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL auto_increment,
  `head` varchar(50) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `source` text NOT NULL,
  `body` text NOT NULL,
  `cause_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `tagline` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` VALUES(4, 'Primary Education', '', 'About 20% of Indian children between the ages of six and 14 are not enrolled in school. Even among enrolled children, attendance rates are low and 26% of pupils enrolled in primary school drop out before Grade 5. The situation is worse in certain sectors of the population: the poor, those living in rural areas, girls, and those living in some specific states. Gender gaps exist. Literacy rates are 21% lower for females than for males. Among those children aged six to 14 not enrolled in school, more than 60% are girls. Some communities do not see the need to educate daughters because they will be married off at an early age and live and work with their in-laws, mostly doing housework and raising children. ');
INSERT INTO `causes` VALUES(3, 'Hygiene and sanitation', '', 'India is a country where Atomic Age and near Stone Age people co-exist. On one hand India has achieved development in many areas, but on the other hand there is still the practice of open defecation and manual cleaning of human excreta from bucket privies by scavengers. National sanitation coverage is only about 34% meaning that 66% of the population practises open defecation. Such unhygienic conditions lead to infections and high mortality and morbidity in the community. Low sanitation coverage could be due to lack of affordable sanitation technology and awareness or motivation. Although the sewerage system was introduced in India long ago, high operational and maintenance costs have prohibited it from being implemented in most towns and cities. Similarly, the cost of a septic tank is beyond most people, and disposal of undigested sludge from septic tanks remains a problem. In contrast, the pour-flush two-pit toilet (known as Sulabh Shauchalaya) is a low cost, socially acceptable and appropriate technology that does not require scavengers to clean the pits.');
INSERT INTO `causes` VALUES(5, 'Rural Healthcare', '', 'Healthcare is the right of every individual but lack of quality infrastructure, dearth of qualified medical functionaries, and non- access to basic medicines and medical facilities thwarts its reach to 60% of population in India. A majority of 700 million people lives in rural areas where the condition of medical facilities is deplorable. Considering the picture of grim facts there is a dire need of new practices and procedures to ensure that quality and timely healthcare reaches the deprived corners of the Indian villages. Though a lot of policies and programs are being run by the Government but the success and effectiveness of these programs is questionable due to gaps in the implementation. In rural India, where the number of Primary health care centers (PHCs) is limited, 8% of the centers do not have doctors or medical staff, 39% do not have lab technicians and 18% PHCs do not even have a pharmacist.');

-- --------------------------------------------------------

--
-- Table structure for table `corp_cause`
--

CREATE TABLE `corp_cause` (
  `corp_id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corp_cause`
--

INSERT INTO `corp_cause` VALUES(11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE `corporates` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `tagline` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `corporates`
--

INSERT INTO `corporates` VALUES(11, 'domino', '21232f297a57a5a743894a0e4a801fc3', 'Domino Printech', '', '');
INSERT INTO `corporates` VALUES(13, 'ljhl', '81dc9bdb52d04dc20036dbd8313ed055', 'bkhb', 'kljl', '');
INSERT INTO `corporates` VALUES(12, 'Chetak', '7561d32e7071a2878401c1205e2b4d82', 'S Chetak', 'Its all about you', '');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_cause`
--

CREATE TABLE `ngo_cause` (
  `ngo_id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ngo_cause`
--

INSERT INTO `ngo_cause` VALUES(6, 3);
INSERT INTO `ngo_cause` VALUES(7, 4);
INSERT INTO `ngo_cause` VALUES(8, 5);
INSERT INTO `ngo_cause` VALUES(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ngos`
--

CREATE TABLE `ngos` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `tagline` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ngos`
--

INSERT INTO `ngos` VALUES(7, 'desterro', '21232f297a57a5a743894a0e4a801fc3', 'Desterro Eves', '', '');
INSERT INTO `ngos` VALUES(6, 'washforindia', '21232f297a57a5a743894a0e4a801fc3', 'WASH for India', '', '');
INSERT INTO `ngos` VALUES(8, 'sattva', '21232f297a57a5a743894a0e4a801fc3', 'Sattva Healthcare', '', '');
INSERT INTO `ngos` VALUES(9, 'Bandhana', '7626d28b710e7f9e98d9dfbe9bf0d123', 'Bandhana', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` VALUES(1, 'Project Heena', 'http://www.projectheena.com');
INSERT INTO `partners` VALUES(2, 'Desterro Eves', 'http://www.changemaker.be/ngo.php?id=7');
INSERT INTO `partners` VALUES(3, 'WASH for India', 'http://washforindia.org/');
INSERT INTO `partners` VALUES(4, 'Domino Printech', 'http://www.domino-printing.com/Channels/India/Eng/Home.aspx');

-- --------------------------------------------------------

--
-- Table structure for table `proj_corp`
--

CREATE TABLE `proj_corp` (
  `proj_id` int(11) NOT NULL,
  `corp_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proj_corp`
--

INSERT INTO `proj_corp` VALUES(8, 11);
INSERT INTO `proj_corp` VALUES(10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `tagline` varchar(50) default NULL,
  `description` text,
  `funds_reqd` int(20) NOT NULL,
  `vols_reqd` int(20) NOT NULL,
  `funds_acqd` int(11) NOT NULL,
  `vols_acqd` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` VALUES(8, 'Use My Loo', '', 'Use my Loo is an innovative campaign with the goal of providing toilet access to women who live in Indian slums without toilets.', 27000000, 600, 10000000, 0, 6, 3);
INSERT INTO `projects` VALUES(9, 'The School Building Project', '', '', 0, 0, 0, 0, 7, 4);
INSERT INTO `projects` VALUES(10, 'Fetal ECG Monitor', '', '', 10, 0, 4, 0, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vol_cause`
--

CREATE TABLE `vol_cause` (
  `vol_id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vol_cause`
--

INSERT INTO `vol_cause` VALUES(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vol_ngo`
--

CREATE TABLE `vol_ngo` (
  `vol_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vol_ngo`
--

INSERT INTO `vol_ngo` VALUES(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vol_proj`
--

CREATE TABLE `vol_proj` (
  `vol_id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vol_proj`
--

INSERT INTO `vol_proj` VALUES(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` text NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` VALUES(4, 'kunal.bajpai', '594787392', 'Kunal', 'Bajpai', 'male', 'Goa, India', '759049200', 'kunalkb20@gmail.com');
INSERT INTO `volunteers` VALUES(6, 'roshankumar.sahu.35', '100001206399882', 'Saksham', 'Sahu', 'male', 'New Delhi, India', '624178800', 'roshan_aiims@yahoo.com');
INSERT INTO `volunteers` VALUES(7, 'sai.kulkarni.716', '100003875953324', 'Sai', 'Kulkarni', 'female', 'Goa, India', '777884400', 'kulkarni.sai.sai6@gmail.com');
INSERT INTO `volunteers` VALUES(8, 'abhijith.asok.31', '710145563', 'Abhijith', 'Asok', 'male', 'Hyderabad, Andhra Pradesh', '', '');
