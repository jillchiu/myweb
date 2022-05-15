-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022 年 05 朁E15 日 14:48
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `myweb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `date`) VALUES
(5, 'grdgdr', 'gbsgsn@gbrdbg.com', 'bcfbfb', '2022-02-01 06:21:28'),
(6, 'ｇｄｇｒｄ', 'mbgfombfo@gndi.jp', '妤存1', '2022-02-02 09:26:53'),
(7, 'gmldrmgold', 'hkblmtfgt@grdogmrd.jp', 'ngrdngd', '2022-02-02 05:28:44'),
(8, 'gndkgnrdingv', 'nbgtdnbhfn@gduirgr.jp', 'gnrdngodr', '2022-02-02 10:14:08'),
(9, 'gdrgdg', 'gdgdr@gmail.com', 'gjrdogdr', '2022-02-12 04:17:56'),
(10, 'grdgrd', 'fsegrds@gmail.com', 'fskns', '2022-02-12 04:28:07'),
(11, '', 'fesfes@gmaige.com', 'fesfsef', '2022-02-12 04:28:31'),
(12, 'gesgseg', 'egesge@gmfves.com', 'fnesinfes', '2022-02-12 04:29:23'),
(13, 'gesgseg', 'egesge@gmfves.com', 'fnesinfes', '2022-02-12 04:29:34'),
(14, 'grdgdg', 'grddgg@gmail.com', 'fgrdfvdr', '2022-05-15 05:18:05');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
