-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-10 17:09:24
-- 伺服器版本: 5.7.14
-- PHP 版本： 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group_04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號',
  `id` int(11) NOT NULL COMMENT '商品ID',
  `merchandise` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `price` int(11) NOT NULL COMMENT '價格',
  `quantity` int(11) NOT NULL COMMENT '數量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`account`, `id`, `merchandise`, `price`, `quantity`) VALUES
('hector95576', 27, 'LeBron James詹皇 23號球衣', 900, 1),
('adminadmin', 23, 'Westbrook忍者龜 0號球衣', 900, 4),
('adminadmin', 10, 'Kobe黑金 24號球衣', 1000, 3),
('adminadmin', 23, 'Westbrook忍者龜 0號球衣', 900, 4),
('adminadmin', 10, 'Kobe黑金 24號球衣', 1000, 3),
('hector95576', 42, 'Smart聰明哥 36號球衣', 690, 10),
('hector95576', 27, 'LeBron James詹皇 23號球衣', 900, 1),
('adminadmin', 19, 'Parker法國小跑車 9號球衣', 870, 1),
('adminadmin', 23, 'Westbrook忍者龜 0號球衣', 900, 4),
('adminadmin', 10, 'Kobe黑金 24號球衣', 1000, 3),
('hector95576', 42, 'Smart聰明哥 36號球衣', 690, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
