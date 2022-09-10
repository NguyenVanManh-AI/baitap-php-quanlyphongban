-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 10, 2022 lúc 01:05 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dulieu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `created_at`, `updated_at`) VALUES
('vanmanh', '$2y$10$4C/sd0/A4l.z.M6f.1E.y.cJHnR2DZ5HEZjlgReMKGwzbeJWWtz2O', '2022-09-09 18:50:44', '2022-09-09 18:50:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNV` varchar(100) NOT NULL,
  `Hoten` varchar(500) NOT NULL,
  `IDPB` varchar(100) NOT NULL,
  `Diachi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IDNV`, `Hoten`, `IDPB`, `Diachi`, `created_at`, `updated_at`) VALUES
('NV01', 'Nguyễn Văn Mạnh', 'PB01', 'Phú Vang Huế', '2022-09-10 10:48:37', '2022-09-10 17:48:37'),
('NV02', 'Trần Thanh Nguyên', 'PB03', 'Cẩm Lệ Đà Nẵng', '2022-09-10 10:49:14', '2022-09-10 17:49:14'),
('NV03', 'Trương Ngọc Hương Giang', 'PB07', 'Huế Việt Nam', '2022-09-10 10:53:56', '2022-09-10 17:53:56'),
('NV04', 'Trần Văn Vũ', 'PB02', 'Hồ Chí Minh - Việt Nam', '2022-09-10 10:54:59', '2022-09-10 17:54:59'),
('NV05', 'Nguyễn Thị Nhật Linh', 'PB05', 'Huế ', '2022-09-10 10:54:23', '2022-09-10 17:54:23'),
('NV07', 'Joma Tech', 'PB01', 'New York - USA ', '2022-09-10 10:55:54', '2022-09-10 17:55:54'),
('NV08', 'Nguyễn Văn Mạnh', 'PB01', 'Huế', '2022-09-10 08:49:17', '2022-09-10 15:49:17'),
('NV09', 'Trần Thị Thùy Dương', 'PB02', 'Huế', '2022-09-10 09:02:40', '2022-09-10 16:02:40'),
('NV10', 'Nguyễn Thị Mỹ An', 'PB03', 'Phú Đa Phú Vang TT Huế', '2022-09-10 09:03:38', '2022-09-10 16:03:38'),
('NV11', 'Nguyễn Công Cường', 'PB02', 'Tam Kỳ', '2022-09-10 09:04:22', '2022-09-10 16:04:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `IDPB` varchar(100) NOT NULL,
  `Tenpb` varchar(500) NOT NULL,
  `Mota` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`IDPB`, `Tenpb`, `Mota`, `created_at`, `updated_at`) VALUES
('PB01', 'ascascasc', 'ascsacsa', '2022-09-09 14:45:36', '2022-09-10 15:46:08'),
('PB02', 'Phòng ban số 22222', 'BBB ', '2022-09-09 14:46:07', '2022-09-10 04:12:41'),
('PB03', 'Phòng ban số 33333', 'CCC ccccc', '2022-09-09 14:46:40', '2022-09-10 04:18:16'),
('PB04', 'Phong ban so 4', 'DDD', '2022-09-09 19:04:22', '2022-09-10 02:04:22'),
('PB05', 'Phong ban so 5ascsacasc', 'AAAascascascsa', '2022-09-09 19:04:32', '2022-09-10 03:19:21'),
('PB06', 'Phong ban so 6', 'BBB', '2022-09-09 19:04:42', '2022-09-10 02:04:42'),
('PB07', 'Phong ban so 7ascascascasc', 'CCCascascascascascasc', '2022-09-09 19:04:54', '2022-09-10 03:19:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNV`),
  ADD KEY `IDPB` (`IDPB`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`IDPB`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDPB`) REFERENCES `phongban` (`IDPB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
