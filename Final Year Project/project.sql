-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016 年 05 朁E26 日 15:39
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `rid` int(3) NOT NULL,
  `eid` int(3) NOT NULL,
  `eid2` int(3) NOT NULL,
  `eid3` int(3) NOT NULL,
  `check_in_date` date NOT NULL,
  `book_date` date NOT NULL,
  `people` int(1) NOT NULL,
  `total_price` int(5) NOT NULL,
  `payment` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`bid`, `uid`, `rid`, `eid`, `eid2`, `eid3`, `check_in_date`, `book_date`, `people`, `total_price`, `payment`) VALUES
(35, 5, 5, 0, 0, 0, '2016-05-26', '2016-05-26', 1, 200, 'n'),
(37, 5, 9, 0, 2, 0, '2016-05-26', '2016-05-26', 2, 450, 'n');

-- --------------------------------------------------------

--
-- 資料表結構 `extra_service`
--

CREATE TABLE IF NOT EXISTS `extra_service` (
  `eid` int(3) NOT NULL,
  `service_name` char(15) NOT NULL,
  `status` char(1) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `extra_service`
--

INSERT INTO `extra_service` (`eid`, `service_name`, `status`, `price`) VALUES
(1, 'swimming', 'o', 30),
(2, 'spa', 'o', 50),
(3, 'buffet', 'o', 60);

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `rid` int(3) NOT NULL,
  `room_number` char(4) NOT NULL,
  `type` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `room`
--

INSERT INTO `room` (`rid`, `room_number`, `type`, `status`, `price`) VALUES
(1, '2a', '2', 'o', 200),
(2, '2b', '2', 'o', 200),
(3, '2c', '2', 'o', 200),
(4, '2d', '2', 'o', 200),
(5, '2e', '2', 'o', 200),
(6, '4a', '4', 'c', 400),
(7, '4b', '4', 'o', 400),
(8, '4c', '4', 'o', 400),
(9, '4d', '4', 'o', 400),
(10, '4e', '4', 'o', 400);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(5) NOT NULL,
  `login_name` varchar(15) NOT NULL,
  `real_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`uid`, `login_name`, `real_name`, `password`, `sex`, `mail`, `type`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'm', 'admin@gmail.com', 'a'),
(5, 'joe', 'wong', '202cb962ac59075b964b07152d234b70', 'm', 'joewong@gmail.com', 'u'),
(6, '231', '32131', '202cb962ac59075b964b07152d234b70', 'm', '1123@gmail.com', 'u');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- 資料表索引 `extra_service`
--
ALTER TABLE `extra_service`
  ADD PRIMARY KEY (`eid`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- 使用資料表 AUTO_INCREMENT `extra_service`
--
ALTER TABLE `extra_service`
  MODIFY `eid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
