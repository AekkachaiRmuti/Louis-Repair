-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2022 at 10:39 AM
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
(12, 'B63NB018', 'Notebook Dell i5 8th Gen', 'DBXQKP2', 1900, '2', 'สาทร/แผนก ไอที', 'ประยุทธ', '2022-12-15', 'ห้อง IT', 'ใช้งานปกติ', 'ssss', 'Dell', 'sdfsdfsqwqwwd', '2022-12-15', 'img_inventory/INVT20221213506i.png');

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
(7, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-UPS'),
(10, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Laptop'),
(11, 'อุปกรณ์อิเล็กทรอนิกส์(EL)-Projector');

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
-- Table structure for table `tbl_equipment_borrow`
--

CREATE TABLE `tbl_equipment_borrow` (
  `ebr_id` int(10) NOT NULL,
  `ebr_name` varchar(255) NOT NULL,
  `ebr_date` varchar(255) NOT NULL,
  `ebr_position` varchar(255) NOT NULL,
  `ebr_dept` varchar(255) NOT NULL,
  `ebr_branch` varchar(255) NOT NULL,
  `ebr_tel` varchar(255) NOT NULL,
  `ebr_qty` int(10) NOT NULL,
  `ebr_desscript` varchar(255) NOT NULL,
  `ebr_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment_borrow`
--

INSERT INTO `tbl_equipment_borrow` (`ebr_id`, `ebr_name`, `ebr_date`, `ebr_position`, `ebr_dept`, `ebr_branch`, `ebr_tel`, `ebr_qty`, `ebr_desscript`, `ebr_key`) VALUES
(7, 'รุ้งพร ชัยพัฒนาสกุล', '2020-09-30', '-', 'การเงิน', 'สาทร', '094-9693716', 1, '-', '20221103518'),
(8, 'ณัฐพร ศิริคำแจ้', '2020-09-21', 'พนักงานขาย', 'ขาย', '-', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '2022110327'),
(9, 'รักสุภาชุดา จำเนียรกุล', '2020-07-01', 'พนักงานขาย', 'ขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '202211037'),
(10, 'เฉลิมพล สุขพิชญาการต์', '2020-07-01', 'พนักงานขาย', 'ขายในประเทศ', 'สาทร', '089-0745459', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103341'),
(11, 'ภาคภูมิ นาครัตน์', '2020-05-04', 'ผจก ฝ่ายบุคคล', 'บุคคล', 'สาทร', '081-4323325', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103122'),
(13, 'จุฑามาศ จารึกศิลป์', '2020-04-20', 'พนักงานขาย', 'ขาย', 'สาทร', '086-7579799', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103192'),
(14, 'วราภรณ์ ดีเสมอ', '2020-04-20', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103322'),
(15, 'อภิรักษ์ บำรุงตา', '2022-06-01', 'พนักงานขายต่างจังหวัด', 'ขาย', 'สาทร', '097-3349857', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103203'),
(16, 'สุรเชษฐ์ เชาวนสุนทรพงษ์', '2020-04-15', 'พนักงานขาย', 'ขายในประเทศ', 'สาทร', '081-8064302', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103942'),
(17, 'อนุชสรา  เวียงแก้ว', '2019-01-01', 'ฝ่ายขาย', 'ขายในประเทศ', 'สำนักงานใหญ่', '081-4223501', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103633'),
(18, 'Mr. Bradley John Clegg', '2019-01-01', 'เจ้าหน้าที่ฝ่ายขาย', 'Export', 'Headquarter', '061-6306029', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103990'),
(19, 'ศิริพร โสภิลา', '2020-07-01', 'พนักงานขาย', 'ขายในประเทศ', 'สำนักงานใหญ่', '083-2649749', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103892'),
(20, 'สุพล ศรีไหม', '2020-04-16', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103889'),
(21, 'เบญจพร ภูติพาณิชย์', '2020-04-24', 'หน. ฝ่ายขายต่างประเทศ', 'ขายต่างประเทศ', 'สาทร', '081-4317731', 1, 'เพื่อใช้ทำงานที่บ้านเป็นการชั่วคราว', '20221103327'),
(22, 'ณัฐธยา จันทร์จิระศานต์', '2020-03-27', 'พนักงานต่างประเทศ', 'ต่างประเทศ', 'สาทร', '085-1178683', 1, 'ใช้ทำงานจากที่บ้านเป็นการชั่วคราว', '20221103168'),
(23, 'ลักษณวดี รุ่งเรืองอุไร', '2020-04-17', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103421'),
(24, 'จุฑามาศ บุญชู', '2020-04-15', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103238'),
(25, 'วิชัย ประดิษฐ์กนก', '2020-04-15', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '2022110318'),
(26, 'วันชัย รุ่งเรืองอุไร', '2020-04-17', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103492'),
(27, 'โสภา นิมิตนนท์', '2020-04-17', 'ขาย', 'ขาย', 'สาทร', '081-8470877', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103507'),
(28, 'ลัดดา', '2020-04-15', 'ฝ่ายขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103849'),
(29, 'สุธิดา ศิริไพบูลย์', '2020-04-14', 'พนักงานขาย', 'ขาย', 'สาทร', '081-4644442', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103597'),
(30, 'ถวัลย์ ตรงจิตรักษ์', '2020-04-14', 'ฝ่ายขาย', 'ฝ่ายขาย', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103177'),
(31, 'พงษ์พิพัฒน์ รัตนไชย', '2021-03-15', 'พนักงานขาย', 'ขาย', 'สาทร', '086-3271139', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103953'),
(32, 'ธีระยุทธ โอฬารทิชาชาติ', '2019-04-23', 'IT support (Outsource)', 'IT', 'สาทร', '099-6241737', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103547'),
(33, 'ภูมิเพิ่มพล หนูจีนจัตร', '2021-03-15', 'sale เทปพิมพ์', 'ขาย', 'สาทร', '081-9309087', 1, 'ใช้งานนอกสถานที่', '20221103471'),
(34, 'เบญจพร ภูติพาณิชย์', '2021-04-16', 'ส่งออก', 'ส่งออก', 'สาทร', '-', 1, 'ใช้ทำงานจากที่บ้าน', '20221103399'),
(35, 'สุธาพร ซื่อสัตย์', '2021-07-16', 'ประสานงานขาย', 'ขายในประเทศ', 'สาทร', '091-8838029', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103474'),
(36, 'ปัญฑิตา วงศ์ศรีเจริญกุล', '2021-07-16', 'ประสานงานขาย', 'ประสานงานขาย', 'สาทร', '084-3176258', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103790'),
(37, 'เบญจวรรณ วุฒิปรีชา', '2021-07-19', 'พนักงานบัญชี', 'บัญชี', 'สาทร', '092-6731545', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103569'),
(38, 'รุ้งพร', '2021-07-16', 'การเงิน', 'การเงิน', 'สาทร', '094-9693716', 1, '-', '20221103111'),
(39, 'อารญา โคตะมูล', '2021-07-16', 'ประสานงานขาย', 'ขายในประเทศ', 'สาทร', '086-3876607', 1, '-', '2022110340'),
(40, 'สุริศา ชัยกุม', '2021-07-16', 'ประสานงานขาย', 'ประสานงานขาย', 'สาทร', '090-9720553', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103317'),
(41, 'อรวรรณ ดีนิทักษ์วงศ์', '2021-07-16', 'เจ้าหน้าที่การเงิน', 'การเงิน', 'สาทร', '-', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103765'),
(42, 'วรรณวิภา ทับทอง', '2021-07-16', 'ประสานงานขาย', 'ขายในประเทศ', 'สาทร', '098-2596068', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103191'),
(43, 'กมลวรรณ เชยกัน', '2021-07-16', 'ประสานงานขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '065-1194282', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103409'),
(44, 'สุกันธา เครท', '2021-07-12', 'หัวหน้าประสานงานขาย', 'ฝ่ายขายในประเทศ', 'สาทร', '089-2219886', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103501'),
(45, 'พุทธมาศ รุ่งสมัย', '2021-07-16', 'รองหัวหน้าประสานงานขาย', 'ประสานงานขาย', 'สาทร', '095-7278567', 1, 'ใช้ทำงานที่บ้าน', '20221103449'),
(46, 'แพรวพรรณ เอื้อโชคทวีวัฒน์', '2021-07-16', 'ประสานงานขาย', 'ประสานงานขาย', 'สาทร', '096-8793013', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '2022110346'),
(47, 'จารุวรรณ รุ่งกระจ่าง', '2021-07-16', 'ประสานงานขาย', 'ขายในประเทศ', 'สาทร', '083-3007819', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103528'),
(48, 'บัญชิยา บางใบ', '2021-07-16', 'ประสานงานขาย', 'ประสานงานขาย', 'สาทร', '095-5806164', 1, 'ใช้ทำงานที่บ้าน', '20221103111'),
(49, 'ชนิษฐา ญาติพรม', '', 'จัดซื้อ', 'จัดซื้อ', 'สาทร', '084-3201188', 1, '', '20221103600'),
(50, 'ไพลิน ทรงบุญรอด', '2021-07-23', 'พนักงานบัญชี', 'บัญชี', 'สาทร', '-', 1, '', '20221103894'),
(51, 'สุดา เหมือนขาว', '2021-07-23', 'พนักงานบัญชี', 'บัญชี', 'สาทร', '-', 1, '', '20221103716'),
(52, 'จิรกฤต นภภูวดล', '2021-07-16', 'เจ้าหน้าที่', 'ประสานงานขาย', 'สาทร', '062-9128888', 1, '', '20221103250'),
(53, 'ธัญยธรณ์ ศิริพลธำรงฤทธิ์', '2021-07-23', 'รองหัวหน้า', 'จัดซื้อ', 'สาทร', '062-6202502', 1, '', '20221103432'),
(54, 'รัชนี หิริโอ', '2021-07-24', 'พนักงาน', 'บุคคล', 'สาทร', '084-1099545', 1, '', '20221103876'),
(55, 'บัวศรี ลาภพรประเสริฐ', '2021-08-23', 'จัดซื้อ', 'จัดซื้อ', 'สาทร', '-', 1, 'เพื่อนำกลับไปทำงานที่บ้าน', '20221103148'),
(56, 'เจนจิรา ปริงออม', '2021-10-04', 'ส่งออก', 'ส่งออกต่างประเทศ', 'สาทร', '084-2322290', 1, '', '20221103861'),
(57, 'มนต์ชัย แพร่ศิริพุฒิพงศ์', '2022-01-04', '', 'ขาย', 'สาทร', '085-6611400', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103412'),
(58, 'ผกาทิพย์ พิชัยพิษณุวัฒน์', '2021-12-15', 'พนักงานบัญชี', 'บัญชี', 'สาทร', '099-5966236', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103465'),
(59, 'อัญญดา สว่างจิตร', '2022-05-03', 'บัญชี', 'บัญชี', 'สาทร', '092-3615947', 1, '', '20221103326'),
(60, 'ชาลิสา ยินดี', '2022-07-21', 'พนักงานบัญชี', 'บัญชี', 'สาทร', '062-6012221', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103450'),
(61, 'จิดาภา พานิชกุล', '2022-07-18', 'SA BA', 'IT', 'สาทร', '087-2723273', 1, 'คอมพิวเตอร์ประจำตำแหน่ง', '20221103881'),
(62, 'พิพัฒน์ พัฒน์ขันตกุล', '2022-06-01', 'Project Manager', 'IT', 'สาทร', '092-5276622', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '202211043'),
(63, 'เนตรทราย สวัสดีแจ้ง', '2022-06-01', 'ขาย ตจว', 'ขาย', '', '084-4494450', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104939'),
(64, 'ชลิตา ท้วมทอง', '2022-06-01', 'sale', 'ขาย', '', '083-9514979', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104555'),
(65, 'จุฑามาศ เกษนา', '2022-09-01', 'Senior Marketing Exec.', 'การตลาด', 'สาทร', '', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104973'),
(66, 'พัชราภรณ์ กรนานก', '2022-09-01', 'จัดซื้อ', 'จัดซื้อ', 'สาทร', '061-9674816', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104300'),
(67, 'เอกชัย นามวิชา', '2022-09-01', 'IT Support', 'IT', 'สาทร', '086-3032461', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '2022110450'),
(68, 'ธนิกานต์ วิเศษสุวรรณภูมิ', '2022-10-03', 'ประสานการขาย-วางแบบ', 'ขายในประเทศ', 'สาทร', '083-6582266', 1, '', '20221104815'),
(69, 'มนพัทธ์ รัตนพิบูลวงษ์', '2022-10-01', 'ประสานการขายส่งออกต่างประเทศ', 'ส่งออกต่างประเทศ', 'สาทร', '086-9221933', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104934'),
(70, 'โสภณ เรียมสี', '2022-11-01', 'ประสานงานขาย', 'ขาย', 'สาทร', '084-6593526', 1, 'คอมพิวเตอร์ใช้งานประจำตำแหน่ง', '20221104911');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_detail`
--

CREATE TABLE `tbl_equipment_detail` (
  `edetail_id` int(10) NOT NULL,
  `edetail_borrow` varchar(255) NOT NULL,
  `edetail_no` varchar(255) NOT NULL,
  `edetail_pc` varchar(255) NOT NULL,
  `edetail_brand` varchar(255) NOT NULL,
  `edetail_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment_detail`
--

INSERT INTO `tbl_equipment_detail` (`edetail_id`, `edetail_borrow`, `edetail_no`, `edetail_pc`, `edetail_brand`, `edetail_price`) VALUES
(4, '20221103518', 'HFP9FG8U', '5CD9478Q8U', 'HP ep0000AU', '13,675'),
(5, '2022110327', 'BKKNB200406013', '5CD978QKW', 'HP Laptop ', '13,675'),
(6, '202211037', 'BKKNB200406015', '5CD0012MS7', 'HP 15s-eqoooAU', '13,675'),
(7, '20221103341', 'BKKNB200406014', '5CD0012MXP', 'HP 15s-eqoooAU', '13,675'),
(8, '20221103122', 'BKKNB181D30001', 'PF1DRNWW', 'Lenovo Thinkpad E480', '30,590'),
(9, '20221103949', '', '', '', ''),
(10, '20221103192', 'BKKNB200406012', '5CD0012MX9', 'HP 15s-eqoooAU', '13,675'),
(11, '20221103322', 'BKKNB20040011', '5CD95143BS', 'HP 15s-eqoooAU', '13,675'),
(12, '20221103203', 'B65NB059', 'MP23890Q', 'Lenovo Thinkpad', '13,161'),
(13, '20221103942', 'BKKBN200406001', '5CD943931G', 'HP Pavillion', '21,190'),
(14, '20221103633', 'BKKNB181224001', 'PF15DF23', 'Lenovo Thinkpad', '30,590'),
(15, '20221103990', 'BKKNB181224002', 'PF15DJBS', 'Lenovo Thinkpad', '30,590'),
(16, '20221103892', 'BKKNB200406016', '5CD0012N34', 'HP 15s-eqoooAU', '13,675'),
(17, '20221103889', 'BKKNB200406002', 'SCD0012MTM', 'HP 15s-eqoooAU', '13,675'),
(18, '20221103327', 'BKKNB200406013', '5CD9478QKW', 'HP 15s-eqooooAU', '13,675'),
(19, '20221103168', 'BKKNB120401001', '5W9H2M1', 'Dell Studio 17/1747', '20,000'),
(20, '20221103421', 'BKKNB200406009', '5CD0012MT5', 'HP 15s-eqoooAU', '13,675'),
(21, '20221103238', 'BKKNB200406006', '5CD0012MS6', 'HP 15s-eqoooAU', '13,675'),
(22, '2022110318', 'BKKNB200406005', '5CD0012MX3', 'HP 15s-eqoooAU', '13,675'),
(23, '20221103492', 'BKKNB200406010', '5CD0012N6H', 'HP 15s-eqoooAU', '13,675'),
(24, '20221103507', 'BKKNB200406008', '5CD0012MTO', 'HP 15s-eqoooAU', '13,675'),
(25, '20221103849', 'BBKNB200406007', '5CD0012MZ6', 'HP 15s-eqoooAU', '13,675'),
(26, '20221103597', 'BKKNB200406004', '5CD0012NWS', 'HP 15s-eqoooAU', '13,675'),
(27, '20221103177', 'BKKNB200406003', '5CD0012OW', 'HP 15s-eqoooAU', '13,675'),
(28, '20221103953', 'BKKNB201001004', 'LRODERJR', 'Lenovo Thinkbook', '20,000'),
(29, '20221103547', 'BKKNB180725001', 'DBXQKP2', 'DELL Latitude 3490', '30,130'),
(30, '20221103471', 'BKKNB201001002', 'LRODERLA', 'Lenovo Thinkbook', '20,000'),
(31, '20221103399', 'BKKNB201001005', 'LROPERMA', 'Lenovo Thinkbook', '20,000'),
(32, '20221103474', 'B64NBO35', 'PF-2Z54B4', 'Lenovo Thinkbook E14', '17,990'),
(33, '20221103790', 'B64NB36', 'PF-2Z4H9W', 'Lenovo Thinkbook E14', '17,990'),
(34, '20221103569', 'B64NB042', '5CD9478QKW', 'HP 15s-eqoooAU', '17,990'),
(35, '20221103111', 'B64NBO39', 'PF-2Z5PH8', 'Lenovo Thinkbook E14', '17,690'),
(36, '2022110340', 'B63NB017', 'PF-2Z6QA9', 'Lenovo Thinkbook E14', '17,990'),
(37, '20221103317', 'B63NB027', 'CND1216914', 'HP 15s-gr0504AU', '18,665'),
(38, '20221103765', 'B64NB040', 'PF-2Z6ssW', 'Lenovo Thinkbook E14 gen2', '19,690'),
(39, '20221103191', 'B64NB031', 'PF-2Z54D1', 'Lenovo Thinkbook E14', '17,990'),
(40, '20221103409', 'B64NB032', 'PF-2Z4QSC', 'Lenovo Thinkbook E14', '17,990'),
(41, '20221103501', 'B64NB030', 'PF-2Z4WEF', 'Lenovo Thinkbook E14 gen2', '17,990'),
(42, '20221103449', 'B64NB037', 'PF-2XCGW', 'Lenovo Thinkbook E14', '17,990'),
(43, '2022110346', 'B64BN028', 'CND12168N3', 'HP 15s-gr0504AU', '13,675'),
(44, '20221103528', 'B64NB033', 'PF-2Z508Z', 'Lenovo Thinkpad', '17,990'),
(45, '20221103111', 'B64NB034', 'PF-2Z40PM', 'Lenovo Thinkbook E14', '17,990'),
(46, '20221103600', 'B64NB049', 'NXEG8ST0021241C01B3400', 'Acer Ex216', '16,039'),
(47, '20221103894', 'B64NB046', 'NXEG8ST00212418E973400', 'Acer Ex216', '16,039'),
(48, '20221103716', '064NB044', 'NXEG8ST0021241A8FR3400', 'Acer -52-39 FM', '16,039'),
(49, '20221103250', 'B64NB029', 'PF2YRZ9H', 'Lenovo Thinkbook E14', '17,990'),
(50, '20221103432', 'B64NB047', 'NXEG8ST00212141C02D3400', 'Acer Ex 216', '16,039'),
(51, '20221103876', 'B64NB043', 'PF-2Z3Q28', 'Lenovo Thinkpad', '19,690'),
(52, '20221103148', 'B64NB050', 'MSNXCV20V58121F', 'Asus ExpertBook L1400 CD', '15,265'),
(53, '20221103861', 'B64NB051', 'S4L1XF3', 'Dell Inspiron 3501', '18,190'),
(54, '20221103412', 'B64NB053', 'LroDERMV', 'Lenovo Thinkbook k14', ''),
(55, '20221103465', 'B64NB052', 'M5NXCV20V536217', 'Asus Expertbook ', '15,265'),
(56, '20221103326', 'B64NB041', 'PF-2XD4W9', 'Lenovo Thinkbook E14', '19,690'),
(57, '20221103450', 'B64NB045', 'NXFG8ST0021241BOA13400', 'Acer Ex216-52', '16,039'),
(58, '20221103881', 'B65NB057', 'MP23890Qq', 'Lenovo Thinkbook E14', ''),
(59, '202211043', 'ฺ์B65NB055', 'PF33Ras', 'Lenovo', '19,690'),
(60, '20221104939', 'B65NB058', 'MP237RHG', 'Lenovo Thinkpad e14', '13,161'),
(61, '20221104555', 'B65NB059', 'MP2388ZP', 'Lenovo Thinkpad e14', '13,161'),
(62, '20221104973', 'N64NB053', 'MP22T845', 'Lenovo Thinkbook', ''),
(63, '20221104300', 'B64NB048', 'NXE08ST00212418', 'Acer', ''),
(64, '2022110450', 'B63BN018', 'DBXQKP2', 'Dell', ''),
(65, '20221104815', '', 'MP25JJaY', 'Lenovo', ''),
(66, '20221104934', '', 'PF38P1N9', 'Lenovo', ''),
(67, '20221104911', 'B64NB036', 'PF-224H9W', 'Lenovo Thinkpad', '');

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
(6, 190, 'เปลี่ยนเฟือง', 500, 'ปริ้นเตอร์ QQL', 89, 'อุปกรณ์', 123, 'ภาษีมูลค่าเพิ่ม', 16),
(7, 789, 'ซ่อม', 14252, 'ิะไหล่', 27772, 'อุปกร', 1111, 'อหะ7', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_it_problem`
--

CREATE TABLE `tbl_it_problem` (
  `itp_id` int(10) NOT NULL,
  `itp_date` varchar(255) DEFAULT NULL,
  `itp_dept` varchar(255) DEFAULT NULL,
  `itp_dept_id` varchar(10) DEFAULT NULL,
  `itp_name` varchar(255) DEFAULT NULL,
  `itp_detail` varchar(255) DEFAULT NULL,
  `itp_ip` varchar(255) DEFAULT NULL,
  `itp_anydesk` varchar(255) DEFAULT NULL,
  `itp_status` varchar(100) DEFAULT NULL,
  `itp_problem` varchar(255) DEFAULT NULL,
  `itp_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `tbl_report_ups`
--

CREATE TABLE `tbl_report_ups` (
  `ups_id` int(10) NOT NULL,
  `ups_key` varchar(255) NOT NULL,
  `ups_location` varchar(255) NOT NULL,
  `ups_dept` varchar(255) NOT NULL,
  `ups_user` varchar(255) NOT NULL,
  `ups_m1` varchar(11) NOT NULL,
  `ups_m2` varchar(11) NOT NULL,
  `ups_m3` varchar(11) NOT NULL,
  `ups_m4` varchar(11) NOT NULL,
  `ups_m5` varchar(11) NOT NULL,
  `ups_m6` varchar(11) NOT NULL,
  `ups_m7` varchar(11) NOT NULL,
  `ups_m8` varchar(11) NOT NULL,
  `ups_m9` varchar(11) NOT NULL,
  `ups_m10` varchar(11) NOT NULL,
  `ups_m11` varchar(11) NOT NULL,
  `ups_m12` varchar(11) NOT NULL,
  `ups_years` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report_ups`
--

INSERT INTO `tbl_report_ups` (`ups_id`, `ups_key`, `ups_location`, `ups_dept`, `ups_user`, `ups_m1`, `ups_m2`, `ups_m3`, `ups_m4`, `ups_m5`, `ups_m6`, `ups_m7`, `ups_m8`, `ups_m9`, `ups_m10`, `ups_m11`, `ups_m12`, `ups_years`) VALUES
(3, 'B63PS001', 'ชั้น1', 'การเงิน', 'เฉลิมพร', 'O', 'O', 'O  O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(4, 'B63PS002', 'ชั้น1', 'การเงิน', 'สะแกวัลย์', 'บ', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(5, 'B63PS003', 'ชั้น1', 'การเงิน', 'อรวรรณ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(6, 'B63PS004', 'ชั้น1', 'การเงิน', 'รุ่งพร', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(7, 'B63PS005', 'ชั้น1', 'ประสานงานขาย', 'จิรกฤต', 'บ', 'O', 'บ', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(8, 'B63PS006', 'ชั้น1', 'ประสานงานขาย', 'พุทธมาศ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(9, 'B63PS007', 'ชั้น1', 'ประสานงานขาย', 'สุริศา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(10, 'B63PS009', 'ชั้น1', 'ประสานงานขาย', 'ปัญธิตา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(11, 'B63PS010', 'ชั้น1', 'ประสานงานขาย', 'วรรณวิภา', 'O', 'O', 'O', 'O', 'O', 'บ', '', '', '', '', '', '', '2022'),
(12, 'B63PS011', 'ชั้น1', 'ประสานงานขาย', 'กมลวรรณ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(13, 'B63PS012', 'ชั้น1', 'ประสานงานขาย', 'สุดาพร', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(14, 'B63PS013', 'ชั้น1', 'ประสานงานขาย', 'ยุ้ย', 'O', 'O', 'บ', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(15, 'B63PS014', 'ชั้น1', 'ประสานงานขาย', 'อรายา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(16, 'B63PS015', 'ชั้น1', 'ประสานงานขาย', 'สุกันธา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(17, '', 'ชั้น1', 'ประสานงานขาย', 'จารุวรรณ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(18, 'B63PS016', 'ชั้น1', 'ผอ.ประสานงานขาย', 'ทีปกร', 'ย', 'ย', 'ย', 'ย', 'ย', 'ย', '', '', '', '', '', '', '2022'),
(19, 'B63PS017', 'ชั้น2', 'ผอ.ส่งออกต่างประเทศ', 'รุ่งเรือง', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(20, 'B63PS018', 'ชั้น2', 'ส่งออกต่างประเทศ', 'ณัฐยาน์', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(21, 'B63PS019', 'ชั้น2', 'ส่งออกต่างประเทศ', 'เบญจพร', 'O', 'บ', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(22, 'B63PS020', 'ชั้น2', 'ส่งออกต่างประเทศ', 'อัจฉรา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(23, 'B63PS021', 'ชั้น2', 'ผอ.จัดซื้อ', 'รณชัย', 'O', 'O', 'O', 'O', 'บ', 'O', '', '', '', '', '', '', '2022'),
(24, 'B63PS022', 'ชั้น2', 'จัดซื้อ', 'บัวศรี', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(25, 'B63PS023', 'ชั้น2', 'จัดซื้อ', 'ธัญยธรณ์', 'บ', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(26, 'B63PS024', 'ชั้น2', 'จัดซื้อ', 'จุฑามาศ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(27, 'B63PS025', 'ชั้น2', 'จัดซื้อ', 'ชนิษฐา', 'O', 'บ', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(28, 'B63PS026', 'ชั้น4', 'บัญชี', 'สุชาดา', 'O', 'O', 'O', 'O', 'บ', 'O', '', '', '', '', '', '', '2022'),
(29, 'B63PS027', 'ชั้น4', 'บัญชี', 'ไพริน', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(30, 'B63PS028', 'ชั้น4', 'บัญชี', 'อัญญดา', 'O', 'O', 'บ', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(31, 'B63PS029', 'ชั้น4', 'บัญชี', 'ชาลิสา', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(32, 'B63PS030', 'ชั้น4', 'บัญชี', 'เบจวรรณ', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(33, 'B63PS031', 'ชั้น4', 'ออกแบบ', 'นันท์นัภส', 'O', 'O', 'บ', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(34, 'B63PS032', 'ชั้น3', 'ออกแบบ', 'ณัฐวดี', 'O', 'บ', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(35, 'B63PS033', 'ชั้น3', 'ฝ่ายบุคคล', 'รัตน์ชนี', 'O', 'O', 'O', 'O', 'O', 'O', '', '', '', '', '', '', '2022'),
(36, 'B63PS034', 'ชั้น5', 'IT', 'IT', 'ย', 'ย', 'ย', 'ย', 'ย', 'ย', '', '', '', '', '', '', '2022'),
(37, 'B63PS035', 'ชั้น5', 'IT', 'IT', 'ย', 'ย', 'ย', 'ย', 'ย', 'ย', '', '', '', '', '', '', '2022'),
(38, '', 'ชั้น1', 'สำรอง ตู้ CCTV', 'IT', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', '2022');

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
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stk_id` int(10) NOT NULL,
  `stk_type` varchar(255) NOT NULL,
  `stk_list` varchar(255) NOT NULL,
  `stk_date` date NOT NULL,
  `stk_qty` int(10) NOT NULL,
  `stk_receive` int(10) NOT NULL,
  `stk_withdraw` int(10) NOT NULL,
  `stk_balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stk_id`, `stk_type`, `stk_list`, `stk_date`, `stk_qty`, `stk_receive`, `stk_withdraw`, `stk_balance`) VALUES
(13, 'Tonner', 'Tonner CF279A', '2022-09-24', 2, 0, 0, 2),
(14, 'Tonner', 'Tonner CE505A/CF280A', '2022-09-24', 7, 0, 1, 6),
(15, 'Tonner', 'Tonner MLT-R116/M2825', '2022-09-24', 2, 0, 0, 2),
(16, 'Tonner', 'Tonner CB435A/CB436A/CE285A/CE278A', '2022-09-24', 2, 0, 0, 2),
(17, 'Laser Tonner', 'Laser Tonner CE285A', '2022-09-24', 2, 0, 0, 2),
(18, 'Tonner', 'Tonner CF279A', '2022-09-24', 1, 0, 0, 1),
(19, 'Tonner', 'Tonner CE285A', '2022-09-24', 1, 0, 0, 1),
(20, 'Tonner', 'Tonner 280A', '2022-09-24', 2, 0, 0, 2),
(21, 'Tonner', 'Tonner CE505A/CF280A เก่า', '2022-09-24', 1, 0, 0, 1),
(22, 'Tonner', 'Tonner CF226A/CRG052', '2022-09-24', 5, 0, 5, 5),
(23, 'Tonner', 'Tonner MLT-D116L M2625', '2022-09-27', 12, 0, 1, 12),
(24, 'Tonner', 'CB435/CB436/CE285A/CE278A', '2022-09-27', 3, 0, 0, 3),
(25, 'Toner Samsung K30000', 'Tonner Samsung MLT-DT704s Black Toner', '2022-10-22', 0, 0, 0, 0),
(26, 'Refill RIBBON EPSON LQ_590', 'Refill RIBBON EPSON LQ_590', '2022-10-22', 16, 0, 0, 16),
(27, 'Epson LQ-2170,2180', 'Refill Ribbon EPSON LQ-2170,2180', '2022-10-22', 39, 0, 0, 39),
(28, 'Epson LQ-2090', 'Refill Ribbon Epson Lq-2090', '2022-10-22', 14, 0, 0, 14),
(30, 'ตลับหมึก Epson LQ-2090 แท้', 'ตลับหมึก Epson LQ-2090 แท้', '2022-10-22', 0, 0, 0, 0),
(31, 'ตลับหมึกแท้ Epson LQ-2170, 2180 แท้', 'ตลับหมึกแท้ Epson LQ-2170, 2180 แท้', '2022-10-22', 0, 0, 0, 0),
(32, 'Epson L310, L385', 'BK664', '2022-10-22', 1, 0, 0, 1),
(33, 'Epson L310, L385', 'C664', '2022-10-22', 1, 0, 0, 1),
(34, 'Epson L310, L385', 'Y664', '2022-10-22', 1, 0, 0, 1),
(35, 'Epson L310, L385', 'M664', '2022-10-22', 2, 0, 0, 2),
(36, 'Brother Ori, HL-T4000DW, 910', 'BTD60BK', '2022-10-22', 5, 0, 0, 5),
(37, 'Brother Ori, HL-T4000DW, 910', 'BT5000Y', '2022-10-22', 4, 0, 0, 4),
(38, 'Brother Ori, HL-T4000DW, 910', 'BT5000M', '2022-10-22', 4, 0, 0, 4),
(39, 'Brother Ori, HL-T4000DW, 910', 'BT5000C', '2022-10-22', 3, 0, 2, 2),
(40, 'Epson L6170', 'Epson L6170 BK001', '2022-10-22', 2, 0, 0, 2),
(41, 'Epson L6170', 'Epson L6170 C001', '2022-10-22', 3, 0, 0, 3),
(42, 'Epson L6170', 'Epson L6170 Y001', '2022-10-22', 5, 0, 0, 5),
(43, 'Epson L6170', 'Epson L6170 M001', '2022-10-22', 4, 0, 0, 4),
(44, 'Canon Pixma g2010', 'BT6000BK', '2022-10-22', 0, 0, 0, 0),
(45, 'Canon Pixma g2010', 'C790', '2022-10-22', 0, 0, 0, 0),
(46, 'Canon Pixma g2010', 'M790', '2022-10-22', 0, 0, 0, 0),
(47, 'Canon Pixma g2010', 'Y790', '2022-10-22', 0, 0, 0, 0),
(48, 'Epson ซับหมึก L6170', 'Epson ซับหมึก L6170', '2022-10-22', 2, 0, 1, 2),
(49, 'Ribbon Cartridge ', 'Ribbon Cartridge LQ-590 590H', '2022-10-22', 3, 0, 0, 3),
(50, 'ปลั๊กไฟ 3 ม. ', 'ปลั๊กไฟ 3 ม. Anitech', '2022-10-31', 5, 0, 3, 2),
(51, 'Headphone REACH', 'โทรศัพท์สำนักงาน', '2022-10-31', 2, 0, 2, 2),
(52, 'Toner Cartridge TN1000', 'Brother HL-1110', '2022-11-03', 0, 0, 1, 0),
(54, 'Test', 'Test', '2022-11-04', 1, 0, 0, 1);

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
(6, 'Test Systems', 'it01', 'it01', 1, 2, 1, 7, 3),
(7, 'Administrator', 'Administrator', '1234', 1, 2, 1, 7, 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraw_stk`
--

CREATE TABLE `tbl_withdraw_stk` (
  `wtd_id` int(10) NOT NULL,
  `wtd_stk` int(10) NOT NULL,
  `wtd_type` varchar(255) NOT NULL,
  `wtd_list` varchar(255) NOT NULL,
  `wtd_user` varchar(255) NOT NULL,
  `wtd_date` varchar(255) NOT NULL,
  `wtd_balance` int(10) NOT NULL,
  `wtd_withdraw` int(10) NOT NULL,
  `wtd_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_withdraw_stk`
--

INSERT INTO `tbl_withdraw_stk` (`wtd_id`, `wtd_stk`, `wtd_type`, `wtd_list`, `wtd_user`, `wtd_date`, `wtd_balance`, `wtd_withdraw`, `wtd_detail`) VALUES
(10, 22, 'Tonner', 'Tonner CF226A/CRG052', 'Aekkachai', '2022-09-27 03:32:42pm', 8, 1, 'ประสานงานขาย'),
(11, 22, 'Tonner', 'Tonner CF226A/CRG052', 'Aekkachai', '2022-09-27 03:41:11pm', 5, 4, 'It'),
(12, 23, 'Tonner', 'Tonner MLT-D116L M2625', 'Test', '2022-10-22 10:41:26am', 12, 1, 'ส่งออก'),
(13, 48, 'Epson ซับหมึก L6170', 'Epson ซับหมึก L6170', 'Aekkachai', '2022-10-22 01:21:48pm', 2, 1, 'ฝ่ายส่งออก'),
(14, 39, 'Brother Ori, HL-T4000DW, 910', 'BT5000C', 'Aekkachai', '2022-10-31 09:21:26am', 3, 1, 'การตลาด'),
(15, 51, 'Headphone REACH', 'โทรศัพท์สำนักงาน', 'Aekkachai', '2022-10-31 01:41:53pm', 3, 1, 'ผจก. HR (คุณอาร์ต)'),
(16, 51, 'Headphone REACH', 'โทรศัพท์สำนักงาน', 'Aekkachai', '2022-10-31 02:22:38pm', 2, 1, 'IT Support (Aek)'),
(18, 52, 'Toner Cartridge TN1000', 'Brother HL-1110', 'Aekkachai', '2022-11-03 09:36:19am', 0, 1, 'พี่จอย บัญชี'),
(19, 50, 'ปลั๊กไฟ 3 ม. ', 'ปลั๊กไฟ 3 ม. Anitech', 'Aekkachai', '2022-11-04 11:14:54am', 3, 1, 'คุณโสภา ฝ่ายขาย'),
(20, 50, 'ปลั๊กไฟ 3 ม. ', 'ปลั๊กไฟ 3 ม. Anitech', 'Aekkachai', '2022-11-04 11:15:34am', 2, 1, 'คุณพงษ์พิพัฒน์ ฝ่ายขาย'),
(24, 50, 'ปลั๊กไฟ 3 ม. ', 'ปลั๊กไฟ 3 ม. Anitech', 'Aekkachai', '2022-11-04 03:13:20pm', 2, 1, 'จิดาภา'),
(26, 39, 'Brother Ori, HL-T4000DW, 910', 'BT5000C', 'Aekkachai', '2022-11-10 09:29:42am', 2, 1, 'การตลาด'),
(27, 14, 'Tonner', 'Tonner CE505A/CF280A', 'Aekkachai', '2022-12-01 05:37:02pm', 6, 1, 'แผนกการเงิน');

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
-- Indexes for table `tbl_equipment_borrow`
--
ALTER TABLE `tbl_equipment_borrow`
  ADD PRIMARY KEY (`ebr_id`);

--
-- Indexes for table `tbl_equipment_detail`
--
ALTER TABLE `tbl_equipment_detail`
  ADD PRIMARY KEY (`edetail_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `tbl_it_problem`
--
ALTER TABLE `tbl_it_problem`
  ADD PRIMARY KEY (`itp_id`);

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
-- Indexes for table `tbl_report_ups`
--
ALTER TABLE `tbl_report_ups`
  ADD PRIMARY KEY (`ups_id`);

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
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stk_id`);

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
-- Indexes for table `tbl_withdraw_stk`
--
ALTER TABLE `tbl_withdraw_stk`
  ADD PRIMARY KEY (`wtd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_add_inventory`
--
ALTER TABLE `tbl_add_inventory`
  MODIFY `add_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_equipment_borrow`
--
ALTER TABLE `tbl_equipment_borrow`
  MODIFY `ebr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_equipment_detail`
--
ALTER TABLE `tbl_equipment_detail`
  MODIFY `edetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `exp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_it_problem`
--
ALTER TABLE `tbl_it_problem`
  MODIFY `itp_id` int(10) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tbl_report_ups`
--
ALTER TABLE `tbl_report_ups`
  MODIFY `ups_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

--
-- AUTO_INCREMENT for table `tbl_withdraw_stk`
--
ALTER TABLE `tbl_withdraw_stk`
  MODIFY `wtd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
