-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 02:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `manufacturer_code` varchar(100) NOT NULL,
  `manufacturer_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `manufacturer_code`, `manufacturer_name`) VALUES
(1, 'RZ', 'Razer'),
(2, 'LE', 'Lenovo'),
(3, 'NVI', 'Nvidia'),
(4, 'AMD', 'AMD'),
(5, 'HP', 'HP'),
(6, 'ACC', 'Acer'),
(7, 'INTL', 'Intel'),
(8, 'MSI', 'MSI'),
(9, 'PNY', 'PNY'),
(10, 'ASUS', 'ASUS'),
(11, 'APPLE', 'Apple'),
(12, 'LOGITECH', 'Logitech'),
(13, 'AKKO', 'AKKO'),
(14, 'STEELSERIES', 'Steelseries'),
(15, 'a2', 'gkk2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `TENKHACHHANG` varchar(200) NOT NULL,
  `MASANPHAM` varchar(200) NOT NULL,
  `THANHTIEN` int(11) NOT NULL,
  `createDATE` date NOT NULL,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `TENKHACHHANG`, `MASANPHAM`, `THANHTIEN`, `createDATE`, `SOLUONG`) VALUES
(48, 'Tuấn Trung', 'ARC-1 x 1, ASUS-NV-2 x 1', 70189000, '2023-03-28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_details` varchar(9999) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `mansx` varchar(100) NOT NULL,
  `product_year` year(4) NOT NULL,
  `price` decimal(12,4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `images` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_description` varchar(999) NOT NULL,
  `more_details` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_details`, `product_type`, `mansx`, `product_year`, `price`, `quantity`, `images`, `image`, `product_description`, `more_details`) VALUES
(1, 'AMD-01', 'AMD Ryzen 7 7900X3D  (12C/24T,4.4 GHz - 5.6 GHz)', 'CPU AMD Ryzen 9 7900X3D (4.4Ghz up to 5.6Ghz/ 140MB/ 12 cores 24 threads/ 120W/ Sockets AM5)', 'CPU', 'AMD', 2022, '14199000.0000', 5, 'images/7900x3d-1.jpg,images/7900x3d-2.jpg', 'images/7900x3d-2.jpg', '', ''),
(2, 'INTL-01', 'INTEL Core i3-10105 (4C/8T, 3.7GHz - 4.4GHz)', 'Bộ vi xử lý/ CPU Intel Comet Lake Core i3-10105 (4 Cores 8 Threads up to 4.40 GHz 10th Gen LGA 1200)', 'CPU', 'INTL', 2020, '2799000.0000', 20, 'images/i3_10105-1.jpg,images/i3_10105-2.jpg,images/i3_10105-3.jpg,images/i3_10105-4.jpg', 'images/i3_10105-1.jpg', '', ''),
(3, 'INTL-02', 'INTEL Core i5-12400 (6C/12T, 2.50 GHz - 4.40 GHz)', 'CPU Intel Core i5 12400 thế hệ thứ 12 mạnh mẽ và tương thích tốt với socket LGA 1700.', 'CPU', 'INTL', 2022, '4890000.0000', 15, 'images/i5_12400-1.jpg,images/i5_12400-2.jpg,images/i5_12400-3.jpg,images/i5_12400-4.jpg,images/i5_12400-5.jpg', 'images/i5_12400-1.jpg', '', ''),
(4, 'AMD-02', 'AMD Ryzen 5 7600X (6C/12T,4,7 GHZ - 5.3 GHZ)', 'AMD Ryzen 5 7600X / 4.7GHz Boost 5.3GHz / 6 nhân 12 luồng / 38MB / AM5', 'CPU', 'AMD', 2023, '6790000.0000', 10, 'images/r5_7600x-1.jpg,images/r5_7600x-2.jpg,images/r5_7600x-3.jpg,images/r5_7600x-4.jpg', 'images/r5_7600x-1.jpg', 'CPU <b>AMD Ryzen 5 7600X (6 nhân 12 luồng, up to 5.3Ghz) </b>là sản phẩm thuộc phân khúc giá rẻ của dòng CPU Ryzen 7000 Series, sở hữu 6 nhân 12 luồng với mức xung nhịp cơ bản là 4.7GHz và xung nhịp tối đa lõi đơn lên đến 5.3GHz.<br>\r\nCPU <b>AMD Ryzen 5 7600X</b> sẽ được chạy ở mức TDP khoảng <b>105W</b>, cao hơn 65W so với Ryzen 5 5600X tiền nhiệm và có tổng cộng 38MB bộ nhớ đệm, trong đó bao gồm <b>32MB L3 và 6MB L2</b>. Với các thông số tuyệt vời như này, Ryzen 5 7600X sẽ mang đến cho người dùng mức hiệu suất cực khủng, cao hơn tới 11% so với Ryzen 9 5950X Zen 3 hiện tại.', '<h3><b>Cấu trúc Zen 4</b></h3><br>\r\nCPU <b>AMD Ryzen 5 7600X</b> dựa trên kiến ​​trúc mới của AMD, <b>Zen 4</b>. Giống như <b>Zen 3</b> trước đó, AMD tiếp tục sử dụng <b>thiết kế dựa trên chiplet trong kiến ​​trúc mới này</b>, mang lại cho nó một giao diện cao cấp tương tự như tất cả các thiết bị trước đó Kiến trúc bộ xử lý Zen. Tuy nhiên, một số thay đổi trong kiến ​​trúc cốt lõi và việc chuyển sang quy trình sản xuất <b>5nm</b> mới đã cho phép AMD tăng hiệu suất đáng kể. Nhìn chung, xu hướng của Zen 4 là giống như Zen 3, nhưng lớn hơn và mạnh mẽ hơn. <b>Zen 4 có giao diện người dùng mạnh mẽ hơn so với kiến ​​trúc Zen 3</b> trước đó bao gồm phần cứng dự đoán nhánh mạnh hơn có thể đưa ra hai dự đoán nhánh cho mỗi chu kỳ.<br>\r\n'),
(5, 'ASUS-L01', 'Asus Gaming ROG Strix(R7 4800H/16GB RAM)', 'Laptop Asus Gaming ROG Strix G513IM-HN008W (R7 4800H/16GB RAM/512GB SSD/15.6 FHD 144hz/RTX 3060 6GB/Win11/Xám)', 'LAPTOP', 'ASUS', 2022, '27499000.0000', 20, 'images/asus_laptop_01-1.jpg,images/asus_laptop_01-2.jpg,images/asus_laptop_01-3.jpg,images/asus_laptop_01-4.jpg,images/asus_laptop_01-5.jpg', 'images/asus_laptop_01-1.jpg', '', ''),
(6, 'ASUS-L02', 'Asus Gaming Zephyrus Duo(R9 6900HX/16GB RAM)', 'Laptop Asus Gaming Zephyrus Duo GX650RX-LO156W (R9 6900HX/16GB RAM/2TB SSD/16 WQXGA 165hz/RTX 3080Ti 16GB/Win11/Đen/Balo)', 'LAPTOP', 'ASUS', 2021, '99999999.9999', 5, 'images/asus_zep_01-1.jpg,images/asus_zep_01-2.jpg,images/asus_zep_01-3.jpg,images/asus_zep_01-4.jpg,images/asus_zep_01-5.jpg,images/asus_zep_01-6.jpg', 'images/asus_zep_01-1.jpg', '', ''),
(7, 'APPLE-MAC-01', 'Apple Macbook Pro 14”(Apple M1 Pro)', 'Apple Macbook Pro 14” (MKGR3SA/A) (Apple M1 Pro/16GB RAM/512GB SSD/14.2 inch/Mac OS/Bạc) (2021)', 'LAPTOP', 'APPLE', 2021, '48999000.0000', 15, 'images/apple_mac_pro-1.jpg,images/apple_mac_pro-2.jpg,images/apple_mac_pro-3.jpg,images/apple_mac_pro-4.jpg', 'images/apple_mac_pro-1.jpg', '', ''),
(8, 'LENOVO-01', 'Laptop Lenovo Legion 5 (R7 6800H/16GB RAM)\r\n', 'Laptop Lenovo Legion 5 15ARH7H (82RE0036VN) (R7 6800H/16GB RAM/512GB SSD/15.6 FHD 165hz/RTX 3050Ti 4G/Win11/Xám)\r\n', 'LAPTOP', 'LN', 2022, '33899900.0000', 10, 'images/lenovo-01.jpg,images/lenovo-02.jpg,images/lenovo-03.jpg,images/lenovo-04.jpg,', 'images/lenovo-01.jpg', '', ''),
(9, 'LOGITECH-01', 'Logitech Pro X Superlight White', 'Chuột không dây Logitech Pro X Superlight White (USB/Trắng/910-005944)', 'MICE', 'LOGITECH', 2020, '2999000.0000', 10, 'images/logitech-mice-1.jpg,images/logitech-mice-2.jpg,images/logitech-mice-3.jpg,images/logitech-mice-4.jpg,images/logitech-mice-5.jpg', 'images/logitech-mice-1.jpg', '', ''),
(10, 'RZ-MICE-01', 'Razer Basilisk Ultimate with Dock ', 'Chuột không dây Razer Basilisk Ultimate with Dock (RZ01-03170100-R3A1)', 'MICE', 'RZ', 2021, '2999000.0000', 15, 'images/razer-basilik-2.jpg,images/razer-basilik-2.jpg,images/razer-basilik-3.jpg,images/razer-basilik-4.jpg,images/razer-basilik-5.jpg', 'images/razer-basilik-1.jpg', '', ''),
(11, 'AKKO-01', 'Bàn phím cơ Akko ACR59 White(Akko CS Jelly)', 'Bàn phím cơ Akko ACR59 White White (Akko CS Jelly/USB/RGB)', 'KB', 'AKKO', 2022, '2599000.0000', 10, 'images/akko-1.jpg,images/akko-2.jpg,images/akko-3.jpg,images/akko-4.jpg,images/akko-5.jpg', 'images/akko-1.jpg', '', ''),
(12, 'LG-02', 'Logitech G913 TKL Lightspeed Wireless RGB', 'Bàn phím Logitech G913 TKL Lightspeed Wireless RGB Red Linear Switch', 'KB', 'LOGITECH', 2020, '3699000.0000', 20, 'images/logitech2-1.jpg,images/logitech2-2.jpg,images/logitech2-3.jpg,images/logitech2-4.jpg,images/logitech2-5.jpg', 'images/logitech2-1.jpg', '', ''),
(13, 'STEELSERIES-01', 'Steelseries Rival 5<br>(USB/RGB) ', 'Chuột Steelseries Rival 5 (USB/RGB) (62551)', 'MICE', 'STEELSERIES', 2022, '1690000.0000', 10, 'images/steel-1.jpg,images/steel-2.jpg,images/steel-3.jpg,images/steel-4.jpg', 'images/steel-1.jpg', '', ''),
(14, 'RZ-03', 'Razer Viper V2 Pro White Ultra Lightweight', 'Chuột game không dây Razer Viper V2 Pro White Ultra Lightweight (RZ01-04390200-R3A1)', 'MICE', 'RZ', 2022, '3190000.0000', 5, 'images/razer-2-1.jpg,images/razer-2-2.jpg,images/razer-2-3.jpg,images/razer-2-4.jpg,images/razer-2-5.jpg', 'images/razer-2-1.jpg', '', ''),
(15, 'LG-02', 'Logitech MX Mechanical Graphite Tactile', 'Bàn phím không dây Logitech MX Mechanical Graphite Tactile Switch(USB/Bluetooth)', 'KB', 'LOGITECH', 2020, '3799000.0000', 5, 'images/logitechkb-1.jpg,images/logitechkb2-2.jpg,images/logitechkb2-3.jpg,images/logitechkb2-4.jpg', 'images/logitechkb2-1.jpg', '', ''),
(17, 'ASUS-AMD-1', 'Asus TUF GAMING RX 7900 XTX OC Edition', 'Card màn hình Asus TUF GAMING RX 7900 XTX OC OC Edition 24GB GDDR6', 'GPU', 'ASUS', 2022, '35990000.0000', 10, 'images/7900xtx-1.jpg,images/7900xtx-2.jpg,images/7900xtx-3.jpg,images/7900xtx-4.jpg,images/7900xtx-5.jpg,', 'images/7900xtx-1.jpg', '', ''),
(18, 'ASUS-NV-2', 'Asus ROG STRIX-RTX 4090 WHITE', 'Card màn hình Asus ROG STRIX-RTX 4090-O24G-GAMING WHITE', 'GPU', 'ASUS', 2022, '65990000.0000', 5, 'images/4090-1.jpg,images/4090-2.jpg,images/4090-3.jpg,images/4090-4.jpg,images/4090-5.jpg', 'images/4090-1.jpg', '', ''),
(19, 'ARC-1', 'Asrock Intel Arc A380 Challenger ITX 6GB', '<p>Asrock Intel Arc A380 Challenger ITX 6GB</p>', 'CPU', 'INTL', 2022, '4199000.0000', 20, 'images/arc380-1.jpg,images/arc380-2.jpg,images/arc380-3.jpg,images/arc380-4.jpg', 'images/arc380-1.jpg', '<p>Card màn hình Asrock Intel Arc A380 Challenger ITX 6GB</p>', ''),
(24, 'AMD-005', 'Ryzen 5 2600X', '<p>Ryzen 5 2600X (6C/12T)</p>', 'GPU', 'ASUS', 2019, '2490000.0000', 15, 'images/04.png', 'images/04(1).png', '<p>Ryzen 5 2600X</p>', '<p>Ryzen 5 2600X</p>');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_code` varchar(250) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `loai` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_code`, `type_name`, `loai`) VALUES
(1, 'CPU', 'Vi xử lý CPU', 'Linh kiện'),
(2, 'GPU', 'Card màn hình', 'Linh kiện\r\n'),
(3, 'KB', 'Bàn phím', 'Phụ kiện\r\n'),
(4, 'MICE', 'Chuột', 'Phụ kiện\r\n'),
(5, 'HEADPHONE', 'Headphone', 'Phụ kiện'),
(6, 'LAPTOP', 'Laptop', 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `role` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `phone`, `address`, `role`, `password`, `email`) VALUES
(8, 'trung', 'Tuấn Trung', 938976425, '745/28', 'user', '$2y$10$0TrV1lmhwoG8Qm5MFu7c7eyV0ZVun72C/RcOr1iDAtLFvEtj.cJ7m', 'ttrung@gmail.com'),
(9, 'trung1', 'Tuấn Trung', 938978425, '745/28', 'admin', '$2y$10$ujj0H87QW/wfaZBR6V6U3uSaqmVFtY0qEldXs3v5CLvrLXJVc5MAa', 'trung@gmail.com'),
(11, 'thanh', 'Tuấn Thành', 123456789, '1234asd', 'admin', '$2y$10$w/BHpGdZTdS0.096xaeEPusQ3H18yHBUlspKM0J1vqp62qIwdiTLW', 'thanh@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
