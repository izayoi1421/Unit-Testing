-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 10:39 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintsci`
--

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(50) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `name`) VALUES
(1, 'Jonathan Buccat'),
(2, 'Elijah Capudoy'),
(3, 'Christian Dave Naguit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(27, 'Admin', 'admin@mail.com', '2304226.png', '$2y$10$oPOmdz1Ph/Sob88t5NWcXObo0.EdDa7TY6ZHEYrYG5IHEfMyEtpJ6', 1, 1, 1599504982),
(45, 'Christian', 'mefcapudoy@tip.edu.ph', 'default.jpg', '$2y$10$Dwl9eooTKLyoHyBDHlw21Ob0xVxvMNTpaKG3h.gSvCVxMD4cvHXEm', 2, 0, 1662203404),
(47, 'christian', 'xxxgerenaxxx@gmail.com', 'default.jpg', '$2y$10$ZobVS6lMtg4O1CbgbOSjtuK3eqw9dCRfwhd7TKjnjA3ZWjei33kL2', 2, 1, 1663847547),
(57, 'Christian Dave Naguit', 'mcdcnaguit@tip.edu.ph', 'default.jpg', '$2y$10$6Tjk5ybcmjPNmCoGFjRJOu/KYRSdIC67MQ40cywhZPAP9wR8gyDP6', 2, 1, 1667553955);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(14, 1, 2),
(15, 1, 7),
(16, 2, 4),
(17, 1, 5),
(20, 1, 3),
(21, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'User'),
(4, 'Report Form'),
(5, 'Report');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `uqid` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `contactnum` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `date_reported` int(11) NOT NULL,
  `file` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `is_read` int(1) DEFAULT NULL,
  `accused_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_report`
--

INSERT INTO `user_report` (`id`, `name`, `status`, `uqid`, `address`, `age`, `contactnum`, `title`, `description`, `type`, `date_reported`, `file`, `is_read`, `accused_name`) VALUES
('636494d5c487b', 'christian', 'Pending', '47', 'asda', 1231, 231321, '3123', 'asdad', 'Drugs', 1667536085, 'default.jpg', 0, 'asda'),
('6364952fae681', 'christian', 'Pending', '47', '1231', 12313, 2147483647, '12313213', 'asda', 'Corona Virus', 1667536175, 'default.jpg', 0, 'NA'),
('636499429135e', 'christian', 'Pending', '47', 'asdasd', 1231, 3213123, '12131', 'sdasd', 'Drugs', 1667537218, 'default.jpg', 0, 'asdad'),
('6364d41e3e46a', 'christian', 'Pending', '47', '123', 1213, 123, 'CRTest', 'CRTest', 'Drugs', 1667552286, 'default.jpg', 0, 'Elijankss'),
('6364d4314f67f', 'christian', 'Pending', '47', '123', 123, 123, 'IRTest', 'IRTest', 'Corona Virus', 1667552305, 'default.jpg', 0, 'NA'),
('6364d4953c15b', 'christian', 'Pending', '47', 'Basig', 21, 2147483647, 'CRTest', 'CRTest', 'Drugs', 1667552405, 'default.jpg', 0, 'Jojonks'),
('6364d4c3e70b9', 'christian', 'Pending', '47', 'Bulaacan', 25, 915852368, 'IRTest', 'IRTest', 'Corona Virus', 1667552451, 'default.jpg', 0, 'NA'),
('6364dccade406', 'Christian Dave Naguit', 'Pending', '57', 'sad', 123, 123, 'TestLatest1', 'TestLatest1', 'Drugs', 1667554506, 'default.jpg', 0, '123asd'),
('6364dce5c5068', 'Christian Dave Naguit', 'Pending', '57', '123', 123, 123, 'TestLatest2', 'TestLatest2', 'Corona Virus', 1667554533, 'default.jpg', 0, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Update Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fa-fw fa-folder-open', 1),
(6, 1, 'Access Authority', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Report', 'report/addreport', 'fas fa-fw fa-headset', 1),
(10, 5, 'Report Data', 'report', 'fas fa-fw fa-file-alt', 1),
(11, 1, 'User Data', 'admin/datamember', 'fas fa-fw fa-users', 1),
(12, 4, 'Report History', 'report/user_report_detail', 'fas fa-fw fa-headset', 1),
(13, 1, 'Analytics', 'admin/analytics', 'fas fa-analytics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(8, 'aa@gmail.com', 'Wag8dsxx6ziM9O8n/HisVkGyy9+az5XeumzNuaJMGg4=', 1599579296),
(9, 'christine@mail.com', '0Hrx2++F9JMO4pYOuQRLLlfQwP5DWH/O76x//+Yhs54=', 1651551632),
(11, 'mefcapudoy@tip.edu.ph', 'TxTWBAg6n/2fJcbyoWUoqcJ3ob3wI0I4o1mimphLUIg=', 1662203404),
(12, 'mcdcnaguit09@tip.edu.ph', '99z03329/STgldmICVnjjPJrdEnuf8zH5W/X6vNTLlw=', 1663847471),
(13, 'xxxgerenaxxx@gmail.com', 'h9ephF0It+0mW/4T7Z+0tfOgT/yhpG9p1F9/0yy7pv4=', 1665230526),
(14, 'cimofo1079@3mkz.com', 'ONuFul/54AA+L6mZFN5FQ6fyHm6sdUun97wQOi0qWOg=', 1666273235),
(15, 'rebam82991@3mkz.com', 'RjP+2iJPG/VZwUul3YiCpbXHkfnKiVU7cQAO85tZgSs=', 1666273380),
(16, 'xxxgerenaxxx@gmail.com', 'yoD2CKQVHtBq3Gkrh/FCPP2FUbBavDTUTnLd8YcqBMk=', 1666273502),
(17, 'xxxgerenaxxx@gmail.com', 'KGKL/EZQ+I8a77cQwxnP08n5tn5yxLuWhpWSPjUuMDw=', 1666274457),
(18, 'xxxgerenaxxx@gmail.com', '6XDEwldH3zKzXrDngVuyGE/eqFoWEnYCnG/nlPmxdUs=', 1666275559),
(19, 'xxxgerenaxxx@gmail.com', 'luKdTbkgruCGH5H5elwF/tK0jL4Ej9CiQDmjMhJqH3w=', 1666275561),
(20, 'asdsa@gmail.com', 'lkZyHBvjJL2sf54FItBx9k2AuNcLQid5vb9nSthoFXY=', 1667470571),
(21, 'asdadadassa@gmail.com', 'JktM82VLIJRRLJ/Ji4E2t1sGKI7q2vOC6Y6FyspJHY4=', 1667470590),
(22, 'cdcmnjusi@gmail.com', 'CnX2QmWa6+IwaUUalMbVaNxiQkfdfhkU9p6JhTNqq9E=', 1667470614),
(23, 'jskiopq@gmail.com', 'eXFvCplKkICtUK+MqsvR2M1kSR4fgl4JD1Lhc4ZmTYY=', 1667470675),
(24, 'asd@gmail.com', 'l9NGmP8XU33yJl+60HpJTLi9QNo3lQRT9i+yr9h1x/Q=', 1667552494),
(25, 'asdgasadqw@gmail.com', 'ARDL23DC0U7M8okERiX4cBnnfb/bhG9nFbJ04QPyuJ0=', 1667552524),
(26, 'asdgasadqwfasd@gmail.com', 'ONcur3R+kdt3GIuCwwGZqQrXsMp2YrijUTepSoT2v2U=', 1667552569);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
