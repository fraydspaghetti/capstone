-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '4297f44b13955235245b2497399d7a93', '2023-04-15 17:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Returned` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `Returned`) VALUES
(103, 'test@gmail.com', 12, '2023-05-26', '2023-05-27', 'TEST', 1, '2023-05-26 07:28:29', 1),
(106, 'test@gmail.com', 11, '2023-05-25', '2023-05-27', 'test', 1, '2023-05-26 08:13:29', 0),
(119, 'test@gmail.com', 9, '2023-05-01', '2023-05-01', 'test', 0, '2023-05-26 08:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(10, 'SUZUKI', '2023-05-17 22:01:49', NULL),
(11, 'YAMAHA', '2023-05-17 22:01:53', NULL),
(12, 'TOYOTA', '2023-05-17 22:01:56', NULL),
(13, 'HONDA', '2023-05-17 22:02:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Basak Mercado Lapu-Lapu City, Cebu																							', 'christiankirl07@gmail.com', '09503398538');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																														<p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x:0; --tw-border-spacing-y:0; --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness:proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; --tw-shadow:0 0 transparent; --tw-shadow-colored:0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 1.25em; background-color: rgb(247, 247, 248);\"><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space: pre-wrap;\">At SakayLLC, we take our terms and policies very seriously to ensure that our clients have a smooth and hassle-free rental experience. Please read the following information carefully before renting a motorbike from us:\r\n\r\nRenter Requirements: To rent a motorbike from us, you must be at least 18 years old and have a valid driver\'s license issued by your location. You must also provide a valid identification card.\r\n\r\n\r\n\r\nRental Period: Our rental period is calculated on a 24-hour basis. Late returns are subject to additional charges.\r\n\r\nPayment: We accept cash and automated payments for rental fees. Please note that the renter is responsible for any transaction fees incurred\r\n\r\n\r\n\r\nSecurity Deposit: We require a security deposit before releasing the motorbike to the renter. The deposit amount varies depending on the type of motorbike rented.\r\n\r\n\r\n\r\nInsurance: Our rental fee includes third-party liability insurance coverage. However, the renter is responsible for any damages incurred to the motorbike during the rental period, including theft or loss of the motorbike or any of its parts.\r\n\r\n\r\n\r\nRestrictions: The rented motorbike must not be used for any illegal purposes or activities, including racing, off-road riding, or transporting hazardous materials. The motorbike should only be ridden by the renter and should not be subleased or lent to any other person.\r\n\r\n\r\n\r\nAccidents and Incidents: In the event of an accident or incident, the renter must inform us immediately and cooperate fully with our team and the authorities. The renter is responsible for any damages incurred to the motorbike and any third-party property or persons.\r\n\r\nBy renting a motorbike from SakayLLC, you agree to our terms and policies. If you have any questions or concerns, please do not hesitate to contact us.</span><br></p>\r\n										\r\n										\r\n										'),
(2, 'Privacy Policy', 'privacy', '										<p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x:0; --tw-border-spacing-y:0; --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness:proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; --tw-shadow:0 0 transparent; --tw-shadow-colored:0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 1.25em; background-color: rgb(247, 247, 248);\"><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space: pre-wrap;\">At SakayLLC, we take the privacy and security of our clients\' personal information very seriously. Please read the following information carefully to understand how we collect, use, and protect your data:\r\n\r\nPersonal Information: We collect personal information, such as your name, contact details, driver\'s license, and identification card, to process your rental application and facilitate your rental experience. We also collect information about your motorbike usage and rental history.\r\n\r\n\r\n\r\nData Collection: We collect personal information through our website, rental application forms, and in-person interactions. We may also collect information through cookies and other tracking technologies to improve our services and personalize your experience.\r\n\r\n\r\n\r\nData Use: We use your personal information to process your rental application, manage your rental experience, and communicate with you about our services and promotions. We may also use your data for analytics and research purposes to improve our services.\r\n\r\n\r\n\r\nData Sharing: We may share your personal information with our trusted partners, such as insurance providers, for the purpose of providing our services. We may also share your data with law enforcement authorities if required by law or to protect our business interests.\r\n\r\n\r\n\r\nData Security: We implement security measures to protect your personal information from unauthorized access, use, or disclosure. We regularly review and update our security protocols to ensure the highest level of protection.\r\n\r\n\r\n\r\nData Retention: We retain your personal information only for as long as necessary to fulfill the purposes for which it was collected and to comply with legal obligations.\r\n\r\nBy using our services, you consent to the collection, use, and sharing of your personal information as described in this Privacy Policy. Best we assured your personal information is safe to us.</span><br></p>\r\n										'),
(3, 'About Us ', 'aboutus', '																				<p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x:0; --tw-border-spacing-y:0; --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness:proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; --tw-shadow:0 0 transparent; --tw-shadow-colored:0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 1.25em; background-color: rgb(247, 247, 248);\"><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space: pre-wrap;\">Welcome to SakayLLC, your trusted partner for high-quality motorbike rentals in Lapu-Lapu. We are a team of dedicated students who are passionate about helping locals and tourists alike experience the beauty of Lapu-Lapu on two wheels or just to give thrill to those who wants some long joy ride.\r\n\r\nThank you for choosing SakayPH as your partner in exploring the beauty of the Lapu-Lapu on two wheels. We look forward on serving you!</span><br></p>\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '										<p style=\"margin-bottom: 1.25em; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x:0; --tw-border-spacing-y:0; --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness:proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59,130,246,0.5); --tw-ring-offset-shadow:0 0 transparent; --tw-ring-shadow:0 0 transparent; --tw-shadow:0 0 transparent; --tw-shadow-colored:0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; background-color: rgb(247, 247, 248);\"><span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space: pre-wrap;\">At SakayLLC, we take our terms and policies very seriously to ensure that our clients have a smooth and hassle-free rental experience. Please read the following information carefully before renting a motorbike from us:\r\n\r\nRenter Requirements: To rent a motorbike from us, you must be at least 18 years old and have a valid driver\'s license issued by your location. You must also provide a valid identification card.\r\n\r\n\r\n\r\nRental Period: Our rental period is calculated on a 24-hour basis. Late returns are subject to additional charges.\r\n\r\nPayment: We accept cash and automated payments for rental fees. Please note that the renter is responsible for any transaction fees incurred\r\n\r\n\r\n\r\nSecurity Deposit: We require a security deposit before releasing the motorbike to the renter. The deposit amount varies depending on the type of motorbike rented.\r\n\r\n\r\n\r\nInsurance: Our rental fee includes third-party liability insurance coverage. However, the renter is responsible for any damages incurred to the motorbike during the rental period, including theft or loss of the motorbike or any of its parts.\r\n\r\n\r\n\r\nRestrictions: The rented motorbike must not be used for any illegal purposes or activities, including racing, off-road riding, or transporting hazardous materials. The motorbike should only be ridden by the renter and should not be subleased or lent to any other person.\r\n\r\n\r\n\r\nAccidents and Incidents: In the event of an accident or incident, the renter must inform us immediately and cooperate fully with our team and the authorities. The renter is responsible for any damages incurred to the motorbike and any third-party property or persons.\r\n\r\nBy renting a motorbike from SakayLLC, you agree to our terms and policies. If you have any questions or concerns, please do not hesitate to contact us.</span><br></p>\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` varchar(12) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `RegDate`, `UpdationDate`) VALUES
(39, 'test', 'test5@gmail.com', '4297f44b13955235245b2497399d7a93', '09503398538', NULL, NULL, '2023-05-18 00:20:21', NULL),
(40, 'Christian Kirl Daño Tago', 'test@gmail.com', '4297f44b13955235245b2497399d7a93', '09503398538', NULL, NULL, '2023-05-26 07:28:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_rented` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `RegDate`, `UpdationDate`, `is_rented`) VALUES
(8, 'Yamaha Nmax ABS 2023', 11, 'The Yamaha Nmax ABS price in the Philippines starts at ?150,000 . It is available in 4 colors in the Philippines. The Nmax ABS is powered by a 155 cc engine, and has a Variable Speed gearbox. The Yamaha Nmax ABS has a seating height of 765 mm and kerb weight of 131 kg. The Nmax ABS comes with Disc front brakes and Disc rear brakes along with ABS. Over 55 users have reviewed Nmax ABS on basis of Features, Mileage, seating comfort, and engine performance. Nmax ABS top competitors are PCX160 ABS, ADV160 Standard, Aerox 155 S ABS and Xmax Standard.', 1000, 'Gasoline', 2023, 2, '1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '2023-05-17 22:05:09', NULL, 0),
(9, 'Toyota Wigo', 12, 'The Toyota Wigo is offered Gasoline engine in the Philippines. The new Hatchback from Toyota comes in a total of 4 variants. If we talk about Toyota Wigo engine specs then the Gasoline engine displacement is 998 cc. Wigo is available with Manual and Automatic transmission depending on the variant. along with a ground clearance of 180 mm.', 2000, 'Gasoline', 2022, 4, '2.jpg', '2.jpg', '2.jpg', '2.jpg', '2.jpg', '2023-05-17 22:10:26', NULL, 0),
(11, 'Honda Civic Type R', 13, 'The All-New Civic Type R features sleek, aerodynamic styling which epitomizes Type R’s unique character and Honda’s sporty DNA. With a lower and wider stance, The All-New Civic Type R is sure to make heads turn and hearts race with exhilaration.', 3000, 'Gasoline', 2023, 4, '4.jpg', '4.jpg', '4.jpg', '4.jpg', '4.jpg', '2023-05-17 22:18:09', NULL, 0),
(12, 'Raider 150Fi', 13, 'test', 3000, 'Gasoline', 20033, 2, '3.jpg', '3.jpg', '3.jpg', '3.jpg', '3.jpg', '2023-05-17 22:43:49', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Feedbacks` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedbacks`
--

INSERT INTO `tbl_feedbacks` (`id`, `UserEmail`, `Feedbacks`, `PostingDate`, `status`) VALUES
(81, 'test@gmail.com', 'chgec ', '2023-05-26 08:01:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
