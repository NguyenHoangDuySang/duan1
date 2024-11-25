-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 20, 2024 lúc 03:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Quần Áo Thể Thao'),
(2, 'Nam'),
(3, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `FeedBack`
--

CREATE TABLE `FeedBack` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject_name` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Galery`
--

CREATE TABLE `Galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Orders`
--

INSERT INTO `Orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 1, 'NGUYEN DUY SANG', 'nguyenduysang28032004@gmail.com', '0123456789', 'Ha Noi', 'ABC', '2024-11-18 16:43:54', 1, 1),
(2, 2, 'Trần Văn Hùng', 'tranvanhung@gmail.com', '123123123', 'Ha Noi', 'ABC', '2024-11-18 16:43:54', 2, 2),
(3, 3, 'Tô Tiến Hải', 'totienhai@gmail.com', '1234567890', 'hn', 'ok', '2024-11-18 12:42:16', 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Order_Details`
--

CREATE TABLE `Order_Details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Order_Details`
--

INSERT INTO `Order_Details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 2, 2, 1, 1, 1),
(2, 2, 3, 1, 1, 1),
(3, 1, 2, 1, 2, 2),
(4, 1, 3, 1, 1, 1),
(5, 3, 1, 600000, 5, 3000000),
(6, 3, 5, 600000, 3, 1800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 2, 'ÁO THỂ THAO NAM', 650000, 600000, 'assets/photos/1-1692171388220.jpg', '<h1 class=\"title-product\" style=\"margin-bottom: 15px; font-weight: 600; line-height: 26px; font-size: 24px; font-family: -apple-system, \" system-ui\",=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" padding-bottom:=\"\" 10px;=\"\" border-bottom:=\"\" 1px=\"\" solid=\"\" rgb(217,=\"\" 217,=\"\" 217);=\"\" color:=\"\" rgb(32,=\"\" 33,=\"\" 34);\"=\"\">Áo Tập Luyện Đội Tuyển Việt Nam 2023 Grand Sport \"Xanh Lá\" GS-038976-3 - Hàng Chính Hãng</h1><div class=\"row\" style=\"margin-right: -7.5px; margin-left: -7.5px; color: rgb(32, 33, 34); font-family: -apple-system, \" system-ui\",=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 14px;\"=\"\"><div class=\"product-detail-left product-images col-12 col-md-5 col-lg-5\" style=\"width: 357.812px; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 41.6667%; max-width: 41.6667%;\"><div class=\"product-image-block relative\" style=\"margin-bottom: 10px;\"><div class=\"swiper-container gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events\" style=\"margin-left: auto; margin-right: auto; position: relative; overflow: hidden; list-style: none; z-index: 1; margin-bottom: 10px;\"><div class=\"swiper-wrapper\" id=\"lightgallery\" style=\"box-sizing: content-box; position: relative; width: 342.812px; height: 342.812px; z-index: 1; display: flex; transition-property: transform; transform: translate3d(0px, 0px, 0px);\"><a class=\"swiper-slide swiper-slide-active\" data-hash=\"0\" href=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/485/982/products/1-1692171388220.png?v=1692171393273\" title=\"Click để xem\" style=\"color: rgb(32, 33, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; flex-shrink: 0; width: 343px; height: 0px; position: relative; transition-property: transform; padding-bottom: 342.812px; display: block;\"></a></div></div></div></div></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><br></p><p> </p>', '2021-10-22 14:03:21', '2024-11-19 17:01:45', 0),
(2, 1, 'Bộ quần áo tập luyện đội tuyển quốc gia Việt Nam 2024', 650000, 550000, 'assets/photos/1-1719379157335.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span> <span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><div class=\"rte\"><p style=\"margin-bottom: 0px;\"><span style=\"font-weight: bolder;\">Thông số kỹ thuật</span><br><br><em>- <span style=\"font-weight: bolder;\">Chất liệu</span>: MK23/MK22<br><br>- <span style=\"font-weight: bolder;\">Kiểu dáng</span>: Regular fit<br><br>- <span style=\"font-weight: bolder;\">Logo</span>: in silicon<br><br>- <span style=\"font-weight: bolder;\">Màu sắc</span>: Đen, Xanh lá<br><br>- <span style=\"font-weight: bolder;\">Kích thước</span>: S - 2XL</em></p></div></div>', '2021-10-22 09:53:21', '2024-11-19 17:32:49', 0),
(3, 1, 'Bộ Suvec đội tuyển Olympic VN24', 55000, 50000, 'assets/photos/5-1721362882956-5933160c-8c8d-46b6-8eea-41132c6ae639 (1).jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, \" system-ui\",=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";\"=\"\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, \" system-ui\",=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";\"=\"\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div></div><br>', '2021-10-22 09:14:29', '2024-11-20 03:04:45', 0),
(5, 3, 'Bộ thi đấu bóng chuyền Sao Vàng Combat \"Trắng\" SV-COMBAT-01 - Hàng Chính Hãng', 650000, 600000, 'assets/photos/1-1706525644612.jpg', '<h1 class=\"title-product\" style=\"margin-bottom: 15px; font-weight: 600; line-height: 26px; font-size: 24px; font-family: -apple-system, \" system-ui\",=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" padding-bottom:=\"\" 10px;=\"\" border-bottom:=\"\" 1px=\"\" solid=\"\" rgb(217,=\"\" 217,=\"\" 217);=\"\" color:=\"\" rgb(32,=\"\" 33,=\"\" 34);\"=\"\"><div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 400;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Sao Vàng</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 400;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div><div><em><br></em></div></div></h1>', '2021-10-22 14:03:21', '2024-11-19 17:42:51', 0),
(17, 1, 'Áo Khoác Đội Tuyển Việt Nam 2023 Grand Sport GS-022052 Đỏ - Hàng Chính Hãng', 50000, 3000, 'assets/photos/ao-khoac-1692169090225.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Grand Sport</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div></div>', '2024-11-19 17:38:57', '2024-11-19 17:38:57', 0),
(18, 2, 'Bộ quần áo tập luyện đội tuyển quốc gia Việt Nam 2024 \"Hồng\" MJ-AJ1285-02 - Hàng Chính Hãng', 20000, 3000, 'assets/photos/8-1704421591414.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div><div><em><br></em></div></div>', '2024-11-19 18:10:02', '2024-11-19 18:10:02', 0),
(19, 1, 'Bộ quần áo tập luyện đội tuyển quốc gia Việt Nam 2024 \"Xanh Lá\" MJ-0424.b01-01 - Hàng Chính Hãng', 20000, 2000, 'assets/photos/11-1719379202421.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><p style=\"margin-bottom: 0px;\"><span style=\"font-weight: bolder;\">Thông số kỹ thuật</span><br><br><em>-&nbsp;<span style=\"font-weight: bolder;\">Chất liệu</span>: MK23/MK22<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Kiểu dáng</span>: Regular fit<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Logo</span>: in silicon<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Màu sắc</span>: Đen, Xanh lá<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Kích thước</span>: S - 2XL</em></p></div></div>', '2024-11-19 18:23:04', '2024-11-19 18:23:04', 0),
(20, 3, 'Áo Phông Cầu Lông Nữ Động Lực Promax \"Đỏ - Trắng\" DL-AP664-01 - Hàng Chính Hãng', 9000, 3000, 'assets/photos/6-1714042306997.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div><div><em><br></em></div></div>', '2024-11-20 03:48:36', '2024-11-20 03:48:36', 0),
(21, 2, 'Áo thun Động Lực Jogarbola nam Classic Dri-fit \"Xanh cổ vịt\" MJ-0422.01-01 - Hàng Chính Hãng', 2000, 2000, 'assets/photos/mj-0422-01-01-01-1686820824952.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Đang cập nhật</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div><div><em><br></em></div></div>', '2024-11-20 03:46:39', '2024-11-20 03:46:39', 0),
(22, 2, 'Bộ quần áo tập luyện đội tuyển quốc gia Việt Nam 2024 \"Xanh Lá\" MJ-0424.b01-01 - Hàng Chính Hãng', 1500, 500, 'assets/photos/11-1719379202421.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><p style=\"margin-bottom: 0px;\"><span style=\"font-weight: bolder;\">Thông số kỹ thuật</span><br><br><em>-&nbsp;<span style=\"font-weight: bolder;\">Chất liệu</span>: MK23/MK22<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Kiểu dáng</span>: Regular fit<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Logo</span>: in silicon<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Màu sắc</span>: Đen, Xanh lá<br><br>-&nbsp;<span style=\"font-weight: bolder;\">Kích thước</span>: S - 2XL</em></p></div></div>', '2024-11-20 03:44:41', '2024-11-20 03:44:41', 0),
(23, 3, 'Bộ thi đấu bóng chuyền Sao Vàng Combat \"Tím Than\" SV-COMBAT-05 - Hàng Chính Hãng', 30000, 2000, 'assets/photos/22-1706526254083.jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Sao Vàng</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div></div>', '2024-11-20 03:22:44', '2024-11-20 03:22:44', 0),
(24, 3, 'Bộ quần áo thi đấu đội tuyển quốc gia Việt Nam 2024 \"Trắng\" MJ-AJ1277-02 - Hàng Chính Hãng', 500000, 200000, 'assets/photos/3-1704420839995 (1).jpg', '<div class=\"inventory_quantity\" style=\"font-size: 14px; margin-bottom: 5px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span class=\"mb-break\"><span class=\"stock-brand-title\">Thương hiệu:</span>&nbsp;<span class=\"a-vendor\" style=\"color: rgb(216, 31, 25);\">Động Lực</span></span></div><div class=\"product-summary\" style=\"margin-bottom: 10px; font-size: 14px; color: rgb(32, 33, 34); font-family: -apple-system, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"rte\"><em>Mô tả đang cập nhật</em></div></div>', '2024-11-20 03:23:47', '2024-11-20 03:23:47', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Tokens`
--

CREATE TABLE `Tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Tokens`
--

INSERT INTO `Tokens` (`user_id`, `token`, `created_at`) VALUES
(1, '7b887b1e751b6839105033c9f7bdf48c', '2024-11-19 17:03:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `User`
--

INSERT INTO `User` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'NGUYEN DUY SANG', 'nguyenduysang28032004@gmail.com', '123456789', 'Ha Noi, Việt Nam', '12345678', 1, '2024-11-09 10:39:39', '2024-11-19 17:30:30', 0),
(2, 'Trân Văn Hung', 'tranvanhung@gmail.com', '+84943552213', 'hà nội', '123456', 1, '2024-11-19 10:42:39', '2024-11-19 17:30:26', 0),
(3, 'Tô Tiến Hải', 'totienhai@gmail.com', '8153565814', '', '123456', 2, '2024-11-19 17:16:11', '2024-11-19 17:53:15', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Galery`
--
ALTER TABLE `Galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Tokens`
--
ALTER TABLE `Tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `Galery`
--
ALTER TABLE `Galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Galery`
--
ALTER TABLE `Galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

--
-- Các ràng buộc cho bảng `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Các ràng buộc cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`);

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

--
-- Các ràng buộc cho bảng `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
