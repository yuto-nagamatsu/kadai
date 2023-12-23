-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-14 12:52:48
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_ass_ank`
--

CREATE TABLE `gs_ass_ank` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `age` int(8) NOT NULL,
  `sex` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `satisfaction` int(8) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_ass_ank`
--

INSERT INTO `gs_ass_ank` (`id`, `date`, `name`, `email`, `age`, `sex`, `purpose`, `satisfaction`, `reason`) VALUES
(1, '2023-12-12 14:08:26', '永松優人', 'nagamatsu.yuto@example.com', 27, 1, '自己研鑽', 100, 'やりたいことができたから'),
(2, '2023-12-12 23:23:14', 'a', 'a', 2, 1, 'a', 4, 'a'),
(3, '2023-12-14 20:22:06', '山田太郎', 'yamada', 35, 1, 'ネットワーキング', 80, 'スピーカーが素晴らしかった'),
(7, '2023-12-16 00:00:00', '山本四郎', 'yamamoto.shiro@example.com', 29, 1, '自己研鑽', 88, '新しいことを学びたかったから'),
(8, '2023-12-16 00:00:00', '中村五郎', 'nakamura.goro@example.com', 33, 1, 'ネットワーキング', 92, '有益な人脈を作りたかったから'),
(9, '2023-12-16 00:00:00', '小林六郎', 'kobayashi.rokuro@example.com', 36, 1, '自己研鑽', 96, 'スキルアップしたかったから'),
(10, '2023-12-17 00:00:00', '加藤七郎', 'kato.shiro@example.com', 30, 1, '自己研鑽', 89, '新しいことを学びたかったから'),
(11, '2023-12-17 00:00:00', '伊藤八郎', 'ito.hachiro@example.com', 34, 1, 'ネットワーキング', 93, '有益な人脈を作りたかったから'),
(12, '2023-12-17 00:00:00', '吉田九郎', 'yoshida.kuro@example.com', 37, 1, '自己研鑽', 97, 'スキルアップしたかったから'),
(13, '2023-12-18 00:00:00', '渡辺十郎', 'watanabe.juro@example.com', 31, 1, '自己研鑽', 90, '新しいことを学びたかったから'),
(14, '2023-12-18 00:00:00', '高橋十一郎', 'takahashi.juichiro@example.com', 35, 1, 'ネットワーキング', 94, '有益な人脈を作りたかったから'),
(15, '2023-12-18 00:00:00', '斉藤十二郎', 'saito.juniro@example.com', 38, 1, '自己研鑽', 98, 'スキルアップしたかったから'),
(16, '2023-12-19 00:00:00', '佐々木十三郎', 'sasaki.jusaburo@example.com', 32, 1, '自己研鑽', 91, '新しいことを学びたかったから');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_ass_ank`
--
ALTER TABLE `gs_ass_ank`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_ass_ank`
--
ALTER TABLE `gs_ass_ank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
