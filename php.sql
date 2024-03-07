-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `idhanghoa` int(11) DEFAULT NULL,
  `makh` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `ngaybl` date DEFAULT NULL,
  `sao` tinyint(3) UNSIGNED DEFAULT 0,
  `isAccept` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `idhanghoa`, `makh`, `content`, `ngaybl`, `sao`, `isAccept`) VALUES
(1, 1, 17, 'Sản phẩm chất lượng khá tốt.', '2024-01-22', 2, 1),
(5, 1, 17, 'Sản phẩm giá thành tốt, đẹp', '2024-01-23', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img_chinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `img_chinh`) VALUES
(1, 'Áo thun', 'ao-thun', 'aothun/aothun1.jpg'),
(2, 'Áo sơ mi', 'ao-so-mi', 'aosomi/aosomi1.jpg'),
(3, 'Áo kiểu', 'ao-kieu', 'aokieu/aokieu1.jpg'),
(4, 'Quần', 'quan', 'quan/quan1.jpg'),
(5, 'Chân váy', 'chan-vay', 'chanvay/chanvay1.jpg'),
(6, 'Váy', 'vay', 'vay/vay1.jpg'),
(7, 'Áo dài', 'ao-dai', 'aodai/aodai1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Blue'),
(5, 'Green'),
(6, 'Gray2');

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idSize` int(11) NOT NULL,
  `idColor` int(11) NOT NULL,
  `soluongmua` int(11) DEFAULT NULL,
  `thanhtien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `idProduct`, `idSize`, `idColor`, `soluongmua`, `thanhtien`) VALUES
(37, 1, 1, 1, 12, 12960000.00),
(37, 1, 2, 1, 1, 960000.00),
(38, 1, 1, 1, 7, 7560000.00),
(38, 18, 3, 3, 1, 602000.00),
(39, 1, 1, 1, 1, 1080000.00),
(39, 1, 3, 1, 1, 1000000.00),
(39, 1, 4, 1, 1, 875000.00),
(39, 1, 4, 4, 1, 960000.00),
(40, 16, 1, 5, 1, 2310000.00),
(41, 1, 1, 1, 2, 2160000.00),
(41, 18, 3, 3, 1, 602000.00),
(42, 16, 1, 5, 4, 9240000.00);

-- --------------------------------------------------------

--
-- Table structure for table `ctproduct`
--

CREATE TABLE `ctproduct` (
  `idproduct` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `soluongton` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `giamgia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctproduct`
--

INSERT INTO `ctproduct` (`idproduct`, `idcolor`, `idsize`, `price`, `soluongton`, `image`, `giamgia`) VALUES
(1, 1, 1, 1200000, 5, 'aodai/aodai1.jpg', 10),
(1, 1, 2, 1200000, 4, 'aodai/aodai1.jpg', 20),
(1, 1, 3, 1250000, 3, 'aodai/aodai1.jpg', 20),
(1, 1, 4, 1250000, 12, 'aodai/aodai1.jpg', 30),
(1, 1, 5, 1200000, 7, 'aodai/aodai1.jpg', 10),
(1, 4, 4, 1200000, 10, 'aodai/aodai1.jpg', 20),
(2, 1, 4, 2200000, 22, 'aodai/aodai2.jpg', 50),
(3, 1, 4, 780000, 10, 'aothun/aothun1.jpg', 0),
(4, 5, 3, 800000, 5, 'aosomi/aosomi1.jpg', 20),
(9, 4, 5, 980000, 4, 'aodai/aodai3.jpg', 10),
(10, 5, 5, 760000, 3, 'aodai/aodai4.jpg', 20),
(11, 3, 1, 1650000, 4, 'aodai/aodai10.jpg', 20),
(12, 2, 4, 800000, 5, 'aodai/aodai5.jpg', 30),
(13, 1, 2, 800000, 12, 'aodai/aodai6.jpg', 10),
(14, 5, 4, 2200000, 10, 'aodai/aodai7.jpg', 30),
(15, 3, 4, 2200000, 4, 'aodai/aodai8.jpg', 10),
(16, 5, 1, 3300000, 0, 'aodai/aodai9.jpg', 30),
(17, 5, 4, 580000, 12, 'aothun/aothun2.jpg', 20),
(18, 3, 3, 860000, 3, 'aothun/aothun3.jpg', 30),
(19, 2, 4, 980000, 12, 'aosomi/aosomi2.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  `giam` int(11) NOT NULL,
  `vanchuyen` int(11) NOT NULL DEFAULT 0,
  `phone` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `makh`, `ngaydat`, `tongtien`, `giam`, `vanchuyen`, `phone`, `diachi`) VALUES
(37, 24, '2024-02-26', 13920000, 0, 0, 9080102, '12 Tân Phú'),
(38, 24, '2024-02-26', 8162000, 0, 0, 9080102, '12 Tân Phú'),
(39, 27, '2024-02-26', 3915000, 0, 0, 9803212, '12 Tân Phú'),
(40, 26, '2024-02-26', 2310000, 0, 0, 111, '12 phu'),
(41, 24, '2024-03-04', 2762000, 0, 0, 9080102, '12 Tân Phú'),
(42, 24, '2024-03-04', 9240000, 0, 0, 9080102, '12 Tân Phú');

-- --------------------------------------------------------

--
-- Table structure for table `img_slider`
--

CREATE TABLE `img_slider` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `truong` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 ảnh carousel\r\n2 ảnh sale\r\n3 ảnh thương hiệu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_slider`
--

INSERT INTO `img_slider` (`id`, `img`, `title1`, `title2`, `truong`) VALUES
(1, 'carousel-1.jpg', '10% OFF YOUR FIRST ORDER', 'Fashionable Dress\r\n', 1),
(2, 'carousel-2.jpg', '10% OFF YOUR FIRST ORDER', 'Reasonable Price', 1),
(3, 'offer-1.png', '30% OFF BLACK FRIDAY', 'Spring Collection', 2),
(4, 'offer-2.png', '50% OFF BLACK FRIDAY', 'Winter Collection', 2),
(5, 'vendor-1.jpg', '', '', 3),
(6, 'vendor-2.jpg', '', '', 3),
(7, 'vendor-3.jpg', '', '', 3),
(8, 'vendor-4.jpg', '', '', 3),
(9, 'vendor-5.jpg', '', '', 3),
(10, 'vendor-6.jpg', '', '', 3),
(11, 'vendor-7.jpg', '', '', 3),
(12, 'vendor-8.jpg', '', '', 3),
(21, 'p8.jpg', 'Sale13', '70%', 1),
(22, 'p8.jpg', 'Sale114', '70%', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `phone`, `avatar`, `role`) VALUES
(17, 'anh vu', 'ab', 'f3e020b4a4178380feb138feb7b572a8', 'ganh998811@gmail.com1', '12 Tân Phước', 123, 'avatar/avatar.jpg', 0),
(18, 'Dương Nguyễn Phú Cường', 'abc', '270d923861d36e592b4c9d41aa72349b', 'ganh998811@gmail.com', '130 Xô Viết Nghệ Tỉnh', 915659223, NULL, 0),
(19, 'Dương Nguyễn Phú Cường', NULL, NULL, 'ganh998811@gmail.com11', '130 Xô Viết Nghệ Tỉnh', 915659223, NULL, 0),
(20, 'Dương Nguyễn Phú Cường', NULL, NULL, 'ganh998811@gmail.com112', '130 Xô Viết Nghệ Tỉnh', 915659223, NULL, 0),
(21, 'Dương Nguyễn Phú Cường', NULL, NULL, 'ganh998811@gmail.com1123', '130 Xô Viết Nghệ Tỉnh', 915659223, NULL, 0),
(22, 'tran', NULL, NULL, 'ganh9988112@gmail.com', '12', 1234, NULL, 0),
(23, 'Trần', 'tran', 'cf5c89c86687fc29758dadec0d2751cf', 'anhgau@gmail.com', '12 Tân Phú', 123, NULL, 0),
(24, 'anhvu', 'admin', 'a8019b3648d85f0dc19978fe13fe7b4e', 'admin2@admin.com', '12 Tân Phú', 9080102, NULL, 1),
(25, 'anhvu1', 'test1', '16976191f22cf8f9ca715dd997044030', 'user111@gmail.com', '12 Tân Phú', 123, NULL, 0),
(26, 'hihi', 'aw', 'f3e020b4a4178380feb138feb7b572a8', 'gganh@gmail.com', '12 phu', 111, NULL, 0),
(27, 'Trần', NULL, NULL, 'anh@gmail.com', '12 Tân Phú', 9803212, NULL, 0),
(28, 'hihi1', 'anhx', 'f3e020b4a4178380feb138feb7b572a8', 'ggganh@gmail.com', '12 phu', 324, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `is_main_page` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `is_main_page`, `url`) VALUES
(1, NULL, 'Home', 1, 'index.php'),
(2, NULL, 'Shop', 1, 'index.php?controller=shop'),
(3, NULL, 'Shop Detail', 1, 'index.php?controller=shop'),
(4, NULL, 'Pages', 1, ''),
(5, 4, 'Shopping Cart', 0, 'index.php?controller=cart'),
(6, 4, 'Check Out', 0, 'index.php?controller=cart'),
(7, NULL, 'Contact', 1, 'index.php?controller=contact');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `dacbiet` bit(3) NOT NULL DEFAULT b'0',
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `ngaylap` date NOT NULL,
  `mota` text NOT NULL,
  `chitiet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `id_category`, `dacbiet`, `luotxem`, `ngaylap`, `mota`, `chitiet`) VALUES
(1, 'Áo dài Ái Minh', 7, b'111', 10, '2023-12-03', 'Áo dài Ái Minh, một biểu tượng trang phục truyền thống của người Việt, nổi bật với vẻ đẹp thanh lịch và sự tinh tế trong từng đường may. Chiếc áo dài này thường có thiết kế ôm sát vóc dáng, tạo nên sự gọn gàng và quý phái. Được làm từ những chất liệu như lụa, gấm, hoặc voan, áo dài Ái Minh mang lại cảm giác mềm mại, thoải mái cho người mặc.', 'Mặt trước của áo dài thường được trang trí với những đường thêu hoa văn tinh xảo, tạo nên điểm nhấn nghệ thuật độc đáo. Những họa tiết truyền thống như hoa sen, đào, hay những chi tiết nhỏ như lưới ren cũng thường xuất hiện trên bề mặt áo, thể hiện sự kỹ thuật cao trong quá trình sản xuất.'),
(2, 'Áo dài Viên Minh', 7, b'000', 5, '2023-12-02', 'Áo dài Viên Minh, với tên gọi ấn tượng, không chỉ là một trang phục truyền thống mà còn là biểu tượng của sự thanh lịch và sang trọng trong trang phục Việt Nam. Chiếc áo dài này thường được thiết kế với những đường cắt tinh tế, tôn lên vẻ đẹp tự nhiên của người mặc.', 'Áo dài Viên Minh thường có kiểu cổ cao và tay dài, tạo nên sự đằm thắm và trang trí. Chất liệu vải thường là những loại cao cấp như lụa, satin, hoặc nhung, mang lại cảm giác mềm mại và sang trọng. Áo dài được may kỹ lưỡng, với những đường may chắc chắn và tinh tế, tạo nên sự hoàn hảo trong từng chi tiết.'),
(3, 'Áo Thun Mula ', 1, b'111', 3, '2023-12-06', 'Áo thun Mula không chỉ là một sản phẩm thời trang mà còn là biểu tượng của sự thoải mái và phong cách hiện đại. Với chất liệu vải cao cấp và kiểu dáng linh hoạt, áo thun Mula đã chinh phục người mặc bằng sự đơn giản và tinh tế.', 'Chất liệu vải thường là cotton, giúp áo thun Mula thoáng khí và thoải mái. Thiết kế áo thường rất đa dạng, từ áo cổ tròn cơ bản đến áo cổ polo hoặc áo có hình in và thông điệp thú vị. Mọi chi tiết đều được chú trọng để tạo nên một sản phẩm thời trang đẳng cấp và phản ánh cái nhìn đương đại về phong cách.'),
(4, 'Áo Sơ Mi Yeolan', 2, b'001', 2, '2023-12-04', 'Áo sơ mi Yeolan ngắn là một item thời trang đang rất được ưa chuộng trong thời gian gần đây. Với thiết kế đơn giản nhưng không kém phần tinh tế, áo sơ mi Yeolan ngắn mang đến vẻ ngoài trẻ trung, năng động cho người mặc.', 'Áo sơ mi Yeolan ngắn được may từ chất liệu cotton thoáng mát, thấm hút mồ hôi tốt, mang lại cảm giác thoải mái khi mặc. Áo có form dáng rộng rãi, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau. Cổ áo sơ mi Yeolan ngắn là cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn. Cúc áo sơ mi được làm từ chất liệu nhựa cao cấp, có độ bền cao.'),
(5, 'Áo Kiểu Jae', 3, b'001', 5, '2023-12-06', 'Áo kiểu Jae là một loại áo sơ mi có thiết kế đơn giản, thanh lịch, phù hợp với cả nam và nữ. Áo có phần cổ bẻ, tay dài, thường được may từ chất liệu cotton hoặc linen.\r\n\r\nÁo kiểu Jae có thiết kế đơn giản, không cầu kỳ, nhưng vẫn toát lên vẻ thanh lịch, tinh tế. Áo có phần cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn. Tay áo dài, có thể xắn lên hoặc buông xuống tùy theo sở thích.', 'Chất liệu: Áo kiểu Jae thường được may từ chất liệu cotton hoặc linen.\r\nForm dáng: Áo có form dáng vừa vặn, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\r\nCổ áo: Cổ áo sơ mi Jae là cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn.\r\nTay áo: Tay áo dài, có thể xắn lên hoặc buông xuống tùy theo sở thích.\r\nMàu sắc: Áo kiểu Jae có nhiều màu sắc đa dạng để bạn lựa chọn, phù hợp với nhiều phong cách khác nhau.'),
(6, 'Quần Short Arian', 4, b'000', 1, '2023-12-04', 'Quần short Arian là một loại quần short được thiết kế đơn giản, năng động, phù hợp với cả nam và nữ. Quần có phần cạp cao, ống rộng, thường được may từ chất liệu cotton hoặc denim.\r\n\r\n', 'Chất liệu: Quần short Arian thường được may từ chất liệu cotton hoặc denim.\r\nForm dáng: Quần có form dáng rộng rãi, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\r\nCạp quần: Cạp quần Arian là cạp cao, được may tỉ mỉ, chắc chắn.'),
(7, 'Chân Váy Camela', 5, b'000', 2, '2023-12-03', 'Chân váy Camela là một loại chân váy được thiết kế đơn giản, thanh lịch, phù hợp với mọi dáng người. Chân váy có phần cạp cao, xòe rộng, thường được may từ chất liệu cotton hoặc linen.\r\nChân váy Camela có thiết kế đơn giản, không cầu kỳ, nhưng vẫn toát lên vẻ thanh lịch, tinh tế. Chân váy có phần cạp cao, giúp tôn lên vòng eo thon gọn. Phần chân váy xòe rộng, mang đến vẻ ngoài nữ tính, dịu dàng.', 'Chất liệu: Chân váy Camela thường được may từ chất liệu cotton hoặc linen.\r\nForm dáng: Chân váy có form dáng xòe rộng, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\r\nCạp váy: Cạp váy Camela là cạp cao, được may tỉ mỉ, chắc chắn.'),
(8, 'Váy Kera', 6, b'001', 1, '2023-12-04', 'Váy Kera là một loại váy được thiết kế đơn giản, thanh lịch, phù hợp với mọi dáng người. Váy có phần cổ chữ V, tay dài, thường được may từ chất liệu cotton hoặc linen.', 'Chất liệu: Váy Kera thường được may từ chất liệu cotton hoặc linen.\r\nForm dáng: Váy có form dáng suông rộng, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\r\nCổ váy: Cổ váy Kera là cổ chữ V, được may tỉ mỉ, chắc chắn.'),
(9, 'Áo dài Kim Minh', 7, b'001', 110, '2023-12-01', 'Áo dài Kim Minh là thương hiệu áo dài nổi tiếng tại Việt Nam, được thành lập từ năm 2005. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đa dạng.', 'Áo dài truyền thống của Kim Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(10, 'Áo dài Uyển Minh', 7, b'001', 15, '2023-12-02', 'Áo dài Uyển Minh là thương hiệu áo dài được thành lập từ năm 2019 bởi nhà thiết kế trẻ Lê Thị Uyển Minh. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.', 'Áo dài truyền thống của Uyển Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(11, 'Áo dài Tuệ Minh', 7, b'001', 0, '2023-12-03', 'Áo dài Tuệ Minh là thương hiệu áo dài được thành lập từ năm 2020 bởi nhà thiết kế trẻ Nguyễn Thị Tuệ Minh. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Áo dài truyền thống của Tuệ Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(12, 'Áo dài Ngư Minh', 7, b'001', 0, '2023-12-06', 'Áo dài Ngư Minh là thương hiệu áo dài mới nổi, được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng độc đáo, mới lạ.', 'Áo dài truyền thống của Ngư Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(13, 'Áo dài Nhã Minh', 7, b'001', 15, '2023-12-04', 'Áo dài Nhã Minh là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, năng động.', 'Áo dài truyền thống của Nhã Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(14, 'Áo Dài Ý Minh', 7, b'001', 22, '2023-12-02', 'Áo Dài Ý Minh là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Với chất lượng vượt trội và kiểu dáng đơn giản, thanh lịch, áo dài Ý Minh là lựa chọn lý tưởng cho những cô nàng yêu thích áo dài truyền thống và cách tân, nhưng muốn thể hiện phong cách thanh lịch, trang nhã của mình.'),
(15, 'Áo dài Diệp Minh', 7, b'001', 11, '2023-12-02', 'Áo dài Diệp Minh là thương hiệu áo dài được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.', 'Áo dài Diệp Minh là thương hiệu áo dài được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.'),
(16, 'Áo Dài Khánh Mỹ', 7, b'001', 11, '2023-12-06', 'Áo Dài Khánh Mỹ là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Áo dài truyền thống của Khánh Mỹ được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.'),
(17, 'Áo Thun Redvelvet', 1, b'001', 11, '2023-12-03', 'Áo thun Red Velvet là một trong những mẫu áo thun được yêu thích nhất hiện nay, đặc biệt là đối với những fan hâm mộ của nhóm nhạc nữ Kpop Red Velvet. Áo thun Red Velvet có nhiều mẫu mã đa dạng, với thiết kế đơn giản, trẻ trung, năng động, phù hợp với mọi lứa tuổi.', 'Chất liệu vải: Áo thun Red Velvet được làm từ chất liệu cotton 100%, mềm mại, thấm hút mồ hôi tốt, mang đến cảm giác thoải mái cho người mặc.\r\nGiá thành: Áo thun Red Velvet có giá thành dao động từ 150.000 đến 300.000 đồng, tùy thuộc vào chất liệu vải, mẫu mã và kích thước áo.'),
(18, 'Áo Thun Chic', 1, b'001', 6, '2023-12-06', 'Áo thun Red Velvet là một trong những mẫu áo thun được yêu thích nhất hiện nay, đặc biệt là đối với những fan hâm mộ của nhóm nhạc nữ Kpop Red Velvet. Áo thun Red Velvet có nhiều mẫu mã đa dạng, với thiết kế đơn giản, trẻ trung, năng động, phù hợp với mọi lứa tuổi.', 'Áo thun Red Velvet logo: Đây là mẫu áo thun đơn giản, với thiết kế logo của nhóm nhạc Red Velvet ở mặt trước áo. Áo thun Red Velvet logo mang đến vẻ đẹp trẻ trung, năng động cho người mặc.\r\nÁo thun Red Velvet hình ảnh: Đây là mẫu áo thun với thiết kế hình ảnh của các thành viên nhóm nhạc Red Velvet ở mặt trước áo. Áo thun Red Velvet hình ảnh mang đến vẻ đẹp đáng yêu, cá tính cho người mặc.'),
(19, 'Sơ Mi Tarik', 2, b'001', 4, '2023-12-01', 'Sơ Mi Tarik được đánh giá cao bởi chất lượng vượt trội, từ chất liệu vải đến kỹ thuật may đo. Vải sơ mi Tarik được nhập khẩu từ các thương hiệu nổi tiếng như Thái Tuấn, Bảo Lộc,... với độ bền cao, mềm mại và thấm hút mồ hôi tốt. Kỹ thuật may đo của sơ mi Tarik được thực hiện bởi những thợ may lành nghề, tỉ mỉ đến từng đường kim mũi chỉ.', 'Sơ mi trơn màu sắc đơn giản: Đây là mẫu sơ mi đơn giản, với thiết kế trơn màu sắc đơn giản. Sơ mi trơn màu sắc đơn giản mang đến vẻ đẹp trẻ trung, năng động cho người mặc.\r\nSơ mi họa tiết nổi bật: Đây là mẫu sơ mi với thiết kế họa tiết nổi bật, bắt mắt. Sơ mi họa tiết nổi bật mang đến vẻ đẹp cá tính, mạnh mẽ cho người mặc.'),
(20, 'Áo Sơ Mi Cici', 2, b'001', 4, '2023-12-04', 'Áo Sơ Mi Cici được đánh giá cao bởi chất lượng vượt trội, từ chất liệu vải đến kỹ thuật may đo. Vải sơ mi Cici được nhập khẩu từ các thương hiệu nổi tiếng như Thái Tuấn, Bảo Lộc,... với độ bền cao, mềm mại và thấm hút mồ hôi tốt. Kỹ thuật may đo của sơ mi Cici được thực hiện bởi những thợ may lành nghề, tỉ mỉ đến từng đường kim mũi chỉ.', 'Sơ mi trơn màu sắc đơn giản: Đây là mẫu sơ mi đơn giản, với thiết kế trơn màu sắc đơn giản. Sơ mi trơn màu sắc đơn giản mang đến vẻ đẹp thanh lịch, trang nhã cho người mặc.\r\nSơ mi họa tiết nhẹ nhàng: Đây là mẫu sơ mi với thiết kế họa tiết nhẹ nhàng, tinh tế. Sơ mi họa tiết nhẹ nhàng mang đến vẻ đẹp thanh lịch, trẻ trung cho người mặc.');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT 'XS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `percent` int(11) NOT NULL,
  `ngayhethan` date NOT NULL,
  `trangthai` int(11) DEFAULT 1 CHECK (`trangthai` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `percent`, `ngayhethan`, `trangthai`) VALUES
(1, 'AB1', 10, '2024-12-05', 1),
(2, 'AZ2', 20, '2024-12-12', 0),
(3, 'AZ3', 30, '2023-12-03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `idhanghoa` (`idhanghoa`),
  ADD KEY `makh` (`makh`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`idProduct`,`idSize`,`idColor`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idSize` (`idSize`),
  ADD KEY `idColor` (`idColor`);

--
-- Indexes for table `ctproduct`
--
ALTER TABLE `ctproduct`
  ADD PRIMARY KEY (`idproduct`,`idcolor`,`idsize`),
  ADD KEY `fk_idsize_ct` (`idsize`),
  ADD KEY `fk_idcolor_ct` (`idcolor`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_makh` (`makh`);

--
-- Indexes for table `img_slider`
--
ALTER TABLE `img_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcategory_p` (`id_category`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `img_slider`
--
ALTER TABLE `img_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idhanghoa`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`idSize`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `cthoadon_ibfk_3` FOREIGN KEY (`idColor`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `cthoadon_ibfk_4` FOREIGN KEY (`masohd`) REFERENCES `hoadon` (`id`);

--
-- Constraints for table `ctproduct`
--
ALTER TABLE `ctproduct`
  ADD CONSTRAINT `fk_idcolor_ct` FOREIGN KEY (`idcolor`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_idproduct_ct` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_idsize_ct` FOREIGN KEY (`idsize`) REFERENCES `size` (`id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_id_makh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_idcategory_p` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
