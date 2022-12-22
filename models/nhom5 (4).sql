-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 22, 2022 lúc 01:12 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'thaibao123', 'fcea920f7412b5da7be0cf42b8c93759'),
(3, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'hoaimonkey', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Sony'),
(4, 'ASUS'),
(5, 'Corsair');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

DROP TABLE IF EXISTS `oder`;
CREATE TABLE IF NOT EXISTS `oder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordernote` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sold` int(11) NOT NULL,
  `instock` int(11) NOT NULL,
  `display` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connection` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `micro` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `battery` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyswitch` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `models` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `sold`, `instock`, `display`, `chip`, `ram`, `rom`, `connection`, `micro`, `battery`, `weight`, `keyswitch`, `models`, `sale`) VALUES
(1, 'Iphone 14', 1, 1, 40000000, 'iphone14.jpg', 'The iPhone 14 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.06 inches diagonally (actual viewable area is less).', 1, '2022-10-11 08:31:03', 100, 50, 'Retina display', '16-core Neural', '16GB', '512GB SSD', NULL, NULL, 'Up to 15 hours wireless web', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 1),
(2, 'Sony Xperia 5', 3, 1, 300000, 'phonesony.jpg', 'The sony xperia 5 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.85 inches diagonally (actual viewable area is less).', 0, '2020-10-22 08:38:13', 33, 62, 'OLED, HDR BT.2020', 'Snapdragon 855', '6GB', '128GB', '5.0, A2DP, aptX HD, LE', NULL, 'Endurance rating 96h', '164 g', NULL, NULL, 0),
(3, 'Dell Latitude 5420', 2, 2, 23000000, 'laptopdell.jpg', 'The carbon fiber and magnesium reinforced chassis is highly resistant to twisting. Subjectively, it feels heavy and robust. Since the hinges are firm, the base unit has to be held down to open the lid. Although an indentation in front of the clickpad can be used to lift the lid with one finger, the base has to be held in place after just a few inches.', 0, '2021-10-15 08:42:16', 32, 87, 'High Definition (HD)', 'Intel PCH-LP', '16 GB', '512GB SSD', NULL, NULL, '11.40 VDC', '3.03 lb (1.37 kg)', NULL, NULL, 1),
(4, 'Macbook Air M1', 1, 2, 19000000, 'laptopapple.jpg', 'During a group call, I even found time to play around with iOS apps, downloading and opening the Overcast podcatcher, HBO Max and the game Among Us. All while a 4K YouTube video of a chef cooking played on my laptop monitor, I played around in each of those apps, so I could start an Adventure Time episode, download a podcast and drag my lil Among Us guy around on screen. Yes, I\'m very good at multitasking.', 1, '2022-10-13 08:49:33', 100, 34, 'Retina display', '16-core Neural', '16 GB', '512GB SSD', 'Bluetooth 5.0 wireless', NULL, 'Up to 15 hours wireless web', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 0),
(5, 'Sony WH-1000XM4', 3, 3, 900000, 'headphonesony.jpg', 'Industry-leading noise canceling with Dual Noise Sensor technology. Next-level music with Edge-AI, co-developed with Sony Music Studios Tokyo. Up to 30-hour battery life with quick charging (10 min charge for 5 hours of playback)', 1, '2020-10-22 09:01:20', 53, 90, NULL, '', NULL, NULL, '5.0, A2DP, aptX HD, LE', 'yes', 'Approx. 3 Hours (Full charge)', '500g', NULL, NULL, 1),
(6, 'Corsair HS70 PRO', 5, 3, 2000000, 'headphonecorsair.jpg', 'The Corsair HS70 is a good gaming headset that has great sound for critical listening. The HS70 is the wireless variant of the HS60, and both headsets are quite similar. They have a good build quality and great padding on the ear cups and headband. The detachable boom microphone is decent, and you can use the Corsair iCUE software to customize the sound of your headset.', 1, '2022-10-13 09:06:11', 33, 12, NULL, '', NULL, NULL, 'USB Wireless Receiver', 'yes', 'Approx. 3 Hours (Full charge)', '500g', NULL, NULL, 0),
(7, 'Dell SE2723DS 27 inch', 2, 4, 6650000, 'monitordell.jpg', 'Users planning to upgrade their home office can pick up a new best 27 inch monitor with specs good enough for gaming and editing. This Dell SE2723DS is one of the best 1440p monitor you can find in this price range right now. Dell SE2723DS monitor is based on a 27-inch IPS panel with a', 0, '2020-10-27 09:12:05', 23, 87, 'QHD 2560 x 1440 at 75 Hz', '', NULL, NULL, '2x HDMI 1.4 (HDCP 1.4)', NULL, 'AC 100-240 V (50/60 Hz)', '9.6 lbs', NULL, NULL, 1),
(8, 'Apple Pro Display XDR', 1, 4, 40000000, 'monitorapple.jpg', 'See enhanced contrast with more detail in shadows and highlights from precisely controlled Full Array Local Dimming backlighting technology. With four times the pixels of Full HD monitors, enjoy crystal-clear detailed images with 4K resolution.', 1, '2019-10-15 09:17:25', 43, 53, 'Retina 6K Display', '', NULL, NULL, 'Three USB-C (USB 2)', NULL, '11.40 VDC', '16.49 pounds (7.48 kg)', NULL, NULL, 0),
(9, 'Corsair K65 RGB', 5, 5, 3000000, 'keyboardcorsair.jpg', 'The Corsair K65 RGB MINI is an outstanding compact 60% gaming keyboard with a sturdy feeling build and exceptionally low latency. It\'s also one of Corsair\'s first keyboards to have an advertised 8000Hz polling rate, though this isn\'t something we test for, specifically.', 0, '2020-10-03 09:01:20', 23, 76, NULL, '', NULL, NULL, 'USB Wireless Receiver', NULL, NULL, '0.58kg', 'Cherry MX SPEED', 'CH-9194114-NA', 1),
(10, 'Keyboard Asus K501', 4, 5, 2500000, 'keyboardasus.jpg', 'The ASUS K501LX pretty much offers the same core functionality as most laptops that are more expensive. With this laptop, you will be getting an overall high-end performance for less.', 1, '2015-10-22 02:31:27', 15, 56, NULL, '', NULL, NULL, 'Three USB-C (USB 2)', NULL, NULL, '3.03 lb (1.37 kg)', 'Cherry MX SPEED', 'CH-9194114-NA', 0),
(11, 'Asus K501LX-NB52', 4, 2, 4000000, 'laptopasus.jpg', 'The Asus K501LX-NB52 is a lightweight gaming laptop with an above average hardware specification. It comes with a fifth generation Core i5 processor by Intel clocked at 2.5 GHz, which is highly power efficient. ', 0, '2019-10-18 09:36:38', 62, 46, '15.60 inch 16:9', 'Core i5-5200U 2', '4GB', '128GB', '2x HDMI 1.4 (HDCP 1.4)', NULL, 'AC 100-240 V (50/60 Hz)', '2 kg', NULL, '', 1),
(12, 'ASUS C2222HE', 4, 4, 4000000, 'monitorasus.jpg', 'Extensive connectivity including HDMI and D-sub. VESA wall-mountable to save on desktop space. ASUS Eye Care monitors feature TÜV Rheinland-certified Flicker-free and Low Blue Light technologies to ensure a comfortable viewing experience', 0, '2021-10-16 11:12:05', 90, 0, '1.45-inch Full HD', 'Core i5-5200U 2', '6GB', '128GB', 'Three USB-C (USB 2)', NULL, 'Up to 15 hours wireless web', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 0),
(13, 'Sony Xperia XZ', 3, 1, 2200000, 'phonesonyxperiaxz.jpg', 'The Sony Xperia XZ is a great premium handset offering everything you\'d expect from a flagship phone. If you own a recent Sony phone though it might not be enough of an improvement to rush out and buy it on day one.', 0, '2015-11-09 15:55:35', 10, 20, 'High Definition (HD)', 'Snapdragon 855', '6GB', '128GB', 'Bluetooth 5.0 wireless ', NULL, 'Approx. 3 Hours (Full charge)', '500g', NULL, NULL, 1),
(14, 'Dell Venue V03b Qualcom', 2, 1, 990000, 'phonedellv03b.jpg', 'Dell Venue (Black, 512 MB) runs the Android Froyo 2.2 Operating System. It has a Qualcomm Snapdragon processor along with 512 MB RAM. There is internal memory of 512 MB and this mobile supports 32 GB external memory. Sim card supported is Single Sim. The handset measures 64 mm(width) x 121 mm(height) x 12.9 mm(depth) and weighs 164 g.', 0, '2015-11-09 15:55:35', 2, 5, 'Retina display', '16-core Neural ', '6GB', '128GB', NULL, NULL, '11.40 VDC', '164 g', NULL, NULL, 0),
(15, 'Dell Stack', 2, 1, 5000000, 'phonedellstack.jpg', 'Dell Stack is basically a 6.4 inch phone with an Intel Kaby Lake-Y series processor. Used on the go, the device would use about 3.5 watts. But plug it into a desktop dock and the processor could kick into high gear, drawing around 12 watts (or a little less than the 15 watts used by most of Intel’s Kaby Lake-U notebook processors).', 1, '2022-11-20 16:26:03', 15, 30, 'OLED, HDR BT.2020', '16-core Neural ', '8GB', '32GB', NULL, NULL, 'Endurance rating 96h', '164 g', NULL, NULL, 1),
(16, 'Iphone 11', 1, 1, 10000000, 'iphone11.jpg', 'The iPhone 11 – the successor to the iPhone XR – might be showing its age a little bit now but it packs in good spec and manages to do so for a lower cost than many would expect – this is the one to go for if you want a good value iPhone and don\'t mind tracking down an older model.', 1, '2020-09-08 16:31:01', 55, 100, 'Retina display', '16-core Neural ', '8GB', '128GB', NULL, NULL, 'AC 100-240 V (50/60 Hz)', '400g', NULL, NULL, 0),
(17, 'Iphone 13', 1, 1, 24000000, 'iphone13.jpg', 'The iPhone 13 isn’t a game changer for Apple’s series of smartphones, but it’s an important iteration that offers better battery life, a better processor and an upgraded camera setup than iPhones that have gone before it. If you’re looking for a fast and capable smartphone, and don’t need the extra features of the pricier Pro model, this is a top choice.', 1, '2021-08-16 16:41:14', 60, 90, 'High Definition (HD)', '16-core Neural ', '16 GB', '512GB SSD', NULL, NULL, 'Endurance rating 96h', '500g', NULL, NULL, 1),
(18, 'MacBook Pro 16 M1 Max', 1, 2, 80000000, 'macbookpro16m1max.jpg', 'Fast, with a razor-sharp screen, excellent build quality, and a happy reunion with MagSafe, HDMI and SD card readers, the 16in MacBook Pro with M1 Max is a high ranking professional computer. This is not a computer for the average user – if that’s you buy a 13in MacBook Pro with an M1 processor instead. This is a computer for professional users that will render more pixels than there are people on Earth.', 1, '2021-09-09 16:48:04', 10, 50, 'Retina 6K Display', 'Intel PCH-LP', '16 GB', '512GB SSD', '2x HDMI 1.4 (HDCP 1.4)', NULL, 'Up to 15 hours wireless web', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 0),
(19, 'Dell Vostro 3510', 2, 2, 19000000, 'dellvostro3510.jpg', 'Dell’s Vostro series is always into consideration. Interestingly, while it is one of the least expensive devices on the market, the Vostro 15 3510 can be equipped with pretty capable hardware.', 0, '2021-11-28 16:51:51', 10, 30, '15.60 inch 16:9', '16-core Neural ', '8GB', '512GB SSD', 'Three USB-C (USB 2)', NULL, 'AC 100-240 V (50/60 Hz)', '3.03 lb (1.37 kg)', NULL, NULL, 1),
(21, 'Sony Vaio Fit SVF14A16SG', 3, 2, 25000000, 'sonyvaiofitSVF14A16SG.jpg', ' A thin 14-inch case is the base for Sony\'s latest multimedia device that wants to attract customers with highlights like a touchscreen display, NFC support and a hybrid hard drive. Does the Vaio Fit for 900 Euros (~$1215) offer any other surprises?', 0, '2016-04-16 17:00:45', 2, 10, 'High Definition (HD)', 'Intel PCH-LP', '6GB', '128GB', 'USB Wireless Receiver', NULL, 'Endurance rating 96h', '3.03 lb (1.37 kg)', NULL, NULL, 1),
(22, 'SONY WH-1000XM5 WIRELESS', 3, 3, 7900000, 'SONYWH-1000XM5WIRELESS.jpg', 't can be tricky for a manufacturer to push the sound performance of a product consistently from generation to generation; but that is what Sony has managed to do with the WH-1000XM5 wireless headphones. Not only that, it has been achieved while executing a major redesign. The Sony XM5 headphones might feel a little less premium than before, but the jump in sound quality from the previous generation is a big one, and rivals could once again have their work cut out. If you are looking for a new pair of wireless noise-cancelling headphones, your auditioning should start here.', 1, '2022-03-12 17:05:45', 55, 100, NULL, '', NULL, NULL, 'USB Wireless Receiver', 'yes', 'Approx. 3 Hours (Full charge)', '500g', NULL, NULL, 0),
(23, 'Asus Rog Delta Core', 4, 3, 1900000, 'AsusRogDeltaCore.jpg', 'Taking a closer look at the ASUS ROG Delta Core (which is marketed as a cheaper alternative to the more expensive ASUS ROG Delta) we begin to see the larger picture and overall design goal. The focus, and rightfully so, is firmly on audio and sound quality in addition to comfort.', 0, '2019-10-18 17:08:42', 13, 20, NULL, '', NULL, NULL, 'Three USB-C (USB 2)', 'yes', 'Approx. 3 Hours (Full charge)', '164 g', NULL, NULL, 1),
(24, 'Asus Rog Strix Go', 4, 3, 1990000, 'AsusRogStrixGo.jpg', 'The Asus ROG Strix Go 2.4 are some of the most versatile cans out there. With three different connectivity options, two mics and robust software for tweaking already-immersive audio, this gaming headset can handle it all. But its wireless dongle might end up covering nearby ports.', 0, '2020-11-15 17:13:15', 10, 30, NULL, '', NULL, NULL, '5.0, A2DP, aptX HD, LE', 'yes', 'Up to 15 hours wireless web', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 0),
(25, 'Corsair HS80 RGB', 5, 3, 2790000, 'CorsairHS80RGB.jpg', 'The Corsair HS80 RGB WIRELESS are wireless gaming headphones compatible with PCs and PlayStation consoles. They\'re very well-built, with a comfortable elastic headband and cloth-covered ear cup padding. The flip-up boom mic has an impressive recording quality and does a good job separating your voice from background noise. Their latency via wireless or wired USB connection is low enough for gaming as well. Unfortunately, they don\'t isolate you from very much noise, and their roughly 13 hours of continuous battery life is quite a bit less than the advertised 20 hours.', 1, '2022-11-12 17:17:03', 30, 60, NULL, '', NULL, NULL, 'Three USB-C (USB 2)', 'yes', 'AC 100-240 V (50/60 Hz)', 'Weight: 2.8 pounds (1.29 kg)3', NULL, NULL, 1),
(26, 'Corsair Virtuoso RGB', 5, 3, 4990000, 'CorsairVirtuosoRGB.jpg', 'The Corsair Virtuoso RGB Wireless SE are decent wireless gaming headphones. They have an understated and premium design that\'s a lot less flashy than many other gaming headsets, with subtle RGB Corsair logos on each ear cup. They feel quite well-built but unfortunately aren\'t the most comfortable and likely can cause some fatigue after long gaming marathons. On the upside, their wireless latency is great with their included USB dongle, and they can even be used wired by plugging them into the controller of either a PS4 or Xbox One. Their microphone performance is very good, though transmitted speech may lack some detail.', 1, '2021-12-24 17:20:33', 55, 100, NULL, '', NULL, NULL, '5.0, A2DP, aptX HD, LE', 'yes', 'Endurance rating 96h', '500g', NULL, NULL, 0),
(28, 'iMac M1 24 inch 4.5K', 1, 4, 26000000, 'iMacM124inch.jpg', 'The Apple iMac 2021 (24-inch) is a breath of fresh air for the aging iMac line, bringing with it a beautiful display, an excellent webcam and an array of bright new color schemes.', 0, '2020-02-08 17:27:02', 15, 60, 'OLED, HDR BT.2020', '', NULL, NULL, 'USB Wireless Receiver', NULL, '11.40 VDC', '16.49 pounds (7.48 kg)', NULL, NULL, 1),
(29, 'Dell UltraSharp U3419W', 4, 2, 12000000, 'DellUltraSharpU3419W.jpg', 'Dell UltraSharp 34 Curved USB-C Monitor (U3419W) has an ultra-wide screen and includes a USB Type-C port that can charge a laptop, even while the panel is displaying content from it over the same connection. It\'s a good choice for split-screen use and a viable substitute for a dual-monitor setup. ', 1, '2019-11-16 17:30:44', 10, 20, 'QHD 2560 x 1440 at 75 Hz', '', NULL, NULL, 'USB Wireless Receiver', NULL, 'Endurance rating 96h', '9.6 lbs', NULL, NULL, 1),
(30, 'ASUS TUF GAMING VG279Q1A', 2, 4, 6000000, 'ASUSTUFGAMINGVG279Q1A.jpg', 'ASUS TUF Gaming VG279Q1A is one of the most exciting gaming monitors with 27\" FullHD IPS panel and high refresh rate for a very adequate price. The monitor boasts high-quality and contrast picture with a very decent default calibration, frequency up to 165 Hz, support for ELMB, Adaptive-Sync and FreeSync Premium technologies, an appropriate set of interfaces, as well as a stylish, yet versatile appearance. So you get all the basic gamer\'s essentials. ', 1, '2021-04-24 17:33:38', 5, 20, 'OLED, HDR BT.2020', '', NULL, NULL, '2x HDMI 1.4 (HDCP 1.4)', NULL, 'AC 100-240 V (50/60 Hz)', '9.6 lbs', NULL, NULL, 0),
(31, 'Dell KB216', 2, 5, 300000, 'DellKB216.jpg', 'A keyboard is an important IO device that helps human input commands easily. It acts as a communication medium between humans and computer systems. So if you are having a hard time deciding your next keyboard, then Dell KB216 will definitely impress you. It can be easily used for office and regular day to day usage.', 0, '2017-11-17 17:38:40', 8, 10, NULL, '', NULL, NULL, 'Three USB-C (USB 2)', NULL, NULL, '3.03 lb (1.37 kg)', 'Cherry MX SPEED', 'CH-9194114-NA', 1),
(32, 'Corsair K60 Pro', 5, 5, 1990000, 'CorsairK60Pro.jpg', 'The Corsair K60 RGB PRO Low Profile is a very good mechanical gaming keyboard. It\'s a full-size keyboard with great build quality and a low-profile design that\'s comfortable to use for long periods. It has full RGB backlighting with individually-lit keys, and every key is macro-programmable. It features Cherry MX Low Profile Speed switches, which are linear and incredibly responsive. ', 1, '2021-11-05 17:41:46', 20, 80, NULL, '', NULL, NULL, 'USB Wireless Receiver', NULL, NULL, '3.03 lb (1.37 kg)', 'Cherry MX SPEED', 'CH-9194114-NA', 0),
(33, 'Corsair K70 RGB MK.2', 5, 5, 5000000, 'CorsairK70RGBMK.2.jpg', 'The Corsair K70 RGB MK.2 is a versatile keyboard with outstanding gaming performance. It\'s available in a few different switches, including Cherry MX Brown, Red, Blue, Silent Red, and Speed, so you can get the switches you prefer. The Cherry MX Brown switches we tested are light to press, great for gaming, and offer a great overall typing quality.', 1, '2019-11-23 17:43:50', 15, 40, NULL, '', NULL, NULL, 'Bluetooth 5.0 wireless ', NULL, NULL, 'Weight: 2.8 pounds (1.29 kg)3', 'Cherry MX SPEED', 'CH-9194114-NA', 1),
(34, 'ASUS Rog Strix Scope', 4, 5, 300000, 'ASUSRogStrixScope.jpg', 'The ASUS ROG Strix Scope TKL is an excellent mechanical gaming keyboard. It\'s a TenKeyLess keyboard without a numpad, and it\'s available in various Cherry MX switches. It has excellent build quality and is reasonably comfortable to type on, even without a wrist rest, though there\'s a Deluxe variant that comes with one. ', 0, '2019-11-01 17:46:25', 10, 50, NULL, '', NULL, NULL, 'Three USB-C (USB 2)', NULL, NULL, '3.03 lb (1.37 kg)', 'Cherry MX SPEED', 'CH-9194114-NA', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Mobile phone'),
(2, 'Laptop'),
(3, 'Headphone'),
(4, 'Monitor'),
(5, 'Keyboard');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
