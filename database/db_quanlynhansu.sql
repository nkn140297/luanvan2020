-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 06:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quanlynhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bangluong`
--

CREATE TABLE `tbl_bangluong` (
  `id_bangluong` int(11) NOT NULL,
  `tong_tien_luong` double NOT NULL,
  `luong_thang` date NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `id_hopdong` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baohiem`
--

CREATE TABLE `tbl_baohiem` (
  `id_baohiem` int(11) NOT NULL,
  `so_bhyt` varchar(50) NOT NULL,
  `ngay_cap_bhyt` date NOT NULL,
  `noi_cap_bhyt` varchar(255) NOT NULL,
  `so_bhxh` varchar(50) NOT NULL,
  `ngay_cap_bhxh` date NOT NULL,
  `noi_cap_bhxh` varchar(255) NOT NULL,
  `id_nhanvien` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_baohiem`
--

INSERT INTO `tbl_baohiem` (`id_baohiem`, `so_bhyt`, `ngay_cap_bhyt`, `noi_cap_bhyt`, `so_bhxh`, `ngay_cap_bhxh`, `noi_cap_bhxh`, `id_nhanvien`) VALUES
(1, 'HS1234567891011', '2019-10-25', 'Hồ Chí Minh', '1234567891', '2019-10-25', 'Hồ Chí Minh', 'NSNV001'),
(2, 'HS123156498878', '2019-10-25', 'Hồ Chí Minh', '1458796520', '2019-10-25', 'Hà Nội', 'NSTP002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chamcong`
--

CREATE TABLE `tbl_chamcong` (
  `id_chamcong` int(11) NOT NULL,
  `ngay_cham_cong` date NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `id_tangca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chamcong`
--

INSERT INTO `tbl_chamcong` (`id_chamcong`, `ngay_cham_cong`, `check_in`, `check_out`, `id_nhanvien`, `id_tangca`) VALUES
(2, '2020-06-01', '09:00:00', '18:00:00', 'NSNV001', 1),
(6, '2020-06-02', '08:22:28', '17:22:28', 'NSNV001', NULL),
(8, '2020-06-02', '08:24:01', '18:24:01', 'NSTP002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `id_chucvu` varchar(10) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `id_phongban` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`id_chucvu`, `ten_chuc_vu`, `id_phongban`) VALUES
('GD', 'Giám đốc', 'GD'),
('NSNV', 'Nhân viên', 'NS'),
('NSTP', 'Trưởng phòng', 'NS'),
('PGD', 'Phó giám đốc', 'PDG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congtac`
--

CREATE TABLE `tbl_congtac` (
  `id_congtac` int(11) NOT NULL,
  `nguoi_duyet` varchar(50) NOT NULL,
  `nguoi_cong_tac` varchar(50) NOT NULL,
  `thoi_gian` varchar(10) NOT NULL,
  `ngay_cong_tac` date NOT NULL,
  `ngay_ve` date NOT NULL,
  `dia_diem` varchar(255) NOT NULL,
  `muc_dich` varchar(255) NOT NULL,
  `tien_phu_cap` double NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congviec`
--

CREATE TABLE `tbl_congviec` (
  `id_congviec` int(11) NOT NULL,
  `ten_cong_viec` varchar(255) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giadinh`
--

CREATE TABLE `tbl_giadinh` (
  `id_giadinh` int(11) NOT NULL,
  `ten_nguoi_than` varchar(255) NOT NULL,
  `cong_viec` varchar(255) NOT NULL,
  `sdt_di_dong` varchar(15) NOT NULL,
  `moi_quan_he` varchar(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_giadinh`
--

INSERT INTO `tbl_giadinh` (`id_giadinh`, `ten_nguoi_than`, `cong_viec`, `sdt_di_dong`, `moi_quan_he`, `dia_chi`, `email`, `id_nhanvien`) VALUES
(1, 'Bùi Anh Tuấn', 'Ca sĩ', '0123456789', 'Anh trai', 'số 1 cao lỗ Q.8', 'b.a.tuan@gmail.com', 'NSNV001'),
(2, 'Nguyễn Thanh Liêm', 'Nhạc sĩ', '', 'em trai', 'BB15 trường sơn quận 10', 'nt.liem@gmail.com', 'NSTP002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hopdong`
--

CREATE TABLE `tbl_hopdong` (
  `id_hopdong` varchar(20) NOT NULL,
  `ten_hop_dong` varchar(50) NOT NULL DEFAULT 'HỢP ĐỒNG LAO ĐỘNG',
  `ngay_lap_hop_dong` date NOT NULL,
  `ngay_nghi_phep` int(11) NOT NULL DEFAULT 13,
  `luong_co_ban` double NOT NULL,
  `phu_cap` double NOT NULL,
  `ngay_hieu_luc` date NOT NULL,
  `ngay_het_han` date NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `nguoi_quan_ly` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hopdong`
--

INSERT INTO `tbl_hopdong` (`id_hopdong`, `ten_hop_dong`, `ngay_lap_hop_dong`, `ngay_nghi_phep`, `luong_co_ban`, `phu_cap`, `ngay_hieu_luc`, `ngay_het_han`, `id_nhanvien`, `nguoi_quan_ly`) VALUES
('HD001', 'HỢP ĐỒNG LAO ĐỘNG', '2019-06-26', 13, 5000000, 500000, '2019-06-26', '2020-06-26', 'NSNV001', 'Nguyễn Thanh Nhã'),
('HD002', 'HỢP ĐỒNG LAO ĐỘNG', '2019-06-27', 13, 13000000, 500000, '2019-06-27', '2020-06-27', 'NSTP002', 'Giám Đốc Nhân Sự');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hosonhanvien`
--

CREATE TABLE `tbl_hosonhanvien` (
  `id_nhanvien` varchar(20) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_sinh` date NOT NULL,
  `so_cmnd` varchar(12) NOT NULL,
  `ngay_cap_cmnd` date NOT NULL,
  `noi_cap_cmnd` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(20) NOT NULL,
  `id_vitri` int(11) NOT NULL,
  `thoi_gian_lam_viec` int(11) NOT NULL DEFAULT 0,
  `id_chucvu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hosonhanvien`
--

INSERT INTO `tbl_hosonhanvien` (`id_nhanvien`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `so_cmnd`, `ngay_cap_cmnd`, `noi_cap_cmnd`, `anh_dai_dien`, `id_vitri`, `thoi_gian_lam_viec`, `id_chucvu`) VALUES
('NSNV001', 'Bùi Đặng Phương Thanh', 0, '1998-06-20', '51603022', '2013-05-09', 'Hồ Chí Minh', '', 1, 0, 'NSNV'),
('NSTP002', 'Nguyễn Thanh Nhã', 0, '1998-11-20', '56478956', '2013-11-20', 'Dak Lak', '', 2, 0, 'NSTP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khenthuong`
--

CREATE TABLE `tbl_khenthuong` (
  `id_khenthuong` int(11) NOT NULL,
  `ngay_khen_thuong` date NOT NULL,
  `nguoi_quyet_dinh` varchar(50) NOT NULL,
  `nguoi_duoc_khen` varchar(50) NOT NULL,
  `ly_do_khen_thuong` varchar(255) NOT NULL,
  `gia_tri` double NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_khenthuong`
--

INSERT INTO `tbl_khenthuong` (`id_khenthuong`, `ngay_khen_thuong`, `nguoi_quyet_dinh`, `nguoi_duoc_khen`, `ly_do_khen_thuong`, `gia_tri`, `trang_thai`, `id_nhanvien`) VALUES
(1, '2020-06-02', 'Giám Đốc', 'Nguyễn Thanh Nhã', 'Khách hàng hài lòng về sản phẩm do Nhã làm', 1000000, 0, 'NSTP002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kyluat`
--

CREATE TABLE `tbl_kyluat` (
  `id_kyluan` int(11) NOT NULL,
  `ngay_ky_luat` date NOT NULL,
  `nguoi_quyet_dinh` varchar(50) NOT NULL,
  `nguoi_bi_ky_luat` varchar(50) NOT NULL,
  `ly_do_ky_luat` varchar(255) NOT NULL,
  `gia_tri` double NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `sdt_ca_nhan` varchar(15) NOT NULL,
  `sdt_nha` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_cong_ty` varchar(255) NOT NULL,
  `dia_chi_thuong_tru` varchar(255) NOT NULL,
  `dia_chi_tam_tru` varchar(255) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_luuykien`
--

CREATE TABLE `tbl_luuykien` (
  `id_luuykien` int(11) NOT NULL,
  `ly_do` varchar(255) NOT NULL,
  `nguoi_duyet` varchar(50) NOT NULL,
  `nguoi_dua_y_kien` varchar(50) NOT NULL,
  `ngay_y_kien` date NOT NULL,
  `ngay_duyet` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `id_ykien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mientrugiacanh`
--

CREATE TABLE `tbl_mientrugiacanh` (
  `id_mientrugiacanh` int(11) NOT NULL,
  `so_luong_mien_tru` int(11) NOT NULL,
  `so_tien_duoc_mien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mientrugiacanh`
--

INSERT INTO `tbl_mientrugiacanh` (`id_mientrugiacanh`, `so_luong_mien_tru`, `so_tien_duoc_mien`) VALUES
(1, 1, 3600000),
(2, 2, 7200000),
(3, 3, 10800000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nghiphep`
--

CREATE TABLE `tbl_nghiphep` (
  `id_nghiphep` int(11) NOT NULL,
  `nguoi_duyet` varchar(100) NOT NULL,
  `so_ngay_nghi` int(11) NOT NULL,
  `tu_ngay` date NOT NULL,
  `den_ngay` date NOT NULL,
  `ly_do_nghi` varchar(250) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nghiviec`
--

CREATE TABLE `tbl_nghiviec` (
  `id_nghiviec` int(11) NOT NULL,
  `ly_do` varchar(250) NOT NULL,
  `ngay_nghi` date NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phongban`
--

CREATE TABLE `tbl_phongban` (
  `id_phongban` varchar(10) NOT NULL,
  `ten_phong_ban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phongban`
--

INSERT INTO `tbl_phongban` (`id_phongban`, `ten_phong_ban`) VALUES
('GD', 'Giám đốc'),
('KD', 'Kinh doanh'),
('KT', 'Kỹ thuật'),
('NS', 'Nhân Sự'),
('PDG', 'Phó giám đốc'),
('TCHC', 'Tổ chức hành chính'),
('TCKT', 'Tài chính kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phuluc`
--

CREATE TABLE `tbl_phuluc` (
  `id_phuluc` varchar(10) NOT NULL,
  `ngay_hieu_luc` date NOT NULL,
  `nd_thay_doi` varchar(255) NOT NULL,
  `ly_do_thay_doi` varchar(255) NOT NULL,
  `thay_doi_luong` double NOT NULL,
  `id_hopdong` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phuluc`
--

INSERT INTO `tbl_phuluc` (`id_phuluc`, `ngay_hieu_luc`, `nd_thay_doi`, `ly_do_thay_doi`, `thay_doi_luong`, `id_hopdong`) VALUES
('PLHD001', '2019-07-10', 'Tăng Lương', 'Nhân viên hoàn thành dự án hiệu quả.', 9000000, 'HD001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tangca`
--

CREATE TABLE `tbl_tangca` (
  `id_tangca` int(11) NOT NULL,
  `thoi_gian_tang_ca` int(11) NOT NULL,
  `ly_do_tang_ca` varchar(255) NOT NULL,
  `ngay_tang_ca` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tangca`
--

INSERT INTO `tbl_tangca` (`id_tangca`, `thoi_gian_tang_ca`, `ly_do_tang_ca`, `ngay_tang_ca`) VALUES
(1, 1, 'Chạy Deadline', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thuecanhan`
--

CREATE TABLE `tbl_thuecanhan` (
  `id_thuecanhan` int(11) NOT NULL,
  `thue_bhxh` double NOT NULL,
  `thue_bhyt` double NOT NULL,
  `thue_bhtn` double NOT NULL,
  `thue_thu_nhap` double NOT NULL,
  `tong_tien_thue` double NOT NULL,
  `id_mientrugiacanh` int(11) NOT NULL,
  `id_bangluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trinhdo`
--

CREATE TABLE `tbl_trinhdo` (
  `id_trinhdo` int(11) NOT NULL,
  `muc_trinh_do` varchar(50) NOT NULL,
  `nganh_dao_tao` varchar(50) NOT NULL,
  `noi_dao_tao` varchar(50) NOT NULL,
  `chuyen_nganh` varchar(50) NOT NULL,
  `nam_tot_nghiep` year(4) NOT NULL,
  `xep_loai` varchar(50) NOT NULL,
  `chung_chi` varchar(50) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_trinhdo`
--

INSERT INTO `tbl_trinhdo` (`id_trinhdo`, `muc_trinh_do`, `nganh_dao_tao`, `noi_dao_tao`, `chuyen_nganh`, `nam_tot_nghiep`, `xep_loai`, `chung_chi`, `id_nhanvien`) VALUES
(1, 'Đại Học', 'Công Nghệ Thông Tin', 'UIT', 'Công Nghệ Phần Mềm', 2019, 'Giỏi', 'IELTS', 'NSNV001'),
(2, 'Đại Học', 'Quản Trị Kinh Doanh', 'HSU', 'Quản Trị Nhân Lực', 2016, 'Khá', 'TOEIC', 'NSTP002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user_name`, `password`, `id_nhanvien`) VALUES
(1, 'admin', '1234', 'NSNV001'),
(2, 'admin2', '1234', 'NSTP002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vitri`
--

CREATE TABLE `tbl_vitri` (
  `id_vitri` int(11) NOT NULL,
  `ten_vi_tri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vitri`
--

INSERT INTO `tbl_vitri` (`id_vitri`, `ten_vi_tri`) VALUES
(1, 'Thử Việc'),
(2, 'Chính Thức'),
(3, 'Nghỉ Việc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ykien`
--

CREATE TABLE `tbl_ykien` (
  `id_ykien` int(11) NOT NULL,
  `loai_y_kien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ykien`
--

INSERT INTO `tbl_ykien` (`id_ykien`, `loai_y_kien`) VALUES
(1, 'Đề Xuất Tăng Lương'),
(2, 'Đề Xuất Nghỉ Phép'),
(3, 'Đề Xuất Kỷ Luật'),
(4, 'Đề Xuất Tăng Ca'),
(5, 'Đề Xuất Công Tác'),
(6, 'Đề Xuất Nghỉ Việc'),
(7, 'Đề Xuất Khen Thưởng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD PRIMARY KEY (`id_bangluong`),
  ADD KEY `id_chamcong` (`id_nhanvien`),
  ADD KEY `id_hopdong` (`id_hopdong`);

--
-- Indexes for table `tbl_baohiem`
--
ALTER TABLE `tbl_baohiem`
  ADD PRIMARY KEY (`id_baohiem`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD PRIMARY KEY (`id_chamcong`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_tangca` (`id_tangca`);

--
-- Indexes for table `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`id_chucvu`),
  ADD KEY `id_phongban` (`id_phongban`);

--
-- Indexes for table `tbl_congtac`
--
ALTER TABLE `tbl_congtac`
  ADD PRIMARY KEY (`id_congtac`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_congviec`
--
ALTER TABLE `tbl_congviec`
  ADD PRIMARY KEY (`id_congviec`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  ADD PRIMARY KEY (`id_giadinh`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD PRIMARY KEY (`id_hopdong`),
  ADD KEY `tbl_hopdong_ibfk_2` (`id_nhanvien`);

--
-- Indexes for table `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_vitri` (`id_vitri`);

--
-- Indexes for table `tbl_khenthuong`
--
ALTER TABLE `tbl_khenthuong`
  ADD PRIMARY KEY (`id_khenthuong`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_kyluat`
--
ALTER TABLE `tbl_kyluat`
  ADD PRIMARY KEY (`id_kyluan`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD PRIMARY KEY (`id_luuykien`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_ykien` (`id_ykien`);

--
-- Indexes for table `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  ADD PRIMARY KEY (`id_mientrugiacanh`);

--
-- Indexes for table `tbl_nghiphep`
--
ALTER TABLE `tbl_nghiphep`
  ADD PRIMARY KEY (`id_nghiphep`),
  ADD KEY `tbl_nghiphep_ibfk_1` (`id_nhanvien`);

--
-- Indexes for table `tbl_nghiviec`
--
ALTER TABLE `tbl_nghiviec`
  ADD PRIMARY KEY (`id_nghiviec`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_phongban`
--
ALTER TABLE `tbl_phongban`
  ADD PRIMARY KEY (`id_phongban`);

--
-- Indexes for table `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD PRIMARY KEY (`id_phuluc`),
  ADD KEY `so_hop_dong` (`id_hopdong`);

--
-- Indexes for table `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  ADD PRIMARY KEY (`id_tangca`);

--
-- Indexes for table `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  ADD PRIMARY KEY (`id_thuecanhan`),
  ADD KEY `id_mientru` (`id_mientrugiacanh`),
  ADD KEY `id_bangluong` (`id_bangluong`);

--
-- Indexes for table `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD PRIMARY KEY (`id_trinhdo`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `tbl_vitri`
--
ALTER TABLE `tbl_vitri`
  ADD PRIMARY KEY (`id_vitri`);

--
-- Indexes for table `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  ADD PRIMARY KEY (`id_ykien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  MODIFY `id_bangluong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_baohiem`
--
ALTER TABLE `tbl_baohiem`
  MODIFY `id_baohiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  MODIFY `id_chamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_congtac`
--
ALTER TABLE `tbl_congtac`
  MODIFY `id_congtac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_congviec`
--
ALTER TABLE `tbl_congviec`
  MODIFY `id_congviec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  MODIFY `id_giadinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_khenthuong`
--
ALTER TABLE `tbl_khenthuong`
  MODIFY `id_khenthuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kyluat`
--
ALTER TABLE `tbl_kyluat`
  MODIFY `id_kyluan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  MODIFY `id_luuykien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  MODIFY `id_mientrugiacanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nghiphep`
--
ALTER TABLE `tbl_nghiphep`
  MODIFY `id_nghiphep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nghiviec`
--
ALTER TABLE `tbl_nghiviec`
  MODIFY `id_nghiviec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  MODIFY `id_tangca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  MODIFY `id_thuecanhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  MODIFY `id_trinhdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vitri`
--
ALTER TABLE `tbl_vitri`
  MODIFY `id_vitri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  MODIFY `id_ykien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD CONSTRAINT `tbl_bangluong_ibfk_6` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`),
  ADD CONSTRAINT `tbl_bangluong_ibfk_7` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`);

--
-- Constraints for table `tbl_baohiem`
--
ALTER TABLE `tbl_baohiem`
  ADD CONSTRAINT `tbl_baohiem_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD CONSTRAINT `tbl_chamcong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chamcong_ibfk_2` FOREIGN KEY (`id_tangca`) REFERENCES `tbl_tangca` (`id_tangca`);

--
-- Constraints for table `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD CONSTRAINT `tbl_chucvu_ibfk_1` FOREIGN KEY (`id_phongban`) REFERENCES `tbl_phongban` (`id_phongban`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_congtac`
--
ALTER TABLE `tbl_congtac`
  ADD CONSTRAINT `tbl_congtac_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_congviec`
--
ALTER TABLE `tbl_congviec`
  ADD CONSTRAINT `tbl_congviec_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  ADD CONSTRAINT `tbl_giadinh_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD CONSTRAINT `tbl_hopdong_ibfk_2` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD CONSTRAINT `tbl_hosonhanvien_ibfk_2` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hosonhanvien_ibfk_3` FOREIGN KEY (`id_vitri`) REFERENCES `tbl_vitri` (`id_vitri`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_khenthuong`
--
ALTER TABLE `tbl_khenthuong`
  ADD CONSTRAINT `tbl_khenthuong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_kyluat`
--
ALTER TABLE `tbl_kyluat`
  ADD CONSTRAINT `tbl_kyluat_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD CONSTRAINT `tbl_lienhe_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD CONSTRAINT `tbl_luuykien_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_luuykien_ibfk_2` FOREIGN KEY (`id_ykien`) REFERENCES `tbl_ykien` (`id_ykien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_nghiphep`
--
ALTER TABLE `tbl_nghiphep`
  ADD CONSTRAINT `tbl_nghiphep_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_nghiviec`
--
ALTER TABLE `tbl_nghiviec`
  ADD CONSTRAINT `tbl_nghiviec_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`);

--
-- Constraints for table `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD CONSTRAINT `tbl_phuluc_ibfk_1` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  ADD CONSTRAINT `tbl_thuecanhan_ibfk_1` FOREIGN KEY (`id_mientrugiacanh`) REFERENCES `tbl_mientrugiacanh` (`id_mientrugiacanh`),
  ADD CONSTRAINT `tbl_thuecanhan_ibfk_2` FOREIGN KEY (`id_bangluong`) REFERENCES `tbl_bangluong` (`id_bangluong`);

--
-- Constraints for table `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD CONSTRAINT `tbl_trinhdo_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
