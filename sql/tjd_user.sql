-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 �?08 �?06 �?09:17
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cntimehr`
--

-- --------------------------------------------------------

--
-- 表的结构 `tjd_user`
--

CREATE TABLE IF NOT EXISTS `tjd_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `last_time` int(9) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `yourname` varchar(10) NOT NULL,
  `statuspdf` tinyint(2) NOT NULL,
  `openjob` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `yourname` (`yourname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `tjd_user`
--

INSERT INTO `tjd_user` (`id`, `username`, `password`, `last_ip`, `last_time`, `status`, `yourname`, `statuspdf`, `openjob`) VALUES
(1, 'admin', '9ab4a6ad863d0b0540c287098fbc8d29', '127.0.0.1', 1407294696, 1, '管理员', 0, 0),
(23, '0170', 'c4ca4238a0b923820dcc509a6f75849b', '127.0.0.1', 1407301678, 1, '孙洋', 3, 1),
(24, 'public', '4c9184f37cff01bcdc32dc486ec36961', '127.0.0.1', 1407287624, 1, '公共账号', 0, 0),
(29, '0224', '202cb962ac59075b964b07152d234b70', '127.0.0.1', 1407300156, 1, '刘金英', 0, 0),
(28, '0139', 'c4ca4238a0b923820dcc509a6f75849b', '127.0.0.1', 1407122112, 1, '裴蓓', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
