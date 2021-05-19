-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2021 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phonenum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `phonenum`, `image`, `votes`) VALUES
('viet', '1', 'Trang Anh', '1', 'uploads/2.jpg', 123),
('viet1212', '1', 'Đỗ Thảo ', '0987123423', 'uploads/11.jpg', 32),
('viet2', '1', 'Huyền Anh', '09993232223', 'uploads/4.jpg', 33),
('viet213', '1', 'Minh Anh', '0132162215', 'uploads/8a92296b15478b98835f7e4c40050487.jpg', 42),
('viet222', '1', 'Mỹ Huyền', '01321654232', 'uploads/girl-xinh-600x600.jpg', 18),
('viet222222', 'Viet123hp', 'Minh Ngọc', '013216542215', 'uploads/420fa9c73e9879fbc135ecd100c96179.jpg', 78),
('viet3', '1', 'Mỹ Anh', '1', 'uploads/5.jpg', 56),
('viet3212', '1', 'Ngọc Ánh', '013216542215', 'uploads/15e0cfbf1221501a903dee15664b4e70.jpg', 98),
('viet434', 'Viet123hp', 'Lan Chi', '013216542215', 'uploads/af1b2b0098de6b943d7b8f400c78b4d1.jpg', 67),
('viet5', '1', 'Hạnh ', '1', 'uploads/6.jpg', 54),
('viet6', '1', 'Lan Anh', '1', 'uploads/7.jpg', 44),
('viet7', '1', 'Anh Tú', '1', 'uploads/fac5a8b16d47a5233185870ad1113722.jpg', 10),
('viet8', '1', 'Kim Anh', '1', 'uploads/8.jpg', 32);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
