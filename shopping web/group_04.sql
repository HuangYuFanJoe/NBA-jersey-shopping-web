-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-12 02:25:11
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
CREATE DATABASE IF NOT EXISTS `group_04` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `group_04`;

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

CREATE TABLE `board` (
  `guestID` int(11) NOT NULL COMMENT '留言編號',
  `guestAccount` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號',
  `guestName` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '暱稱',
  `guestTime` datetime NOT NULL COMMENT '留言時間',
  `guestContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '留言內容',
  `ReplyContent` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL COMMENT '版主回覆內容',
  `ReplyTime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '版主回覆時間',
  `root` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `board`
--

INSERT INTO `board` (`guestID`, `guestAccount`, `guestName`, `guestTime`, `guestContent`, `ReplyContent`, `ReplyTime`, `root`) VALUES
(1, 'rootroot', '管理者', '2017-06-11 23:42:06', 'hi', '', NULL, 1),
(2, 'rootroot', '管理者', '2017-06-11 23:42:24', '<span style = "color:red"><strong>已被刪除的留言</strong></span>', 'hello world', '2017-06-11 23:43:13', 1),
(3, 'lp860314', '小黃', '2017-06-12 02:01:19', '我們的距離到這剛剛好', '', NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `number` int(20) NOT NULL COMMENT '編號',
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號',
  `id` int(11) NOT NULL COMMENT '商品ID',
  `merchandise` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `price` int(11) NOT NULL COMMENT '價格',
  `quantity` int(11) NOT NULL COMMENT '數量',
  `situation` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '出貨狀況'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`number`, `account`, `id`, `merchandise`, `price`, `quantity`, `situation`) VALUES
(57988281, 'lp860314', 1, 'All-Star Curry 30', 1200, 3, '備貨中'),
(40149230, 'lp860314', 28, 'Kyrie 2016總冠軍版 2號球衣', 1200, 3, '備貨中');

-- --------------------------------------------------------

--
-- 資料表結構 `member_data`
--

CREATE TABLE `member_data` (
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `birth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member_data`
--

INSERT INTO `member_data` (`account`, `pwd`, `pwd2`, `name`, `gender`, `birth`, `phone`, `address`, `email`, `nickname`) VALUES
('lp860314', 'feelthe94', 'feelthe94', '黃宇帆', 'on', '1997/03/14', '0978388570', '復興路305號4樓', 'lp860314@gmail.com', '小黃'),
('rootroot', '123456', '', '', '', '', '', '', '', '管理者'),
('hector95576', 'lambo860706', 'lambo860706', '呂翰漳', 'on', '1997/07/06', '0955070600', '彰化市旭光路48號', 's0454014@gm.ncue.edu.tw', '金城武');

-- --------------------------------------------------------

--
-- 資料表結構 `merchandise_data`
--

CREATE TABLE `merchandise_data` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `merch_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(10) NOT NULL,
  `type` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `merchandise_data`
--

INSERT INTO `merchandise_data` (`id`, `pic_name`, `merch_name`, `money`, `type`) VALUES
(1, 'allstarcurry.jpg', 'All-Star Curry 30', 1200, '1'),
(2, 'allstarkd.jpg', 'All-Star KD 35', 1200, '1'),
(3, 'allstarklay.jpg', 'All-Star Klay 11', 1100, '1'),
(4, 'currry.jpg', 'Curry 30號球衣', 900, '1'),
(5, 'thompson.jpg', 'Thompson 11號球衣', 870, '1'),
(6, 'durant.jpg', 'Durant 35號球衣', 900, '1'),
(7, 'iguodala.jpg', 'Iguodala 9號球衣', 870, '1'),
(8, 'green.jpg', 'Green 23號球衣', 870, '1'),
(9, 'allstarkobe.png', 'All-Star Kobe 24', 1400, '2'),
(10, 'bryantblack.jpg', 'Kobe黑金 24號球衣', 1000, '2'),
(11, 'bryant.jpg', 'Kobe 24號球衣', 900, '2'),
(12, 'clarkson.jpg', 'Clarkson 6號球衣', 800, '2'),
(13, 'young.jpg', 'Nick Young 0號球衣', 600, '2'),
(14, 'd russell.jpg', 'D\'Angelo Russell 1號球衣', 600, '2'),
(15, 'allstarharden.jpg', 'All-Star Harden 13', 1200, '3'),
(16, 'ariza.jpg', 'Ariza 1號球衣', 300, '3'),
(17, 'beverley.jpg', 'Beverley 2號球衣', 300, '3'),
(18, 'kawhi.jpg', 'Kawhi可愛 2號球衣', 900, '4'),
(19, 'parker.jpg', 'Parker法國小跑車 9號球衣', 870, '4'),
(20, 'ginobili.jpg', 'Ginobili鬼切 20號球衣', 870, '4'),
(21, 'aldridge.jpg', 'AGG 12號球衣', 600, '4'),
(22, 'gasol.jpg', 'Gasol娘砲 16號球衣', 600, '4'),
(23, 'westbrook.jpg', 'Westbrook忍者龜 0號球衣', 900, '5'),
(24, 'adams.jpg', 'Adams 12號球衣', 600, '5'),
(25, 'ibaka.jpg', 'Ibaka18卡 9號球衣', 600, '5'),
(26, 'allstarjames.jpg', 'All-Star James 23', 1200, '6'),
(27, 'james.jpg', 'LeBron James詹皇 23號球衣', 900, '6'),
(28, 'kyrie2016.jpg', 'Kyrie 2016總冠軍版 2號球衣', 1200, '6'),
(29, 'kyrie.jpg', 'Kyrie 2號球衣', 900, '6'),
(30, 'love.jpg', 'Love愛神 0號球衣', 870, '6'),
(31, 'jrsmith', 'JR屎密斯 5號特殊款球衣', 900, '6'),
(32, 'korver.jpg', 'Korver 26號球衣', 600, '6'),
(33, 'bulter.jpg', 'Bulter 21號球衣', 900, '7'),
(34, 'wade.jpg', 'Wade閃電俠 3號球衣', 900, '7'),
(35, 'noah.jpg', 'Noah 13號球衣', 300, '7'),
(36, 'lowry.jpg', 'Lowry 7號球衣', 690, '8'),
(37, 'derozan.jpg', 'DeRozan 10號球衣', 870, '8'),
(38, 'wall.jpg', 'Wall牆哥 2號球衣', 870, '9'),
(39, 'beal.jpg', 'Beal 3號球衣', 300, '9'),
(40, 'anustart.jpg', 'Anustart 35號球衣', 87, '9'),
(41, 'thomas.jpg', 'Thomas小刺客 4號球衣', 870, '10'),
(42, 'smart.jpg', 'Smart聰明哥 36號球衣', 870, '10');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`guestID`);

--
-- 資料表索引 `merchandise_data`
--
ALTER TABLE `merchandise_data`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `guestID` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言編號', AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `merchandise_data`
--
ALTER TABLE `merchandise_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
