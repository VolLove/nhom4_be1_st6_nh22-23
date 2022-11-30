-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 26, 2022 lúc 11:41 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `password` text CHARACTER SET armscii8 NOT NULL,
  `fullname` varchar(100) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'quocviet123', '123456789', 'Quoc Viet'),
(2, 'vanlam123', '123456789', 'Van Lam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(10) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Samsung'),
(2, 'Realme'),
(3, 'MacBook'),
(4, 'SONY'),
(5, 'Asus'),
(6, 'Apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `created_at`) VALUES
(1, 'Samsung Galaxy S22 Ultra (8GB - 128GB)', 1, 1, 25990000, 'Samsung-Galaxy-S22-Ultra(8GB-128GB).jpg', 'Vi xử lý mạnh mẽ nhất Galaxy - Snapdragon 8 Gen 1 (4 nm)\r\nCamera mắt thần bóng đêm Nightography - Chụp đêm cực đỉnh\r\nS Pen đầu tiên trên Galaxy S - Độ trễ thấp, dễ thao tác\r\nDung lượng pin bất chấp ngày đêm - Viên pin 5000mAh, sạc nhanh 45W', '2022-10-27 17:00:00'),
(2, 'Màn hình thông minh Samsung LS32AM700NEXXV 32 inch', 1, 5, 7490000, 'Samsung-LS32AM700NEXXV-32-inch.png', 'Màn hình 32 inch tỷ lệ 16:9\r\nĐộ phân giải 4K 3840 x 2160\r\nTần số quét 60Hz\r\nTương thích công nghệ Samsung DeX\r\nTích hợp Office 365 và Smart TV\r\nChế độ điều khiển từ xa Smart Monitoring', '2022-10-27 17:00:00'),
(3, 'Điện thoại Realme 9 Pro+ 5G', 2, 1, 8990000, 'Điện-thoại-Realme-9-Pro+-5G.jpg', 'Realme 9 Pro+ 5G - chiếc smartphone tầm trung của Realme đã được ra mắt, máy có một thiết kế đầy màu sắc, cụm 3 camera với cảm biến IMX766 giúp bạn có được những bức ảnh sinh động.', '2022-10-27 17:00:00'),
(4, 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', 3, 2, 33490000, 'apple-macbook-air-m1-2020-z124000de-(22).jpg', 'Laptop Apple Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.', '2022-10-27 17:00:00'),
(5, 'Loa Bluetooth JBL Partybox 110 ', 4, 3, 11900000, 'loa-bluetooth-jbl-partybox-110-imei-1.jpg', 'Loa Bluetooth JBL Partybox 110 mang đến thiết kế sang trọng, trang bị đèn LED nổi bật, chất âm sống động,... hứa hẹn sẽ nâng cao trải nghiệm âm nhạc của bạn.', '2022-10-27 17:00:00'),
(6, 'Laptop Asus TUF Gaming FX506LHB i5 10300H/8GB/512GB/4GB GTX1650/144Hz/Win11', 5, 2, 19990000, 'asus-tuf-gaming-fx506lhb-i5-hn188w-(14).jpg', 'Nếu bạn đang tìm kiếm một chiếc laptop gaming nhưng vẫn sở hữu một mức giá phải chăng thì laptop Asus TUF Gaming FX506LHB i5 (HN188W) sẽ là sự lựa chọn đáng cân nhắc với card đồ họa rời NVIDIA GeForce GTX mạnh mẽ cùng phong cách thiết kế cứng cáp, độc đáo. ', '2022-10-27 17:00:00'),
(7, 'Tai nghe chụp tai Gaming Asus TUF H3 Đen Đỏ', 5, 4, 990000, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-600x600.jpg', 'Thiết kế thời thượng, kiểu chụp tai ôm trọn đầu tiện dụng.\r\nÂm thanh rộng, chi tiết với màng loa ASUS Essence lớn 50 mm và công nghệ buồng cách âm độc quyền.\r\nTrải nghiệm âm thanh sống động qua công nghệ âm thanh vòm 7.1 được hỗ trợ bởi Windows Sonic.\r\nTương thích với các thiết bị điện thoại, PC, Mac, PS4, Nintendo Switch, Xbox,...\r\nMicro truyền tải âm thanh tốt, dễ dàng giao tiếp trong game.', '2022-10-27 17:00:00'),
(8, 'Màn hình Asus VY279HE 27 inch Full HD/75Hz/1ms', 5, 5, 4190000, 'vi-vn-asus-lcd-27-inch-fullhd-1.jpg', 'Màn hình Asus LCD 27 inch (VY279HE) là phiên bản màn hình máy tính sở hữu các thông số công nghệ màn hình lý tưởng mang đến những khung ảnh sắc nét đắm chìm bạn vào thế giới ảo sinh động như thật.', '2022-10-27 17:00:00'),
(9, 'Laptop Apple MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB SSD/32 core-GPU (MK1A3SA/A)', 3, 2, 85990000, 'apple-macbook-pro-16-m1-max-2021-600x600.jpg', 'Thật ấn tượng với Apple MacBook Pro 16 M1 Max 2021 mang trên mình \"bộ áo mới\" độc đáo, cuốn hút mọi ánh nhìn cùng màn hình tai thỏ lần đầu tiên xuất hiện ở dòng Mac và ẩn bên trong là bộ cấu hình mạnh mẽ tuyệt vời đến từ con chip M1 Max tân tiến.', '2022-10-27 17:00:00'),
(12, 'Điện thoại Realme 9i (4GB/64GB)', 2, 1, 5490000, 'realme-9i-den-thumb-600x600.jpg', 'Realme đang ngày càng cải thiện hơn rất nhiều ở các sản phẩm của họ và sản phẩm gần đây nhất đó là dòng điện thoại Realme 9i. Chiếc điện thoại này được sở hữu con chip Snapdragon 680 kết hợp cùng với các tiện ích khác, hứa hẹn sẽ mang lại cho bạn sự trải nghiệm hiệu năng ổn định, mượt mà.', '2022-10-29 02:29:10'),
(13, 'Điện thoại iPhone 13 128GB', 6, 1, 24990000, 'iphone-13-starlight-1-600x600.jpg', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', '2022-10-29 02:42:41'),
(11, 'Laptop MacBook Pro 14 M1 Pro 2021 8-core CPU/16GB/512GB/14-core GPU (MKGR3SA/A)', 3, 2, 52490000, 'apple-macbook-pro-14-m1-pro-2021-600x600.jpg', 'Sự đẳng cấp không chỉ ở thiết kế thời thượng, sang trọng mà còn sở hữu sức mạnh siêu năng với con chip Apple M1 Pro, phiên bản nâng cấp ấn tượng đến từ nhà Apple, mang đến cho bạn trải nghiệm làm việc chuyên nghiệp nhất dù là các tác vụ laptop đồ họa - kỹ thuật chuyên sâu.', '2022-10-28 23:45:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(5, 'Man hinh'),
(4, 'Tai nghe'),
(3, 'Loa'),
(2, 'Laptop'),
(1, 'Dien thoai');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
