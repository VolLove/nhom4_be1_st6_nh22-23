-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 08, 2022 lúc 01:44 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'quocviet123', '123456789', 'Quoc Viet'),
(2, 'vanlam123', '123456789', 'Van Lam'),
(7, '20211tt1631', '', 's'),
(5, 'vietvollove123', '1', 'New user');

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
  `details` text COLLATE utf8_unicode_ci,
  `sales` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `created_at`, `details`, `sales`) VALUES
(1, 'Samsung Galaxy S22 Ultra (8GB - 128GB)', 1, 1, 25990000, 'Samsung-Galaxy-S22-Ultra(8GB-128GB).jpg', 'Vi xử lý mạnh mẽ nhất Galaxy - Snapdragon 8 Gen 1 (4 nm)\r\nCamera mắt thần bóng đêm Nightography - Chụp đêm cực đỉnh\r\nS Pen đầu tiên trên Galaxy S - Độ trễ thấp, dễ thao tác\r\nDung lượng pin bất chấp ngày đêm - Viên pin 5000mAh, sạc nhanh 45W', '2022-10-27 17:00:00', 'Galaxy S22 Ultra 5G được kế thừa form thiết kế từ những dòng Note trước đây của hãng đem đến cho bạn có cảm giác vừa mới lạ vừa hoài niệm. Trọng lượng của máy 228 g cho cảm giác cầm nắm đầm tay, khi cầm máy trần thì hơi có cảm giác dễ trượt.\r\n\r\nPhần mặt lưng điện thoại được làm nhám nên hạn chế tốt việc bám dấu vân tay, có thiết kế cũng khá đơn giản nhưng vẫn toát lên vẻ sang trọng và cao cấp của chiếc máy. Cụm camera sau trên Galaxy S22 Ultra 5G được thiết kế trần tạo cảm giác gọn gàng và cũng tạo nên một điểm nhấn độc đáo cho chiếc máy.\r\nCó thể nói Galaxy S22 Ultra 5G chính là chiếc máy đầu tiên được tích hợp bút S Pen hoàn hảo trong một thân máy của dòng Galaxy S. Giờ đây, bạn có thể dễ dàng phác thảo, ghi chú lại những ý tưởng vô cùng nhanh chóng với độ trễ đã được cải thiện cho cảm giác viết vẽ vô cùng chân thật.\r\nHiệu năng trên Galaxy S22 Ultra 5G là điều khỏi bàn cãi khi máy sử dụng chip Snapdragon 8 Gen 1 vô cùng mạnh mẽ với tiến trình sản xuất 4 nm. Khi máy chơi game cũng chỉ ấm lên một chút ở vị trí cụm camera chứ không hoàn toàn quá nóng như những sản phẩm khác khi dùng cùng con chip này.\r\n\r\nMáy dễ dàng vượt qua được các tựa game Liên Quân, PUBG Mobile, cài đặt cấu hình tối đa thì biểu đồ FPS trên Galaxy S22 Ultra 5G vẫn khá ổn định, không bị drop quá nhiều. Kể cả tựa game Genshin Impact ở mức đồ họa mặc định thì máy chơi vẫn mượt mà, đồ họa hiển thị đẹp mắt.\r\n\r\nCòn nói về các tác vụ cơ bản như lướt web, đọc báo, xem YouTube,... thì máy hoàn thành một cách dễ dàng, sử dụng mượt mà, khả năng đa nhiệm thoải mái với RAM 8 GB.', 2),
(2, 'Màn hình thông minh Samsung LS32AM700NEXXV 32 inch', 1, 5, 7490000, 'Samsung-LS32AM700NEXXV-32-inch.png', 'Màn hình 32 inch tỷ lệ 16:9\r\nĐộ phân giải 4K 3840 x 2160\r\nTần số quét 60Hz\r\nTương thích công nghệ Samsung DeX\r\nTích hợp Office 365 và Smart TV\r\nChế độ điều khiển từ xa Smart Monitoring', '2022-10-27 17:00:00', 'Thỏa mãn mọi nhu cầu bạn cần trong cuộc sống với màn hình thông minh Samsung. Giải quyết hiệu quả công việc mà không cần máy tính với Microsoft Office 365 hoặc truy cập từ xa dễ dàng vào máy tính văn phòng. Với đa dạng hình thức giải trí tích hợp, màn hình mang đến cho bạn những phút giây thư giãn trọn vẹn, giải tỏa căng thẳng hiệu quả hơn.\r\nTruy cập dễ dàng vào các ứng dụng giải trí như Netflix, YouTube và HBO mà không cần bật laptop hay máy tính để bàn. Điều khiển từ xa và loa tích hợp mang đến cho bạn không gian giải trí đỉnh cao, thoải mái thư giãn trọn vẹn.\r\nSạc nguồn, truyền dữ liệu hoặc gửi tín hiệu truyền hình ảnh giữa các thiết bị chỉ với một kết nối USB type-C duy nhất. Tận hưởng môi trường làm việc tinh giản, hạn chế tình trạng dây cáp lộn xộn.Kết nối không dây DeX mang đến trải nghiệm PC đầy đủ nhất. Đơn giản kết nối điện thoại với màn hình để sử dụng các ứng dụng di động với trải nghiệm như máy tính để bàn. Thoải mái tham dự các cuộc họp trực tuyến, duyệt web hay đọc tài liệu mượt mà như đang sử dụng trên máy tính. Hoặc nhanh chóng thưởng thức hình ảnh hoặc xem phim trên màn hình lớn thông qua tính năng Tap View tiện lợi.\r\nKết nối không dây DeX mang đến trải nghiệm PC đầy đủ nhất. Đơn giản kết nối điện thoại với màn hình để sử dụng các ứng dụng di động với trải nghiệm như máy tính để bàn. Thoải mái tham dự các cuộc họp trực tuyến, duyệt web hay đọc tài liệu mượt mà như đang sử dụng trên máy tính. Hoặc nhanh chóng thưởng thức hình ảnh hoặc xem phim trên màn hình lớn thông qua tính năng Tap View tiện lợi.', 5),
(3, 'Điện thoại Realme 9 Pro+ 5G', 2, 1, 8990000, 'Điện-thoại-Realme-9-Pro+-5G.jpg', 'Realme 9 Pro+ 5G - chiếc smartphone tầm trung của Realme đã được ra mắt, máy có một thiết kế đầy màu sắc, cụm 3 camera với cảm biến IMX766 giúp bạn có được những bức ảnh sinh động.', '2022-10-27 17:00:00', 'Realme 9 Pro+ 5G với thiết kế Light Shift trên phiên bản Lam Hừng Đông hoàn toàn mới, có thể thay đổi màu từ xanh lam nhạt sang đỏ khi tiếp xúc với ánh sáng mặt trời đẹp tựa như cảnh bình minh. Còn một phiên bản màu khác là Lục Cực Quang cũng cực kỳ đẹp mắt.\r\nRealme cũng đã phủ lên điện thoại của mình một lớp hoàn thiện đặc biệt để tạo ra dải ánh sáng lấp lánh đầy màu sắc tuyệt đẹp, chạy dọc mặt lưng tạo thành điểm nhấn độc đáo hấp dẫn mọi ánh nhìn ngay từ lần đầu tiên.\r\nRealme 9 Pro+ có khung viền được hoàn thiện từ nhựa, mặt lưng kính bóng bẩy, thiết kế khá cứng cáp, các chi tiết gia công tỉ mỉ, không gặp tình trạng ọp ẹp.\r\nMặt lưng của máy được vát cong về phía trước, nên tạo cảm giác máy rất mỏng, sử dụng rất thoải mái, chắc tay.', 0),
(4, 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', 3, 2, 33490000, 'apple-macbook-air-m1-2020-z124000de-(22).jpg', 'Laptop Apple Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.', '2022-10-27 17:00:00', 'Chip M1 được Apple thiết kế dành riêng cho MacBook mang đến hiệu năng vượt trội. Thực hiện tốt các tác vụ văn phòng trên các phần mềm như Word, Excel, Powerpoint,... Thiết kế đồ hoạ cũng chuyên nghiệp không kém, cho phép bạn chỉnh sửa hình ảnh với dung lượng lớn, kết xuất 2D mượt mà trên các phần mềm Photoshop, AI, Figma,...\r\n\r\nCard đồ họa GPU 7 nhân đem lại hiệu suất cao đáng kinh ngạc, đồ họa cao hơn gấp 5 lần, thoả sức sáng tạo nội dung, kết xuất 3D ổn định, render video, phát trực tiếp với chất lượng cao với chất ảnh sắc nét cùng độ phân giải lên đến 4K.\r\n\r\nLaptop RAM 16 GB cho phép bạn sử dụng đa nhiệm, bạn có thể thao tác nhiều ứng dụng cùng một lúc thoải mái với những tác vụ như lướt web, soạn thảo văn bản, xem video hay thiết kế hình ảnh bằng Photoshop, Adobe Illustrator,...\r\nỔ cứng SSD 256 GB giúp máy có tốc độ đọc ghi nhanh chóng đồng thời mang lại không gian bộ nhớ đủ lớn phục vụ cho nhu cầu lưu trữ của bạn như tài liệu trong học tập, dữ liệu trong công việc, các bộ phim hoặc bản nhạc trong giải trí. Đồng thời, tiết kiệm được thời gian khởi động máy hoặc mở các ứng dụng nặng, cải thiện được thời gian mở nhanh chóng hơn.\r\n\r\nMàn hình 13.3 inch Retina cho hình ảnh chi tiết, sắc nét với độ phân giải 2560 × 1600, màn hình mới này có gam màu rộng P3 và độ phủ màu 125% sRGB cho những màu sắc chân thật và chính xác nhất. Cùng với đó là độ sáng lên đến 400 nits đem đến khung hình rực rỡ, tươi sáng, hiển thị tốt kể cả khi sử dụng ở nơi có cường độ ánh sáng cao.\r\n\r\nCông nghệ True Tone Technology trên MacBook Air tự điều chỉnh điểm trắng, ánh sáng và màu sắc của màn hình theo nhiệt độ, ánh sáng của môi trường để có trải nghiệm hình ảnh tự nhiên hơn. \r\nHệ thống loa kép cho âm thanh to rõ, sống động để bạn có trải nghiệm nghe nhạc, xem phim và gọi điện trực tuyến thoải mái với âm thanh chất lượng cao. Tạo cho bạn cảm giác đắm chìm trong những chương trình giải trí hấp dẫn.\r\n\r\n', 0),
(5, 'Loa Bluetooth JBL Partybox 110 ', 4, 3, 11900000, 'loa-bluetooth-jbl-partybox-110-imei-1.jpg', 'Loa Bluetooth JBL Partybox 110 mang đến thiết kế sang trọng, trang bị đèn LED nổi bật, chất âm sống động,... hứa hẹn sẽ nâng cao trải nghiệm âm nhạc của bạn.', '2022-10-27 17:00:00', '• Thiết kế đơn giản, gọn gàng, màu đen sang trọng bao bọc trọn vẹn loa. Chân đế cao su giúp loa bám chắc vào mặt phẳng cho bạn yên tâm khi sử dụng.\r\n\r\n• Tay cầm tiện lợi, dễ dàng di chuyển, đồng hành cùng bạn trong mọi bữa tiệc, thoải mái tận hưởng âm nhạc cùng bạn bè.\r\n\r\n• Trang bị đèn LED nổi bật cho không gian bày trí thêm “nghệ thuật”, đặc biệt phần LED sẽ vô cùng nổi bật khi tắt đèn và dùng vào buổi tối.\r\n\r\n• Âm thanh sống động, dải âm được thể hiện chi tiết, âm trầm mạnh mẽ, âm treble trong trẻo.\r\n\r\n• Kết nối Bluetooth 5.1 hiện đại cho khả năng kết nối xa tới 10 m mà âm thanh vẫn mượt mà, không bị đứt quãng.\r\n\r\n• Chống nước IPX4 cho bạn yên tâm sử dụng khi có những cơn mưa bất chợt hoặc vô tình bị tạt nước. Tuy nhiên, để thiết bị hoạt động tốt nhất, bạn cần hạn chế tối đa việc loa tiếp xúc với nước.\r\n\r\n• Nút bấm nổi ở mặt trên của loa cho phép dễ dàng điều khiển các chức năng như: Chuyển bài hát, chỉnh Bass, kết nối Bluetooth, phát/dừng nhạc, tăng/giảm âm lượng.\r\n\r\n• Sử dụng liên tục 12 tiếng mà chỉ mất 3.5 giờ để sạc đầy, loa JBL sẽ giúp trải nghiệm của bạn được liền mạch, xuyên suốt trong thời gian dài.', 0),
(6, 'Laptop Asus TUF Gaming FX506LHB i5 10300H/8GB/512GB/4GB GTX1650/144Hz/Win11', 5, 2, 19990000, 'asus-tuf-gaming-fx506lhb-i5-hn188w-(14).jpg', 'Nếu bạn đang tìm kiếm một chiếc laptop gaming nhưng vẫn sở hữu một mức giá phải chăng thì laptop Asus TUF Gaming FX506LHB i5 (HN188W) sẽ là sự lựa chọn đáng cân nhắc với card đồ họa rời NVIDIA GeForce GTX mạnh mẽ cùng phong cách thiết kế cứng cáp, độc đáo. ', '2022-10-27 17:00:00', '• Chạy mượt mà các ứng dụng văn phòng trên Word, Excel, PowerPoint,... đến chiến những con game đình đám nhờ bộ vi xử lý Intel Core i5 10300H kết hợp với card đồ họa rời NVIDIA GeForce GTX 1650 4 GB mạnh mẽ. \r\n\r\n• Laptop Asus đa nhiệm mượt mà trên nhiều cửa sổ Chrome cùng lúc nhờ bộ nhớ RAM 8 GB, bên cạnh đó còn mang đến tốc độ khởi động máy và ứng dụng nhanh chóng với ổ cứng SSD 512 GB.   \r\n\r\n• Laptop có kích thước màn hình 15.6 inch cùng tần số quét 144 Hz mang đến những trải nghiệm chiến game cực đỉnh, không bị giật lag hay xé hình khi chơi những tựa game có tốc độ cao.\r\n\r\n• Laptop Asus TUF Gaming được bao bọc bởi lớp vỏ nhựa màu đen huyền bí, khối lượng 2.3 kg cho phép bạn chiến game ở mọi không gian.\r\n\r\n• Máy được trang bị đèn bàn phím chuyển màu RGB độc đáo, tăng độ hăng hái cho game thủ mỗi khi chiến game.', 0),
(7, 'Tai nghe chụp tai Gaming Asus TUF H3 Đen Đỏ', 5, 4, 990000, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-600x600.jpg', 'Thiết kế thời thượng, kiểu chụp tai ôm trọn đầu tiện dụng.\r\nÂm thanh rộng, chi tiết với màng loa ASUS Essence lớn 50 mm và công nghệ buồng cách âm độc quyền.\r\nTrải nghiệm âm thanh sống động qua công nghệ âm thanh vòm 7.1 được hỗ trợ bởi Windows Sonic.\r\nTương thích với các thiết bị điện thoại, PC, Mac, PS4, Nintendo Switch, Xbox,...\r\nMicro truyền tải âm thanh tốt, dễ dàng giao tiếp trong game.', '2022-10-27 17:00:00', 'Về kiểu dáng, cảm nhận đầu tiên khi nhìn qua Gaming TUF H3 thì mình thấy cũng khá giống như chiếc tai nghe Gaming Corsair HS50 PRO Stereo Carbon. Phần chụp tai có form hình bầu dục, đệm tai có lớp bọc được làm kết hợp từ hai chất liệu là da cùng mút hoạt tính, mang lại sự vừa vặn, thoải mái kể cả các bạn có khuôn tai to, đeo vào khá êm và không bị cấn tai.\r\nỞ mặt ngoài thiết kế, tai nghe tuy không trang bị đèn LED RGB nhưng logo TUF GAMING được khắc ở ngay bề mặt ngoài của phần chụp tai cực kì đẹp mắt và trông khá “cool ngầu”.\r\n\r\nKế tiếp, phần gọng tai nghe là thép chống gỉ được gia công trông rất chắc chắn và bền bỉ, lực ép ở gọng tai khi đeo tương đối dễ chịu, mình có đưa cho bạn mình đeo thử kể cả các bạn đeo kính, đeo khoảng 2 - 3 tiếng vẫn rất thoải mái, không có cảm giác bị áp quá chặt vào tai hay trên đỉnh đầu.\r\nPhần quai đeo ở đầu cũng khá mềm mại được gia công với chất liệu da có độ hoàn thiện tốt, đường chỉ may đều đặn, không hề có chỉ thừa, được in thêm cụm TUF GAMING làm điểm nhấn cho tai nghe.', 0),
(8, 'Màn hình Asus VY279HE 27 inch Full HD/75Hz/1ms', 5, 5, 4190000, 'vi-vn-asus-lcd-27-inch-fullhd-1.jpg', 'Màn hình Asus LCD 27 inch (VY279HE) là phiên bản màn hình máy tính sở hữu các thông số công nghệ màn hình lý tưởng mang đến những khung ảnh sắc nét đắm chìm bạn vào thế giới ảo sinh động như thật.', '2022-10-27 17:00:00', '• Màn hình phẳng 27 inch có độ phân giải Full HD (1920 x 1080) mang đến không gian hiển thị rộng lớn, cung cấp những khung hình sắc nét, đồng thời vẫn đảm bảo giữ nguyên vẹn chất lượng hình dù bạn nhìn ở mọi tư thế khác nhau với góc rộng lên đến 178 độ nhờ tấm nền IPS tiên tiến.\r\n\r\n• Tần số quét 75 Hz cùng độ sáng 250 cd/m2 cung cấp đầy đủ lượng ánh sáng cần thiết giúp hiển thị rõ nét toàn bộ nội dung trên màn hình mà không sợ xé hình hay mờ hình dù bạn làm việc trong nhà hay ngoài trời.\r\n\r\n• Sở hữu 16.7 triệu màu cùng tỉ lệ tương phản tĩnh 100000000:1 mang đến trải nghiệm màu sắc vượt trội với độ tái tạo màu sắc nét, thao tác chuyển động cũng mượt mà và chân thật hơn dù ở tốc độ nhanh.\r\n\r\n• Thời gian phản hồi 1 ms cung cấp tốc độ phản hồi nhanh chóng, giúp các pha hành động trên game trở nên lôi cuốn hơn bao giờ hết.\r\n\r\n• Sự kết hợp giữa 2 công nghệ ASUS Eye Care và Low Blue Light bảo vệ tối đa thị giác của người dùng với 4 cấp độ tùy chỉnh lọc ánh sáng xanh khác nhau, độ rung được giảm xuống mức đáng kể giúp bạn làm việc nhiều giờ liền vẫn không bị mỏi mắt.\r\n\r\n• Phong cách thiết kế tối giản có gam màu đen chủ đạo giúp màn hình máy tính Asus được nổi bật lên khi đặt máy ở các sảnh tiếp tân, góc văn phòng,... Trọng lượng máy chỉ vỏn vẹn 3.68 kg và 4.21 kg khi có thêm chân đế, giúp bạn di chuyển máy đến bất kì vị trí làm việc nào mà không cần tốn quá nhiều công sức hay thời gian lắp đặt.\r\n\r\n• Máy được trang bị các cổng kết nối bao gồm HDMI, jack tai nghe và VGA giúp truyền tải dữ liệu đến các thiết bị ngoại vi khác dễ dàng hơn mà không cần đến adapter rườm rà, phức tạp.', 9),
(9, 'Laptop Apple MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB SSD/32 core-GPU (MK1A3SA/A)', 3, 2, 85990000, 'apple-macbook-pro-16-m1-max-2021-600x600.jpg', 'Thật ấn tượng với Apple MacBook Pro 16 M1 Max 2021 mang trên mình \"bộ áo mới\" độc đáo, cuốn hút mọi ánh nhìn cùng màn hình tai thỏ lần đầu tiên xuất hiện ở dòng Mac và ẩn bên trong là bộ cấu hình mạnh mẽ tuyệt vời đến từ con chip M1 Max tân tiến.', '2022-10-27 17:00:00', 'MacBook Pro 16 inch với những cải tiến vượt bậc về mặt hiệu năng, hứa hẹn giúp người dùng có trải nghiệm mượt mà trong các tác vụ nặng như chỉnh sửa hình ảnh phức tạp, render video,... hướng đến đối tượng người dùng có nhu cầu sản xuất, sáng tạo nội dung, kỹ thuật, công nghệ chuyên nghiệp.\r\n\r\nCon chip Apple M1 Max mang một sức mạnh siêu cấp với cấu trúc 10 nhân và tốc độ băng trong lên đến 400 GB/s memory bandwidth cho hiệu suất của Apple nhanh hơn khoảng 70% so với thế hệ tiền nhiệm Apple M1, từ đó mang lại cho bạn một tốc độ xử lý đáng kinh ngạc giúp giải quyết tốt từ các công việc văn phòng cơ bản đến phức tạp trên các phần mềm Office 365 cũng như đồ họa chuyên nghiệp trên Figma, Photoshop, AI, Pr, AutoCAD,...\r\n\r\nTích hợp với bộ CPU hiện đại trên là card đồ họa GPU 32 nhân cho hiệu suất nhanh hơn gấp 4 lần so với M1, năng cao khả năng xử lý đồ họa, thoả mãn niềm đam mê sáng tạo cho bạn, thiết kế 2D, 3D hiệu quả, render video tuyệt vời, đồng thời tiết kiệm điện năng đáng kể, thấp hơn 70% so với chip 8 nhân của PC/laptop.\r\n\r\nBộ nhớ RAM 32 GB đa nhiệm cực mượt mà, tăng tốc độ truy xuất dữ liệu, giảm thời gian chờ, mọi thao tác được phản hồi tức thời, bạn có thể dễ dàng mở nhiều phần mềm thiết kế để chỉnh sửa nhiều tệp hình ảnh phức tạp vừa render.', 0),
(12, 'Điện thoại Realme 9i (4GB/64GB)', 2, 1, 5490000, 'realme-9i-den-thumb-600x600.jpg', 'Realme đang ngày càng cải thiện hơn rất nhiều ở các sản phẩm của họ và sản phẩm gần đây nhất đó là dòng điện thoại Realme 9i. Chiếc điện thoại này được sở hữu con chip Snapdragon 680 kết hợp cùng với các tiện ích khác, hứa hẹn sẽ mang lại cho bạn sự trải nghiệm hiệu năng ổn định, mượt mà.', '2022-10-29 02:29:10', 'Điện thoại Realme 9i được trang bị chip Snapdragon 680 tích hợp tiến trình 6 nm tiên tiến, tốc độ xung nhịp lên đến 2.4 GHz mang lại hiệu năng ổn định cho các tác vụ cơ bản và cũng giảm thiểu mức tiêu thụ điện năng.\r\n\r\nRealme 9i hỗ trợ RAM 4 GB cho trải nghiệm máy với hiệu suất tốt, khả năng đa nhiệm ổn định. Với bộ nhớ trong 64 GB và hỗ trợ mở rộng dung lượng qua thẻ nhớ MicroSD tối đa 1 TB cho bạn có thể thoải mái lưu trữ những ứng dụng giải trí mà mình yêu thích.\r\n\r\nĐo hiệu năng bằng phần mềm - Realme 9i\r\n\r\nĐồng thời, với hệ điều hành Android 11 kết hợp cùng màn hình 90 Hz được trang bị trên điện thoại này thì chắc chắn không thể làm khó được các tác vụ cơ bản như mở, chuyển đổi giữa các ứng dụng giải trí như: Xem TikTok, YouTube, sử dụng Chrome,... giúp các thao tác có phản hồi nhanh chóng, mang lại trải nghiệm mượt mà cho người dùng.\r\n\r\nHiệu năng mạnh mẽ - Realme 9i\r\n\r\nChuyển sang các tác vụ chơi game thì đối với các game không yêu cầu đồ họa cao như Liên quân Mobile thì máy vẫn có thể chiến tốt. Còn đối với những game có yêu cầu đồ họa cao như PUBG Mobile thì máy có thể chơi được ổn định ở mức 25 FPS, FPS không bị tụt quá nhiều.\r\n\r\nChiến game Liên Quân ổn định - Realme 9i\r\n\r\nSạc siêu nhanh, sử dụng bền bỉ cả ngày dài\r\nChiếc điện thoại này được Realme trang bị viên pin Li-Po 5000 mAh, khá ấn tượng khi thời gian sử dụng pin liên tục lên đến 8 giờ, bạn có thể thoải mái sử dụng xem phim và chơi game cả ngày dài.\r\n\r\nThời gian sử dụng pin trên điện thoại Realme 9i\r\n\r\nSo với “đàn em” là Realme 8i, Realme 9i có thời gian sạc nhanh hơn 36% và công suất sạc nhanh lên đến 33 W, thời gian sạc đầy chỉ trong 1 giờ 45 phút. Về điều này thì rất phù hợp với những đối tượng thích “cày game” vì thời gian sạc của chiếc điện thoại Realme này khá nhanh và thời gian sử dụng pin lại lâu.\r\n\r\nThời gian sạc nhanh trên điện thoại Realme 9i\r\n\r\nBộ 3 camera AI sắc nét\r\nẢnh chụp từ camera chính 50 MP của Realme 9i cho ra chất lượng hình ảnh sắc nét, chất màu ổn, khi bạn bật chế độ AI được tích hợp trên máy thì máy sẽ nhận dạng và tự động điều chỉnh màu sắc sao cho phù hợp với môi trường xung quanh.\r\n\r\nẢnh chụp từ camera chính 50 MP của Realme 9i\r\n\r\nĐặc biệt, với điều kiện môi trường thiếu sáng thì máy có hỗ trợ chế độ chụp ban đêm, màu sắc của bức ảnh chụp về đêm khá rực rỡ, chất lượng ảnh và độ chi tiết ảnh ở mức chấp nhận được.\r\n\r\nẢnh chụp từ Realme 9i\r\n\r\nVới những “bậc thầy sống ảo” thì camera trước là một điều không thể thiếu trong cuộc sống, điện thoại này được trang bị camera trước 16 MP kèm theo các chức năng chụp ảnh selfie, giúp bạn có thể tạo ra được những khung hình sống động và bắt trọn những cung bậc cảm xúc trong cuộc sống hằng ngày.\r\n\r\nChụp ảnh selfie - Realme 9i\r\n\r\nBên cạnh đó, Realme 9i còn có một camera đo chiều sâu 2 MP dùng để xóa phông và camera macro 2 MP có khả năng chụp cận cảnh ở khoảng cách gần, bạn có thể thỏa thích chụp những vật thể nhỏ bé với chất lượng ảnh tốt.\r\n\r\nTrải nghiệm nghe nhìn chân thực, sống động\r\nVới kích thước màn hình 6.6 inch đủ lớn để bạn có thể thoải mái trải nghiệm xem phim, chơi game. Độ phân giải Full HD+ giúp chất lượng hình ảnh hiển thị sắc nét, hạn chế bị nhiễu. Viền màn hình khá mỏng, tuy nhiên phần cạnh phía dưới còn dày hơn so với các cạnh còn lại nhưng vẫn giúp cho bạn có trải nghiệm nhìn tốt trên điện thoại này.\r\n\r\nMàn hình Full HD+ - Realme 9i\r\n\r\nNgoài ra, với 5 mức tần số quét khác nhau được thiết kế thông minh phù hợp với các khung hình khác nhau trong nhiều không gian sử dụng, giúp tổng thể của điện thoại được cải thiện hiệu suất.\r\n\r\n5 mức tần số quét khác nhau - Điện thoại Realme 9i\r\n\r\nRealme 9i sử dụng công nghệ loa kép stereo tiên tiến, hỗ trợ âm thanh chất lượng cao, mang lại cho bạn trải nghiệm âm thanh sống động, chân thực. \r\n\r\nCông nghệ loa kép stereo - Điện thoại Realme 9i\r\n\r\nNhìn chung, chiếc điện thoại Realme 9i này có màn hình chất lượng, tần số quét 90 Hz mượt mà, hiệu năng ổn định có thể xử lý tốt các tác vụ cơ bản, camera ấn tượng, pin trâu,... ở phân khúc giá tầm trung thì đây là một sản phẩm đáng để bạn cân nhắc sở hữu.', 0),
(13, 'Điện thoại iPhone 13 128GB', 6, 1, 24990000, 'iphone-13-starlight-1-600x600.jpg', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', '2022-10-29 02:42:41', 'Con chip Apple A15 Bionic siêu mạnh được sản xuất trên quy trình 5 nm giúp iPhone 13 đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.\r\n\r\nChip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB\r\n\r\nNhờ hiệu năng được cải tiến, người dùng có được những trải nghiệm tốt hơn trên điện thoại khi dùng các ứng dụng chỉnh sửa ảnh hay chiến các tựa game đồ họa cao mượt mà.\r\n\r\nĐồ họa mượt mà - iPhone 13 128GB\r\n\r\niPhone 13 trang bị bộ nhớ trong 128 GB dung lượng lý tưởng cho phép bạn thỏa thích lưu trữ mọi nội dung theo ý muốn mà không lo nhanh đầy bộ nhớ.\r\n\r\nDung lượng bộ nhớ - iPhone 13 128GB\r\n\r\nTốc độ 5G tốt hơn \r\nMạng 5G được cải thiện chất lượng với nhiều băng tần hơn, với 5G giúp điện thoại xem trực tuyến hay tải xuống các ứng dụng và tài liệu đều đạt tốc độ nhanh chóng. Không chỉ vậy, siêu phẩm mới này còn có chế độ dữ liệu thông minh, tự động phát hiện và giảm tải tốc độ mạng để tiết kiệm năng lượng khi không cần dùng tốc độ cao.\r\n\r\nHỗ trợ kết nối 5G hiện đại - iPhone 13 128GB\r\n\r\nMàn hình Super Retina XDR độ sáng cao, tiết kiệm pin\r\niPhone 13 sử dụng tấm nền OLED với kích thước màn hình 6.1 inch cho chất lượng màu sắc và chi tiết hình ảnh sắc nét, sống động, độ phân giải đạt 1170 x 2532 Pixels.\r\n\r\nMàn hình OLED 6.1 inch - iPhone 13 128GB\r\n\r\nNhờ có công nghệ Super Retina XDR giúp cho máy đạt độ sáng 800 nits, tối đa lên đến 1200 nits cùng dải màu rộng P3, tỷ lệ tương phản lớn giúp ổn định tốt màu sắc và chất lượng hình ảnh hiển thị trong nhiều điều kiện sáng khác nhau, kể cả môi trường nắng gắt hay ánh sáng chói.\r\n\r\nĐộ sáng đạt 1200 nits - iPhone 13 128GB\r\n\r\nPhía ngoài màn hình còn được phủ lớp oleophobic hạn chế tình trạng bám bụi bẩn và mồ hôi do tay người dùng, giữ màn hình luôn sạch và tinh tế hơn. Và trang bị kính cường lực Ceramic Shield giúp màn hình của máy được an toàn hơn trước những vết xước, va đập trong quá trình sử dụng.\r\n\r\nTrang bị kính cường lực Ceramic Shield - iPhone 13 128GB\r\n\r\nCụm camera kép nổi bật với nhiều cải tiến\r\nCụm camera kép phía sau trên iPhone 13 đều sở hữu độ phân giải 12 MP, camera chính giúp thu được nhiều ánh sáng hơn, tăng khả năng thu sáng lên đến 47% nên chất lượng ảnh chụp cũng cải thiện hơn so với bản tiền nhiệm. Điện thoại có camera góc siêu rộng cho góc nhìn 120 độ giúp thu được nhiều chi tiết hơn, dễ dàng ghi lại những khung cảnh núi non hùng vĩ, ảnh chụp nhóm đông người.\r\n\r\nCụm camera sau sắc nét - iPhone 13 128GB\r\n\r\nCụm camera cũng được trang bị tính năng chống rung quang học Sensor Shift giúp lấy nét nhanh chóng, khả năng chụp đêm cũng trở nên rõ nét mà ít bị nhiễu hạt, hay quay video cũng rất ổn định và mượt mà hơn.\r\n\r\nChụp đêm siêu rõ nét - iPhone 13 128GB\r\n\r\n“Chế độ điện ảnh” cho phép camera trên iPhone 13 tự động làm mờ hậu cảnh trong video để đối tượng luôn được lấy nét nổi bật. Đặc biệt người dùng có thể thay đổi tiêu điểm để chọn chủ thể mong muốn trong khung hình khi sử dụng quay video, nhờ đó tạo nên những video chuyên nghiệp, như ý hơn.\r\n\r\nChế độ điện ảnh độc đáo - iPhone 13 128GB\r\n\r\nChế độ chụp Smart HDR 4 nhận diện tối đa 4 người trong một khung hình, tiến hành tối ưu hóa ánh sáng và tương phản, tone màu da cho từng người để hoàn thiện bức ảnh đẹp mà không cần qua chỉnh sửa.\r\n\r\nChế độ Smart HDR 4 - iPhone 13 128GB\r\n\r\nCamera trước vẫn nằm trong tai thỏ, độ phân giải cũng đạt 12 MP với các công nghệ chụp ảnh chuyên nghiệp như hiệu ứng bokeh, chế độ điện ảnh, Animoji và Memoji để bạn tự tin thể hiện mình trước ống kính, không lo lắng che giấu khuyết điểm.', 0),
(11, 'Laptop MacBook Pro 14 M1 Pro 2021 8-core CPU/16GB/512GB/14-core GPU (MKGR3SA/A)', 3, 2, 52490000, 'apple-macbook-pro-14-m1-pro-2021-600x600.jpg', 'Sự đẳng cấp không chỉ ở thiết kế thời thượng, sang trọng mà còn sở hữu sức mạnh siêu năng với con chip Apple M1 Pro, phiên bản nâng cấp ấn tượng đến từ nhà Apple, mang đến cho bạn trải nghiệm làm việc chuyên nghiệp nhất dù là các tác vụ laptop đồ họa - kỹ thuật chuyên sâu.', '2022-10-28 23:45:04', 'Sức mạnh hiệu năng đỉnh cao hơn bao giờ hết\r\nApple M1 Pro là phiên bản kế nhiệm của con chip Apple M1 với tiến trình 5 nm, tích hợp 8 lõi CPU với 6 lõi hiệu suất cao và 2 lõi tiết kiệm điện mang đến cho bạn một hiệu suất làm việc cực kỳ cao với tốc độ xử lý nhanh chóng nhanh hơn 70% và hiệu năng tăng 1.7 lần so với các thế hệ tiền nhiệm đồng thời tiết kiệm một lượng điện năng đáng kể để kéo dài thời lượng pin hơn.\r\n\r\nDễ dàng chinh phục các tác vụ khắt khe nhất như chỉnh sửa ảnh với độ phân giải cao, thiết kế đồ họa 2D, 3D, render video chuyên nghiệp trên các ứng dụng của nhà Adobe như Photoshop, Illustrator, Premiere,... nhanh hơn gấp 2 lần so với chip Apple M1 và gấp 7 lần so với các chip đồ họa tích hợp 8 lõi phổ biến hiện nay nhờ vào 14 nhân GPU mạnh mẽ.\r\n\r\nĐa nhiệm mượt mà hơn bao giờ hết với bộ nhớ RAM 16 GB cho phép bạn hàng chục cửa sổ hay các layer đồ họa cùng lúc mà không xảy ra hiện tượng lag, giật, giải quyết khối lượng công việc “nặng đô” một cách nhanh chóng và ấn tượng.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Cấu hình\r\n\r\nMacbook Pro sở hữu ổ cứng SSD 512 GB cung cấp không gian lưu trữ vừa đủ để bạn tải các tập tài liệu hữu ích về máy với tốc độ đọc ghi nhanh chóng, tăng tốc toàn diện giúp rút ngắn thời gian khởi động máy trong tích tắc và các ứng dụng khác chỉ trong vài giây ngắn ngủi.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - SSD\r\n\r\nHệ điều hành macOS Big Sur mang đến một giao diện mới tinh tế, giúp các thao tác làm việc của bạn trở nên dễ dàng hơn với các thanh công cụ gọn gàng ở vị trí giữa màn hình đảm bảo nội dung luôn nằm chính xác ở vị trí mà bạn muốn đồng thời tăng cường tính bảo mật cũng như cập nhật kho ứng dụng khổng lồ đáp ứng tất cả nhu cầu của bạn. \r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - macOS Big Sur\r\n\r\nNgoại hình đẳng cấp, thể hiện chất “tôi” riêng của bạn\r\nNhà Apple vẫn luôn ghi điểm trong mắt người dùng với lối thiết kế sang trọng, thời thượng, không lẫn với bất kỳ dòng sản phẩm khác nào với vỏ kim loại nguyên khối cứng cáp cùng gam màu xám bạc hiện đại và chiếc logo trái táo khuyết đặc trưng, đảm bảo sẽ làm cho chủ nhân của chiếc MacBook này luôn được nổi bật giữa những nơi đông người.\r\n\r\nBề dày 15.5 mm và khối lượng 1.6 kg mang tính di động cao, cho phép người dùng cầm nhẹ nhàng trên tay hay cất gọn vào balo và linh hoạt di chuyển đến khắp mọi nơi, đặt ở mọi vị trí tùy thích mà không chiếm quá nhiều diện tích xung quanh. \r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Thiết kế\r\n\r\nChiếc MacBook Pro 14 inch này đã được loại bỏ thanh Touch Bar trên bàn phím, mang lại mẫu bàn phím vật lý với các khoảng cách phím được sắp xếp hợp lý và hành trình vừa phải, mang đến trải nghiệm gõ máy chuẩn xác ở các vị trí và không gây ra tiếng ồn cho những người xung quanh. Máy còn được trang bị đèn nền giúp bạn làm việc hoàn hảo hơn trong môi trường thiếu sáng.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Bàn phím\r\n\r\nĐăng nhập máy tính Apple nhanh chóng và an toàn hơn bao giờ hết chỉ với một thao tác chạm nhẹ nhờ tính năng bảo mật vân tay được trang bị trên máy.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Touch ID\r\n\r\nĐặc biệt hơn là Apple đã nâng cấp lên Camera 1080p FaceTime HD mang đến một chất lượng video sắc nét hơn để phục vụ cho các cuộc họp trực tuyến hay học tập online của người dùng.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Webcam\r\n\r\nLaptop trang bị 3 cổng Thunderbolt 4 USB-C với khả năng vừa sạc vừa truyền dữ liệu nhanh chóng, HDMI và Jack tai nghe 3.5 mm hỗ trợ liên kết dễ dàng với các thiết bị ngoại vi tương thích như loa, máy chiếu, máy in,... một cách dễ dàng. Ngoài ra, chuẩn Bluetooth 5.0 và Wi-Fi 6 (802.11ax) đảm bảo cho đường truyền luôn trong trạng thái ổn định, hạn chế tối đa việc bị ngắt kết nối giữa chừng.\r\n\r\nMacBook Pro 14 M1 Pro 2021/14 core-GPU - Cổng kết nối\r\n\r\nSự xuất hiện của khe đọc thẻ nhớ SD trên MacBook Pro 14 inch 2021 sẽ là một tin vui với những người thường xuyên phải làm các công việc ghi hình, chụp ảnh và sạc MagSafe 3 với thiết kế nhỏ nhắn hơn rất nhiều, giúp người dùng thuận tiện rút cắm mà không cần đến dây cáp dài, rườm rà và giúp bạn sạc pin nhanh chóng.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`, `image`) VALUES
(5, 'Man hinh', 'shop6.png'),
(4, 'Tai nghe', 'shop4.png'),
(3, 'Loa', 'shop3.png'),
(2, 'Laptop', 'shop2.png'),
(1, 'Dien thoai', 'shop5.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploadimages`
--

DROP TABLE IF EXISTS `uploadimages`;
CREATE TABLE IF NOT EXISTS `uploadimages` (
  `id_product` int(11) NOT NULL,
  `image_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `uploadimages`
--

INSERT INTO `uploadimages` (`id_product`, `image_name`) VALUES
(1, 'samsung-galaxy-s22-ultra-1-1.jpg'),
(1, 'samsung-galaxy-s22-ultra-2-1.jpg'),
(1, 'samsung-galaxy-s22-ultra-3-1.jpg'),
(1, 'samsung-galaxy-s22-ultra-5-2.jpg'),
(1, 'samsung-galaxy-s22-ultra-10-2.jpg'),
(1, 'samsung-galaxy-s22-ultra-11-2.jpg'),
(2, 'Samsung-LS32AM700NEXXV1.8_6.png'),
(2, 'Samsung-LS32AM700NEXXV1.4_7.png'),
(2, 'Samsung-LS32AM700NEXXV1.3_7.png'),
(2, 'Samsung-LS32AM700NEXXV1.2_1_8.png'),
(3, 'realme-9-pro-plus-3-1.jpg'),
(3, 'realme-9-pro-plus-2-1.jpg'),
(3, 'realme-9-pro-plus-1-1.jpg'),
(4, 'apple-macbook-air-m1-2020-z124000de-2-org.jpg'),
(4, 'apple-macbook-air-m1-2020-z124000de-1-org.jpg'),
(6, 'asus-tuf-gaming-fx506lhb-i5-hn188w-1.jpg'),
(6, 'asus-tuf-gaming-fx506lhb-i5-hn188w-2.jpg'),
(6, 'asus-tuf-gaming-fx506lhb-i5-hn188w-3.jpg'),
(6, 'asus-tuf-gaming-fx506lhb-i5-hn188w-4.jpg'),
(6, 'asus-tuf-gaming-fx506lhb-i5-hn188w-5.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-8-1.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-6-1.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-5-1.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-4-1.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-3-1.jpg'),
(7, 'tai-nghe-chup-tai-gaming-asus-tuf-h3-den-do-2-1.jpg'),
(8, 'vi-vn-asus-lcd-27-inch-fullhd-2.jpg'),
(8, 'vi-vn-asus-lcd-27-inch-fullhd-3.jpg'),
(8, 'vi-vn-asus-lcd-27-inch-fullhd-4.jpg'),
(8, 'vi-vn-asus-lcd-27-inch-fullhd-5.jpg'),
(4, 'apple-macbook-air-m1-2020-z124000de-3-org.jpg'),
(4, 'apple-macbook-air-m1-2020-z124000de-4-org.jpg'),
(4, 'apple-macbook-air-m1-2020-z124000de-5-org.jpg'),
(9, 'apple-macbook-pro-16-m1-max-2021-bac-2.jpg'),
(9, 'apple-macbook-pro-16-m1-max-2021-bac-3.jpg'),
(9, 'apple-macbook-pro-16-m1-max-2021-bac-4.jpg'),
(12, 'realme-9i-den-1.jpg'),
(12, 'realme-9i-den-2.jpg'),
(12, 'realme-9i-den-3.jpg'),
(12, 'realme-9i-den-4.jpg'),
(12, 'realme-9i-den-5.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
