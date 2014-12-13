-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: engr-cpanel-mysql.engr.illinois.edu
-- Generation Time: Apr 25, 2013 at 02:35 AM
-- Server version: 5.1.67
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trevifountain_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Achievement`
--

CREATE TABLE IF NOT EXISTS `Achievement` (
  `aid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Achievement`
--

INSERT INTO `Achievement` (`aid`, `title`, `description`, `username`, `date`, `status`) VALUES
(1, 'First Post!', 'The User has posted his/her first wish on the board', 'twen3', '2013-04-16 13:31:56', 'old'),
(2, 'First Post!', 'The User has posted his/her first wish on the board', 'jodie', '2013-04-16 13:35:30', 'old'),
(4, 'First Blood!', 'The User has taken his/her first wish from the board', 'jodie', '2013-04-16 13:35:40', 'old'),
(5, 'First Blood!', 'The User has taken his/her first wish from the board', 'cs411', '2013-04-19 14:26:28', 'old'),
(6, '', '', 'jodie', '2013-04-21 17:22:47', 'old'),
(7, 'First Post!', 'The User has posted his/her first wish on the board', 'dddd', '2013-04-23 12:29:58', 'old'),
(8, '', '', 'dddd', '2013-04-23 12:30:09', 'old'),
(9, 'Just A Hobby', 'The User has posted five wishes on the board.', 'dddd', '2013-04-23 12:30:42', 'old'),
(10, 'First Post!', 'The User has posted his/her first wish on the board', 'hahaha', '2013-04-23 23:27:29', 'old'),
(11, '', '', 'twen3', '2013-04-24 11:46:17', 'old'),
(12, 'First Post!', 'The User has posted his/her first wish on the board', 'jodiezhao', '2013-04-24 11:53:29', 'old'),
(13, 'First Post!', 'The User has posted his/her first wish on the board', 'chenbfeng2', '2013-04-24 14:35:24', 'old'),
(15, 'First Blood!', 'The User has taken his/her first wish from the board', 'twen3', '2013-04-24 14:48:35', 'old'),
(17, 'Wishing Well', 'The User has taken five wishes from the board.', 'twen3', '2013-04-24 14:49:29', 'old'),
(18, 'First Blood!', 'The User has taken his/her first wish from the board', 'cathy', '2013-04-24 15:35:36', 'old'),
(19, '', '', 'cathy', '2013-04-24 16:38:18', 'old'),
(20, 'First Post!', 'The User has posted his/her first wish on the board', 'cathy', '2013-04-24 16:38:50', 'old'),
(21, 'First Post!', 'The User has posted his/her first wish on the board', 'valen', '2013-04-24 16:42:51', 'old'),
(22, 'First Post!', 'The User has posted his/her first wish on the board', '8989', '2013-04-24 16:50:22', 'old'),
(23, 'First Post!', 'The User has posted his/her first wish on the board', 'abby', '2013-04-24 16:52:52', 'old'),
(24, 'First Post!', 'The User has posted his/her first wish on the board', 'andyT', '2013-04-24 16:55:12', 'old'),
(25, 'First Post!', 'The User has posted his/her first wish on the boar', 'xuxu', '2013-04-24 16:56:24', 'old'),
(27, 'First Blood!', 'The User has taken his/her first wish from the boa', 'xuxu', '2013-04-24 16:57:29', 'old'),
(29, 'Wishing Well', 'The User has taken five wishes from the board.', 'xuxu', '2013-04-24 17:05:24', 'old'),
(30, 'First Post!', 'The User has posted his/her first wish on the board', 'andy33', '2013-04-24 17:16:43', 'old'),
(32, 'First Blood!', 'The User has taken his/her first wish from the board', 'andy33', '2013-04-24 17:20:23', 'old'),
(34, 'Wishing Well', 'The User has taken five wishes from the board.', 'andy33', '2013-04-24 17:21:31', 'old'),
(35, 'First Blood!', 'The User has taken his/her first wish from the board', 'KTTTT', '2013-04-24 17:58:49', 'old'),
(36, '', '', 'KTTTT', '2013-04-24 17:59:24', 'old'),
(37, 'First Blood!', 'The User has taken his/her first wish from the board', 'seven', '2013-04-24 19:31:23', 'old'),
(38, '', '', 'seven', '2013-04-24 19:32:28', 'old'),
(39, 'Wishing Well', 'The User has taken five wishes from the board.', 'seven', '2013-04-24 19:40:50', 'old'),
(40, 'First Blood!', 'The User has taken his/her first wish from the board', 'cc', '2013-04-24 21:25:08', 'old'),
(41, 'First Post!', 'The User has posted his/her first wish on the board.', 'ddd', '2013-04-24 22:48:39', 'old'),
(42, 'First Blood!', 'The User has taken his/her first wish from the board.', 'martin23', '2013-04-25 00:44:00', 'old'),
(43, '', '', 'martin23', '2013-04-25 00:44:11', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `followee` varchar(20) NOT NULL,
  `follower` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`followee`, `follower`) VALUES
('twen3', 'jodie'),
('twen3', 'hehe'),
('twen3', 'hzhan2'),
('twen3', 'chenbfeng2'),
('twen3', 'hahaha'),
('twen3', 'qiaosen3'),
('jodie', 'twen3'),
('twen3', 'jodiezhao'),
('jodiezhao', 'twen3'),
('dddd', 'twen3'),
('chenbfeng2', 'jodie'),
('jodiezhao', 'jodie'),
('hahaha', 'jodie'),
('dddd', 'jodie'),
('chenbfeng2', 'twen3'),
('jodie', 'chenbfeng2'),
('jodiezhao', 'chenbfeng2'),
('hahaha', 'chenbfeng2'),
('dddd', 'chenbfeng2'),
('cathy', 'andy33'),
('jodie', 'andy33'),
('twen3', 'andy33'),
('jodie', 'cathy'),
('andy33', 'seven'),
('ddd', 'twen3'),
('andy33', 'twen3'),
('xuxu', 'twen3'),
('ddd', 'chenbfeng2'),
('andy33', 'chenbfeng2'),
('xuxu', 'chenbfeng2');

-- --------------------------------------------------------

--
-- Table structure for table `Make`
--

CREATE TABLE IF NOT EXISTS `Make` (
  `username` varchar(20) NOT NULL,
  `wish_id` int(20) NOT NULL,
  PRIMARY KEY (`wish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Make`
--

INSERT INTO `Make` (`username`, `wish_id`) VALUES
('twen3', 1),
('jodie', 2),
('dddd', 3),
('dddd', 4),
('dddd', 5),
('dddd', 6),
('dddd', 7),
('hahaha', 8),
('twen3', 9),
('jodiezhao', 10),
('chenbfeng2', 12),
('twen3', 13),
('jodie', 14),
('cathy', 15),
('cathy', 16),
('valen', 17),
('8989', 18),
('abby', 19),
('andyT', 20),
('xuxu', 21),
('andy33', 22),
('ddd', 23);

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE IF NOT EXISTS `Profile` (
  `username` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about_u` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Profile`
--

INSERT INTO `Profile` (`username`, `age`, `gender`, `about_u`, `email`) VALUES
('twen3', 21, 'M', 'hey dude', 'twen3@illinois.edu'),
('chenbfeng2', 21, 'M', 'Super Great Angel', 'chenbfeng2@qq.com'),
('dddd', 0, '', '', ''),
('hahaha', 0, 'F', 'TBA', 'TBA'),
('5678', 0, '', '', ''),
('jodiezhao', 0, '', '', ''),
('qiaosen3', 21, 'M', 'handsome is me!', 'handsome3@gmail.com'),
('jodiezhao', 0, '', '', ''),
('cathy', 0, 'F', 'TBA', 'TBA'),
('andy33', 22, 'M', 'Hi~', 'andy5241@gmail.com'),
('xuxu', 0, '', '', ''),
('KTTTT', 0, '', '', ''),
('eiffy', 0, 'girl', 'TBA', 'TBA'),
('seven', 0, '', '', ''),
('rrrr', 0, '', '', ''),
('illini', 0, '', '', ''),
('loveuu', 0, '', '', ''),
('emily', 0, '', '', ''),
('kristen', 0, '', '', ''),
('cc', 0, '', '', ''),
('qwer', 0, '', '', ''),
('Annie', 0, '', '', ''),
('ddd', 0, '', '', ''),
('angel', 0, '', '', ''),
('ccathyzhu', 0, '', '', ''),
('martin23', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ProfileImage`
--

CREATE TABLE IF NOT EXISTS `ProfileImage` (
  `username` varchar(20) NOT NULL,
  `image` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProfileImage`
--

INSERT INTO `ProfileImage` (`username`, `image`, `status`) VALUES
('twen3', './twen3/P-GODAwwYmV1.jpg', 'off'),
('jodie', './jodie/P-59Zw0YdfTr.jpg', 'on'),
('jodie', './jodie/P-IdBcnqX6vh.jpg', 'off'),
('twen3', './twen3/P-HIh3guocSa.jpg', 'off'),
('twen3', './twen3/P-LcjH5pf1w4.jpg', 'off'),
('twen3', './twen3/P-TNUrQKZD1H.jpg', 'off'),
('twen3', './twen3/P-dwMoecLr83.jpg', 'off'),
('twen3', './twen3/P-rRfR2ldPJ7.jpg', 'off'),
('twen3', './twen3/P-ItNZmNLd69.jpg', 'off'),
('twen3', './twen3/P-6AMvusFl8A.jpg', 'off'),
('twen3', './twen3/P-YRyVS1RXHu.jpg', 'off'),
('twen3', './twen3/P-CNINpbLaZf.jpg', 'off'),
('hahaha', './hahaha/P-Cv8oGqBQME.jpg', 'on'),
('twen3', './twen3/P-yZeT1cnG6a.jpg', 'off'),
('twen3', './twen3/P-Il7OSg9P25.jpg', 'off'),
('jodiezhao', './jodiezhao/P-3V7T9OP9z3.jpg', 'off'),
('jodiezhao', './jodiezhao/P-9EJsZ6BFPH.JPG', 'off'),
('jodiezhao', './jodiezhao/P-gu0Ad0uUBm.png', 'off'),
('jodiezhao', './jodiezhao/P-S491I7woa2.png', 'off'),
('jodiezhao', './jodiezhao/P-fpeAGTNgDI.JPG', 'off'),
('jodiezhao', './jodiezhao/P-u2piyG7goA.jpg', 'on'),
('chenbfeng2', './chenbfeng2/P-MyqD3O0lg9.jpg', 'on'),
('andy33', './andy33/P-5FxSpZkUKx.jpg', 'on'),
('KTTTT', './KTTTT/P-QgZbnLRlEb.jpg', 'on'),
('eiffy', './eiffy/P-tJlxPnxEm8.jpg', 'on'),
('twen3', './twen3/P-pmRrmY6dPm.jpg', 'off'),
('twen3', './twen3/P-ZsncRkp1Ca.jpg', 'on'),
('xuxu', './xuxu/P-O8HQVYwTm2.JPG', 'on'),
('seven', './seven/P-FeAwrRDOBM.PNG', 'off'),
('seven', './seven/P-UalWMvhU75.PNG', 'off'),
('seven', './seven/P-7Zckfo5pIK.PNG', 'off'),
('kristen', './kristen/P-1VVO0GrQZN.jpg', 'on'),
('Annie', './Annie/P-6NXajcPcyK.jpg', 'on'),
('ddd', './ddd/P-cS9MGmS7n8.PNG', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `Take`
--

CREATE TABLE IF NOT EXISTS `Take` (
  `username` varchar(20) NOT NULL,
  `wish_id` int(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Take`
--

INSERT INTO `Take` (`username`, `wish_id`, `date`) VALUES
('jodie', 1, '2013-04-16 13:35:37'),
('cs411', 2, '2013-04-19 14:26:26'),
('twen3', 12, '2013-04-24 14:48:34'),
('twen3', 8, '2013-04-24 14:48:56'),
('twen3', 7, '2013-04-24 14:49:06'),
('twen3', 6, '2013-04-24 14:49:17'),
('twen3', 4, '2013-04-24 14:49:28'),
('jodie', 13, '2013-04-24 15:08:15'),
('cathy', 14, '2013-04-24 15:35:34'),
('cathy', 13, '2013-04-24 16:38:16'),
('xuxu', 16, '2013-04-24 16:57:27'),
('xuxu', 20, '2013-04-24 16:57:40'),
('xuxu', 5, '2013-04-24 17:00:07'),
('xuxu', 19, '2013-04-24 17:05:09'),
('xuxu', 17, '2013-04-24 17:05:23'),
('cathy', 18, '2013-04-24 17:05:47'),
('andy33', 21, '2013-04-24 17:20:22'),
('andy33', 19, '2013-04-24 17:20:51'),
('andy33', 18, '2013-04-24 17:21:02'),
('andy33', 7, '2013-04-24 17:21:19'),
('andy33', 6, '2013-04-24 17:21:30'),
('KTTTT', 22, '2013-04-24 17:58:44'),
('KTTTT', 21, '2013-04-24 17:59:22'),
('seven', 14, '2013-04-24 19:31:21'),
('seven', 21, '2013-04-24 19:32:26'),
('seven', 10, '2013-04-24 19:32:55'),
('seven', 19, '2013-04-24 19:40:37'),
('seven', 22, '2013-04-24 19:40:48'),
('cc', 21, '2013-04-24 21:25:05'),
('xuxu', 22, '2013-04-24 22:49:15'),
('twen3', 23, '2013-04-24 23:17:52'),
('twen3', 21, '2013-04-24 23:19:28'),
('andy33', 23, '2013-04-25 00:41:47'),
('martin23', 23, '2013-04-25 00:43:58'),
('martin23', 22, '2013-04-25 00:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `Updating`
--

CREATE TABLE IF NOT EXISTS `Updating` (
  `wish_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Updating`
--

INSERT INTO `Updating` (`wish_id`, `username`, `type`) VALUES
(1, 'twen3', 0),
(2, 'jodie', 0),
(1, 'jodie', 1),
(2, 'cs411', 1),
(3, 'jodie', 0),
(3, 'dddd', 0),
(4, 'dddd', 0),
(5, 'dddd', 0),
(6, 'dddd', 0),
(7, 'dddd', 0),
(8, 'hahaha', 0),
(9, 'twen3', 0),
(10, 'jodiezhao', 0),
(11, 'twen3', 0),
(12, 'chenbfeng2', 0),
(12, 'twen3', 1),
(8, 'twen3', 1),
(7, 'twen3', 1),
(6, 'twen3', 1),
(4, 'twen3', 1),
(13, 'twen3', 0),
(14, 'jodie', 0),
(13, 'jodie', 1),
(14, 'cathy', 1),
(13, 'cathy', 1),
(15, 'cathy', 0),
(16, 'cathy', 0),
(17, 'valen', 0),
(18, '8989', 0),
(19, 'abby', 0),
(20, 'andyT', 0),
(21, 'xuxu', 0),
(16, 'xuxu', 1),
(20, 'xuxu', 1),
(5, 'xuxu', 1),
(19, 'xuxu', 1),
(17, 'xuxu', 1),
(18, 'cathy', 1),
(22, 'andy33', 0),
(21, 'andy33', 1),
(19, 'andy33', 1),
(18, 'andy33', 1),
(7, 'andy33', 1),
(6, 'andy33', 1),
(22, 'KTTTT', 1),
(21, 'KTTTT', 1),
(14, 'seven', 1),
(21, 'seven', 1),
(10, 'seven', 1),
(19, 'seven', 1),
(22, 'seven', 1),
(21, 'cc', 1),
(23, 'ddd', 0),
(22, 'xuxu', 1),
(23, 'twen3', 1),
(21, 'twen3', 1),
(23, 'andy33', 1),
(23, 'martin23', 1),
(22, 'martin23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `username` varchar(20) NOT NULL,
  `password` char(15) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`, `nickname`) VALUES
('5678', '1234', 'uupp'),
('8989', '8989', '8989'),
('a', 'b', 'c'),
('abby', 'andy', 'abby'),
('abcd', 'efgh', 'jil'),
('andy33', 'andy33', 'Andy'),
('andyT', 'abby', 'andyT'),
('angel', '1234', 'Angel'),
('Annie', '591715403', 'Annie'),
('asdf', 'ghjkl', 'ghjkl'),
('cathy', 'erty', 'cathy_zhu'),
('cc', '123456', 'cc'),
('ccathyzhu', 'zztzcd826Q', 'ccathyzhu'),
('chenbfeng2', 'dabobo33', 'super great angel'),
('cs411', '1234', 'cunningham'),
('ddd', 'ddd', 'ddd'),
('dddd', 'zzzz', 'dddd'),
('dingshen', '5566', 'uiding'),
('dzhao15', 'dingshen', 'godessDean'),
('eiffy', '123456', 'eiffy'),
('emily', '4567', 'emily'),
('ermei', '123', 'moring'),
('hahaha', '2345', 'XD'),
('hehe', '1234', 'hehehe'),
('hzhan2', 'HZHAN3', 'hzhan2'),
('illini', '8888', 'illini'),
('jodie', '2222', 'zzzz'),
('jodiezhao', 'z920128d', 'jodie'),
('JodiezZ', 'z920128d', 'JodiezZ'),
('khuram', 'khuram', 'khuram'),
('kristen', '0000', 'kristen'),
('KTTTT', '920630', 'KTTT'),
('loveuu', '123456', 'loveuu'),
('martin23', 'martin23', 'martin'),
('problem123', 'pyt123', 'trouble246'),
('qiaosen3', 'weiqiaosen', 'handsome'),
('qwer', 'asdf', 'zxcv'),
('rrrr', '1234', 'eeee'),
('sadf', 'sadf', 'asdf'),
('seven', '12345678', 'seven'),
('shuocui', 'cs660628', 'abc'),
('superangel', 'dabobo', 'superangel'),
('tht', 'tht', 'tht'),
('twen3', 'stuotuo2', 'stuotuo'),
('valen', '0000', 'valen'),
('Wang Ji', 'wangji', 'closer'),
('wentianqi7', '3344', 'wen'),
('xuxu', 'xuxu', 'xuxu'),
('yangm', '199277', 'luck');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_name`
--
CREATE TABLE IF NOT EXISTS `view_name` (
`username` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `Wish_List`
--

CREATE TABLE IF NOT EXISTS `Wish_List` (
  `wish_id` int(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `status` char(10) DEFAULT 'new',
  PRIMARY KEY (`wish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Wish_List`
--

INSERT INTO `Wish_List` (`wish_id`, `nickname`, `title`, `content`, `date`, `deadline`, `status`) VALUES
(1, 'stuotuo', 'hey', '123', '2013-04-16 13:31:55', '2213-01-01 00:00:00', 'taken'),
(2, 'zzzz', '124154', '1254125122ajslpdjglaidsjglk124125', '2013-04-16 13:35:29', '1342-01-01 00:00:00', 'dead'),
(3, 'dddd', 'eeee', 'fff', '2013-04-23 12:29:56', '2033-01-01 00:00:00', 'new'),
(4, 'dddd', 'ffff', 'dddd', '2013-04-23 12:30:06', '4444-01-01 00:00:00', 'taken'),
(5, 'dddd', '44', 'dd', '2013-04-23 12:30:20', '4455-01-01 00:00:00', 'taken'),
(6, 'dddd', '44', 'ddd', '2013-04-23 12:30:31', '4444-01-01 00:00:00', 'taken'),
(7, 'dddd', '22', '33', '2013-04-23 12:30:41', '3333-01-01 00:00:00', 'taken'),
(8, 'XD', 'sleep soon', 'sleep soon ', '2013-04-23 23:27:27', '2033-01-01 00:00:00', 'taken'),
(9, 'stuotuo', 'i want a cake', 'i''m really hungry. Anyone can get me some food by this weekend?', '2013-04-24 11:46:15', '2013-04-27 00:00:00', 'new'),
(10, 'jodie', 'go home ', 'miss home', '2013-04-24 11:53:27', '2014-01-01 00:00:00', 'taken'),
(12, 'super great angel', 'a dota2 cdkey', 'i want to play this game. anyone can give me a cdkey?', '2013-04-24 14:35:23', '2015-07-05 00:00:00', 'taken'),
(13, 'stuotuo', 'i''m sexy and i know it', 'i''m sexy and i know it', '2013-04-24 14:58:13', '2014-04-20 00:00:00', 'taken'),
(14, 'zzzz', 'Watch a movie this weekend', 'Anyone would like to go with me??', '2013-04-24 15:06:49', '2013-04-27 00:00:00', 'taken'),
(15, 'cathy_zhu', 'drink hot tea', 'as title said ', '2013-04-24 16:38:49', '2344-01-01 00:00:00', 'new'),
(16, 'cathy_zhu', 'alala', 'learn english', '2013-04-24 16:40:19', '3333-01-01 00:00:00', 'taken'),
(17, 'valen', 'meet jodie', 'miss her!', '2013-04-24 16:42:49', '4444-01-01 00:00:00', 'taken'),
(18, '8989', 'where is stanley ', 'where is stanley?', '2013-04-24 16:50:20', '3333-01-01 00:00:00', 'taken'),
(19, 'abby', 'find marvin', 'need to talk to him', '2013-04-24 16:52:50', '5678-01-01 00:00:00', 'taken'),
(20, 'andyT', 'buy coffee', 'did not sleep last night ', '2013-04-24 16:55:10', '3333-01-01 00:00:00', 'taken'),
(21, 'xuxu', 'go to hk', 'any one together?', '2013-04-24 16:56:23', '2222-01-01 00:00:00', 'taken'),
(22, 'Andy', 'sleep!!!', 'i wana sleep all day~', '2013-04-24 17:16:42', '2099-12-31 00:00:00', 'taken'),
(23, 'ddd', '氓鈥撆撁ヂ解€溍喡?, '氓鈥撆撁ヂ解€溍喡?, '2013-04-24 22:48:37', '2014-01-01 00:00:00', 'taken');

-- --------------------------------------------------------

--
-- Structure for view `view_name`
--
DROP TABLE IF EXISTS `view_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`trevifountain`@`130.126.112.112` SQL SECURITY DEFINER VIEW `view_name` AS (select `Take`.`username` AS `username` from (`Take` join (`Wish_List` join `User` on((`Wish_List`.`nickname` = `User`.`nickname`)))) where ((`Take`.`wish_id` = `Wish_List`.`wish_id`) and (`User`.`username` = 'twen3'))) union all (select `Make`.`username` AS `username` from (`Make` join `Take`) where ((`Take`.`wish_id` = `Make`.`wish_id`) and (`Take`.`username` = 'twen3'))) union all (select distinct `f1`.`follower` AS `username` from (`Friends` `f1` join `Friends` `f2`) where ((`f1`.`followee` <> `f2`.`follower`) and (`f1`.`follower` = `f2`.`followee`) and (`f1`.`followee` = 'twen3')));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
