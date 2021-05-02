CREATE DATABASE ltweb;

USE ltweb;

CREATE TABLE `users` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phonenum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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


ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

CREATE USER 'hoangviet'@'localhost' IDENTIFIED BY '123456';

GRANT ALL PRIVILEGES ON * . * TO 'hoangviet'@'localhost';

FLUSH PRIVILEGES;
