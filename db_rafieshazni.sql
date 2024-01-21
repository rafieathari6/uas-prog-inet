-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2024 at 06:14 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rafieshazni`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `IDKota` int NOT NULL,
  `NamaKota` varchar(15) NOT NULL,
  `NamaPemimpin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TglBerdiri` date NOT NULL,
  `JmlPenduduk` int NOT NULL,
  `LuasWilayah` float NOT NULL,
  `JenisKota` enum('Istimewa','Otonom','Percontohan','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Keunggulan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`IDKota`, `NamaKota`, `NamaPemimpin`, `TglBerdiri`, `JmlPenduduk`, `LuasWilayah`, `JenisKota`, `Keunggulan`) VALUES
(0, 'Bandung', 'Bambang Tirtoyuliono', '2001-01-01', 1000000, 300000, 'Otonom', ' Nunc a turpis tincidunt, fringilla ante nec, ultricies urna. Nullam hendrerit blandit sodales. Fusce purus ligula, vulputate non viverra dictum, auctor vel mi. In sed tellus lorem. Suspendisse arcu tortor, convallis non dui sed, dignissim vulputate ex. Nam in blandit erat, sed elementum felis. Duis a elit mattis eros suscipit consectetur. Maecenas eleifend, urna nec dictum sollicitudin, neque libero consectetur nisl, sed posuere elit ante sit amet urna. Proin rhoncus varius eros, ac fermentum massa convallis vitae. Etiam non nunc non nisi mattis pellentesque. Ut sit amet cursus metus. Suspendisse potenti.\r\n\r\nAliquam nec pharetra nisl, vel mollis leo. Aenean pretium pharetra enim, vitae sodales tortor pellentesque ut. Duis condimentum lacus vel lectus semper dictum. Pellentesque velit arcu, condimentum eu ligula nec, ornare scelerisque dolor. Nam euismod nulla a leo eleifend, a ultrices mauris semper. Suspendisse dapibus, diam et convallis porttitor, sapien nisi hendrerit metus, sed viverra sapien lectus id nisl. Maecenas at purus at libero feugiat molestie. In finibus libero leo, quis tincidunt justo venenatis eu. '),
(3, 'Cimahi', 'Dicky', '2001-08-08', 15000, 100000, 'Otonom', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis vitae massa sed commodo. Proin eu venenatis mauris. Fusce elementum efficitur congue. Curabitur pellentesque accumsan fermentum. Integer congue libero ac purus aliquet mollis. Nam justo nisi, maximus nec cursus vel, maximus vitae quam. Nam varius purus arcu, eget vulputate sapien mollis ut. Maecenas vel dictum leo.\r\n\r\nPhasellus eu lorem commodo, feugiat justo in, hendrerit tellus. Quisque ornare laoreet vestibulum. Etiam et metus vel ipsum pharetra convallis. Duis libero libero, auctor quis egestas id, ultrices a ex. Praesent lobortis nibh ac nunc feugiat rutrum. In posuere rutrum tempor. Sed venenatis, lacus id fermentum luctus, nulla quam dignissim metus, consectetur volutpat elit tortor eu tellus. Vestibulum egestas interdum odio vitae tempus. Aliquam erat volutpat. Duis ultricies ex erat, non porttitor elit suscipit eu. Suspendisse potenti. Vestibulum quis elementum libero, non tincidunt neque. Vestibulum velit arcu, consequat in commodo a, ornare id eros. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`IDKota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `IDKota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
