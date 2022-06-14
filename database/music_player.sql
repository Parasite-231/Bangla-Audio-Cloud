-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 06:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music player`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist_information`
--

CREATE TABLE `artist_information` (
  `ARTIST_INFO_ID` int(11) NOT NULL,
  `ARTIST_NAME` varchar(225) NOT NULL,
  `ARTIST_IMAGE` text NOT NULL,
  `NATIONALITY` varchar(225) NOT NULL,
  `ADDED_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DELETE_FLAG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_information`
--

INSERT INTO `artist_information` (`ARTIST_INFO_ID`, `ARTIST_NAME`, `ARTIST_IMAGE`, `NATIONALITY`, `ADDED_DATE`, `DELETE_FLAG`) VALUES
(11, 'ShayanChowdhuryArnob', 'IMG-62a5e1efdff047.73885024.jpg', 'Bangladesh', '2022-06-12 12:54:07', 0),
(12, 'TahsanRahmanKhan', 'IMG-62a5e626718e06.33308491.jpg', 'Bangladesh', '2022-06-12 13:12:06', 0),
(13, 'Balam', 'IMG-62a5e910c3ee55.11287858.jpg', 'Bangladesh', '2022-06-12 13:24:32', 0),
(14, 'Sakib', 'IMG-62a71898707085.47363487.jpg', 'Bangladesh', '2022-06-13 10:59:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `music_information`
--

CREATE TABLE `music_information` (
  `MUSIC_INFO_ID` int(11) NOT NULL,
  `FILE` text NOT NULL,
  `MUSIC_TITLE` varchar(225) NOT NULL,
  `ALBUM` varchar(225) NOT NULL,
  `ARTIST_INFO_ID` int(11) NOT NULL,
  `ADDED_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DELETE_FLAG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_information`
--

INSERT INTO `music_information` (`MUSIC_INFO_ID`, `FILE`, `MUSIC_TITLE`, `ALBUM`, `ARTIST_INFO_ID`, `ADDED_DATE`, `DELETE_FLAG`) VALUES
(44, 'audio-62a5e29f1c67f4.95450381.mp3', 'Hok Kolorob', 'Hok Kolorob', 11, '2022-06-12 12:57:03', 0),
(45, 'audio-62a5e653742c47.96193087.mp3', 'Meghla Obhiman', 'Meghla Obhiman', 12, '2022-06-12 13:12:51', 0),
(46, 'audio-62a5e944504799.89206336.mp3', 'Ki nesha', 'Balam II', 13, '2022-06-12 13:25:24', 0),
(47, 'audio-62a5ea3a7c2959.54814217.m4a', 'Ekaki Mon', 'Balam II', 13, '2022-06-12 13:29:30', 0),
(48, 'audio-62a718b5ed0bb4.07580376.mp3', 'Ki Nesha', 'Tonmoy', 14, '2022-06-13 11:00:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist_information`
--
ALTER TABLE `artist_information`
  ADD PRIMARY KEY (`ARTIST_INFO_ID`);

--
-- Indexes for table `music_information`
--
ALTER TABLE `music_information`
  ADD PRIMARY KEY (`MUSIC_INFO_ID`),
  ADD KEY `ARTIST_INFO_ID` (`ARTIST_INFO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist_information`
--
ALTER TABLE `artist_information`
  MODIFY `ARTIST_INFO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `music_information`
--
ALTER TABLE `music_information`
  MODIFY `MUSIC_INFO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `music_information`
--
ALTER TABLE `music_information`
  ADD CONSTRAINT `music_information_ibfk_1` FOREIGN KEY (`ARTIST_INFO_ID`) REFERENCES `artist_information` (`ARTIST_INFO_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
