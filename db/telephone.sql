-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telephone`
--

-- --------------------------------------------------------

--
-- Table structure for table `telebook`
--
CREATE TABLE `departments` (
  `Dept_no` int(11) DEFAULT NULL,
  `Dept_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Dept_no`, `Dept_name`) VALUES
(1, 'Dean Office'),
(3, 'Computer Technology'),
(2, 'Aeronautical Engineering'),
(6, 'Instrumentation Engineering'),
(5, 'Information Technology'),
(10, 'Automobile Engineering'),
(8, 'Rubber and Plastics Technology'),
(7, 'Production Technology'),
(4, 'Electronics Engineering'),
(11, 'Applied Science and Humanities'),
(9, 'Labs and Centers'),
(12, 'Library');


CREATE TABLE `telebook` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `Designation` varchar(512) DEFAULT NULL,
  `interno` varchar(10) DEFAULT NULL,
  `phoneno` varchar(13) DEFAULT NULL,
  `Dept_no` varchar(512) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telebook`
--

INSERT INTO `telebook` (`id`, `name`, `Designation`, `interno`, `phoneno`, `Dept_no`, `location`) VALUES
(1, 'Dr.K.Ravichandran', 'Professor & Dean', '6397', '9444012674', '1', '--'),
(2, 'Dr.T.Thyagarajan', 'Emeritus Professor', '6323', '9444104850', '1', '--'),
(3, 'Dr.D.Manamalli', 'Professor', '6032', '9445405689', '1', '--'),
(4, 'Dr.S.Srinivasan', 'Professor & Head', '6046', '9382882300', '1', '--'),
(5, 'Dr.K.Latha', 'Professor', '6037', '9500064042', '1', '--'),
(6, 'Dr.S.Kumar', 'Professor', '6042', '9444140553', '1', '--'),
(7, 'Dr.Sabitha Ramakrishnan', 'Professor', '6321', '9789977989', '1', '--'),
(8, 'Dr. S. Sutha', 'Professor', '6041', '9444118880', '1', '--'),
(9, 'Dr.M.Mythily', 'Assistant Professor(Sr.Gr)', '6036', '8056219820', '1', '--'),
(10, 'Dr.D.Kalpana', 'Assistant Professor (Sr.Gr)', '6156', '8939951025', '1', '--'),
(11, 'Mr.K.Selvakumar', 'Teaching Fellow', '6255', '9445411989', '1', '--'),
(29, 'Dr. P. Indumathi', 'Professor & HOD', '6090', '9444139382', '4', '--'),
(30, 'Dr.Mala John', 'Professor', '6347', '9444443706', '4', '--'),
(31, 'Dr.S.Indira Gandhi', 'Professor', '6366(IP)', '9176677746', '4', '--'),
(32, 'Dr.M.Kannan', 'Professor', '6236', '9500069244', '4', '--'),
(33, 'Dr. M. Manikandan', 'Professor', '6094', '9444030908', '4', '--'),
(34, 'Dr. P. T. V. Bhuvaneswari', 'Professor', '6097(IP)', '9884697694', '4', '--'),
(35, 'Dr. D. Meganathan', 'Professor', '6237', '9962009574', '4', '--'),
(36, 'Dr. P. Prakash', 'Professor', '6249', '9600079113', '4', '--'),
(37, 'Dr. S. Vasuhi', 'Professor', '6096', '9443798421', '4', '--'),
(38, 'Dr. T. Subashri', 'Associate Professor', '6243', '7358777621', '4', '--'),
(39, 'Dr. G. Sumithra', 'Associate Professor', '6095', '9444481719', '4', '--'),
(40, 'Dr. C. Sridevi', 'Associate Professor', '6242', '9444961200', '4', '--'),
(41, 'Dr.C.Rimmya', 'Associate Professor', '6095', '9444231244', '4', '--'),
(42, 'Dr.G.Balamurugan', 'Assistant Professor', '6239', '9176030069', '4', '--'),
(43, 'Mrs. A. Divya', 'Assistant Professor', '6241', '9677353583', '4', '--'),
(44, 'Ms. R.Ramya', 'Teaching Fellow', '6088', '9444703760', '4', '--'),
(45, 'Ms.S.Alagu', 'Teaching Fellow', '6092', '8939832080', '4', '--'),
(46, 'Dr.P.Jayashree', 'Professor & Dean', '6230', '9444104850', '3', '--'),
(47, 'Dr.R.Gunasekaran', 'Professor', '6222', '9962690099', '3', '--'),
(48, 'Dr.B.Thanasekhar', 'Professor', '6229', '9442244436', '3', '--'),
(49, 'Dr.Ponsy R.K.Sathia Bhama', 'Associate Professor', '6224', '9444446910', '3', '--'),
(50, 'Dr.P.Pabitha', 'Associate Professor', '6225', '9444882247', '3', '--'),
(51, 'Dr.S.Muthurajkumar', 'Associate Professor', '6270', '9442172562', '3', '--'),
(52, 'Dr. S. Chithra', 'Associate Professor', '6271', '9884776511', '3', '--'),
(53, 'Dr.R.Kathiroli', 'Assistant Professor(Sl.Gr)', '6227', '9940576212', '3', '--'),
(54, 'Dr.S.Neelavathy Pari', 'Assistant Professor(Sl.Gr)', '6226', '9962827638', '3', '--'),
(55, 'Dr.V.P.Jayachitra', 'Assistant Professor(Sr.Gr)', '6228', '7550260812', '3', '--'),
(56, 'Dr.Y.Nancy Jane', 'Assistant Professor(Sr.Gr)', '6223', '9677193028', '3', '--'),
(57, 'Dr.K.Kottilingam', 'Assistant Professor', '6266', '7358089612', '3', '--'),
(58, 'Dr.T.Sudhakar', 'Assistant Professor', '6221', '9942290298', '3', '--'),
(59, 'Ms.M.Jenila Vincent', 'Teaching fellow', '6214', '9789213214', '3', '--'),
(60, 'Ms.R.Keerthana', 'Teaching fellow', '6215', '8903850684', '3', '--'),
(61, 'Dr.R.Ravikumar', 'Assistant Registrar', '6319', '9841411579', '3', '--'),
(62, 'Ms.R.Mehurunisha', 'Lab Assistant', '6286', '9677235778', '3', '--'),
(63, 'Mr.R.Mageshkumar', 'Professional Assistant - I', '6211', '9791725322', '3', '--'),
(64, 'Ms.S.Priyadharshini', 'Professional Assistant - I', '6287', '6369745748', '3', '--'),
(65, 'Ms.B.Hemalatha', 'Professional Assistant –I', '6284', '9840334260', '3', '--'),
(66, 'Ms.P.M.Katheeja Banu', 'Professional Assistant - I', '6289', '8220167925', '3', '--'),
(67, 'Ms.S.Prabavathi Annamuthu', 'Professional Assistant - I', '6291', '9600658226', '3', '--'),
(68, 'Ms.M.Durga Devi', 'Professional Assistant - II', '6231', '9840418393', '3', '--'),
(69, 'Ms.R.Sasikala', 'Clerical Assistant', '6232', '9840375271', '3', '--'),
(70, 'Mr.D.Samuvel', 'Peon', '6233', '8428503384', '3', '--'),
(71, 'Ms.S.Annadurai', 'Peon', '6233', '9941186120', '3', '--'),
(72, 'Dr. K.Annamalai', 'Professor and Head', '6337', '9444280650', '10', '--'),
(73, 'Dr. K.Arunachalam', 'Professor', '6339', '9884345564', '10', '--'),
(74, 'Dr. P.Senthilkumar', 'Associate Professor', '6340', '9443947722', '10', '--'),
(75, 'Mr. B.Vasanthan', 'Assistant Professor', '6070', '9894864529', '10', '--'),
(76, 'Dr. M.Murugesa Pandian', 'Assistant Professor', '6075', '9791185857', '10', '--'),
(77, 'Mr. S.Arunprasad', 'Teaching Fellow', '6075', '9787651731', '10', '--'),
(78, 'Mr.S.Mariappa', 'Teaching Fellow', '6075', '9442292272', '10', '--'),
(79, 'Dr. A.Sangeet Sahaya Jeyangel', 'Teaching Fellow', '6070', '9003331352', '10', '--'),
(80, 'Dr. A.Jayanth Joseph', 'Teaching Fellow', '6340', '8248351627', '10', '--'),
(81, 'Mr. P.Jagan', 'Teaching Fellow', '6072', '9543218368', '10', '--'),
(82, 'Dr.V.Ponnusamy', 'Head', '6136', '9094370744', '11', '--'),
(83, 'Dr.J.Baskar Babujee', 'Professor', '6379', '9841305710', '11', '--'),
(84, 'Dr.R.Murugaraj', 'Professor', '6145', '9894898009', '11', '--'),
(85, 'Dr.D.J.Prabhakaran', 'Associate Professor', '6447', '9444034287', '11', '--'),
(86, 'Dr.S.Anbarasu', 'Associate Professor', '6442', '9884243351', '11', '--'),
(87, 'Dr.K.M.Veerabadran', 'Assistant Professor', '6142', '9841261447', '11', '--'),
(88, 'Dr.Deepa Mary Francis', 'Assistant Professor', '6437', '9444524880', '11', '--'),
(89, 'Dr.G.Muniasamy', 'Assistant Professor', '6125', '9445756785', '11', '--'),
(90, 'Dr.J.Lourdes Joavani', 'Assistant Professor', '6436', '9600068734', '11', '--'),
(91, 'Dr.A.Rathinasamy', 'Assistant Professor', '6446', '7305931692', '11', '--'),
(92, 'Dr.K.Ambika', 'Teaching Fellow', '6443', '9840782073', '11', '--'),
(93, 'Dr.A.R.S.Jayanth', 'Teaching Fellow', '6444', '9940692756', '11', '--'),
(94, 'Mr.S.Soundar Rajan', 'Teaching Fellow', '6439', '9003796687', '11', '--'),
(95, 'Mr.I.Elisha', 'Teaching Fellow', '6444', '7448443242', '11', '--'),
(96, 'Ms.G.Surya', 'Teaching Fellow', '6441', '9790480696', '11', '--'),
(97, 'Ms.A.K.Rajalakshmi', 'Teaching Fellow', '6445', '9597680380', '11', '--'),
(98, 'Ms.M.H.Riath', 'Teaching Fellow', '6445', '9940038122', '11', '--'),
(99, 'Mr.R.Venkatesan', 'Teaching Fellow', '6144', '9786142646', '11', '--'),
(100, 'Ms.S.Hari Letchumi', 'Teaching Fellow', '6439', '9123591745', '11', '--'),
(101, 'Ms.G.Nithya', 'Teaching Fellow', '6445', '9500393788', '11', '--'),
(102, 'Mr.D.Anand', 'Teaching Fellow', '6439', '8056738802', '11', '--'),
(103, 'Dr.T.Poovai Subramanian', 'Teaching Fellow', '6440', '9962843175', '11', '--'),
(104, 'Ms.P.Sellaiammal', 'Teaching Fellow', '6440', '8668078136', '11', '--'),
(105, 'Dr.K.M.Parammasivam', 'Professor-In-Charge', '6384', '9962540106', '12', '--'),
(106, 'Tmt.N.Mary Priscilla', 'Assistant University Librarian - III', '6165', '9444912203', '12', '--'),
(107, 'Tmt.S.Senthamarai', 'Library Assistant - I', '6166', '9445616213', '12', '--'),
(108, 'Tmt.Abida Begam', 'Library Assistant - I', '6162', '7358302880', '12', '--'),
(109, 'Dr. L.S. Jayakumari', 'Professor and Head', '6330', '9444769789', '8', '--'),
(110, 'Dr. B. Kothandaraman', 'Professor', '6331', '9444686881', '8', '--'),
(111, 'Dr. N.Natchimuthu', 'Professor', '6329', '9444981996', '8', '--'),
(112, 'Dr. K.Ravichandran', 'Professor', '6397', '9444012674', '8', '--'),
(113, 'Dr. K.Elangovan', 'Associate Professor', '6058', '9094680905', '8', '--'),
(114, 'Ms. J. Jebarani', 'Teaching Fellow', '6431', '9790979669', '8', '--'),
(115, 'Dr. H. Sheik Mohammed', 'Teaching Fellow', '6425', '9629123025', '8', '--'),
(116, 'Ms. B. Archana', 'Teaching Fellow', '6052', '7708769557', '8', '--'),
(117, 'Mr. A. Karthik Narayanan', 'Teaching Fellow', '6056', '9790990929', '8', '--'),
(118, 'Mr. M. Arunkumar', 'Teaching Fellow', '6328', '9751713511', '8', '--'),
(119, 'Dr. Piyali Roy Choudhury', 'Teaching Fellow', '6430', '9836425094', '8', '--'),
(120, 'Mrs. R. Vanitha', 'Superintendent', '6416', '7598544075', '8', '--'),
(121, 'Mrs. K. Chitra', 'Skilled Assistant Grade-I', '6429', '9444343708', '8', '--'),
(122, 'Mrs. S. Sumathi', 'Clerical Assistant', '6050', '9791106604', '8', '--'),
(123, 'Mr. K. Ananda Kumar', 'Professional Assistant - I', '6418', '8807380370', '8', '--'),
(124, 'Mr. A. Murugan', 'Professional Assistant - I', '6056', '9789472003', '8', '--'),
(125, 'Mr. R. Immanuel Shanthosh', 'Professional Assistant - I', '6428', '9043778802', '8', '--'),
(126, 'Mr. A. Ravi', 'Peon', '6417', '9941887758', '8', '--'),
(127, 'Mrs. S. Sumathi', 'Clerical Assistant', '6415', '9791106604', '8', '--'),
(128, 'Ms. B. Archana', 'Teaching Fellow', '6332', '7708769557', '8', '--'),
(129, 'Dr. Piyali Roy Choudhury', 'Teaching Fellow', '6055', '9836425094', '8', '--'),
(130, 'Ms. B. Archana', 'Teaching Fellow', '6424', '7708769557', '8', '--'),
(131, 'Dr. H. Sheik Mohammed', 'Teaching Fellow', '6423', '9629123025', '8', '--'),
(132, 'Mrs. R. Vanitha', 'Superintendent', '6422', '7598544075', '8', '--'),
(133, 'Dr. K.Ravichandran', 'Professor', '6426', '9444012674', '8', '--'),
(134, 'Dr. L. S. Jayakumari', 'Professor', '6427', '9444769789', '8', '--'),
(135, 'Dr. H. Sheik Mohammed', 'Teaching Fellow', '6433', '9629123025', '8', '--'),
(136, 'Mrs. S. Sumathi', 'Clerical Assistant', '6432', '9791106604', '8', '--'),
(137, 'Ms. J. Jebarani', 'Teaching Fellow', '6434', '9790979669', '8', '--'),
(138, 'Mr. M. Arunkumar', 'Teaching Fellow', '6412', '9751713511', '8', '--'),
(139, 'Dr.D.Vasanthi', 'Professor', '', '9489307781', '6', '--'),
(140, 'Dr.C.Shanthi', 'Assistant Professor (Sr.Gr)', '', '9444658409', '6', '--'),
(141, 'Dr.K.Kamalanand', 'Assistant Professor (Sr.Gr)', '', '9790748679', '6', '--'),
(142, 'Dr.V.Gomathi', 'Assistant Professor', '', '9500042594', '6', '--'),
(143, 'Dr.M.Vijayakarthick', 'Associate Professor', '', '9976995692', '6', '--'),
(144, 'Dr.N.Vinoth', 'Associate Professor', '', '9488027209', '6', '--'),
(145, 'Dr.S.Meyyappan', 'Assistant Professor', '', '9865682065', '6', '--'),
(146, 'Dr.A.Ganesh Ram', 'Assistant Professor', '', '9482758070', '6', '--'),
(147, 'Mrs.S.Arockia suganya', 'Teaching Fellow', '', '8940327864', '6', '--'),
(148, 'Mr.S.Nambi Narayanan', 'Teaching Fellow', '', '8903463974', '6', '--'),
(149, 'Mr.S.S.Pream anand', 'Teaching Fellow', '', '8220280956', '6', '--'),
(150, 'Dr.K.M.Parammasivam', 'Professor-In-Charge', '6384', '9962540106', '12', '--'),
(151, 'Tmt.N.Mary Priscilla', 'Assistant University Librarian - III', '6165', '9444912203', '12', '--'),
(152, 'Tmt.S.Senthamarai', 'Library Assistant - I', '6166', '9445616213', '12', '--'),
(153, 'Tmt.Abida Begam', 'Library Assistant - I', '6162', '7358302880', '12', '--'),
(154, 'Data Centre', '--', '6211', '--', '3', 'CB002'),
(155, 'Big Data Lab', '--', '6276', '--', '3', 'CB003'),
(156, 'Meeting Room', '--', '6268', '--', '3', 'CB101'),
(157, 'Next Generation Networks Lab', '--', '6273', '--', '3', 'CB202'),
(158, 'Intelligent Computing Lab', '--', '6213', '--', '3', 'CB204'),
(159, 'Data Science Lab', '--', '6217', '--', '3', 'CB205'),
(160, 'Master’s Lab', '--', '6212', '--', '3', 'GJ202'),
(161, 'High Performance Computing Lab', '--', '6287', '--', '3', 'GJ211'),
(162, 'Distributed Computing Lab', '--', '6284', '--', '3', 'GJ207'),
(163, 'Pervasive Computing Lab', '--', '6286', '--', '3', 'GJ209'),
(164, 'Research Scholars Lab', '--', '6219', '--', '3', 'GJ301'),
(165, 'Programming Practice Lab', '--', '6289', '--', '3', 'GJ304'),
(166, 'Multicore Lab','--', '6291', '--', '3', 'GJ306');

--
-- Indexes for dumped tables
--
CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'superadmin', 'admin', 'root', 'admin@gmail.com', '$2y$10$lapZDjwd7TQxuUYpj1.QR.oDYVUHVpSrIrE3Du9uYVdfut8LbeeFy', 'superadmin');


--
-- Indexes for table `telebook`
--
ALTER TABLE `telebook`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `telebook`
--
ALTER TABLE `telebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
