-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-20 14:09:58
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bizdiverse`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bizdiverse_company`
--

CREATE TABLE `bizdiverse_company` (
  `company_id` int(12) NOT NULL,
  `houjin` varchar(64) NOT NULL,
  `tanto` varchar(64) NOT NULL,
  `com_email` varchar(64) NOT NULL,
  `com_tel` varchar(128) NOT NULL,
  `types` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `zipcode` int(12) NOT NULL,
  `address1` varchar(64) NOT NULL,
  `address2` varchar(64) NOT NULL,
  `address3` varchar(64) NOT NULL,
  `address4` varchar(64) NOT NULL,
  `address5` varchar(64) NOT NULL,
  `prefecture` varchar(128) NOT NULL,
  `area` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `bizdiverse_company`
--

INSERT INTO `bizdiverse_company` (`company_id`, `houjin`, `tanto`, `com_email`, `com_tel`, `types`, `pass`, `content`, `zipcode`, `address1`, `address2`, `address3`, `address4`, `address5`, `prefecture`, `area`, `city`) VALUES
(2, '株式会社BEYOND BORDERS', 'aa', 'sz91hs@gmail.com', '08058039058', '企業', '$2y$10$TbBZVYiXIz2qwCmDHDM29eld0sBC9ieCalNAOjWlodX.g9s0167p2', 'あああああ', 1020072, '東京都', '千代田区', '飯田橋', '', '', 'tokyo', 'inside', 'chiyoda,minato'),
(4, '株式会社ゼネラルパートナーズ', 'こまきテスト', 'komaki@beyondborders.jp', '8058039058', '就労移行', '$2y$10$hXPNFKE/pHfJYp/IHzi7Y.pMg24yj./5nQnIvJvZwYriC6NMGFqqm', 'ああああああ', 2140031, '神奈川県', '川崎市多摩区', '東生田', '', '', 'tokyo', 'inside', 'chiyoda');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bizdiverse_company`
--
ALTER TABLE `bizdiverse_company`
  ADD PRIMARY KEY (`company_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bizdiverse_company`
--
ALTER TABLE `bizdiverse_company`
  MODIFY `company_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
