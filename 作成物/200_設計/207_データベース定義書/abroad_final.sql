-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 12 月 03 日 09:58
-- サーバのバージョン： 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abroad`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `affiliation_management`
--

CREATE TABLE `affiliation_management` (
  `affilation_number` int(11) NOT NULL,
  `school_number` int(11) NOT NULL,
  `department_number` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `responsible_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `affiliation_management`
--

INSERT INTO `affiliation_management` (`affilation_number`, `school_number`, `department_number`, `grade`, `responsible_number`) VALUES
(1, 1, 1, 2, 9990001),
(2, 1, 2, 3, 9990001),
(3, 1, 3, 4, 9991002),
(4, 1, 4, 1, 9991003),
(5, 1, 5, 2, 9991005),
(6, 1, 6, 1, 9991007),
(7, 1, 7, 1, 9991007),
(8, 2, 17, 2, 9991008),
(9, 3, 29, 1, 9991009),
(10, 4, 33, 1, 9991010),
(11, 5, 43, 1, 9991011),
(12, 6, 50, 2, 9991012),
(13, 7, 52, 1, 9991013),
(14, 8, 55, 1, 9991014),
(15, 9, 59, 3, 9991015),
(16, 10, 63, 1, 9991007),
(17, 11, 69, 1, 9991016),
(18, 12, 73, 1, 9991011),
(19, 12, 78, 2, 9991011),
(20, 12, 77, 2, 9991011),
(21, 3, 22, 1, 9991004),
(22, 4, 31, 1, 9991005),
(23, 4, 31, 1, 9991005),
(24, 4, 31, 1, 9991005),
(25, 4, 31, 1, 9991005),
(26, 4, 31, 1, 9991005),
(27, 4, 31, 1, 9991005),
(28, 4, 31, 1, 9991005),
(29, 4, 31, 1, 9991005),
(30, 4, 31, 1, 9991005),
(31, 4, 31, 1, 9991005),
(32, 4, 31, 1, 9991005),
(33, 4, 31, 1, 9991005),
(34, 4, 31, 1, 9991005),
(35, 4, 31, 1, 9991005),
(36, 4, 31, 1, 9991005),
(37, 3, 22, 1, 9991004),
(38, 3, 22, 1, 9991004),
(39, 3, 22, 1, 9991004),
(40, 4, 31, 1, 9991005),
(41, 4, 31, 1, 9991005),
(42, 10, 63, 1, 9991013),
(43, 5, 42, 1, 9991006),
(44, 5, 42, 1, 9991006),
(45, 5, 42, 1, 9991006),
(46, 4, 31, 1, 9991005),
(47, 4, 31, 1, 9991005),
(48, 3, 22, 1, 9991004),
(49, 3, 22, 1, 9991004),
(50, 3, 22, 1, 9991004),
(51, 5, 42, 1, 9991006),
(52, 5, 42, 1, 9991006),
(53, 6, 50, 1, 9991007),
(54, 6, 50, 1, 9991007),
(55, 6, 50, 1, 9991007),
(56, 5, 42, 3, 9991006),
(57, 8, 54, 3, 9991011),
(58, 9, 59, 4, 9991012),
(59, 9, 59, 4, 9991012),
(60, 9, 59, 3, 9991012),
(61, 9, 59, 3, 9991012),
(62, 9, 59, 3, 9991012),
(63, 9, 59, 4, 9991012),
(64, 9, 59, 4, 9991012),
(65, 9, 59, 4, 9991012),
(66, 9, 59, 4, 9991012),
(67, 9, 59, 4, 9991012),
(68, 9, 59, 4, 9991012),
(69, 9, 59, 4, 9991012),
(70, 9, 59, 4, 9991012),
(71, 9, 59, 4, 9991012),
(72, 9, 59, 4, 9991012),
(73, 9, 59, 3, 9991012),
(74, 5, 42, 4, 9991006),
(75, 7, 52, 3, 9991008),
(76, 9, 59, 1, 9991012),
(77, 9, 59, 4, 9991012),
(78, 9, 59, 3, 9991012);

-- --------------------------------------------------------

--
-- テーブルの構造 `chat_undecided`
--

CREATE TABLE `chat_undecided` (
  `chat_number` int(11) NOT NULL,
  `last_chat_number` int(11) DEFAULT NULL,
  `desired_time` datetime NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `input_time` datetime NOT NULL,
  `approval_flag` bit(1) NOT NULL DEFAULT b'0',
  `student_number` int(11) DEFAULT NULL,
  `teacher_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `chat_undecided`
--

INSERT INTO `chat_undecided` (`chat_number`, `last_chat_number`, `desired_time`, `body`, `input_time`, `approval_flag`, `student_number`, `teacher_number`) VALUES
(1, NULL, '2019-10-01 15:18:00', 'これは本文テストです', '2019-09-19 15:10:24', b'0', 1701001, 9990001),
(2, NULL, '2019-12-21 13:09:03', 'これは本文テステスです', '2019-09-18 10:50:23', b'0', 1701001, 9991002);

-- --------------------------------------------------------

--
-- テーブルの構造 `country`
--

CREATE TABLE `country` (
  `country_number` int(11) NOT NULL,
  `country_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country_picture` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `country`
--

INSERT INTO `country` (`country_number`, `country_name`, `country_picture`) VALUES
(1, 'アメリカ＿シアトル', './img/country/usa.png'),
(2, 'オーストラリア＿メルボルン', './img/country/au.png'),
(3, 'オーストラリア＿パース', './img/country/au.png'),
(4, 'カナダ＿トロント', './img/country/ch.png'),
(5, 'カナダ＿バンクーバー', './img/country/ch.png'),
(6, 'ニュージーランド＿オークランド', './img/country/nz.png'),
(7, 'マレーシア＿サンウエイ', './img/country/my.png'),
(8, 'フィリピン＿セブ', './img/country/ph.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `country_img`
--

CREATE TABLE `country_img` (
  `img_number` int(11) NOT NULL,
  `country_number` int(11) DEFAULT NULL,
  `img_path` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `country_img`
--

INSERT INTO `country_img` (`img_number`, `country_number`, `img_path`) VALUES
(1, 1, './img/country_about/test1.png'),
(2, 1, './img/country_about/test2.png'),
(3, 1, './img/country_about/test3.png'),
(4, 2, './img/country_about/test4.png'),
(5, 2, './img/country_about/test5.png'),
(6, 3, './img/country_about/test6.png'),
(7, 3, './img/country_about/test7.png'),
(8, 4, './img/country_about/test8.png'),
(9, 4, './img/country_about/test9.png'),
(10, 5, './img/country_about/test10.png'),
(11, 5, './img/country_about/test11.png'),
(12, 5, './img/country_about/test12.png'),
(13, 5, './img/country_about/test13.png'),
(14, 6, './img/country_about/test14.png'),
(15, 6, './img/country_about/test15.png'),
(16, 6, './img/country_about/test16.png'),
(17, 7, './img/country_about/test17.png'),
(18, 8, './img/country_about/test18.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `course_category`
--

CREATE TABLE `course_category` (
  `category_number` int(11) NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `course_category`
--

INSERT INTO `course_category` (`category_number`, `category_name`) VALUES
(1, '説明会'),
(2, 'イベント'),
(3, '講座'),
(4, '相談会');

-- --------------------------------------------------------

--
-- テーブルの構造 `course_overview`
--

CREATE TABLE `course_overview` (
  `course_number` int(11) NOT NULL,
  `course_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `event_date` datetime NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `category` int(11) NOT NULL,
  `img_path` varchar(50) DEFAULT NULL,
  `course_creator` int(11) NOT NULL,
  `place` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `course_overview`
--

INSERT INTO `course_overview` (`course_number`, `course_name`, `event_date`, `body`, `category`, `img_path`, `course_creator`, `place`, `end_time`) VALUES
(1, '短期留学説明会', '2019-04-20 16:15:00', '短期留学説明会開催', 1, NULL, 9991002, 'エアライン実習室', '17:15:00'),
(2, 'Lon\'sEnglish', '2019-11-20 16:40:00', 'トラベル・空港（チェックインカウンター）', 3, NULL, 9991006, '1155', '17:40:00'),
(3, '英文法講座', '2019-11-21 16:40:00', '文法の練習', 3, NULL, 9991002, '1155', '18:30:00'),
(4, 'EnglishDay', '2019-06-05 17:00:00', '【趣味・専門】海外ドラマや洋画', 2, NULL, 9991010, '1155', '18:00:00'),
(5, 'シアトル留学説明会', '2019-09-09 17:00:00', 'シアトル・Bellevue College 留学相談会', 1, NULL, 9991004, '1155', '18:00:00'),
(6, 'EnglishDay', '2019-11-13 17:10:00', ' 【スペシャルイベント】日本×イギリス×インドネシア ウォークラリーイベント！', 2, NULL, 9991009, '学食', '19:00:00'),
(7, 'teテスト講座', '2019-11-25 10:56:51', 'tテスト講座ザザザザザザ', 2, NULL, 9991002, 'テスト', '17:15:00'),
(8, 'テスト', '2020-04-11 00:00:00', 'teテスト', 1, NULL, 9991009, 'g学食', '10:00:00'),
(9, 'テスト', '2019-10-10 00:00:00', 'aa', 1, NULL, 9991002, 'ここ', '10:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `course_participant`
--

CREATE TABLE `course_participant` (
  `course_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `attendance_flag` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `course_participant`
--

INSERT INTO `course_participant` (`course_number`, `student_number`, `attendance_flag`) VALUES
(1, 1700003, b'0'),
(2, 1700002, b'0'),
(3, 1231231, b'0'),
(3, 1700003, b'0'),
(5, 1700016, b'0');

-- --------------------------------------------------------

--
-- テーブルの構造 `department`
--

CREATE TABLE `department` (
  `school_number` int(11) NOT NULL,
  `department_number` int(11) NOT NULL,
  `department_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `department`
--

INSERT INTO `department` (`school_number`, `department_number`, `department_name`) VALUES
(1, 1, 'プログラミング専攻'),
(1, 2, 'システムエンジニア専攻'),
(1, 3, '高度ITシステム専攻'),
(1, 4, 'ネットワーク専攻'),
(1, 5, 'ネットワークエンジニア専攻'),
(1, 6, '高度ネットワーク・セキュリティ専攻 セキュリティコース'),
(1, 7, '高度ネットワーク・セキュリティ専攻 ネットワークコース'),
(1, 8, '電子システムエンジニア専攻'),
(1, 9, '電子システム工学専攻'),
(1, 10, '経営ビジネス科'),
(1, 11, 'ビジネスエキスパート科'),
(1, 12, '情報ビジネス科'),
(1, 13, '経理科'),
(1, 14, '経理専攻科'),
(1, 15, '国際ビジネス科'),
(1, 16, '国際ITエンジニア科'),
(2, 17, 'システムエンジニア科'),
(2, 18, 'コンピュータシステム科'),
(2, 19, 'ゲームクリエータ科'),
(2, 20, 'CGデザイン科'),
(2, 21, 'オフィスビジネス科'),
(3, 22, 'エアライン科'),
(3, 23, 'エアポート科'),
(3, 24, 'ブライダル・ウエディング科'),
(3, 25, 'ホテル・リゾート科'),
(3, 26, 'トラベル科'),
(3, 27, '海外ビジネス科'),
(3, 28, '英語コミュニケーション科'),
(3, 29, '製菓パティシエ科'),
(3, 30, '国際ホテル・リゾート科'),
(4, 31, '医療秘書・事務科'),
(4, 32, '診療情報管理士専攻科'),
(4, 33, '診療情報管理士科'),
(4, 34, 'こども未来学科'),
(4, 35, '社会福祉科'),
(4, 36, 'ソーシャルワーカー科'),
(4, 37, '介護福祉科'),
(4, 38, '福祉心理学科'),
(4, 39, '社会福祉士 一般養成通信課程'),
(4, 40, '精神保健福祉士 短期養成通信課程'),
(4, 41, '国際介護福祉科'),
(5, 42, '建築工学科'),
(5, 43, '建築士専攻科'),
(5, 44, '建築学科'),
(5, 45, '建築CAD科'),
(5, 46, 'インテリアデザイン科'),
(5, 47, '建築学科<夜間>'),
(5, 48, 'クリエィティブデザイン学科 プロダクトデザイン専攻'),
(5, 49, 'クリエィティブデザイン学科 ビジュアルデザイン専攻'),
(6, 50, '公務員専攻科'),
(6, 51, '公務員総合科'),
(7, 52, '公務員専攻科'),
(7, 53, '公務員総合科'),
(8, 54, '医事スペシャリスト科'),
(8, 55, '介護福祉科'),
(8, 56, 'エアライン科'),
(8, 57, 'ホテル・ブライダル科'),
(8, 58, '国際ビジネス科'),
(9, 59, '１級自動車整備科'),
(9, 60, '２級自動車整備科'),
(9, 61, '自動車工学・機械設計科'),
(9, 62, '国際自動車整備科'),
(10, 63, '理学療法学科（昼間）'),
(10, 64, '理学療法学科（夜間）'),
(10, 65, '作業療法学科（昼間）'),
(10, 66, '作業療法学科（夜間）'),
(10, 67, '言語聴覚学科（昼間）'),
(10, 68, '言語聴覚学科（夜間）'),
(11, 69, '看護科'),
(12, 70, 'ゲーム・CG・アニメ専攻科 ゲームコース'),
(12, 71, 'ゲーム・CG・アニメ科 ゲームコース'),
(12, 72, 'ゲーム・CG・アニメ専攻科 CGコース'),
(12, 73, 'ゲーム・CG・アニメ科 CGコース'),
(12, 74, 'ゲーム・CG・アニメ専攻科 アニメコース'),
(12, 75, 'ゲーム・CG・アニメ科 アニメコース'),
(12, 76, 'マンガ・イラスト・CG科 CGコース'),
(12, 77, 'マンガ・イラスト・CG科 マンガコース'),
(12, 78, 'マンガ・イラスト・CG科 イラストコース'),
(12, 79, 'マンガ専攻科');

-- --------------------------------------------------------

--
-- テーブルの構造 `learning_category`
--

CREATE TABLE `learning_category` (
  `category_number` int(11) NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `learning_category`
--

INSERT INTO `learning_category` (`category_number`, `category_name`) VALUES
(1, 'スピーキング'),
(2, 'リスニング'),
(3, 'リーディング'),
(4, 'ライティング'),
(5, '単語'),
(6, '講座');

-- --------------------------------------------------------

--
-- テーブルの構造 `learning_record`
--

CREATE TABLE `learning_record` (
  `management_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `category_number` int(11) NOT NULL,
  `learning_time` int(11) NOT NULL,
  `learning_date` date DEFAULT NULL,
  `learning_detail` varchar(300) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `learning_record`
--

INSERT INTO `learning_record` (`management_number`, `student_number`, `category_number`, `learning_time`, `learning_date`, `learning_detail`) VALUES
(1, 1700002, 1, 60, NULL, NULL),
(2, 1701001, 4, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `push_notification`
--

CREATE TABLE `push_notification` (
  `push_number` int(11) NOT NULL,
  `all_push_flag` bit(1) NOT NULL DEFAULT b'0',
  `course_number` int(11) NOT NULL,
  `teacher_number` int(11) NOT NULL,
  `push_time` datetime NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `push_notification`
--

INSERT INTO `push_notification` (`push_number`, `all_push_flag`, `course_number`, `teacher_number`, `push_time`, `body`) VALUES
(1, b'0', 3, 9990001, '2019-01-01 06:16:34', 'プッシュ送信テスト'),
(2, b'0', 2, 9991002, '2019-11-20 18:29:11', 'プッシュしゅsyすyすしゅsう');

-- --------------------------------------------------------

--
-- テーブルの構造 `push_send_list`
--

CREATE TABLE `push_send_list` (
  `pushnumber` int(11) NOT NULL,
  `management_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `push_send_list`
--

INSERT INTO `push_send_list` (`pushnumber`, `management_number`, `student_number`) VALUES
(1, 2, 1700002),
(1, 1, 1701001);

-- --------------------------------------------------------

--
-- テーブルの構造 `school`
--

CREATE TABLE `school` (
  `school_number` int(11) NOT NULL,
  `school_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `school`
--

INSERT INTO `school` (`school_number`, `school_name`) VALUES
(1, '麻生情報ビジネス専門学校_福岡校'),
(2, '麻生情報ビジネス専門学校_北九州校'),
(3, '麻生外語観光＆製菓専門学校'),
(4, '麻生医療福祉専門学校_福岡校'),
(5, '麻生建築＆デザイン専門学校'),
(6, '麻生公務員専門学校_福岡校'),
(7, '麻生公務員専門学校_北九州校'),
(8, '麻生医療福祉＆観光カレッジ'),
(9, '麻生工科自動車大学校'),
(10, '麻生リハビリテーション大学校'),
(11, '麻生看護大学校'),
(12, 'ASOポップカルチャー専門学校');

-- --------------------------------------------------------

--
-- テーブルの構造 `study_abroad_plan`
--

CREATE TABLE `study_abroad_plan` (
  `management_number` int(11) NOT NULL,
  `target_school` int(11) NOT NULL,
  `start_study_abroad` date NOT NULL,
  `target_amount` int(11) NOT NULL,
  `period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `study_abroad_plan`
--

INSERT INTO `study_abroad_plan` (`management_number`, `target_school`, `start_study_abroad`, `target_amount`, `period`) VALUES
(1, 1, '2019-01-01', 2850000, NULL),
(2, 1, '2019-06-14', 9990000, NULL),
(3, 1, '2019-02-01', 2220000, NULL),
(4, 2, '2019-01-01', 2600000, NULL),
(5, 16, '2019-01-01', 2400000, NULL),
(6, 4, '2019-01-01', 2400000, NULL),
(7, 5, '2019-01-01', 2600000, NULL),
(8, 6, '2019-01-01', 2800000, NULL),
(9, 7, '2019-01-01', 2700000, NULL),
(10, 8, '2019-01-01', 2700000, NULL),
(11, 9, '2019-01-01', 2600000, NULL),
(12, 10, '2019-01-01', 2200000, NULL),
(13, 11, '2019-01-01', 1600000, NULL),
(14, 12, '2019-01-01', 2650000, NULL),
(15, 13, '2019-01-01', 2600000, NULL),
(16, 14, '2019-01-01', 2600000, NULL),
(17, 15, '2019-01-01', 2600000, NULL),
(18, 16, '2019-01-01', 2500000, NULL),
(19, 17, '2019-01-01', 2550000, NULL),
(20, 18, '2019-01-01', 2800000, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `target_school`
--

CREATE TABLE `target_school` (
  `target_school_number` int(11) NOT NULL,
  `country_number` int(11) NOT NULL,
  `school_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `target_school`
--

INSERT INTO `target_school` (`target_school_number`, `country_number`, `school_name`) VALUES
(1, 1, 'Bellevue College'),
(2, 2, 'Discover English'),
(3, 2, 'Melbourne Language Center'),
(4, 3, 'North Metropolitan TAFE'),
(5, 3, 'Phoenix Academy'),
(6, 4, 'Kaplan International Languages'),
(7, 4, 'SSLC'),
(8, 5, 'Kaplan International Languages'),
(9, 5, 'SSLC'),
(10, 6, 'Auckland Institute of Studies'),
(11, 7, 'Sunway University'),
(12, 8, 'IDEA Academia'),
(13, 8, 'IDEA Cebu'),
(14, 8, 'QQ English ITパーク校'),
(15, 8, 'QQ English シーフロント校'),
(16, 8, '3D Academy'),
(17, 8, 'CELLA（CAコース）'),
(18, 8, 'Kredo（WEBベーシックコース）');

-- --------------------------------------------------------

--
-- テーブルの構造 `teacher`
--

CREATE TABLE `teacher` (
  `teacher_number` int(11) NOT NULL,
  `school_number` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `teacher`
--

INSERT INTO `teacher` (`teacher_number`, `school_number`, `name`, `email`, `password`) VALUES
(9990001, 1, '麻生一郎', '9991000@o.asojuku.ac.jp', '$2y$10$e/aljnkKFlx3jEjBZ/YidezaoZlsKE3bbp2iK632MAhfYaqvfL17K'),
(9991002, 1, '麻生二郎', '9991002@o.asojuku.ac.jp', '$2y$10$e/aljnkKFlx3jEjBZ/YidezaoZlsKE3bbp2iK632MAhfYaqvfL17K'),
(9991003, 2, '麻生三郎', '9991003@o.asojuku.ac.jp', 'password'),
(9991004, 3, '麻生四郎', '9991004@o.asojuku.ac.jp', 'password'),
(9991005, 4, '麻生五郎', '9991005@o.asojuku.ac.jp', 'password'),
(9991006, 5, '麻生六郎', '9991006@o.asojuku.ac.jp', 'password'),
(9991007, 6, '麻生七郎', '9991007@o.asojuku.ac.jp', 'password'),
(9991008, 7, '麻生八郎', '9991008@o.asojuku.ac.jp', 'password'),
(9991009, 7, '麻生九郎', '9991009@o.asojuku.ac.jp', 'password'),
(9991010, 7, '麻生小太郎', '9991010@o.asojuku.ac.jp', 'password'),
(9991011, 8, '平井桃', '9991011@o.asojuku.ac.jp', 'password'),
(9991012, 9, '麻生太郎', '9991012@o.asojuku.ac.jp', 'password'),
(9991013, 10, '麻生中太郎', '9991013@o.asojuku.ac.jp', 'password'),
(9991014, 11, '麻生花子', '9991014@o.asojuku.ac.jp', 'password'),
(9991015, 11, '佐藤春夫', '9991015@o.asojuku.ac.jp', 'password'),
(9991016, 12, '伊藤夏生', '9991016@o.asojuku.ac.jp', 'password');

-- --------------------------------------------------------

--
-- テーブルの構造 `teacher_responsible_country`
--

CREATE TABLE `teacher_responsible_country` (
  `teacher_number` int(11) NOT NULL,
  `country_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `teacher_responsible_country`
--

INSERT INTO `teacher_responsible_country` (`teacher_number`, `country_number`) VALUES
(9990001, 1),
(9991002, 2),
(9991003, 2),
(9991016, 2),
(9991004, 3),
(9991005, 3),
(9991006, 4),
(9991007, 5),
(9991008, 6),
(9991009, 7),
(9991010, 7),
(9991013, 8),
(9991015, 8);

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `student_number` int(11) NOT NULL,
  `affiliation_number` int(11) NOT NULL,
  `kanji_sei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kanji_mei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kana_sei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kana_mei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `study_abroad_plan` int(11) DEFAULT NULL,
  `first_login_flag` bit(1) DEFAULT b'0',
  `password` varchar(260) NOT NULL,
  `LINE_ID` varchar(100) DEFAULT NULL,
  `start_abroad_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`student_number`, `affiliation_number`, `kanji_sei`, `kanji_mei`, `kana_sei`, `kana_mei`, `study_abroad_plan`, `first_login_flag`, `password`, `LINE_ID`, `start_abroad_date`) VALUES
(1231231, 77, 'passは', '1234', 'てす', 'たろう', NULL, b'0', '$2y$10$elDbMirk.UHBKv6OSpb9eOPLxve11q60GykAQuYx/R1aQUC996qsK', 'U5df51de2125a8a805ed88616ffa63bc6', NULL),
(1700002, 2, '宮田', '修', 'ミヤタ', 'オサム', 2, b'0', '909', NULL, NULL),
(1700003, 3, '川越', '圭', 'カワゴエ', 'ケイ', 3, b'0', 'password', NULL, NULL),
(1700004, 20, '吉野', '冬華', 'ヨシノ', 'フユカ', NULL, b'0', 'password', NULL, NULL),
(1700005, 4, '織田', '圭介', 'オダ', 'ケイスケ', 4, b'0', 'password', NULL, NULL),
(1700006, 5, '市村', '俊朗', 'イチムラ', 'トシロウ', 6, b'0', 'password', NULL, NULL),
(1700007, 6, '中瀬古', '貴之', 'ナカセコ', 'タカユキ', 5, b'0', 'password', NULL, NULL),
(1700008, 7, '暇', '吉郎', 'ヒマ', 'ヨシロウ', 17, b'0', 'password', NULL, NULL),
(1700009, 8, '家康', '慶次', 'イエヤス', 'ケイジ', 10, b'0', 'password', NULL, NULL),
(1700010, 9, '内山', '圭', 'ウチヤマ', 'ケイ', 2, b'0', 'password', NULL, NULL),
(1700011, 10, '新倉', '二郎', 'ニイクラ', 'ジロウ', 3, b'0', 'password', NULL, NULL),
(1700012, 11, '野田', '俊', 'ノダ', 'シュン', 8, b'0', 'password', NULL, NULL),
(1700013, 12, '西尾', '玲子', 'ニシオ', 'レイコ', 8, b'0', 'password', NULL, NULL),
(1700014, 13, '桜庭', 'ゆい', 'サクラバ', 'ユイ', 6, b'0', 'password', NULL, NULL),
(1700015, 14, '竹内', '恵美', 'タケノウチ', 'エミ', NULL, b'0', 'password', NULL, NULL),
(1700016, 15, '音村', '涼', 'オトムラ', 'スズミ', NULL, b'0', 'password', NULL, NULL),
(1700017, 16, '城', '紫葵', 'ジョウ', 'チナ', 15, b'0', 'password', NULL, NULL),
(1700018, 17, '大滝', '眞美子', 'オオタキ', 'マミコ', 18, b'0', 'password', NULL, NULL),
(1700019, 18, '須山', '絵里', 'スヤマ', 'エリ', NULL, b'0', 'password', NULL, NULL),
(1700020, 19, '風', '香織', 'カゼ', 'カオリ', 20, b'0', 'password', NULL, NULL),
(1701001, 1, '野田', '弘樹', 'ノダ', 'ヒロキ', 1, b'0', 'password', NULL, NULL),
(12312312, 78, 'passは', '1234', 'てす', 'たろう', NULL, b'0', '$2y$10$kqRIPg/sRjIcZfYjYVsBre3uDzyxvHqgYnAf7g1LKY/.L8abyhp2.', 'U5df51de2125a8a805ed88616ffa63bc6', NULL),
(1111111111, 73, 'て酢', '太郎', 'てす', 'たろう', NULL, b'0', '123', 'U5df51de2125a8a805ed88616ffa63bc6', NULL),
(2147483647, 56, '苗字', '名前', 'みょうじ', 'なまえ', NULL, b'0', '4545', 'U5df51de2125a8a805ed88616ffa63bc6', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `word_lerning`
--

CREATE TABLE `word_lerning` (
  `student_number` int(11) NOT NULL,
  `word_number` int(11) NOT NULL,
  `answer_count` int(11) NOT NULL,
  `correctness_decision` bit(10) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `word_lerning`
--

INSERT INTO `word_lerning` (`student_number`, `word_number`, `answer_count`, `correctness_decision`) VALUES
(1700002, 1, 1111, b'0000000000'),
(1701001, 1, 20, b'0000000000'),
(1701001, 2, 111, b'0000000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `word_name`
--

CREATE TABLE `word_name` (
  `management_number` int(11) NOT NULL,
  `word_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `japanese_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phonetic_symbol` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `word_name`
--

INSERT INTO `word_name` (`management_number`, `word_name`, `japanese_name`, `phonetic_symbol`) VALUES
(1, 'face', '顔', 'fers'),
(2, 'study', '勉強する', 'stˈʌdi'),
(3, 'word', '単語', 'wˈɚːd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliation_management`
--
ALTER TABLE `affiliation_management`
  ADD PRIMARY KEY (`affilation_number`),
  ADD KEY `department_number` (`department_number`,`school_number`),
  ADD KEY `affiliationidentification_ibfk_2` (`responsible_number`),
  ADD KEY `affiliation_management__schoolfk` (`school_number`);

--
-- Indexes for table `chat_undecided`
--
ALTER TABLE `chat_undecided`
  ADD PRIMARY KEY (`chat_number`),
  ADD KEY `student_number` (`student_number`),
  ADD KEY `teacher_number` (`teacher_number`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_number`),
  ADD UNIQUE KEY `country_number` (`country_number`),
  ADD UNIQUE KEY `country_country_name_uindex` (`country_name`);

--
-- Indexes for table `country_img`
--
ALTER TABLE `country_img`
  ADD PRIMARY KEY (`img_number`),
  ADD KEY `country_img_country_country_number_fk` (`country_number`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`category_number`);

--
-- Indexes for table `course_overview`
--
ALTER TABLE `course_overview`
  ADD PRIMARY KEY (`course_number`),
  ADD KEY `category` (`category`),
  ADD KEY `course_creator` (`course_creator`);

--
-- Indexes for table `course_participant`
--
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`course_number`,`student_number`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`school_number`,`department_number`) USING BTREE,
  ADD UNIQUE KEY `department_number` (`department_number`);

--
-- Indexes for table `learning_category`
--
ALTER TABLE `learning_category`
  ADD PRIMARY KEY (`category_number`);

--
-- Indexes for table `learning_record`
--
ALTER TABLE `learning_record`
  ADD PRIMARY KEY (`management_number`),
  ADD KEY `category_number` (`category_number`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `push_notification`
--
ALTER TABLE `push_notification`
  ADD PRIMARY KEY (`push_number`),
  ADD KEY `teacher_number` (`teacher_number`),
  ADD KEY `push_notification__coursenumberfk` (`course_number`);

--
-- Indexes for table `push_send_list`
--
ALTER TABLE `push_send_list`
  ADD PRIMARY KEY (`pushnumber`,`management_number`),
  ADD KEY `push_send_list_user_student_number_fk` (`student_number`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_number`);

--
-- Indexes for table `study_abroad_plan`
--
ALTER TABLE `study_abroad_plan`
  ADD PRIMARY KEY (`management_number`),
  ADD UNIQUE KEY `management_number` (`management_number`) USING BTREE,
  ADD KEY `study_abroad_plan_target_school_target_school_number_fk` (`target_school`);

--
-- Indexes for table `target_school`
--
ALTER TABLE `target_school`
  ADD PRIMARY KEY (`target_school_number`),
  ADD KEY `country_number` (`country_number`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_number`),
  ADD UNIQUE KEY `responsible_number` (`teacher_number`),
  ADD KEY `teacher_school_school_number_fk` (`school_number`);

--
-- Indexes for table `teacher_responsible_country`
--
ALTER TABLE `teacher_responsible_country`
  ADD PRIMARY KEY (`teacher_number`),
  ADD KEY `country_number` (`country_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`student_number`),
  ADD KEY `affiliation_number` (`affiliation_number`),
  ADD KEY `student_number` (`student_number`),
  ADD KEY `user_study_abroad_plan_management_number_fk` (`study_abroad_plan`);

--
-- Indexes for table `word_lerning`
--
ALTER TABLE `word_lerning`
  ADD PRIMARY KEY (`student_number`,`word_number`),
  ADD KEY `word_number` (`word_number`);

--
-- Indexes for table `word_name`
--
ALTER TABLE `word_name`
  ADD PRIMARY KEY (`management_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliation_management`
--
ALTER TABLE `affiliation_management`
  MODIFY `affilation_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `chat_undecided`
--
ALTER TABLE `chat_undecided`
  MODIFY `chat_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country_img`
--
ALTER TABLE `country_img`
  MODIFY `img_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_overview`
--
ALTER TABLE `course_overview`
  MODIFY `course_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `learning_category`
--
ALTER TABLE `learning_category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `learning_record`
--
ALTER TABLE `learning_record`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `push_notification`
--
ALTER TABLE `push_notification`
  MODIFY `push_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `study_abroad_plan`
--
ALTER TABLE `study_abroad_plan`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `target_school`
--
ALTER TABLE `target_school`
  MODIFY `target_school_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `word_name`
--
ALTER TABLE `word_name`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `affiliation_management`
--
ALTER TABLE `affiliation_management`
  ADD CONSTRAINT `affiliation_management__schoolfk` FOREIGN KEY (`school_number`) REFERENCES `school` (`school_number`),
  ADD CONSTRAINT `affiliation_management_ibfk_1` FOREIGN KEY (`department_number`) REFERENCES `department` (`department_number`),
  ADD CONSTRAINT `affiliation_management_ibfk_2` FOREIGN KEY (`responsible_number`) REFERENCES `teacher` (`teacher_number`);

--
-- テーブルの制約 `chat_undecided`
--
ALTER TABLE `chat_undecided`
  ADD CONSTRAINT `chat_undecided_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`),
  ADD CONSTRAINT `chat_undecided_ibfk_2` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);

--
-- テーブルの制約 `country_img`
--
ALTER TABLE `country_img`
  ADD CONSTRAINT `country_img_country_country_number_fk` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`);

--
-- テーブルの制約 `course_overview`
--
ALTER TABLE `course_overview`
  ADD CONSTRAINT `course_overview_ibfk_1` FOREIGN KEY (`category`) REFERENCES `course_category` (`category_number`),
  ADD CONSTRAINT `course_overview_ibfk_2` FOREIGN KEY (`course_creator`) REFERENCES `teacher` (`teacher_number`);

--
-- テーブルの制約 `course_participant`
--
ALTER TABLE `course_participant`
  ADD CONSTRAINT `course_participant_ibfk_1` FOREIGN KEY (`course_number`) REFERENCES `course_overview` (`course_number`),
  ADD CONSTRAINT `course_participant_ibfk_2` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);

--
-- テーブルの制約 `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_school_school_number_fk` FOREIGN KEY (`school_number`) REFERENCES `school` (`school_number`);

--
-- テーブルの制約 `learning_record`
--
ALTER TABLE `learning_record`
  ADD CONSTRAINT `learning_record_ibfk_1` FOREIGN KEY (`category_number`) REFERENCES `learning_category` (`category_number`),
  ADD CONSTRAINT `learning_record_ibfk_2` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);

--
-- テーブルの制約 `push_notification`
--
ALTER TABLE `push_notification`
  ADD CONSTRAINT `push_notification__coursenumberfk` FOREIGN KEY (`course_number`) REFERENCES `course_overview` (`course_number`),
  ADD CONSTRAINT `push_notification_ibfk_1` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);

--
-- テーブルの制約 `push_send_list`
--
ALTER TABLE `push_send_list`
  ADD CONSTRAINT `push_send_list_push_notification_push_number_fk` FOREIGN KEY (`pushnumber`) REFERENCES `push_notification` (`push_number`),
  ADD CONSTRAINT `push_send_list_user_student_number_fk` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);

--
-- テーブルの制約 `study_abroad_plan`
--
ALTER TABLE `study_abroad_plan`
  ADD CONSTRAINT `study_abroad_plan_target_school_target_school_number_fk` FOREIGN KEY (`target_school`) REFERENCES `target_school` (`target_school_number`);

--
-- テーブルの制約 `target_school`
--
ALTER TABLE `target_school`
  ADD CONSTRAINT `target_school_ibfk_1` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`);

--
-- テーブルの制約 `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_school_school_number_fk` FOREIGN KEY (`school_number`) REFERENCES `school` (`school_number`);

--
-- テーブルの制約 `teacher_responsible_country`
--
ALTER TABLE `teacher_responsible_country`
  ADD CONSTRAINT `teacher_responsible_country_ibfk_1` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`),
  ADD CONSTRAINT `teacher_responsible_country_ibfk_2` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);

--
-- テーブルの制約 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`affiliation_number`) REFERENCES `affiliation_management` (`affilation_number`),
  ADD CONSTRAINT `user_study_abroad_plan_management_number_fk` FOREIGN KEY (`study_abroad_plan`) REFERENCES `study_abroad_plan` (`management_number`);

--
-- テーブルの制約 `word_lerning`
--
ALTER TABLE `word_lerning`
  ADD CONSTRAINT `word_lerning_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`),
  ADD CONSTRAINT `word_lerning_ibfk_2` FOREIGN KEY (`word_number`) REFERENCES `word_name` (`management_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
