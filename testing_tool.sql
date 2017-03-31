-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2017 at 03:26 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testing_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `sus_response` varchar(30) NOT NULL,
  `sus_score` float NOT NULL,
  `sus_comp` int(11) NOT NULL,
  `prc_first` mediumtext NOT NULL,
  `prc_second` tinytext NOT NULL,
  `prc_comp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `participant_id`, `test_id`, `sus_response`, `sus_score`, `sus_comp`, `prc_first`, `prc_second`, `prc_comp`) VALUES
(5, 1, 17, '0,2,1,1,3,2,3,2,2,3', 47.5, 1, '', 'Busy,Usable,Dull,Approachable,Friendly,Compelling,Incomprehensible,Fast,Disruptive,Unapproachable,Dated,Not Valuable,Patronising', 1),
(6, 2, 17, '3,3,3,3,1,1,3,1,2,3', 52.5, 1, 'Usable,Stable,Reliable,Inconsistent,Disruptive,Difficult,Understandable,Fragile', '', 1),
(7, 3, 17, '3,3,0,2,2,2,2,2,4,1', 52.5, 1, 'Interesting,Unqiue, Easy to understand,High Quality,Dull,Tedious', 'Dull,Interesting,High Quality, Easy to understand,Unqiue', 1),
(8, 4, 17, '2,3,1,2,3,1,3,3,0,2', 45, 1, 'High Quality,Tedious,Exciting,Interesting, Easy to understand,Slow,Annoying', 'Annoying,High Quality,Tedious, Easy to understand,Slow,Exciting', 1),
(9, 5, 17, '2,4,0,2,3,1,0,0,0,0', 45, 1, 'Tedious,Pleasant,Annoying,Slow,High Quality,Interesting,Unqiue', 'High Quality,Unqiue,Annoying,Interesting,Pleasant', 1),
(10, 6, 17, '1,1,2,3,3,2,3,2,3,2', 55, 1, 'Dull,Interesting, Easy to understand,Slow,Pleasant', 'Interesting,Slow,Pleasant, Easy to understand,Dull', 1),
(11, 7, 17, '2,2,2,1,1,2,2,2,3,2', 52.5, 1, 'Appealing,Unpredictable,Boring,Frustrating,Stimulating,Professional,Distracting,Intuitive,Controllable,Satisfying,Effective,Awkward,Illogical,Integrated', 'Unpredictable,Boring,Distracting,Effective,Appealing,Awkward,Frustrating,Satisfying', 1),
(12, 1, 18, '', 0, 0, '', '', 0),
(13, 2, 18, '', 0, 0, '', '', 0),
(14, 3, 18, '', 0, 0, '', '', 0),
(15, 4, 18, '', 0, 0, '', '', 0),
(16, 5, 18, '', 0, 0, '', '', 0),
(17, 6, 18, '', 0, 0, '', '', 0),
(18, 7, 18, '', 0, 0, '', '', 0),
(19, 8, 18, '', 0, 0, '', '', 0),
(20, 9, 18, '', 0, 0, '', '', 0),
(21, 1, 19, '0,3,2,2,3,1,3,2,0,4', 40, 1, 'Dull, Easy to understand,Interesting,Slow,Exciting,Pleasant,Tedious,Annoying', ' Easy to understand,Exciting,Interesting,Tedious,Pleasant', 1),
(22, 2, 19, '1,4,2,2,2,3,1,3,0,3', 27.5, 1, 'High Quality,Frustrating,Interesting,Annoying,Playful, Easy to understand,Exciting,Unqiue', 'Interesting,High Quality,Playful, Easy to understand,Exciting', 1),
(23, 10, 18, '', 0, 0, '', '', 0),
(24, 1, 20, '', 0, 0, '', '', 0),
(25, 2, 20, '', 0, 0, '', '', 0),
(26, 3, 20, '', 0, 0, '', '', 0),
(27, 4, 20, '', 0, 0, '', '', 0),
(28, 1, 23, '2,4,4,2,0,1,2,3,2,2', 45, 1, 'Frustrating,Annoying,High Quality,Exciting,Dull,Pleasant,Playful,Slow', 'Annoying,Frustrating,High Quality,Dull,Slow', 1),
(29, 2, 23, '2,2,4,1,3,1,1,2,3,2', 62.5, 1, 'Playful,Unqiue,Tedious,Interesting,Annoying,Exciting,Slow', 'Unqiue,Tedious,Playful,Slow,Exciting', 1),
(30, 8, 17, '3,1,2,2,1,3,1,3,0,2', 40, 1, 'Slow,Annoying,Pleasant,High Quality,Frustrating,Unqiue, Easy to understand,Exciting,Interesting', 'Annoying,Exciting, Easy to understand,High Quality,Slow', 1),
(31, 9, 17, '0,1,2,1,2,2,3,2,3,3', 52.5, 1, 'Dull,Exciting, Easy to understand,Slow,Pleasant,Playful,Interesting', 'Slow,Pleasant,Interesting,Exciting, Easy to understand', 1),
(32, 10, 17, '2,1,3,3,2,2,1,2,3,1', 55, 1, 'Interesting,Dull,Frustrating,Pleasant,Unqiue,Exciting,Annoying', 'Interesting,Frustrating,Dull,Annoying,Unqiue', 1),
(33, 1, 0, '', 0, 0, '', '', 0),
(34, 1, 0, '', 0, 0, '', '', 0),
(35, 1, 0, '', 0, 0, '', '', 0),
(36, 3, 23, '4,0,1,3,1,3,1,3,1,3', 40, 1, 'Exciting,Annoying,Tedious,Unqiue, Easy to understand', 'Annoying,Tedious,Exciting,Unqiue, Easy to understand', 1),
(37, 11, 17, '2,3,2,3,2,3,2,2,2,1', 45, 1, 'Exciting, Easy to understand,Interesting,Playful,Tedious,High Quality', 'Exciting,Tedious,Playful,High Quality,Interesting', 1),
(38, 1, 24, '0,1,2,1,2,2,3,0,2,3', 55, 1, 'Playful,Tedious,Unqiue,Slow,Dull,Frustrating,High Quality', 'Dull,Playful,Slow,Tedious,Frustrating', 1),
(39, 2, 24, '1,2,3,3,1,2,2,1,4,1', 55, 1, ' Easy to understand,Dull,Tedious,Slow,Interesting,Pleasant,Exciting,Playful', 'Tedious,Playful,Dull, Easy to understand,Pleasant', 1),
(40, 3, 24, '2,2,4,2,1,2,3,0,3,2', 62.5, 1, 'Tedious,Exciting,Dull,Unqiue,Pleasant,Annoying, Easy to understand,Playful,Slow', 'Slow, Easy to understand,Playful,Unqiue,Exciting', 1),
(41, 1, 0, '', 0, 0, '', '', 0),
(42, 1, 0, '', 0, 0, '', '', 0),
(43, 4, 23, '1,4,3,1,3,3,4,1,2,3', 52.5, 1, 'Slow,Unqiue,Tedious,Annoying,Pleasant,High Quality,Dull', 'Unqiue,Annoying,High Quality,Dull,Tedious', 1),
(44, 1, 25, '2,1,2,1,3,2,0,3,1,3', 45, 1, '', '', 0),
(45, 2, 25, '', 0, 0, '', '', 0),
(46, 1, 26, '0,2,3,0,3,2,2,1,2,3', 55, 1, 'Frustrating,Dull,Tedious, Easy to understand,Exciting,Interesting,High Quality', 'Tedious,Exciting,Dull,Frustrating,High Quality', 1),
(47, 2, 26, '0,3,2,4,2,2,4,2,3,1', 47.5, 1, 'Annoying, Easy to understand,Playful,Slow,Interesting,Pleasant,Tedious,Dull', 'Pleasant,Dull, Easy to understand,Interesting,Annoying', 1),
(48, 12, 17, '0,3,1,3,1,2,2,2,3,2', 37.5, 1, 'Frustrating,Unqiue,Pleasant,Slow,Playful,Exciting,Tedious,Dull,Interesting', 'Unqiue,Tedious,Pleasant,Slow,Dull', 1),
(49, 1, 0, '', 0, 0, '', '', 0),
(50, 1, 27, '', 0, 0, '', '', 0),
(51, 2, 27, '', 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `project_lead` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `participants` int(11) NOT NULL,
  `complete_test` int(11) NOT NULL,
  `test_inc` varchar(30) NOT NULL,
  `people_inc` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `project_lead`, `start_date`, `duration`, `participants`, `complete_test`, `test_inc`, `people_inc`, `status`) VALUES
(17, 'Applied Functionality', 'Chris Bush', '2018-12-22', 5, 12, 0, 'PRC,SUS', 'Chris Bush,Hannah Pass,Rebecca', 1),
(18, 'Creative Programming', 'Rebecca', '2017-05-30', 8, 10, 0, 'PRC,SUS', 'Chris Bush,Hannah Pass', 0),
(19, 'Final Year Project', 'Chris Bush', '2018-10-20', 2, 2, 2, 'PRC,SUS', 'Chris Bush,Hannah Pass', 1),
(23, 'New Report Now', 'Chris Bush', '2019-12-22', 2, 4, 0, 'PRC,SUS', 'Chris Bush,Hannah Pass,David', 1),
(24, 'A new project for everyone', 'Chris Bush', '2019-12-31', 2, 3, 0, 'PRC,SUS', 'Chris Bush,David', 1),
(25, 'Random project title here', 'Chris Bush', '2018-12-12', 2, 2, 0, 'PRC,SUS', 'Chris Bush', 0),
(26, 'This Project is ready to be completed', 'Chris Bush', '0000-00-00', 2, 2, 0, 'PRC,SUS', 'Chris Bush', 0),
(27, 'A new project test', 'Chris Bush', '2018-01-22', 2, 2, 0, 'PRC,SUS', 'Chris Bush,Jason,Hannah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `job_role` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `power` varchar(15) NOT NULL,
  `team_group` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `job_role`, `email`, `username`, `password`, `profile_picture`, `power`, `team_group`) VALUES
(4, 'Jason Dumont', 'Front End Developer', 'jason.dumont@sigma.se', 'Jason', 'bfc8b75349a2e08cb16a33faf3c5ceb8fef62b6b', 'default.jpg', 'super', 'dev'),
(40, 'Chris Bush', 'Senior UX Architect', 'chris.bush@sigma.se', 'Chris', 'bfc8b75349a2e08cb16a33faf3c5ceb8fef62b6b', 'Chris2.png', 'admin', 'UX'),
(45, 'Jason', 'Tester of things', 'jason.dumont@sigma.se', 'Jason Dumont', 'bfc8b75349a2e08cb16a33faf3c5ceb8fef62b6b', 'default.jpg', 'researcher', 'UX'),
(46, 'Hannah', 'UX Researcher', 'Hannahpass@sigma.se', 'Hannah', '02c3caa9b24043493088a1681784275def3cbdc6', 'default.jpg', 'admin', 'UX');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `content`) VALUES
(1, 'PRC', 'Interesting,Unqiue,High Quality, Easy to understand,Exciting,Playful,Annoying,Slow,Frustrating,Tedious,Dull,Pleasant'),
(2, 'SUS', 'Question 1;Question 2;Question 3;Proof I am not looping;Another proof;Random;What is this; what question are we?;Question 9;And last but not least');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
