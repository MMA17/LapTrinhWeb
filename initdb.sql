-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2021 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltweb2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `username` varchar(30) NOT NULL,
  `author` varchar(30) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`username`, `author`, `comment`) VALUES
('viet', 'viet2', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet2', 'viet', 'Cậu xinh gái quá trời vậy!'),
('viet', 'viet1212', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet', 'viet213', 'Cậu xinh gái quá trời ơi.'),
('viet', 'viet213', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet1212', 'viet2', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet1212', 'viet1212', 'Cậu xinh gái quá trời vậy!'),
('viet1212', 'viet1212', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet1212', 'viet213', 'Cậu xinh gái quá trời ơi.'),
('viet1212', 'viet213', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet1212', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet2', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet2', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet2', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet2', 'viet213', 'Cậu xinh gái quá trời ơi.'),
('viet2', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet2', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet213', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet213', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet213', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet213', 'viet213', 'Cậu xinh gái quá trời ơi.'),
('viet213', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet213', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet222', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet222', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet222', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet222', 'viet222', 'Cậu xinh gái quá trời ơi.'),
('viet222', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet222', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('vietviet222222', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('vietviet222222', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('vietviet222222', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('vietviet222222', 'vietviet222222', 'Cậu xinh gái quá trời ơi.'),
('vietviet222222', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('vietviet222222', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet222222', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet222222', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet222222', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet222222', 'viet222222', 'Cậu xinh gái quá trời ơi.'),
('viet222222', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet222222', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet3', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet3', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet3', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet3', 'viet3', 'Cậu xinh gái quá trời ơi.'),
('viet3', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet3', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet3212', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet3212', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet3212', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet3212', 'viet3212', 'Cậu xinh gái quá trời ơi.'),
('viet3212', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet3212', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet434', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet434', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet434', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet434', 'viet434', 'Cậu xinh gái quá trời ơi.'),
('viet434', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet434', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet5', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet5', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet5', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet5', 'viet5', 'Cậu xinh gái quá trời ơi.'),
('viet5', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet5', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet6', 'viet6', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet6', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet6', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet6', 'viet6', 'Cậu xinh gái quá trời ơi.'),
('viet6', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet6', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet7', 'viet7', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet7', 'viet7', 'Cậu xinh gái quá trời vậy!'),
('viet7', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet7', 'viet7', 'Cậu xinh gái quá trời ơi.'),
('viet7', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet7', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet8', 'viet8', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet8', 'viet8', 'Cậu xinh gái quá trời vậy!'),
('viet8', 'viet8', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet8', 'viet8', 'Cậu xinh gái quá trời ơi.'),
('viet8', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet8', 'viet121', 'Cậu kết bạn với tớ nhé!'),
('viet121', 'viet121', 'Cậu ấy duyên dáng quá. Mình ước được như bạn đó!'),
('viet121', 'viet121', 'Cậu xinh gái quá trời vậy!'),
('viet121', 'viet121', 'Chúc cậu sẽ đạt được giải nhất!!!!'),
('viet121', 'viet121', 'Cậu xinh gái quá trời ơi.'),
('viet121', 'viet3232', 'Chúc cậu sớm đạt được thành công trong cuộc sống!'),
('viet121', 'viet121', 'Cậu kết bạn với tớ nhé!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `username` varchar(30) NOT NULL,
  `path` text DEFAULT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`username`, `path`, `votes`) VALUES
('viet', 'uploads/2.jpg', 123),
('viet1212', 'uploads/11.jpg', 32),
('viet2', 'uploads/4.jpg', 33),
('viet213', 'uploads/8a92296b15478b98835f7e4c40050487.jpg', 42),
('viet222', 'uploads/girl-xinh-600x600.jpg', 18),
('viet222222', 'uploads/420fa9c73e9879fbc135ecd100c96179.jpg', 78),
('viet3', 'uploads/5.jpg', 56),
('viet3212', 'uploads/15e0cfbf1221501a903dee15664b4e70.jpg', 98),
('viet434', 'uploads/af1b2b0098de6b943d7b8f400c78b4d1.jpg', 67),
('viet5', 'uploads/6.jpg', 54),
('viet6', 'uploads/7.jpg', 44),
('viet7', 'uploads/fac5a8b16d47a5233185870ad1113722.jpg', 10),
('viet8', 'uploads/8.jpg', 32),
('viet121', 'uploads/2fb01126cde4fa7b4d4f5c209c7cb0a3.jpg', 0),
('viet3232', 'uploads/4ca7bb412755fb4ca536c984e67904e4.jpg', 0),
('viet22223', 'uploads/9d31b347f4b0adc556ef7bc305491687.jpg', 0),
('viet213321', 'uploads/94d26875170eb49c79f25f0cb599e16a.jpg', 0),
('viet321312321', 'uploads/191f9ea2c924b12ee4fbc05bee32bef5.jpg', 0),
('ssssss', 'uploads/ad1888499e01e621f29293866131a2c6.jpg', 0),
('34121', 'uploads/b32e2a57064a0aa4f62c881befd24063.jpg', 0),
('321', 'uploads/be8379fea2f45996e43177afe9dae440.jpg', 0),
('dsadsa', 'uploads/cd30f42c399dee476e33673d5eeae60f.jpg', 0),
('sadasdas', 'uploads/da680a301c56f803b136ae11e331375f.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phonenum` varchar(20) DEFAULT NULL,
  `bio` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `phonenum`, `bio`) VALUES
('viet', '1', 'Trang Anh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet1212', '1', 'Đỗ Thảo ', '0987123423', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet2', '1', 'Huyền Anh', '09993232223', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet213', '1', 'Minh Anh', '0132162215', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet222', '1', 'Mỹ Huyền', '01321654232', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet222222', '1', 'Minh Ngọc', '013216542215', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet3', '1', 'Mỹ Anh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet3212', '1', 'Ngọc Ánh', '013216542215', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet434', '1', 'Lan Chi', '013216542215', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet5', '1', 'Hạnh ', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet6', '1', 'Lan Anh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet7', '1', 'Anh Tú', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet8', '1', 'Kim Anh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet121', '1', 'Uyển Nhi ', '0132162215', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet3232', '1', 'Lan Quyên', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet22223', '1', 'Mỹ Ly ', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet213321', '1', 'Uyển Minh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('viet321312321', '11', 'Linh Lan', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('ssssss', '1', 'Hạnh My', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('34121', '1', 'Phương Lan', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('321', '1', 'Anh Phương', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('dsadsa', '1', 'Linh Anh', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.'),
('sadasdas', '1', 'Chi Dương', '1', 'Cô bạn sinh năm 1999 này từng quen mặt trên mạng xã hội sau bức ảnh \"chân khoèo bá đạo\" hồi 2014.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
