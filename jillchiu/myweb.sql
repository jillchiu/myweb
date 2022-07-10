-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-07-09 15:37:04
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `myweb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contact`
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
(14, 'grdgdg', 'grddgg@gmail.com', 'fgrdfvdr', '2022-05-15 05:18:05'),
(15, 'jvnbkerv', 'vnrkiednv@gmail.com', 'vbvmkdenv', '2022-07-07 01:24:23'),
(16, 'vnifenvir', 'vndfnif@gmail.com', 'nvienrife', '2022-07-07 01:37:16'),
(17, 'vnrefni', 'nvirednivr@gmail.com', 'vmnrtkidenv', '2022-07-07 01:41:16');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  `user_type` varchar(1) NOT NULL,
  `user_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_type`, `user_email`) VALUES
(1, 'admin', 'admin', 'a', ''),
(2, 'vcnrjen', 'nfcrken', 'n', ''),
(3, 'qqqq4', 'aaaa4', 'n', 'zzzz@gmail.com'),
(4, 'joejoe', '', 'n', ''),
(5, 'king', '21oCJD5TAT', 'n', 'kingkong@gmail.com'),
(6, 'admin', 'a', 'n', ''),
(7, 'admin', 'aaa', 'n', ''),
(8, 'joejoejoe', 'joe', 'n', ''),
(9, 'jackjack', 'jack', 'n', ''),
(10, 'joewa', 'joe', 'n', ''),
(11, 'jess wong', '1', 'n', ''),
(12, 'david', 'david', 'n', ''),
(13, 'kai kai', '1', 'n', ''),
(14, 'bvtyung', 'nvtg', 'n', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
