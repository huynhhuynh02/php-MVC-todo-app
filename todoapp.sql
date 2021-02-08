-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 07, 2021 lúc 09:38 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `todoapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` int(11) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT '#F9BC13'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `todos`
--

INSERT INTO `todos` (`id`, `title`, `start`, `end`, `status`, `color`) VALUES
(1, 'test round 1', '2021-02-04', '2021-02-06', 1, '#F9BC13'),
(2, 'test 1', '2021-02-05', '2021-02-05', 2, '#F9BC13'),
(3, 'test 2', '2021-02-05', '2021-02-05', 1, '#F9BC13'),
(4, 'test 3', '2021-02-05', '2021-02-05', 1, '#F9BC13'),
(9, 'Unit test', '2021-02-06', '2021-02-14', 2, 'blue'),
(21, 'Happy new year up', '2021-02-07', '2021-02-14', 2, 'blue'),
(22, 'Test 11', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(23, 'Test 12', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(24, 'Test 13', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(25, 'Test 14', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(26, 'Test 15', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(27, 'Test 16', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(28, 'test 17', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(29, 'Test 19', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(30, 'Test 20', '2021-02-07', '2021-02-07', 1, '#F9BC13'),
(31, 'Test 21', '2021-02-07', '2021-02-07', 1, '#F9BC13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
