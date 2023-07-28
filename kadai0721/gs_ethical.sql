-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-28 15:49:42
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_ethical`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_ethical`
--

CREATE TABLE `gs_ethical` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `price` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_ethical`
--

INSERT INTO `gs_ethical` (`id`, `name`, `price`) VALUES
(1, '脱プラスチックコップ', 3000),
(2, 'オーガニック食材', 5000),
(3, 'バナナチップペーパー', 500),
(4, '太陽光パネル', 20000);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_ethical`
--
ALTER TABLE `gs_ethical`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_ethical`
--
ALTER TABLE `gs_ethical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
