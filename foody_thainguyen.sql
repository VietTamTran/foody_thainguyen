-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 19, 2019 lúc 08:31 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `foody_thainguyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_cmt` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_cmt`, `id_quan`, `username`, `noidung`, `ngay`) VALUES
(1, 13, 'user1', 'Không gian đẹp và thoải mãi', '2019-03-26'),
(2, 14, 'user3', 'không gian đẹp', '2019-03-30'),
(3, 18, 'user3', 'hahah', '2019-03-31'),
(4, 18, 'user13', 'Bánh ngon lắm', '2019-04-01'),
(5, 14, 'user12', 'Ngon lắm các bạn ơi', '2019-04-09'),
(6, 14, 'user12', 'khá lý tưởng để hẹn hò', '2019-04-09'),
(7, 14, 'user12', 'Tuần nào cũng ngồi luôn nè', '2019-04-09'),
(8, 14, 'user12', 'sắp thử hết thực đơn rồi này', '2019-04-09'),
(9, 14, 'user12', 'Phục vụ được phết', '2019-04-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id_danhgia`, `id_user`, `id_quan`, `danhgia`) VALUES
(1, 16, 13, 1),
(4, 25, 18, 1),
(5, 24, 17, 1),
(6, 21, 44, 1),
(7, 24, 48, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `img`
--

INSERT INTO `img` (`id_img`, `name`, `id_quan`) VALUES
(14, 'cb8574780de537739c5e745210eb21ee.jpeg', 13),
(15, '7997672cc5eb3492ce39b3e3c9c05f37.jpeg', 13),
(16, 'd14bc4c9788cc692e22cf49bee6d5e85.jpeg', 13),
(17, '8c6e695302599872b035239f138cd2e8.jpeg', 13),
(18, '9b3995072d2cfa2d83d52467e8bc43f5.jpeg', 13),
(19, 'd1d4e3756f66012ba3232dea4eefbd9d.jpeg', 14),
(20, '9a156aaa243b2afa325af73600b41f03.jpeg', 14),
(21, '1aed87516cc5b89613d1d9b9c266e810.jpeg', 14),
(22, 'c74683facf9fccb7d730e8be57871f33.jpeg', 15),
(23, 'a648f9ded9eea43ea47293acc7bff257.jpeg', 15),
(24, 'e69020d659f7123fbf02541d86273355.jpeg', 15),
(25, 'f45cefa814794faa9e7322b90237b3b0.jpeg', 16),
(26, '2c5e3ff381f6c53f96a857aed456e7d7.jpeg', 16),
(27, '241587a4f7937e4a498eb7d4dba52abc.jpeg', 16),
(28, '014297648448f8efa9771b4178fe1ff8.jpeg', 16),
(29, 'e6b3e8a05e1400c3521f5e27c6721a54.jpeg', 16),
(30, '4f497182b26b0b36212239b240e94b82.jpeg', 17),
(31, 'c82ae72ede51eef4b17320ada9c0b404.jpeg', 17),
(32, '0cd860921fe89e60055e96cbdfbdfd84.jpeg', 21),
(33, 'd32ac05d56515377e8b93744fda10ec4.jpeg', 21),
(34, '0375c0726c0682bf0c8d001f1f660c83.jpeg', 21),
(35, '2b9a498b65add47f24df59775eb249ac.jpeg', 21),
(36, 'f6aab6dd0505179aee7be276a33bcd8a.jpeg', 21),
(37, 'a11f91ceaaa591d87288d5b7d40f8edf.jpeg', 22),
(38, 'a30fc18fa2949e8e281b9f30ad4aa30f.jpeg', 22),
(39, '73519b942033c8640dc33c4e46d09374.jpeg', 22),
(40, '92231e3a21885adf19667b9c16c7cefd.jpeg', 22),
(41, '902ee1c488b33e241d87e41c621dde71.jpeg', 22),
(42, '547ee86cfa1e53de256a68da41d29657.jpeg', 23),
(43, '8e6f87b92bbbf8feb1e570baf1fd874e.jpeg', 24),
(44, 'c261979140fe14374718b648ff62c3f7.jpeg', 24),
(45, 'f953b8e2bfe3546aa4afe391529896d0.jpeg', 26),
(46, '25b8fa002e718ec6c2733eabe1b8557a.jpeg', 26),
(47, 'c34c4b89365749a5ef461007040d5d73.jpeg', 28),
(48, '3f699a3bb9b45d1253e96085b17cf987.jpeg', 28),
(49, 'b47a5463b74d33942a2de028abc81ca4.jpeg', 28),
(50, '722ceb499d9ede58192c887929e009a0.jpeg', 30),
(51, 'e78dd6834884c487aa41d896f9e0a306.jpeg', 30),
(52, 'fe8b169e678e0356954546aa40d54de2.jpeg', 30),
(53, '8b4437844a77f1f6531c59aa34519677.jpeg', 31),
(54, 'c46b013da7fb4cc730d84385cec503b1.jpeg', 31),
(55, '0f2a988232269ea48235f2b9b91913f1.jpeg', 31),
(56, '60926fad5228e261ee40790669cf95e4.jpeg', 31),
(57, '62980551aa1c1abbd61feba8992d5b6b.jpeg', 32),
(58, '0a94137dd841ee18a12cae152ee20588.jpeg', 32),
(59, '90565f59cc8a993311fc872dfc75d272.jpeg', 32),
(60, 'b24da3f73c6f59653d1ef22f1f8d736d.jpeg', 32),
(61, 'e8e304a1fae3b741f8212a8526bcdc76.jpeg', 32),
(62, '08e81afdd9f5053202798f4c108ab4a9.jpeg', 34),
(63, '652f57abcff67907bcc47acc494482ff.jpeg', 34),
(64, '8b6833f89ee1f7dffab1b2de749e61e1.jpeg', 34),
(65, '34d5589209944d8d2f5bec452deb0e44.jpeg', 37),
(66, '50541711bb6b1dba3cc33650e8ba9660.jpeg', 37),
(67, '06119ff5a389e53fe7659559e0266e4e.jpeg', 37),
(68, '827da5af54a2ca426573777b85827ad8.jpeg', 37),
(69, 'acf3a929a652dd1ef2b365648106e003.jpeg', 37),
(70, '280aa86a37fa3bebb568a386fd757817.jpeg', 40),
(71, 'a62b7db351ceb72c79f1d3af022a512c.jpeg', 41),
(72, '7f4126e8ce1d8d8981ab094f2fc94395.jpeg', 41),
(73, '030b5f6d7311699a30a71193aee2546d.jpeg', 41),
(74, 'b4ca9fab9c13575fb89f7b09547d6895.jpeg', 41),
(75, '480250a2356d86bd0f6ae267f094307c.jpeg', 41),
(76, 'ae4290c095b086392021b7f5645b9ead.jpeg', 42),
(77, '944e098d97c8f5f24c510b985e93283c.jpeg', 42),
(78, 'f0e1c15d7a50c1e398f22300cd1afa85.jpeg', 43),
(79, 'c5efd1a4d64a5a65b16cb04b20e17d55.jpeg', 43),
(80, '6ddbd65a9d171cfb8a3499a8a1891b32.jpeg', 43),
(81, '00556ac96ea14f375c91239b5c1e4560.jpeg', 43),
(82, 'eaf964b411549bce94a88886086786c5.jpeg', 43),
(83, '5b5e954bbe68916c00484699de492031.jpeg', 43),
(84, '4b1775486eccb13beffbe6d640c791f6.jpeg', 44),
(85, '14ad4dd29e13bc1203fa83dcc3bdeb19.jpeg', 44),
(86, 'c7997c9d66cf1d34d139a70d6f71f757.jpeg', 44),
(87, '541c9367758c58eb904f87855688e9a5.jpeg', 44),
(88, '7f0c171d57dc154460c4ae82374d241f.jpeg', 36),
(89, '16d20551049fba3e42f725e10914d055.jpeg', 36),
(90, 'a7358fa9bb3686b49c3a02e156310719.jpeg', 36),
(91, 'cea0467e158c2a4c9522185895c19d06.jpeg', 45),
(92, '91468ba84196cfde851e6cf2853b5c40.jpeg', 45),
(93, 'b0b17635561d56308abd8ddf379a8762.jpeg', 45),
(94, '36a3abe44023f00d9e64027163d96781.jpeg', 45),
(95, '5aad895708d71d850dff59a42d51ae79.jpeg', 46),
(96, '0337efcbaa55cab83c584cea06bb7e47.jpeg', 46),
(97, 'd3ac8ef581396f25bac9d3749ecdd16b.jpeg', 46),
(98, '27282f7d8a60a5f8eda36343fe7fca55.jpeg', 46),
(99, '7fa728700e6b10501e702a1efa89b0db.jpeg', 46),
(100, '7c416b3f98217b63948db105431fef8f.jpeg', 46),
(101, '062bbc511dd0d910ae334ecf5c7c1d7c.jpeg', 47),
(102, 'dbaf337bc285d77254dd964514b60880.jpeg', 47),
(103, '19e5f3cd4cdac5576290a0e2fbe89cae.jpeg', 47),
(104, '7ada9f598800f1482567e7b5e3d57acc.jpeg', 47),
(105, '95e64c5df04e1e1199cb4e9956533e7b.jpeg', 47),
(106, 'dbebedbf932f3cb650a6804e723d3190.jpeg', 48),
(107, '83a4ab3f23d933c54e0af374745b4b67.jpeg', 48),
(108, '99133a2d51144ca6277d96cd90d9909e.jpeg', 48),
(109, '573e72daa81447507281298e8b4e341c.jpeg', 48),
(110, 'a3b94ff9def58d64c50d3436ed2f5979.jpeg', 48),
(111, '83a4ab3f23d933c54e0af374745b4b67.jpeg', 48),
(112, '8bbd672fbfbe01cad19d12eca3adca2a.jpeg', 48),
(113, 'ab7d6663203f04cf2e4c49b64274c5ba.jpeg', 48),
(114, '336c133d406a89b432ddf91a9c92acc4.jpeg', 48),
(115, '9b4ad0e35d89b6c72128d525972d55c9.png', 48),
(116, '61c1888cb2665eec9d4b5a293fbfba35.jpeg', 48),
(117, '336c133d406a89b432ddf91a9c92acc4.jpeg', 48),
(118, 'c150d85493461156c4ba028cc638951b.jpeg', 48),
(119, 'c150d85493461156c4ba028cc638951b.jpeg', 48),
(120, '6685dca2740b54d3e611d3370f33bde4.jpeg', 48),
(121, '0a0de49b8f6cecd62d796ec1f8cfec3c.jpeg', 48),
(122, '4f1cbe28bd449b226a71e6f896406506.jpeg', 48),
(123, 'cc990b5bf0444ca45f31a4e0b2d4e32a.jpeg', 48);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
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
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`id_monan`, `id_quan`, `tenmon`, `giatien`, `mota`, `anh`) VALUES
(3, 14, 'Đen', 20000, '', 'd1d4e3756f66012ba3232dea4eefbd9d.jpeg'),
(4, 15, 'Caffee đen', 25000, '', '70ce24248c0f1d7e4f48e51a61d3bb53.png'),
(5, 16, 'Trà sữa sốt xoài Crush', 25000, '', 'f45cefa814794faa9e7322b90237b3b0.jpeg'),
(6, 16, 'Trà sữa sốt xoài Crush', 25000, '', '5796332c8d5f5e01d407f68eacd1512b.jpeg'),
(7, 17, 'Cua', 250000, '', '3457cbcfba0bba354d5f9def9c308f91.jpeg'),
(8, 17, 'Salat', 80000, '', '9da28cc4dc0986da517261b5fe6aef70.jpeg'),
(9, 21, 'sodal', 15000, '', 'bc6613b02f7a5e9f6e39e28cf3eaf7e7.jpeg'),
(10, 22, 'Bánh mì chảo', 50000, '', 'a11f91ceaaa591d87288d5b7d40f8edf.jpeg'),
(11, 22, 'Bánh mì chảo', 50000, '', '92231e3a21885adf19667b9c16c7cefd.jpeg'),
(12, 23, 'Miến trộn Hàn Quốc', 60000, '', '4c0a7569df8b40036c6fd02d06ebcfc9.jpeg'),
(13, 23, 'Tokbokki', 40000, '', 'c715ca1b1190351a6cb0dd9d9b989a4f.jpeg'),
(14, 23, 'Combo lẩu', 319000, '', 'a417c7631bce59ccc5b26fc4f1201a96.jpeg'),
(15, 24, 'Capuchino', 45000, '', 'dbae94c50555cdf2a17a3f267f7ca1d7.jpeg'),
(16, 24, 'Sinh tố', 20000, '', '99350efb3f799d22883381dca8ca5a2e.jpeg'),
(17, 26, 'Thịt luộc', 50000, '', '521aea5d1a35af0384545ce19f3cf892.jpeg'),
(18, 26, 'Nuộm tai', 45000, '', 'fd401329338c216aec670e29b6d26a01.jpeg'),
(19, 28, 'Combo lẩu', 450000, '', '7b37fb4d397912e23a5e11649c82b77a.jpeg'),
(20, 28, 'hải sản nướng', 65000, '', '2bb336729c494cdd9275a7bfc31a9cbd.jpeg'),
(21, 30, 'Bia tươi', 65000, '', '630a4b9cea70a9f8bc5d8e8cd80e29b0.jpeg'),
(22, 30, 'Heiniken', 25000, '', '5c855326f7d5105e3e2cbd7082e54c01.jpeg'),
(23, 30, 'Sai gon', 15000, '', 'dbd2c5d3c2fbda22af781e41dc6ece9e.jpeg'),
(24, 30, 'Bia Hà Nội', 15000, '', 'fddef9861ef9632ad414f1ab3ca5bb6e.png'),
(25, 31, 'Susi', 50000, '', '60926fad5228e261ee40790669cf95e4.jpeg'),
(26, 32, 'Trà sữa cafe', 25000, '', '62980551aa1c1abbd61feba8992d5b6b.jpeg'),
(27, 32, 'Trà sữa cacao', 25000, '', '30e87e6fdc0cc110725a70f65cf8469c.jpeg'),
(28, 32, 'Đủ vị', 25000, '', '0c52ebff22112db0dfda78067cb025e4.png'),
(29, 34, 'Combo lẩu', 650000, '', '99408c19dc66cdbb2b19ae574d222407.jpeg'),
(30, 37, 'Trà đào', 20000, '', '4f88bc6eace5d2fca7d9438e88912171.jpeg'),
(31, 37, 'Sữa chua hoa quả', 20000, '', '88f66a0f764da5b291aff031501c413f.jpeg'),
(32, 41, 'Buffet', 100000, '', '7de25adc0d3d747493820c0b1afb2856.jpeg'),
(33, 41, 'Mâm 8 người', 1500000, '', '250803cb57da16f4ae86e36d825b3f0a.jpeg'),
(34, 41, 'Mâm 8 người ', 1200000, '', '0356a4470edff36d8087396be7def1a7.jpeg'),
(35, 41, 'Cơm văn phòng', 35000, '', '87fe8c21ab485e061ee0c821326f6659.jpeg'),
(36, 42, 'Combo lẩu', 800000, '', '250803cb57da16f4ae86e36d825b3f0a.jpeg'),
(37, 43, 'Vang đỏ', 0, '', '895d27c8587a0b1963f3bd9f6e74cb5d.jpeg'),
(38, 43, 'Tôm', 80000, '', 'b31108d949fcca0674d093d0d796f6a8.jpeg'),
(39, 43, 'Bò xào', 150000, '', '80facb37724b2beb7b4391f365480c70.jpeg'),
(40, 43, 'Cánh gà rán', 120000, '', 'c5efd1a4d64a5a65b16cb04b20e17d55.jpeg'),
(41, 44, 'Cơm gia đình', 0, '', '432a06336548e3427fe3b04c7adecda8.jpeg'),
(42, 44, 'Trứng cuộn', 50000, '', 'a6add5b7c2d176cfbaf4e643e72cc56a.jpeg'),
(43, 36, 'Nướng', 650000, '', '0bab4a50a1642329be2fb9579e377ef6.jpeg'),
(44, 45, 'Susi Trứng cuộn', 50000, '', 'e8f5dcd668cb35950efcb81de8beaa11.jpeg'),
(45, 45, 'Combo', 850000, '', '671197d893325167328e8d64581a6052.jpeg'),
(46, 45, 'Mì bò', 80000, '', 'b1b11508f3c47bb3528ba87c4fa24b8f.jpeg'),
(47, 45, 'Mì cay', 95000, '', '1c780c58fe58cd95e43f4ab93041923c.jpeg'),
(48, 46, 'Capuchino', 35000, '', '85f7a9b8fcd00a9568fec7f10bb38d8c.png'),
(49, 46, 'Cafe socolate', 25000, '', '2418728284422703411375ff8444e664.jpeg'),
(50, 46, 'Nước hoa quả', 30000, '', 'f05050cb0c36ca3ef8db8e0f0436c1cf.jpeg'),
(51, 46, 'Đen đá', 25000, '', '56188fc6fd93fff2224d92228631b5fb.jpeg'),
(52, 47, 'Dâu', 35000, '', '599d9a4ef4082def401b95c8dfae8d37.jpeg'),
(53, 47, 'Chanh', 35000, '', '48bf0dd2fb9aa6888f90d26d97ca93a2.jpeg'),
(54, 47, 'Tôm hùm', 650000, '', '200d5954b3b253c11482f1bfa25eb4cc.jpeg'),
(55, 47, 'Sườn', 200000, '', 'ed21c937c420e939eef85c83126b5d0c.jpeg'),
(56, 47, 'Sườn bò', 200000, '', '3def5625d453f42e07e1b25384fc6ff7.jpeg'),
(57, 47, 'Hoa quả', 250000, '', '95e64c5df04e1e1199cb4e9956533e7b.jpeg'),
(58, 48, 'Sinh tố', 25000, '', '0c5c741a21c7c1be7e8948d141349d1a.jpeg'),
(59, 48, 'Trà tranh', 15000, '', '321ee1d4307b4057926b1b0cc3a6a96c.jpeg'),
(60, 48, 'Cafe sữa', 25000, '', '1bfe4c6510a086db5aaddb249a16f722.jpeg'),
(61, 48, 'Capuchino', 30000, '', '6a159853518f35e9911e78d93f69b057.jpeg'),
(62, 48, 'Cafe sữa', 25000, '', '34cd9902c0b67a4138a09d4733b783ed.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `id_phanhoi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quan` int(11) NOT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `kiemtra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`id_phanhoi`, `id_user`, `id_quan`, `noidung`, `kiemtra`) VALUES
(3, 35, 17, 'quán sắp đóng cửa', 1),
(4, 18, 15, 'quán sắp đóng cửa', 1),
(5, 24, 48, 'Quán đóng cửa rồi à?', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanan`
--

CREATE TABLE `quanan` (
  `id_quan` int(11) NOT NULL,
  `tenquan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `diadiem` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `vido` double NOT NULL,
  `kinhdo` double NOT NULL,
  `kiemtra` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanan`
--

INSERT INTO `quanan` (`id_quan`, `tenquan`, `diadiem`, `mota`, `loai`, `email`, `sdt`, `anh`, `vido`, `kinhdo`, `kiemtra`, `id_user`) VALUES
(13, 'ICTU HB222', 'Trường ĐH CNTT và truyền thông Thái Nguyên, Phường Tân Thịnh, TP Thái Nguyên', 'Quán cơm ICTU HB222 rất hân hạnh đưuọc phục vụ các bạn. Đến với chúng tôi các bạn sẽ được phục vụ một cách tận tình, với không gian đẹp và chất lượng đồ ăn đảm bảo. Các bạn sẽ có một bữa ăn chọn vẹn', 1, 'ictuh222@gmail.com', '985721222', 'aa7e1829a45de7b5a82f53e4dec79b9b.jpeg', 21.58711412634053, 105.80477138253332, 1, 16),
(14, '2D Coffee', 'Đối diện KTX trường ĐH CNTT Thái Nhuyên, Phường Tân thịnh, TP Thái Nguyên', 'Không gian đẹp, Thực đơn phong phú', 2, '2dcoffee@gmail.com', '934342393', '8bc222e394376394e391dd1359706755.jpeg', 21.586980083815273, 105.80468683780168, 1, 17),
(15, 'Tùng cofee- acoustic', 'đường z115, Tổ 4, phường tân thịnh Thái Nguyên (thành phố)', 'Chuyên phục vụ đồ uống và càfê', 2, 'izzi121292@gmail.com', '2147483647', '2bbd6ba450adf788b6d33b31a280bcf2.jpeg', 21.583540854251208, 105.81016993093226, 1, 18),
(16, 'CRUSH Milk Tea', ' Tân Thịnh, Thành phố Thái Nguyên', 'CRUSH Milk Tea hân hạnh được phục vụ các bạn', 2, 'crushmilktea@gamail.com', '84', 'a964a3bfedbd6238bad51af3e7ca8289.jpeg', 21.583319639299173, 105.80811089418444, 1, 19),
(17, 'Nhà hàng 268', 'Đường Z 115, Quyết Thắng, Thành phố Thái Nguyên', 'Nhà hàng 268 với phương châm “Vui lòng khách đến, vừa lòng khách đi” rất hân hạnh nhận được sự quan tâm, ủng hộ các vị khách quý.', 1, 'nhahang268@gmail.com', '84', '9d3a97936499da99237a0dbffe4462f6.jpeg', 21.58687821272124, 105.80441065619118, 1, 35),
(18, 'Pizza online thái nguyên', 'Tân Thịnh, Thành phố Thái Nguyên', 'Có nhiều loại và nhiều size bánh cho các bạn thoải mãi lựa chọn', 1, 'pizzaonline@gmail.com', '345', '1.jpg', 21.58364142957345, 105.81081268392222, 1, 1),
(21, 'Corner Coffee', 'Tân Thịnh, Thành phố Thái Nguyên', 'Mới lạ, độc đáo', 2, 'cornercoffee@gmail.com', '+84 98 235 92 79', '1bc5832ab551a9853ba5a098c28bec0e.jpeg', 21.586301463363256, 105.8134536409957, 1, 20),
(22, 'Tami Quán', 'Tân Thịnh, Thành phố Thái Nguyên', 'Đồ ăn ngon, giá cả hợp lý. phục vụ chu đáo nhiệt tình.', 1, 'tamiquan@gmail.com', '+84 97 616 55 61', '35a6c0e43d04cfacd08ff4dd37fde7cc.jpeg', 21.58605488270779, 105.8131646767647, 1, 1),
(23, 'Kalbi BBQ', 'Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian đẹp phục vụ chu đáo', 3, 'kalbibbq@gmail.com', '0916953325', '1255bf277fdd2d32004cc70ea28f5af5.png', 21.582135059048905, 105.81201991109742, 1, 1),
(24, 'Cà Phê Hoàng Gia', 'Hoàng Gia, Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian đẹp phục vụ chu đáo', 2, 'cofeehoanggia@gmail.com', '+84 91 525 98 88', 'fe0221c513b2e969610e36247fd3e981.jpeg', 21.579173769290318, 105.81665799021687, 1, 1),
(25, 'Quán Bia Hoan Hoa', 'Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng, phục vụ tận tình chu đáo', 2, 'hoanhoa12@gmail.com', '0337158215', 'd445d503c3d2437ef20b07d8e2e3e0ea.jpeg', 21.57892450486195, 105.81663895130976, 1, 1),
(26, 'Nhà Hàng Trần Huân', 'Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Món ăn ngon, phong phú, phục vụ chu đáo.', 4, 'tranhuan@gmail.com', '+84 91 440 55 23', '3c86d40ce45190e2f6437eb63b35c90e.jpeg', 21.57775626724402, 105.81775751608666, 1, 1),
(27, 'Nhà hàng Việt Thái', 'Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian thoả mãi,', 4, 'NhahangVietThai@gmail.com', '0976 888 277', '3bab6204506accdd28f1fa736b5a5bf8.jpeg', 21.57851249138495, 105.81383228302002, 1, 1),
(28, 'Quán cay Đức Huệ', '255 Quang Trung, Tân Thịnh, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Địa điểm ăn lẩu nướng ngon, bổ, rẻ. Hợp với các bạn sinh viên', 3, 'DucHue@gmail.com', '+84 96 692 22 88', '61633ac666aac4529ca3fd3f1fc35cf0.png', 21.57699599465131, 105.81377863883972, 1, 1),
(29, 'Nhà Hàng Hoàng Lực', 'Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Ngon, bổ ,rẻ,', 1, 'NhaHangHoangLuc@gmail.com', '+84 97 251 30 22', '1.jpg', 21.5746763225567, 105.81366062164307, 0, 1),
(30, 'Nhà Hàng Ẩm Thực Bia Hơi 26', 'Tòa nhà Victory, 5, Hoàng Văn Thụ, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Có nhiều món ăn ngon, so với những  ở khu Phú Mỹ Hưng thì giá ở đây rẻ', 4, 'Amthucbiahoi@gmail.com', '+84 91 666 38 98', '665e01e2db409dea17d53b1c22e446ed.jpeg', 21.574242315266552, 105.81002354621887, 1, 1),
(31, 'Danbo Quán', 'tổ 20 phường gần, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng,thoáng, đẹp. Cà phê ngon, thức ăn đa dạng, giá cả hợp lý.', 1, 'DanboQuan@gmail.com', '+84 96 585 60 78', '60926fad5228e261ee40790669cf95e4.jpeg', 21.57164822160093, 105.81378936767578, 1, 1),
(32, 'Trà Sữa Bumba', '397 Quang Trung, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng rãi ,thoải mãi', 2, 'TrasuaBumba@gmail.com', '+84 97 811 66 11', 'b97ab80fd18d7ac7624d79e1a48910af.jpeg', 21.574102634482866, 105.81289887428284, 1, 1),
(33, 'Son nga Com Pho', 'Ngõ 417 Đường Quang Trung, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Ngon,bổ ,rẻ', 1, 'Compho@gmail.com', '+84 98 694 43 56', '1.jpg', 21.57203733861111, 105.81304371356964, 0, 1),
(34, 'Nhà Hàng Thanh Hương', '354, Quang Trung, Phường Thịnh Đán, Thành Phố Thái Nguyên, Tỉnh Thái Nguyên, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian thoả mãi ,đồ ăn phong phú , giá cả phải chăng ', 4, 'NhaHangThanhHuong@gmail.com', '+84 97 751 32 68', '652f57abcff67907bcc47acc494482ff.jpeg', 21.571907633057137, 105.81193327903748, 1, 1),
(35, 'Bún Phở Đức Tuấn', 'Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Bún phở gia truyền ', 1, 'BunphoDucTuan@gmail.com', '0345 989 588', '1.jpg', 21.570296281303783, 105.81167578697205, 0, 1),
(36, 'Lẩu nướng tây bắc', 'Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian thoáng đáng ,giá cả phải chăng..', 3, 'LauNuongTayBac@gmail.com', '0365 744 898', '7f0c171d57dc154460c4ae82374d241f.jpeg', 21.569717587137664, 105.81119298934937, 1, 1),
(37, 'Offline Coffee', 'Khu dân cư số 6 - Thịnh Đán, Khu dân cư số 6, Thái Nguyên, 250000, Việt Nam', 'Offline coffee không chỉ là nơi để thưởng thức cà phê mà còn là nơi để giải trí và ca hát. Ngoài cà phê ở đây còn kinh doanh cả trà sữa và sinh tố giúp đa dạng hơn lựa chọn cho những tí đồ ăn uống . Bạn muốn ngắm cảnh thì không gian trên …', 2, 'OfflineCoffee@gmail.com', '+84 97 512 71 28', 'c935c096c8d9f5d2f199515dad8e3a5c.jpeg', 21.57073030041202, 105.81068873405457, 1, 1),
(38, 'Quán Bún cá ngon - Loan quán', 'Unnamed Road, Khu dân cư số 6, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Bún ngon, địa điểm đẹp,', 1, 'Loanquan@gmail.com', '+84 98 979 12 14', '1.jpg', 21.56943322795078, 105.81060290336609, 0, 1),
(39, 'Trà đá Hoa Sơn', 'Unnamed Road, Thịnh Đán, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian thoả mãi', 2, 'TraDaHoaSon@gmail.com', '+84 91 233 34 42', '1.jpg', 21.564160010009886, 105.80909550189972, 0, 1),
(40, 'Khách Sạn Hoàng Mấm - Minh Cầu', '02 Đường Minh Cầu, Phan Đình Phùng, Thành phố Thái Nguyên, Phan Đình Phùng, Việt Nam', 'Không gian thoả mãi', 5, 'KSHoanngMamMinhCau@gmail.com', '+84 869 344 288', '142035aed346a71ad4965bf8a2740415.jpeg', 21.5915018326898, 105.83447456359863, 1, 1),
(41, 'Khách sạn Đông Á 1', '142 Hoàng Văn Thụ, Phan Đình Phùng, Thành phố Thái Nguyên, Thái Nguyên 250000, Việt Nam', 'không gian phòng thoáng đáng, đầy đủ tiện nghi, ', 5, 'KSDongA1@gmail.com', '+84 98 114 62 88', 'acb3bb057d72a7f93a37744564bc097a.jpeg', 21.58968618836228, 105.83022594451904, 1, 1),
(42, 'Khách sạn Đại Dương', 'Hàng Văn Thụ0, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Khách sạn Đại Dương phòng đẹp tiện nghi', 5, 'KSDaiDuongg@mail.com', '0334 567 988', '6acffbddb667e3b863ca167c1b57e235.jpeg', 21.589600144213005, 105.82879230380058, 1, 1),
(43, 'Khách sạn Đông Á 2', 'Đồng Quang, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Phòng đẹp ,tiện nghi ,giá cả phải chăng', 5, 'ksdonga2@gmail.com', '+84 208 3840 840', 'a82b665125c5fe81ac2c577e3af70ec4.jpeg', 21.58499483709933, 105.82667738199234, 1, 1),
(44, 'Khách sạn Minh Cầu', 'Hoàng Văn Thụ, Phan Đình Phùng, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng, đẹp,tiện nghi, giá cả phù hợp', 5, 'ksminhcau@gmail.com', '+84 208 3654 777', '73ff6fe6128f6924b3a0f7312d889762.jpeg', 21.589626331568194, 105.8367919921875, 1, 1),
(45, 'Nhà Hàng Gimbab Hàn Quốc', '178 Đường Minh Cầu, Phan Đình Phùng, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'chuyên đồ ăn Hàn Quốc', 4, 'gimbabhanquoc@gmail.com', '+84 208 6255 588', '36a3abe44023f00d9e64027163d96781.jpeg', 21.58747147050123, 105.83929181098938, 1, 1),
(46, 'No.1 Cafe', '1 Phù Liễn, Hàng Văn Thụ, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng rãi, đẹp', 2, 'No.1Cafe@gmail.com', '+84 98 795 98 38', 'f416cee936c6ebdcb689db1d304bdf41.jpeg', 21.59541237390249, 105.83738207817078, 1, 1),
(47, 'Khách sạn Kim Thái Hotel', '3 Hoàng Văn Thụ, Phan Đình Phùng, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', ' không gian phòng đẹp,thoải mãi', 5, 'kimthaihotel@gmail.com', '+84 208 3933 566', '5369a3ca713862525755b72eb298ab0d.jpeg', 21.594504579107703, 105.83757519721985, 1, 1),
(48, 'CHUM COFFEE', 'ngõ 25 Phù Liễn, Hàng Văn Thụ, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Đến với CHUM COFFE quý khách sẽ được tận hưởng đồ uống ngon, không gian gợi nhớ  phòng khách những năm 90!', 2, 'chumcoffe@gmail.com', '+84 96 668 65 55', 'dbebedbf932f3cb650a6804e723d3190.jpeg', 21.594454700107814, 105.83512902259827, 1, 1),
(49, 'Cafe Trung Nguyên', 'Bắc Cạn, Trưng Vương, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian quán thoáng, views nhìn ra sông Cầu. Khá yên tĩnh, thích hợp để làm việc', 2, 'cafetrungnguyen@gmail.com', '0979 888 298', '1.jpg', 21.59816565076716, 105.8361804485321, 0, 1),
(50, 'Nhà Hàng Thuận Yến', 'Phú Xá, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian đẹp, phục vụ chu đáo, món ăn phong phú, hấp dẫn', 4, 'Thuanyen@gmail.com', '+84 386 796 053', '1.jpg', 21.555032860585424, 105.85263085322356, 0, 1),
(51, 'Nhà Hàng 1982', '192b, Phú Xá, Thành phố Thái Nguyên, Thái Nguyên, Việt Nam', 'Không gian rộng thoáng, đẹp. món ăn phong phú chắc chắc sẽ làm hài lòng quý khách', 4, '1982@gmail.com', '0988537145', '1.jpg', 21.552262036537925, 105.84889696940695, 0, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hovaten`, `ngaysinh`, `gioitinh`, `email`, `sdt`, `anhdaidien`, `quyen`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'TranVietTam', '1997-10-09', 1, 'trantam910.dev@gmail.com', 963230121, 'f994035ff8b5d14545fb303d8b3455a3.jpeg', 1),
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
(35, 'user5', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Đình Hậu', '1997-03-28', 1, 'user5@gmail.com', 13456789, 'a.jpg', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_monan`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`id_phanhoi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quan` (`id_quan`);

--
-- Chỉ mục cho bảng `quanan`
--
ALTER TABLE `quanan`
  ADD PRIMARY KEY (`id_quan`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `id_monan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id_phanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quanan`
--
ALTER TABLE `quanan`
  MODIFY `id_quan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Các ràng buộc cho bảng `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`id_quan`) REFERENCES `quanan` (`id_quan`);

--
-- Các ràng buộc cho bảng `quanan`
--
ALTER TABLE `quanan`
  ADD CONSTRAINT `quanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
