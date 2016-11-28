-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 08:33 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resource_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`question_id`, `answer_id`, `answer`, `is_correct`) VALUES
(1, 1, '16 bits', 0),
(2, 1, 'True', 0),
(3, 1, 'Central Processing Unit', 0),
(4, 1, 'Start up point', 0),
(5, 1, 'Compact Disc', 0),
(6, 1, 'Processor', 1),
(7, 1, 'Computer Monitor', 0),
(8, 1, 'Central Processing Unit', 0),
(9, 1, 'SEL local = @selector(method:param:);', 0),
(10, 1, '1850s', 0),
(11, 1, 'Order of Significance', 0),
(12, 1, 'Image file', 1),
(13, 1, 'RAM, ROM, Cache, Magnetic tape, Hard disk', 0),
(14, 1, 'Sound card', 1),
(15, 1, 'Decoding Passwords', 0),
(16, 1, 'Dog', 0),
(17, 1, 'An honest, moral code that should be followed when on the computer', 0),
(18, 1, 'Creating an embarassing picture of your classmate and forwarding it to your friend''s email addresses', 0),
(19, 1, 'Community Service', 1),
(20, 1, 'You can get kicked out of college', 0),
(21, 1, '111', 0),
(22, 1, 'a', 0),
(23, 1, 'aaa', 1),
(1, 2, '8 bits', 1),
(2, 2, 'False', 1),
(3, 2, ' Critical Processing Unit', 1),
(4, 2, 'Booting', 0),
(5, 2, 'Fixed Disk', 0),
(6, 2, ' Bios', 0),
(7, 2, 'Keyboard', 1),
(8, 2, 'The Heart of the Computer', 0),
(9, 2, 'SEL local = @selector(“method:param:”);', 1),
(10, 2, '1880s', 0),
(11, 2, 'Open Software', 1),
(12, 2, 'Animation/movie file', 0),
(13, 2, 'Cache, RAM, ROM, Hard disk, Magnetic tape', 1),
(14, 2, 'CD-Rom', 0),
(15, 2, 'Decoding Audio/Video Stream', 0),
(16, 2, 'Snake', 1),
(17, 2, 'A computer program about honesty', 0),
(18, 2, 'Sending someone a mean text', 1),
(19, 2, 'Inprisonment', 0),
(20, 2, 'You can make a zero on your assignment', 0),
(21, 2, '222', 0),
(22, 2, 'b', 1),
(23, 2, 'bbbd', 0),
(1, 3, '24 bits', 0),
(3, 3, 'Crucial Processing Unit', 0),
(4, 3, 'Connecting', 1),
(5, 3, 'Hard Drive Disk', 0),
(6, 3, 'Computer Chip', 0),
(7, 3, 'Display Board', 0),
(8, 3, 'The hard drive', 1),
(9, 3, '@selector local = @SEL(method:param:);', 0),
(10, 3, '1930s', 0),
(11, 3, 'Operating System', 0),
(12, 3, 'Audio file', 0),
(13, 3, 'Magnetic tape, Hard disk, RAM, ROM, Cache', 0),
(14, 3, 'Scanner', 0),
(15, 3, 'Encrypting Data', 1),
(16, 3, 'Mouse', 0),
(17, 3, ' A computer that fits on or under a desk', 1),
(18, 3, 'Bullying someone in the hallway', 0),
(19, 3, 'Up to $10,000 in legal fees', 0),
(20, 3, 'You can get fired from your job', 0),
(21, 3, '333', 1),
(22, 3, 'c', 0),
(23, 3, 'ccc', 0),
(1, 4, '12 bits', 0),
(3, 4, ' Central Printing Unit', 0),
(4, 4, 'Resetting', 0),
(5, 4, ' Floppy Disk', 1),
(6, 4, ' Transistor', 0),
(7, 4, 'Overhead Projector', 0),
(8, 4, 'System Software', 0),
(9, 4, 'SEL local = @selector(“method:param:”);', 0),
(10, 4, '1950s', 1),
(11, 4, 'Optical Sensor', 0),
(12, 4, 'MS Office document', 0),
(15, 4, 'Saving Contact Information', 0),
(16, 4, 'Cat', 0),
(17, 4, 'A list of commandments in the Bible', 0),
(18, 4, 'Threatening someone in an instant message', 0),
(19, 4, 'Up to $50,000 in civil fees', 0),
(20, 4, 'You could get a warning from your college professor', 1),
(22, 4, 'd', 0),
(23, 4, 'ddd', 0),
(3, 5, ' Center Printing Unit', 0),
(23, 5, 'eee', 0),
(23, 6, 'fff', 0),
(23, 7, 'ggg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `first_name` varchar(110) NOT NULL,
  `middle_name` varchar(110) DEFAULT NULL,
  `last_name` varchar(110) NOT NULL,
  `birth_date` date NOT NULL,
  `married` int(11) NOT NULL COMMENT '0:single, 1: married',
  `addr01` text NOT NULL,
  `addr02` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `expected_salary` text NOT NULL,
  `interview_date` datetime NOT NULL,
  `start_work` date NOT NULL,
  `position` text NOT NULL,
  `score` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `married`, `addr01`, `addr02`, `mobile`, `expected_salary`, `interview_date`, `start_work`, `position`, `score`, `result`) VALUES
(1, 'Hung', 'Minh', 'Nguyen', '2002-01-28', 0, '5/8A Song Hanh, Quan 12', 'Ho Chi Minh', '0937954455', '2000000', '2016-09-07 16:30:00', '2016-10-01', 'Developer', 15, '0'),
(4, 'Son1', '', 'Nguyen', '1989-02-14', 0, 'Quan Go Vap', 'Ho Chi Minh', '0912345678', '2000000', '2016-11-04 16:30:00', '2016-11-01', 'Developer', 0, '0'),
(5, 'Huong', '', 'Dinh', '2016-11-15', 0, 'Addr01', 'Addr02', 'Mobile', 'Expected Salary', '2016-11-15 09:55:00', '2016-11-15', 'Position', 0, ''),
(6, 'TRUNG', '', 'TA HOANG PHUONG', '1988-01-23', 0, '974A TRUONG SA', '110 NGUYEN HUE', '0919995469', '1000$', '2016-11-24 10:00:00', '2016-12-01', 'IT STAFF', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20161011081820, 'CreateQuestions', '2016-10-11 04:03:30', '2016-10-11 04:03:30'),
(20161011101046, 'CreateQuizs', '2016-10-11 04:03:30', '2016-10-11 04:03:30'),
(20161011102903, 'CreateQuizDetail', '2016-10-11 04:03:30', '2016-10-11 04:03:31'),
(20161011105948, 'CreateAnswer', '2016-10-11 04:03:56', '2016-10-11 04:03:57'),
(20161011110450, 'CreateSections', '2016-10-11 04:05:29', '2016-10-11 04:05:29'),
(20161012041721, 'CreateCandidates', '2016-10-11 21:44:49', '2016-10-11 21:44:50'),
(20161012043029, 'CreateUsers', '2016-10-12 01:02:53', '2016-10-12 01:02:53'),
(20161024092318, 'EditQuestions', '2016-10-24 09:24:52', '2016-10-24 09:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` tinytext NOT NULL,
  `section` int(6) NOT NULL,
  `rank` int(6) NOT NULL,
  `status` int(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `section`, `rank`, `status`) VALUES
(1, 'How many bits make a byte?', 1, 1, 1),
(2, 'The largest key on the Keyboard is the shift key', 2, 1, 1),
(3, 'What is the meaning of (CPU)?', 1, 1, 1),
(4, 'The process of starting or restarting a computer is called', 1, 1, 1),
(5, 'The other name for a Hard disk is', 3, 2, 1),
(6, 'One component of the motherboard is', 2, 2, 1),
(7, 'Which of the items is an input device?', 5, 2, 1),
(8, 'The System unit is referred to as the', 2, 1, 1),
(9, 'A selector variable initialization will look like below', 1, 1, 1),
(10, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', 1, 1, 1),
(11, '''OS'' computer abbreviation usually means ?', 3, 1, 1),
(12, '''.MOV'' extension refers usually to what kind of file?', 1, 1, 1),
(13, 'Which of the following, represents the memory types in decreasing order of their accessing speed', 3, 2, 1),
(14, 'If you want to translate digital codes to audio signals and vice versa, your computer needs a', 2, 1, 1),
(15, 'What is a Codec most commonly used for?', 5, 2, 1),
(16, 'Which one of the five is least like the other four?', 3, 2, 1),
(17, 'What are computer ethics?', 2, 2, 1),
(18, 'What is NOT an example of cyberbullying?', 3, 1, 1),
(19, 'Which is NOT a consequence of copying or distributing copyrighted software?', 5, 2, 1),
(20, 'Which is NOT a consequence of plagiarism?', 3, 2, 1),
(21, 'sadsadasdasd', 1, 1, 1),
(22, 'question demo', 1, 1, 1),
(23, 'test 111', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `candidate_id` int(6) NOT NULL,
  `code` tinytext NOT NULL,
  `url` tinytext NOT NULL,
  `time` int(6) NOT NULL,
  `quiz_date` datetime NOT NULL,
  `total` int(6) NOT NULL,
  `correct` int(6) NOT NULL,
  `status` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`id`, `candidate_id`, `code`, `url`, `time`, `quiz_date`, `total`, `correct`, `status`) VALUES
(14, 1, '101014115512047', 'b3d6dgh88h', 10, '2016-10-13 10:36:00', 3, 2, 1),
(15, 1, '5512031466125', '46bfcca51a', 10, '2016-10-13 10:36:00', 4, 1, 1),
(16, 3, '3453cgceh4', '5baefhf666', 10, '0000-00-00 00:00:00', 8, 0, 0),
(17, 3, '28d74377a1', '11167cf1a2', 10, '2016-10-17 08:39:00', 5, 0, 1),
(18, 3, '8e3h864228', '55cfgg87bb', 10, '0000-00-00 00:00:00', 5, 0, 0),
(19, 1, '3d7f3b8gch', 'ef46afedfg', 10, '0000-00-00 00:00:00', 10, 0, 0),
(20, 1, 'ded4b63e5b', 'f87bd1bbd1', 10, '2016-10-19 04:09:05', 10, 1, 1),
(21, 1, 'abebbc4453', '7e855bg15f', 5, '0000-00-00 00:00:00', 8, 0, 0),
(22, 1, '5cbe5f64ad', '3b2ah4agh2', 8, '2016-10-21 13:15:07', 10, 0, 1),
(23, 1, '2d7b1d3256', '16de471g7c', 10, '0000-00-00 00:00:00', 10, 0, 0),
(24, 1, 'd83eda8hch', 'ce21cfa838', 10, '2016-10-31 16:22:01', 10, 7, 1),
(25, 1, '62d454a1c8', 'f2dd76cb42', 5, '2016-10-31 16:15:26', 5, 2, 1),
(26, 1, 'cfhfdfda7d', 'ad5ee7151e', 5, '2016-10-31 16:10:23', 5, 0, 1),
(27, 1, 'hbce3h46a2', '4g2f121b2a', 10, '2016-10-27 15:39:18', 15, 6, 1),
(30, 1, 'f4a861ccd3', '47g8bg14de', 1, '2016-10-31 14:31:19', 5, 0, 1),
(31, 1, 'ec3hh31ab1', 'b444be2h83', 10, '2016-10-31 17:13:17', 10, 2, 1),
(32, 1, 'f2d1d74f2c', 'debe7814c6', 5, '2016-10-31 17:17:47', 5, 1, 1),
(33, 1, '5d2hb3h5ag', 'f2d7e3b8c4', 5, '2016-10-31 17:19:13', 5, 3, 1),
(34, 1, '446b45824f', '8g73e7h48b', 5, '2016-11-15 09:21:06', 0, 0, 0),
(35, 1, '8a418h18h8', 'bfcf5g2fdh', 10, '2016-11-18 15:08:34', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_details`
--

INSERT INTO `quiz_details` (`quiz_id`, `question_id`, `answer`, `is_correct`) VALUES
(14, 1, 2, 1),
(14, 4, 2, 0),
(14, 6, 1, 1),
(15, 3, 1, 0),
(15, 4, 1, 0),
(15, 5, 1, 0),
(15, 6, 1, 1),
(16, 1, 1, 0),
(16, 2, 1, 0),
(16, 3, 1, 0),
(16, 4, 1, 0),
(16, 5, 1, 0),
(16, 7, 3, 0),
(16, 8, 2, 0),
(16, 9, 1, 0),
(17, 1, 0, 0),
(17, 5, 0, 0),
(17, 9, 0, 0),
(17, 10, 0, 0),
(17, 12, 0, 0),
(18, 4, 3, 1),
(18, 8, 2, 0),
(18, 10, 3, 0),
(18, 11, 2, 1),
(18, 12, 2, 0),
(19, 1, 1, 0),
(19, 2, 1, 0),
(19, 3, 3, 0),
(19, 4, 1, 0),
(19, 6, 1, 1),
(19, 7, 1, 0),
(19, 8, 1, 0),
(19, 10, 1, 0),
(19, 11, 1, 0),
(19, 12, 2, 0),
(20, 1, 2, 1),
(20, 2, 1, 0),
(20, 4, 1, 0),
(20, 5, 2, 0),
(20, 6, 1, 1),
(20, 7, 2, 1),
(20, 8, 1, 0),
(20, 9, 3, 0),
(20, 11, 2, 1),
(20, 12, 2, 0),
(21, 2, 0, 0),
(21, 3, 0, 0),
(21, 5, 0, 0),
(21, 7, 0, 0),
(21, 8, 0, 0),
(21, 9, 0, 0),
(21, 11, 0, 0),
(21, 12, 0, 0),
(22, 2, 1, 0),
(22, 6, 2, 0),
(22, 7, 3, 0),
(22, 8, 3, 1),
(22, 9, 3, 0),
(22, 10, 2, 0),
(22, 12, 3, 0),
(22, 13, 2, 1),
(22, 14, 2, 0),
(22, 15, 2, 0),
(23, 2, 0, 0),
(23, 3, 0, 0),
(23, 5, 0, 0),
(23, 8, 0, 0),
(23, 9, 0, 0),
(23, 10, 0, 0),
(23, 11, 0, 0),
(23, 13, 0, 0),
(23, 15, 0, 0),
(23, 16, 0, 0),
(24, 2, 1, 0),
(24, 4, 1, 0),
(24, 5, 4, 1),
(24, 9, 2, 1),
(24, 10, 4, 1),
(24, 11, 2, 1),
(24, 12, 2, 0),
(24, 13, 2, 1),
(24, 14, 1, 1),
(24, 16, 2, 1),
(25, 2, 1, 0),
(25, 4, 2, 0),
(25, 10, 4, 1),
(25, 15, 1, 0),
(25, 16, 2, 1),
(26, 5, 2, 0),
(26, 6, 3, 0),
(26, 12, 2, 0),
(26, 14, 2, 0),
(26, 15, 2, 0),
(27, 1, 2, 1),
(27, 2, 1, 0),
(27, 3, 1, 0),
(27, 4, 2, 0),
(27, 5, 3, 0),
(27, 6, 3, 0),
(27, 7, 3, 0),
(27, 8, 3, 1),
(27, 9, 2, 1),
(27, 10, 3, 0),
(27, 11, 2, 1),
(27, 12, 2, 0),
(27, 13, 2, 1),
(27, 15, 1, 0),
(27, 16, 2, 1),
(30, 1, 1, 0),
(30, 3, 1, 0),
(30, 9, 3, 0),
(30, 18, 0, 0),
(30, 20, 0, 0),
(31, 3, 1, 0),
(31, 4, 2, 0),
(31, 6, 3, 0),
(31, 7, 3, 0),
(31, 8, 2, 0),
(31, 9, 3, 0),
(31, 11, 2, 1),
(31, 12, 2, 0),
(31, 18, 1, 0),
(31, 19, 1, 1),
(32, 6, 1, 1),
(32, 7, 1, 0),
(32, 14, 2, 0),
(32, 15, 2, 0),
(32, 17, 1, 0),
(33, 6, 1, 1),
(33, 10, 1, 0),
(33, 13, 3, 0),
(33, 15, 3, 1),
(33, 16, 2, 1),
(34, 1, 2, 1),
(34, 3, 1, 0),
(34, 6, 1, 1),
(34, 7, 2, 1),
(34, 8, 2, 0),
(34, 10, 2, 0),
(34, 11, 3, 0),
(34, 12, 2, 0),
(34, 15, 2, 0),
(34, 22, 3, 0),
(35, 6, 1, 1),
(35, 7, 4, 0),
(35, 8, 4, 0),
(35, 10, 3, 0),
(35, 11, 3, 0),
(35, 12, 3, 0),
(35, 13, 3, 0),
(35, 14, 3, 0),
(35, 19, 2, 0),
(35, 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'PHP'),
(5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `email` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `addr01` text NOT NULL,
  `addr02` text NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` text NOT NULL,
  `dept` text NOT NULL,
  `avatar` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `addr01`, `addr02`, `birth_date`, `mobile`, `dept`, `avatar`, `created`, `updated`, `status`, `role`) VALUES
(11, 'hrga', '$2y$10$YpAj1g1OWFHTwJaDx5K/ROu/gd3BlTdfITWa1wTTLAHPgB/6SeeFy', '', 'thao.nguyen@spc-vn.com', 'Thao', 'Nguyen', 'Trần Hưng Đạo, quận Tân Bình', 'Hồ Chí Minh', '2016-10-31', '0987654321', 'HR', '', '2016-10-27 07:40:34', '2016-10-31 17:04:02', '1', 0),
(12, 'it', '$2y$10$IhF7RIERifDiU8fZQmrZoekYMnskuhA5sSa5pbDrhzUAg881MsrOy', '', 'duc.nguyen@spc-vn.com', 'Đức', 'Nguyễn', 'quận Tân Bình', 'Hồ Chí Minh', '2016-10-31', '0912345678', 'IT', '', '2016-10-27 08:04:20', '2016-10-31 17:02:24', '1', 0),
(13, 'admin', '$2y$10$a32yWG43nBn4oC8I9fbeIuNzQoWM66dWdgb/Mik31aLdK9r6faRKe', '', 'hung.nm@spc-vn.com', 'Minh Hung', 'Nguyen', '5/8A Song Hanh, quan 12', 'TP HCM', '2016-10-31', '0937954455', 'Admin', '', '2016-10-27 08:04:20', '0000-00-00 00:00:00', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`,`question_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`quiz_id`,`question_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
