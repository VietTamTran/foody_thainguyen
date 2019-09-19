-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 05:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody_thainguyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_cmt` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `id_monan` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `tenmon` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` int(11) NOT NULL,
  `mota` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`id_monan`, `id_quan`, `tenmon`, `giatien`, `mota`, `anh`) VALUES
(1, 2, 'Ốc luộc', 20000, 'ốc luộc', '751c62727e3ae6a55b74adfcbb9a538a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `quanan`
--

CREATE TABLE `quanan` (
  `id_quan` int(11) NOT NULL,
  `tenquan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `diadiem` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `anh` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tungdo` int(11) NOT NULL,
  `hoanhdo` int(11) NOT NULL,
  `kiemtra` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanan`
--

INSERT INTO `quanan` (`id_quan`, `tenquan`, `diadiem`, `mota`, `loai`, `email`, `sdt`, `anh`, `tungdo`, `hoanhdo`, `kiemtra`, `id_user`) VALUES
(1, 'Lẩu BBQ', 'Trường ĐH Công nghệ thông tin và truyền thông thái nguyên.', 'Có nhiều món cho khách hàng lựa chọn', 3, 'bbq@gmail.com', 355147577, '1.jpg', 1, 1, 1, 16),
(2, 'Ốc dương tiêu', 'Trường ĐH Công nghệ thông tin và truyền thông thái nguyên.', 'Món ăn ăn ngon phong phú', 1, 'becodon174@gmail.com', 355147577, '1.jpg', 1, 1, 1, 17),
(3, 'Nhà hàng Đức huệ', 'Trường ĐH Công nghệ thông tin và truyền thông thái nguyên.', 'Món ăn phong phú, không gian thoải mãi, lịch sự', 3, 'becodon174@gmail.com', 355147577, '1.jpg', 1, 1, 1, 18),
(4, 'Khách sạn Đông Á', 'Trung tâm TP Thái Nguyên', 'Món ăn phong phú, không gian thoải mãi, lịch sự', 5, 'becodon174@gmail.com', 355147577, '1.jpg', 1, 1, 1, 19),
(5, 'Nhà hàng Đức huệ', 'Trường ĐH Công nghệ thông tin và truyền thông thái nguyên.', 'Món ăn ăn ngon phong phú', 4, 'becodon174@gmail.com', 355147577, '1.jpg', 1, 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `anhdaidien` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hovaten`, `ngaysinh`, `gioitinh`, `email`, `sdt`, `anhdaidien`, `quyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Vương Văn Huy', '2019-03-08', 1, 'becodon174@gmail.com', 335147577, 'k8Gom.jpg', 1),
(16, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 'Đỗ Quang Anh', '1997-03-12', 1, 'user1@gmail.com', 123456789, 'a.jpg', 2),
(17, 'user2', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Thị Thảo', '1999-03-12', 0, 'user2@gmail.com', 123456789, 'a.jpg', 2),
(18, 'user3', 'e10adc3949ba59abbe56e057f20f883e', 'Tạ Quang Huy', '1999-03-14', 1, 'user3@gmail.com', 123456789, 'a.jpg', 2),
(19, 'user4', 'e10adc3949ba59abbe56e057f20f883e', 'Lý Văn Nam', '1999-03-14', 1, 'user4@gmail.com', 123456789, 'a.jpg', 2),
(20, 'user6', 'e10adc3949ba59abbe56e057f20f883e', 'Nông Thị Lệ', '1997-03-14', 0, 'user6@gmail.com', 123456789, 'a.jpg', 2),
(21, 'user7', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Thu Trang', '1997-03-12', 0, 'user7@gmail.com', 123456789, 'a.jpg', 3),
(22, 'user8', 'e10adc3949ba59abbe56e057f20f883e', 'Hoang Thị Huệ', '1997-03-13', 0, 'user8@gmail.com', 123456789, 'a.jpg', 3),
(23, 'user9', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Diễm Hương', '1997-03-04', 0, 'user9@gmail.com', 123456789, 'a.jpg', 3),
(24, 'user10', 'e10adc3949ba59abbe56e057f20f883e', 'Vương Văn Kính', '1997-03-18', 1, 'user10@gmail.com', 123456789, 'a.jpg', 3),
(25, 'user11', 'e10adc3949ba59abbe56e057f20f883e', 'Đào Xuân Trường', '1996-03-14', 1, 'user11@gmail.com', 123456789, 'a.jpg', 3),
(26, 'user12', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Thuỳ Trang', '1999-03-13', 0, 'user12@gmail.com', 123456789, 'a.jpg', 3),
(27, 'user13', 'e10adc3949ba59abbe56e057f20f883e', 'Đỗ Thuỳ Linh', '1998-03-14', 0, 'user13@gmail.com', 123456789, 'a.jpg', 3),
(28, 'user14', 'e10adc3949ba59abbe56e057f20f883e', 'Đoàn Thuỳ Trang', '1999-03-26', 0, 'user14@gmail.com', 13456789, 'a.jpg', 3),
(29, 'user15', 'e10adc3949ba59abbe56e057f20f883e', 'Dương An Na', '1996-03-29', 0, 'user15@gmail.com', 123456789, 'a.jpg', 3),
(30, 'user17', 'e10adc3949ba59abbe56e057f20f883e', 'Bùi Anh Tuấn', '1997-03-29', 1, 'user17@gmail.com', 123456789, 'a.jpg', 3),
(31, 'user16', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thành Trung', '1998-03-30', 1, 'user16@gmail.com', 123456789, 'a.jpg', 3),
(32, 'user18', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Quốc Dũng', '1998-03-30', 1, 'user18@gmail.com', 123456789, 'a.jpg', 3),
(33, 'user19', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Thị Xuân', '1995-03-26', 0, 'user19@gmail.com', 123456789, 'a.jpg', 3),
(34, 'user20', 'e10adc3949ba59abbe56e057f20f883e', 'Đinh Quốc Dũng', '1997-03-19', 1, 'user20@gmail.com', 123456789, 'a.jpg', 3),
(35, 'user5', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Đình Hậu', '1997-03-28', 1, 'user5@gmail.com', 13456789, 'a.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_monan`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Indexes for table `quanan`
--
ALTER TABLE `quanan`
  ADD PRIMARY KEY (`id_quan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `id_monan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quanan`
--
ALTER TABLE `quanan`
  MODIFY `id_quan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Constraints for table `quanan`
--
ALTER TABLE `quanan`
  ADD CONSTRAINT `quanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
