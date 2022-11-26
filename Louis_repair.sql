-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2022 at 04:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Louis_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_inventory`
--

CREATE TABLE `tbl_add_inventory` (
  `add_id` int(10) NOT NULL,
  `add_code` varchar(255) NOT NULL,
  `add_name` varchar(255) NOT NULL,
  `add_serail` varchar(255) NOT NULL,
  `add_price` int(100) NOT NULL,
  `add_category` varchar(255) NOT NULL,
  `add_department` varchar(255) NOT NULL,
  `add_user` varchar(255) NOT NULL,
  `add_date_start` varchar(255) NOT NULL,
  `add_location_setup` varchar(255) NOT NULL,
  `add_status` varchar(255) NOT NULL,
  `add_detail` text NOT NULL,
  `add_productby` varchar(255) NOT NULL,
  `add_varanty` varchar(255) NOT NULL,
  `add_varanty_expire` varchar(255) NOT NULL,
  `add_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_add_inventory`
--

INSERT INTO `tbl_add_inventory` (`add_id`, `add_code`, `add_name`, `add_serail`, `add_price`, `add_category`, `add_department`, `add_user`, `add_date_start`, `add_location_setup`, `add_status`, `add_detail`, `add_productby`, `add_varanty`, `add_varanty_expire`, `add_picture`) VALUES
(5, 'B63NB018', 'Notebook Dell i5 8th Gen', 'DBXQKP2', 1900, '5', 'สาทร/แผนก ไอที', 'เอกชัย นามวิชา', '2022-11-26', 'ห้อง IT', 'ใช้งานปกติ', 'กแหกแ', 'dfsdf', 'sdfsdfsqwqwwd', '2022-11-25', 'img_inventory/INVT2022112468.png'),
(6, '12312312', 'server', 'SM7788sjs', 100000, '1', 'สาทร/แผนก ไอที', 'ประยุทธ', '2022-11-26', 'ห้อง IT', '', 'ทหาร', 'ssds', 'sdfsdfsqwqwwd', '2022-11-26', 'img_inventory/CMS20221116846.jpg'),
(7, 'YUU98877', 'dasd', 'UYY87826', 1900, '5', 'adwdq', 'ประยุทธ', '2022-11-10', 'Louis Tapes', 'ใช้งานปกติ', 'Louis atpa', 'dsdsd', 'ffsdfwe', '2022-11-19', 'img_inventory/INVT20221125481.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brance`
--

CREATE TABLE `tbl_brance` (
  `brn_id` int(10) NOT NULL,
  `brn_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brance`
--

INSERT INTO `tbl_brance` (`brn_id`, `brn_name`) VALUES
(1, 'สาทร'),
(2, 'ชลบุรี'),
(3, 'สมุทรปราการ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calculator`
--

CREATE TABLE `tbl_calculator` (
  `cal_id` int(10) NOT NULL,
  `cal_rp_vote` int(255) NOT NULL,
  `cal_q1` int(255) NOT NULL,
  `cal_q2` int(255) NOT NULL,
  `cal_q3` int(255) NOT NULL,
  `cal_q4` int(255) NOT NULL,
  `cal_q5` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`) VALUES
(1, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-PC'),
(2, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Server'),
(3, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Printer'),
(4, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Monitor'),
(5, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Printer DotMatrix'),
(6, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Printer Thermal'),
(7, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-UPS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(10) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_brance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`, `dept_brance`) VALUES
(1, 'บัญชี', 1),
(2, 'การเงิน', 1),
(3, 'จัดซื้อ', 1),
(4, 'การตลาด', 1),
(5, 'ประสานงานขาย', 1),
(6, 'ฝ่ายขาย', 1),
(7, 'ไอที', 1),
(8, 'ส่งออกต่างประเทศ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `exp_id` int(10) NOT NULL,
  `exp_maintenance` int(10) NOT NULL,
  `exp_detail_maintenance` varchar(255) NOT NULL,
  `exp_part` int(10) NOT NULL,
  `exp_detail_part` varchar(255) NOT NULL,
  `exp_invt` int(10) NOT NULL,
  `exp_detail_invt` varchar(255) NOT NULL,
  `exp_vat` int(10) NOT NULL,
  `exp_detail_vat` varchar(255) NOT NULL,
  `exp_repair` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`exp_id`, `exp_maintenance`, `exp_detail_maintenance`, `exp_part`, `exp_detail_part`, `exp_invt`, `exp_detail_invt`, `exp_vat`, `exp_detail_vat`, `exp_repair`) VALUES
(4, 190, 'ซ่อม', 500, 'อะไหล่', 89, 'กร', 50, 'vat7', 9),
(5, 123, 'ซ่อม', 123, 'อะไหล่', 123, 'อุปกรณ์', 123, 'Vat', 11),
(6, 190, 'เปลี่ยนเฟือง', 500, 'ปริ้นเตอร์ QQL', 89, 'อุปกรณ์', 123, 'ภาษีมูลค่าเพิ่ม', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pm_maintenanace`
--

CREATE TABLE `tbl_pm_maintenanace` (
  `pm_id` int(10) NOT NULL,
  `pm_name` varchar(255) NOT NULL,
  `pm_key` varchar(255) NOT NULL,
  `pm_type` varchar(255) NOT NULL,
  `pm_user` varchar(255) NOT NULL,
  `pm_date_start` varchar(255) NOT NULL,
  `pm_date_end` varchar(255) NOT NULL,
  `pm_frequency` varchar(255) NOT NULL,
  `pm_invt_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pm_maintenanace`
--

INSERT INTO `tbl_pm_maintenanace` (`pm_id`, `pm_name`, `pm_key`, `pm_type`, `pm_user`, `pm_date_start`, `pm_date_end`, `pm_frequency`, `pm_invt_name`) VALUES
(5, 'ทำความสะอาด 5 ส', 'PM2022112324', 'computer server', 'aekkachai namwicha', '2022-11-24T17:38', '2022-11-25T17:38', 'ทุกวัน', 'Youtube'),
(6, 'กวาด', 'PM2022112317', 'กวาด office', 'aekkachai namwicha', '2022-11-29T21:28', '2022-11-30T21:29', 'ทุกวัน', 'Macbook');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pst_id` int(10) NOT NULL,
  `pst_name` varchar(255) NOT NULL,
  `pst_department` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pst_id`, `pst_name`, `pst_department`) VALUES
(1, 'SA', 7),
(2, 'Project Manager', 7),
(3, 'IT Support', 7),
(4, 'Programmer', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE `tbl_repair` (
  `rp_id` int(10) NOT NULL,
  `rp_job` varchar(255) NOT NULL,
  `rp_date_repair` varchar(255) NOT NULL,
  `rp_name` varchar(255) NOT NULL,
  `rp_user_key` int(100) NOT NULL,
  `rp_position` varchar(255) NOT NULL,
  `rp_urgency` varchar(255) NOT NULL,
  `rp_type_repair` varchar(255) NOT NULL,
  `rp_name_inventory` varchar(255) NOT NULL,
  `rp_problem` varchar(255) NOT NULL,
  `rp_problem_success` varchar(255) NOT NULL,
  `rp_cause` varchar(255) NOT NULL,
  `rp_date_success` varchar(255) NOT NULL,
  `rp_date_next` varchar(255) NOT NULL,
  `rp_user_accept` varchar(255) NOT NULL,
  `rp_user_position` varchar(255) NOT NULL,
  `rp_status` varchar(11) NOT NULL,
  `rp_picture` varchar(255) NOT NULL,
  `rp_pic_success` varchar(255) NOT NULL,
  `rp_vote` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_repair`
--

INSERT INTO `tbl_repair` (`rp_id`, `rp_job`, `rp_date_repair`, `rp_name`, `rp_user_key`, `rp_position`, `rp_urgency`, `rp_type_repair`, `rp_name_inventory`, `rp_problem`, `rp_problem_success`, `rp_cause`, `rp_date_success`, `rp_date_next`, `rp_user_accept`, `rp_user_position`, `rp_status`, `rp_picture`, `rp_pic_success`, `rp_vote`) VALUES
(16, 'CMS20221125559', '2022-11-25 13:11:40', 'เอกชัย นามวิชา', 1, '3', '2', '11', '3', 'ปริ้นไม่ออก', 'ททท', 'กำลังดำเนินการกแหหก', '2022-11-17', '2022-11-29', 'เอกชัย นามวิชา', '', '4', 'img_inventory/CMS20221125559-.jpg', '', '2'),
(17, 'CMS20221125784', '2022-11-25 16:11:55', 'จิดาภา', 5, '1', '1', '13', '5', 'sdvSD', 'sdsd', 'กำลังดำเนินการsdfsd', '2022-11-26', '2022-11-21', 'เอกชัย นามวิชา', '', '4', 'img_inventory/CMS20221125784.jpg', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_list`
--

CREATE TABLE `tbl_schedule_list` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_datetime` varchar(255) NOT NULL,
  `end_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_schedule_list`
--

INSERT INTO `tbl_schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(2, 'Test', 'ทำความสะอาด', '2022-11-14T23:13', '2022-11-15T23:13'),
(3, 'หก', 'กกกก', '2022-11-14T23:23', '2022-11-15T23:23'),
(4, 'dvsdfs', 'fsdf', '2022-11-26T22:51', '2022-11-25T22:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `sts_id` int(11) NOT NULL,
  `sts_name` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`sts_id`, `sts_name`) VALUES
(1, 'แจ้งซ่อม'),
(2, 'รอดำเนินการ'),
(3, 'กำลังดำเนินการ'),
(4, 'สำเร็จ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_typework_repair`
--

CREATE TABLE `tbl_typework_repair` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_typework_repair`
--

INSERT INTO `tbl_typework_repair` (`type_id`, `type_name`) VALUES
(2, 'โปรแกรม(IT)'),
(3, 'อุปกรณ์(IT)'),
(4, 'ปัญหาระบบเครือข่าย(IT)'),
(5, 'อื่นๆ'),
(6, 'กล้องวงจรปิด(IT)'),
(7, 'งานติดตั้ง(IT)'),
(8, 'Onsite(IT)'),
(9, 'แก้ไขข้อมูล(IT)'),
(10, 'สแกนนิ้ว'),
(11, 'ซ่อมบำรุงเชิงป้องกัน(PM)'),
(12, 'งานซ่อม(IT)'),
(13, 'อบรม'),
(14, 'Install Software(IT)'),
(15, 'ซ่อมบำรุง'),
(16, 'Human Error');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_urgency`
--

CREATE TABLE `tbl_urgency` (
  `ug_id` int(10) NOT NULL,
  `ug_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_urgency`
--

INSERT INTO `tbl_urgency` (`ug_id`, `ug_name`) VALUES
(1, 'ปกติ'),
(2, 'ด่วน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_user` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_key` int(10) NOT NULL,
  `user_level` int(10) NOT NULL,
  `user_brance` int(10) NOT NULL,
  `user_dept` int(10) NOT NULL,
  `user_position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_user`, `user_pw`, `user_key`, `user_level`, `user_brance`, `user_dept`, `user_position`) VALUES
(1, 'เอกชัย นามวิชา', 'Aekkachaina', 'Aek20663', 1, 3, 1, 7, 3),
(3, 'ประยุทธ จันทร์โอชา', 'prayut', '1234', 1, 1, 1, 7, 2),
(5, 'จิดาภา', 'ji', 'ji', 1, 2, 1, 7, 1),
(6, 'Test Systems', 'it01', 'it01', 1, 2, 1, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`level_id`, `level_name`) VALUES
(1, 'User'),
(2, 'Administrator'),
(3, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_vote`
--

CREATE TABLE `tbl_user_vote` (
  `uv_id` int(10) NOT NULL,
  `uv_key` varchar(255) NOT NULL,
  `uv_name` varchar(255) NOT NULL,
  `uv_date` varchar(255) NOT NULL,
  `uv_text` text NOT NULL,
  `uv_vote` int(10) NOT NULL,
  `uv_offer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_vote`
--

INSERT INTO `tbl_user_vote` (`uv_id`, `uv_key`, `uv_name`, `uv_date`, `uv_text`, `uv_vote`, `uv_offer`) VALUES
(50, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'ความสะดวกในการติดต่อขอใช้บริการอยู่ในระดับใด', 5, 'เยี่ยมมาก'),
(51, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'ความเร็วในการใช้บริการเป็นอย่างไร', 4, 'เยี่ยมมาก'),
(52, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'การให้คำแนะนำ, แจ้งอาการของเครื่อง และอธิบายถึงการแก้ปัญหา ก่อนการให้บริการเป็นอย่างไร', 4, 'เยี่ยมมาก'),
(53, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'พนักงานไอทีได้ตรวจ/ซ่อมครบถ้วนตามรายการที่แจ้งซ่อมอยู่ในระดับใด', 3, 'เยี่ยมมาก'),
(54, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'การให้บริการด้วยความสุภาพ เป็นมิตร ', 3, 'เยี่ยมมาก'),
(55, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'ความตั้งใจและกระตือรือร้นในการให้บริการ', 2, 'เยี่ยมมาก'),
(56, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'การให้คำแนะนำและตอบข้อซักถามได้ชัดเจน', 2, 'เยี่ยมมาก'),
(57, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'ความสะดวก รวดเร็วในการให้บริการ', 1, 'เยี่ยมมาก'),
(58, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'ระยะเวลาในการให้บริการมีความเหมาะสม', 1, 'เยี่ยมมาก'),
(59, 'CMS20221125559', 'เอกชัย นามวิชา', '2022-11-25 13:11:28', 'การให้บริการมีความเป็นระบบ มีการแจ้งสาเหตุของปัญหา ความคืบหน้าของการให้บริการ', 2, 'เยี่ยมมาก'),
(60, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'ความสะดวกในการติดต่อขอใช้บริการอยู่ในระดับใด', 5, ''),
(61, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'ความเร็วในการใช้บริการเป็นอย่างไร', 5, ''),
(62, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'การให้คำแนะนำ, แจ้งอาการของเครื่อง และอธิบายถึงการแก้ปัญหา ก่อนการให้บริการเป็นอย่างไร', 5, ''),
(63, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'พนักงานไอทีได้ตรวจ/ซ่อมครบถ้วนตามรายการที่แจ้งซ่อมอยู่ในระดับใด', 5, ''),
(64, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'การให้บริการด้วยความสุภาพ เป็นมิตร ', 5, ''),
(65, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'ความตั้งใจและกระตือรือร้นในการให้บริการ', 5, ''),
(66, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'การให้คำแนะนำและตอบข้อซักถามได้ชัดเจน', 5, ''),
(67, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'ความสะดวก รวดเร็วในการให้บริการ', 5, ''),
(68, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'ระยะเวลาในการให้บริการมีความเหมาะสม', 5, ''),
(69, 'CMS20221125784', 'จิดาภา', '2022-11-25 16:11:00', 'การให้บริการมีความเป็นระบบ มีการแจ้งสาเหตุของปัญหา ความคืบหน้าของการให้บริการ', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote`
--

CREATE TABLE `tbl_vote` (
  `vote_id` int(11) NOT NULL,
  `vote_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vote`
--

INSERT INTO `tbl_vote` (`vote_id`, `vote_name`) VALUES
(1, 'รอประเมินความพึงพอใจ'),
(2, 'ประเมินแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote_txt`
--

CREATE TABLE `tbl_vote_txt` (
  `vt_id` int(10) NOT NULL,
  `vt_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vote_txt`
--

INSERT INTO `tbl_vote_txt` (`vt_id`, `vt_txt`) VALUES
(1, 'ความสะดวกในการติดต่อขอใช้บริการอยู่ในระดับใด'),
(2, 'ความเร็วในการใช้บริการเป็นอย่างไร'),
(3, 'การให้คำแนะนำ, แจ้งอาการของเครื่อง และอธิบายถึงการแก้ปัญหา ก่อนการให้บริการเป็นอย่างไร'),
(4, 'พนักงานไอทีได้ตรวจ/ซ่อมครบถ้วนตามรายการที่แจ้งซ่อมอยู่ในระดับใด'),
(5, 'การให้บริการด้วยความสุภาพ เป็นมิตร '),
(6, 'ความตั้งใจและกระตือรือร้นในการให้บริการ'),
(7, 'การให้คำแนะนำและตอบข้อซักถามได้ชัดเจน'),
(8, 'ความสะดวก รวดเร็วในการให้บริการ'),
(9, 'ระยะเวลาในการให้บริการมีความเหมาะสม'),
(10, 'การให้บริการมีความเป็นระบบ มีการแจ้งสาเหตุของปัญหา ความคืบหน้าของการให้บริการ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_add_inventory`
--
ALTER TABLE `tbl_add_inventory`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `tbl_brance`
--
ALTER TABLE `tbl_brance`
  ADD PRIMARY KEY (`brn_id`);

--
-- Indexes for table `tbl_calculator`
--
ALTER TABLE `tbl_calculator`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `tbl_pm_maintenanace`
--
ALTER TABLE `tbl_pm_maintenanace`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pst_id`);

--
-- Indexes for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `tbl_schedule_list`
--
ALTER TABLE `tbl_schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `tbl_typework_repair`
--
ALTER TABLE `tbl_typework_repair`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_urgency`
--
ALTER TABLE `tbl_urgency`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tbl_user_vote`
--
ALTER TABLE `tbl_user_vote`
  ADD PRIMARY KEY (`uv_id`);

--
-- Indexes for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- Indexes for table `tbl_vote_txt`
--
ALTER TABLE `tbl_vote_txt`
  ADD PRIMARY KEY (`vt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_add_inventory`
--
ALTER TABLE `tbl_add_inventory`
  MODIFY `add_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_brance`
--
ALTER TABLE `tbl_brance`
  MODIFY `brn_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_calculator`
--
ALTER TABLE `tbl_calculator`
  MODIFY `cal_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `exp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pm_maintenanace`
--
ALTER TABLE `tbl_pm_maintenanace`
  MODIFY `pm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  MODIFY `rp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_schedule_list`
--
ALTER TABLE `tbl_schedule_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_typework_repair`
--
ALTER TABLE `tbl_typework_repair`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_urgency`
--
ALTER TABLE `tbl_urgency`
  MODIFY `ug_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_vote`
--
ALTER TABLE `tbl_user_vote`
  MODIFY `uv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vote_txt`
--
ALTER TABLE `tbl_vote_txt`
  MODIFY `vt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
