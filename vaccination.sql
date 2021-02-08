-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 11:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id_appt` int(225) NOT NULL,
  `mykid` varchar(225) NOT NULL,
  `appt_type` varchar(225) NOT NULL,
  `appt_start` datetime(6) NOT NULL,
  `appt_end` datetime(6) NOT NULL,
  `appt_status` varchar(225) NOT NULL,
  `appt_scheduleID` int(225) NOT NULL,
  `doctor` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id_appt`, `mykid`, `appt_type`, `appt_start`, `appt_end`, `appt_status`, `appt_scheduleID`, `doctor`) VALUES
(1669, '97081024228837', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-05-06 09:09:00.000000', '2020-05-06 00:00:00.000000', 'Scheduled', 166, 'Doctor A'),
(1670, '97081024228837', 'Hepatitis B (HepB) [1st Dose]', '2020-05-06 09:00:00.000000', '2020-05-06 00:00:00.000000', 'Scheduled', 166, 'Doctor A'),
(1671, '97081024228837', 'Hepatitis B (HepB) [2nd Dose]', '2020-06-06 00:00:00.000000', '2020-06-06 00:00:00.000000', 'Not complete', 166, '-'),
(1672, '97081024228837', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-07-06 00:00:00.000000', '2020-07-06 00:00:00.000000', 'Not complete', 166, '-'),
(1673, '97081024228837', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-07-06 00:00:00.000000', '2020-07-06 00:00:00.000000', 'Not complete', 166, '-'),
(1674, '97081024228837', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-07-06 00:00:00.000000', '2020-07-06 00:00:00.000000', 'Not complete', 166, '-'),
(1675, '97081024228837', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-08-06 00:00:00.000000', '2020-08-06 00:00:00.000000', 'Not complete', 166, '-'),
(1676, '97081024228837', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-08-06 00:00:00.000000', '2020-08-06 00:00:00.000000', 'Not complete', 166, '-'),
(1677, '97081024228837', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-08-06 00:00:00.000000', '2020-08-06 00:00:00.000000', 'Not complete', 166, '-'),
(1678, '97081024228837', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-10-06 00:00:00.000000', '2020-10-06 00:00:00.000000', 'Not complete', 166, '-'),
(1679, '97081024228837', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-10-06 00:00:00.000000', '2020-10-06 00:00:00.000000', 'Not complete', 166, '-'),
(1680, '97081024228837', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-10-06 00:00:00.000000', '2020-10-06 00:00:00.000000', 'Not complete', 166, '-'),
(1681, '97081024228837', 'Hepatitis B (HepB) [3rd Dose]', '2020-11-06 00:00:00.000000', '2020-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1682, '97081024228837', 'Measles (Sabah only)', '2020-11-06 00:00:00.000000', '2020-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1683, '97081024228837', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-03-06 00:00:00.000000', '2021-03-06 00:00:00.000000', 'Not complete', 166, '-'),
(1684, '97081024228837', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-05-06 00:00:00.000000', '2021-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1685, '97081024228837', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-05-06 00:00:00.000000', '2021-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1686, '97081024228837', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-11-06 00:00:00.000000', '2021-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1687, '97081024228837', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-11-06 00:00:00.000000', '2021-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1688, '97081024228837', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-11-06 00:00:00.000000', '2021-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1689, '97081024228837', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-11-06 00:00:00.000000', '2021-11-06 00:00:00.000000', 'Not complete', 166, '-'),
(1690, '97081024228837', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-05-06 00:00:00.000000', '2024-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1691, '97081024228837', 'BCG (option only if no scar found)', '2027-05-06 00:00:00.000000', '2027-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1692, '97081024228837', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-05-06 00:00:00.000000', '2027-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1693, '97081024228837', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-05-06 00:00:00.000000', '2027-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1694, '97081024228837', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-05-06 00:00:00.000000', '2033-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1695, '97081024228837', 'Tetanus (TT)', '2035-05-06 00:00:00.000000', '2035-05-06 00:00:00.000000', 'Not complete', 166, '-'),
(1696, '200320134456', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-03-20 10:10:00.000000', '2020-03-20 00:00:00.000000', 'Completed', 167, 'Doctor C'),
(1697, '200320134456', 'Hepatitis B (HepB) [1st Dose]', '2020-03-20 00:00:00.000000', '2020-03-20 00:00:00.000000', 'Completed', 167, '-'),
(1698, '200320134456', 'Hepatitis B (HepB) [2nd Dose]', '2020-04-20 00:00:00.000000', '2020-04-20 00:00:00.000000', 'Completed', 167, '-'),
(1699, '200320134456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-05-20 00:00:00.000000', '2020-05-20 00:00:00.000000', 'Completed', 167, '-'),
(1700, '200320134456', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-05-20 00:00:00.000000', '2020-05-20 00:00:00.000000', 'Not complete', 167, '-'),
(1701, '200320134456', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-05-20 00:00:00.000000', '2020-05-20 00:00:00.000000', 'Not complete', 167, '-'),
(1702, '200320134456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-06-20 00:00:00.000000', '2020-06-20 00:00:00.000000', 'Not complete', 167, '-'),
(1703, '200320134456', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-06-20 00:00:00.000000', '2020-06-20 00:00:00.000000', 'Not complete', 167, '-'),
(1704, '200320134456', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-06-20 00:00:00.000000', '2020-06-20 00:00:00.000000', 'Not complete', 167, '-'),
(1705, '200320134456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-08-20 00:00:00.000000', '2020-08-20 00:00:00.000000', 'Not complete', 167, '-'),
(1706, '200320134456', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-08-20 00:00:00.000000', '2020-08-20 00:00:00.000000', 'Not complete', 167, '-'),
(1707, '200320134456', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-08-20 00:00:00.000000', '2020-08-20 00:00:00.000000', 'Not complete', 167, '-'),
(1708, '200320134456', 'Hepatitis B (HepB) [3rd Dose]', '2020-09-20 00:00:00.000000', '2020-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1709, '200320134456', 'Measles (Sabah only)', '2020-09-20 00:00:00.000000', '2020-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1710, '200320134456', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-01-20 00:00:00.000000', '2021-01-20 00:00:00.000000', 'Not complete', 167, '-'),
(1711, '200320134456', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-03-20 00:00:00.000000', '2021-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1712, '200320134456', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-03-20 00:00:00.000000', '2021-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1713, '200320134456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-09-20 00:00:00.000000', '2021-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1714, '200320134456', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-09-20 00:00:00.000000', '2021-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1715, '200320134456', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-09-20 00:00:00.000000', '2021-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1716, '200320134456', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-09-20 00:00:00.000000', '2021-09-20 00:00:00.000000', 'Not complete', 167, '-'),
(1717, '200320134456', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-03-20 00:00:00.000000', '2024-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1718, '200320134456', 'BCG (option only if no scar found)', '2027-03-20 00:00:00.000000', '2027-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1719, '200320134456', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-03-20 00:00:00.000000', '2027-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1720, '200320134456', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-03-20 00:00:00.000000', '2027-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1721, '200320134456', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-03-20 00:00:00.000000', '2033-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1722, '200320134456', 'Tetanus (TT)', '2035-03-20 00:00:00.000000', '2035-03-20 00:00:00.000000', 'Not complete', 167, '-'),
(1723, '200507145567', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-05-10 10:01:00.000000', '2020-05-07 00:00:00.000000', 'Scheduled', 168, 'Doctor B'),
(1724, '200507145567', 'Hepatitis B (HepB) [1st Dose]', '2020-05-07 00:00:00.000000', '2020-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1725, '200507145567', 'Hepatitis B (HepB) [2nd Dose]', '2020-06-07 00:00:00.000000', '2020-06-07 00:00:00.000000', 'Not complete', 168, '-'),
(1726, '200507145567', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-07-07 00:00:00.000000', '2020-07-07 00:00:00.000000', 'Not complete', 168, '-'),
(1727, '200507145567', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-07-07 00:00:00.000000', '2020-07-07 00:00:00.000000', 'Not complete', 168, '-'),
(1728, '200507145567', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-07-07 00:00:00.000000', '2020-07-07 00:00:00.000000', 'Not complete', 168, '-'),
(1729, '200507145567', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-08-07 00:00:00.000000', '2020-08-07 00:00:00.000000', 'Not complete', 168, '-'),
(1730, '200507145567', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-08-07 00:00:00.000000', '2020-08-07 00:00:00.000000', 'Not complete', 168, '-'),
(1731, '200507145567', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-08-07 00:00:00.000000', '2020-08-07 00:00:00.000000', 'Not complete', 168, '-'),
(1732, '200507145567', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-10-07 00:00:00.000000', '2020-10-07 00:00:00.000000', 'Not complete', 168, '-'),
(1733, '200507145567', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-10-07 00:00:00.000000', '2020-10-07 00:00:00.000000', 'Not complete', 168, '-'),
(1734, '200507145567', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-10-07 00:00:00.000000', '2020-10-07 00:00:00.000000', 'Not complete', 168, '-'),
(1735, '200507145567', 'Hepatitis B (HepB) [3rd Dose]', '2020-11-07 00:00:00.000000', '2020-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1736, '200507145567', 'Measles (Sabah only)', '2020-11-07 00:00:00.000000', '2020-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1737, '200507145567', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-03-07 00:00:00.000000', '2021-03-07 00:00:00.000000', 'Not complete', 168, '-'),
(1738, '200507145567', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-05-07 00:00:00.000000', '2021-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1739, '200507145567', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-05-07 00:00:00.000000', '2021-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1740, '200507145567', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-11-07 00:00:00.000000', '2021-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1741, '200507145567', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-11-07 00:00:00.000000', '2021-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1742, '200507145567', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-11-07 00:00:00.000000', '2021-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1743, '200507145567', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-11-07 00:00:00.000000', '2021-11-07 00:00:00.000000', 'Not complete', 168, '-'),
(1744, '200507145567', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-05-07 00:00:00.000000', '2024-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1745, '200507145567', 'BCG (option only if no scar found)', '2027-05-07 00:00:00.000000', '2027-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1746, '200507145567', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-05-07 00:00:00.000000', '2027-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1747, '200507145567', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-05-07 00:00:00.000000', '2027-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1748, '200507145567', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-05-07 00:00:00.000000', '2033-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1749, '200507145567', 'Tetanus (TT)', '2035-05-07 00:00:00.000000', '2035-05-07 00:00:00.000000', 'Not complete', 168, '-'),
(1750, '200515134456', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-05-17 09:10:00.000000', '2020-05-15 00:00:00.000000', 'Scheduled', 169, 'Doctor B'),
(1751, '200515134456', 'Hepatitis B (HepB) [1st Dose]', '2020-05-15 00:00:00.000000', '2020-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1752, '200515134456', 'Hepatitis B (HepB) [2nd Dose]', '2020-06-15 00:00:00.000000', '2020-06-15 00:00:00.000000', 'Not complete', 169, '-'),
(1753, '200515134456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-07-15 00:00:00.000000', '2020-07-15 00:00:00.000000', 'Not complete', 169, '-'),
(1754, '200515134456', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-07-15 00:00:00.000000', '2020-07-15 00:00:00.000000', 'Not complete', 169, '-'),
(1755, '200515134456', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-07-15 00:00:00.000000', '2020-07-15 00:00:00.000000', 'Not complete', 169, '-'),
(1756, '200515134456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-08-15 00:00:00.000000', '2020-08-15 00:00:00.000000', 'Not complete', 169, '-'),
(1757, '200515134456', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-08-15 00:00:00.000000', '2020-08-15 00:00:00.000000', 'Not complete', 169, '-'),
(1758, '200515134456', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-08-15 00:00:00.000000', '2020-08-15 00:00:00.000000', 'Not complete', 169, '-'),
(1759, '200515134456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-10-15 00:00:00.000000', '2020-10-15 00:00:00.000000', 'Not complete', 169, '-'),
(1760, '200515134456', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-10-15 00:00:00.000000', '2020-10-15 00:00:00.000000', 'Not complete', 169, '-'),
(1761, '200515134456', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-10-15 00:00:00.000000', '2020-10-15 00:00:00.000000', 'Not complete', 169, '-'),
(1762, '200515134456', 'Hepatitis B (HepB) [3rd Dose]', '2020-11-15 00:00:00.000000', '2020-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1763, '200515134456', 'Measles (Sabah only)', '2020-11-15 00:00:00.000000', '2020-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1764, '200515134456', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-03-15 00:00:00.000000', '2021-03-15 00:00:00.000000', 'Not complete', 169, '-'),
(1765, '200515134456', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-05-15 00:00:00.000000', '2021-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1766, '200515134456', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-05-15 00:00:00.000000', '2021-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1767, '200515134456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-11-15 00:00:00.000000', '2021-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1768, '200515134456', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-11-15 00:00:00.000000', '2021-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1769, '200515134456', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-11-15 00:00:00.000000', '2021-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1770, '200515134456', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-11-15 00:00:00.000000', '2021-11-15 00:00:00.000000', 'Not complete', 169, '-'),
(1771, '200515134456', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-05-15 00:00:00.000000', '2024-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1772, '200515134456', 'BCG (option only if no scar found)', '2027-05-15 00:00:00.000000', '2027-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1773, '200515134456', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-05-15 00:00:00.000000', '2027-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1774, '200515134456', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-05-15 00:00:00.000000', '2027-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1775, '200515134456', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-05-15 00:00:00.000000', '2033-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1776, '200515134456', 'Tetanus (TT)', '2035-05-15 00:00:00.000000', '2035-05-15 00:00:00.000000', 'Not complete', 169, '-'),
(1777, '200508123345', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-05-10 09:10:00.000000', '2020-05-08 00:00:00.000000', 'Scheduled', 170, 'Doctor B'),
(1778, '200508123345', 'Hepatitis B (HepB) [1st Dose]', '2020-05-10 09:10:00.000000', '2020-05-08 00:00:00.000000', 'Scheduled', 170, 'Doctor B'),
(1779, '200508123345', 'Hepatitis B (HepB) [2nd Dose]', '2020-06-08 00:00:00.000000', '2020-06-08 00:00:00.000000', 'Not complete', 170, '-'),
(1780, '200508123345', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-07-08 00:00:00.000000', '2020-07-08 00:00:00.000000', 'Not complete', 170, '-'),
(1781, '200508123345', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-07-08 00:00:00.000000', '2020-07-08 00:00:00.000000', 'Not complete', 170, '-'),
(1782, '200508123345', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-07-08 00:00:00.000000', '2020-07-08 00:00:00.000000', 'Not complete', 170, '-'),
(1783, '200508123345', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-08-08 00:00:00.000000', '2020-08-08 00:00:00.000000', 'Not complete', 170, '-'),
(1784, '200508123345', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-08-08 00:00:00.000000', '2020-08-08 00:00:00.000000', 'Not complete', 170, '-'),
(1785, '200508123345', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-08-08 00:00:00.000000', '2020-08-08 00:00:00.000000', 'Not complete', 170, '-'),
(1786, '200508123345', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-10-08 00:00:00.000000', '2020-10-08 00:00:00.000000', 'Not complete', 170, '-'),
(1787, '200508123345', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-10-08 00:00:00.000000', '2020-10-08 00:00:00.000000', 'Not complete', 170, '-'),
(1788, '200508123345', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-10-08 00:00:00.000000', '2020-10-08 00:00:00.000000', 'Not complete', 170, '-'),
(1789, '200508123345', 'Hepatitis B (HepB) [3rd Dose]', '2020-11-08 00:00:00.000000', '2020-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1790, '200508123345', 'Measles (Sabah only)', '2020-11-08 00:00:00.000000', '2020-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1791, '200508123345', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-03-08 00:00:00.000000', '2021-03-08 00:00:00.000000', 'Not complete', 170, '-'),
(1792, '200508123345', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-05-08 00:00:00.000000', '2021-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1793, '200508123345', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-05-08 00:00:00.000000', '2021-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1794, '200508123345', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-11-08 00:00:00.000000', '2021-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1795, '200508123345', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-11-08 00:00:00.000000', '2021-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1796, '200508123345', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-11-08 00:00:00.000000', '2021-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1797, '200508123345', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-11-08 00:00:00.000000', '2021-11-08 00:00:00.000000', 'Not complete', 170, '-'),
(1798, '200508123345', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-05-08 00:00:00.000000', '2024-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1799, '200508123345', 'BCG (option only if no scar found)', '2027-05-08 00:00:00.000000', '2027-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1800, '200508123345', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-05-08 00:00:00.000000', '2027-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1801, '200508123345', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-05-08 00:00:00.000000', '2027-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1802, '200508123345', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-05-08 00:00:00.000000', '2033-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1803, '200508123345', 'Tetanus (TT)', '2035-05-08 00:00:00.000000', '2035-05-08 00:00:00.000000', 'Not complete', 170, '-'),
(1804, '200522123456', 'Bacillus Calmetteâ€“GuÃ©rin (BCG) [1st Dose]', '2020-05-24 09:09:00.000000', '2020-05-22 00:00:00.000000', 'Scheduled', 171, 'Doctor A'),
(1805, '200522123456', 'Hepatitis B (HepB) [1st Dose]', '2020-06-24 14:30:00.000000', '2020-05-22 00:00:00.000000', 'Scheduled', 171, 'Doctor A'),
(1806, '200522123456', 'Hepatitis B (HepB) [2nd Dose]', '2020-07-24 14:31:00.000000', '2020-06-22 00:00:00.000000', 'Scheduled', 171, 'Doctor A'),
(1807, '200522123456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]', '2020-07-22 00:00:00.000000', '2020-07-22 00:00:00.000000', 'Not complete', 171, '-'),
(1808, '200522123456', 'Haemophilus influenzae b (Hib) [1st Dose]', '2020-07-22 00:00:00.000000', '2020-07-22 00:00:00.000000', 'Not complete', 171, '-'),
(1809, '200522123456', 'Inactivated Poliovirus (IPV) [1st Dose]', '2020-07-22 00:00:00.000000', '2020-07-22 00:00:00.000000', 'Not complete', 171, '-'),
(1810, '200522123456', 'Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]', '2020-08-22 00:00:00.000000', '2020-08-22 00:00:00.000000', 'Not complete', 171, '-'),
(1811, '200522123456', 'Haemophilus influenzae b (Hib) [2nd Dose]', '2020-08-22 00:00:00.000000', '2020-08-22 00:00:00.000000', 'Not complete', 171, '-'),
(1812, '200522123456', 'Inactivated Poliovirus (IPV) [2nd Dose]', '2020-08-22 00:00:00.000000', '2020-08-22 00:00:00.000000', 'Not complete', 171, '-'),
(1813, '200522123456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]', '2020-10-22 00:00:00.000000', '2020-10-22 00:00:00.000000', 'Not complete', 171, '-'),
(1814, '200522123456', 'Haemophilus influenzae b (Hib) [3rd Dose]', '2020-10-22 00:00:00.000000', '2020-10-22 00:00:00.000000', 'Not complete', 171, '-'),
(1815, '200522123456', 'Inactivated Poliovirus (IPV) [3rd Dose]', '2020-10-22 00:00:00.000000', '2020-10-22 00:00:00.000000', 'Not complete', 171, '-'),
(1816, '200522123456', 'Hepatitis B (HepB) [3rd Dose]', '2020-11-22 00:00:00.000000', '2020-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1817, '200522123456', 'Measles (Sabah only)', '2020-11-22 00:00:00.000000', '2020-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1818, '200522123456', 'Japanese Encephalitis (JE) (Sarawak only)', '2021-03-22 00:00:00.000000', '2021-03-22 00:00:00.000000', 'Not complete', 171, '-'),
(1819, '200522123456', 'Mumps, Measles, Rubella (MMR) [1st Dose]', '2021-05-22 00:00:00.000000', '2021-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1820, '200522123456', 'Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]', '2021-05-22 00:00:00.000000', '2021-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1821, '200522123456', 'Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]', '2021-11-22 00:00:00.000000', '2021-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1822, '200522123456', 'Haemophilus influenzae b (Hib) [4th Dose]', '2021-11-22 00:00:00.000000', '2021-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1823, '200522123456', 'Inactivated Poliovirus (IPV) [4th Dose]', '2021-11-22 00:00:00.000000', '2021-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1824, '200522123456', ' Japanese Encephalitis (Sarawak only) [3rd Dose]', '2021-11-22 00:00:00.000000', '2021-11-22 00:00:00.000000', 'Not complete', 171, '-'),
(1825, '200522123456', 'Japanese Encephalitis (Sarawak only) [4th Dose]', '2024-05-22 00:00:00.000000', '2024-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1826, '200522123456', 'BCG (option only if no scar found)', '2027-05-22 00:00:00.000000', '2027-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1827, '200522123456', 'Diptheria, Tetanus  (DT booster) [1st Dose]', '2027-05-22 00:00:00.000000', '2027-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1828, '200522123456', 'Mumps, Measles, Rubella (MMR) [2nd Dose]', '2027-05-22 00:00:00.000000', '2027-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1829, '200522123456', 'Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)', '2033-05-22 00:00:00.000000', '2033-05-22 00:00:00.000000', 'Not complete', 171, '-'),
(1830, '200522123456', 'Tetanus (TT)', '2035-05-22 00:00:00.000000', '2035-05-22 00:00:00.000000', 'Not complete', 171, '-');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doc_userID` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `doc_patient` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doc_userID`, `name`, `status`, `doc_patient`) VALUES
(1, '', 'Muhd Faris', 'Available', 'Nadhah'),
(2, '', 'Doctor B', 'Available', 'Siti Aina binti Amir');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(25) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mykid` varchar(20) NOT NULL,
  `placebirth` varchar(225) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `parents` varchar(100) NOT NULL,
  `nationality` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_patient`, `fullname`, `gender`, `mykid`, `placebirth`, `birthday`, `address`, `parents`, `nationality`, `phone`) VALUES
(132, 'Nadhah', 'Female', '21311212', 'Hospital Bentong', '2020-05-17', 'Kolej Kediaman Jantan', 'Nurul Izzati binti Khalid', 'Malay', '+36178888'),
(137, 'Muhammad Faris bin Jamal', 'Male', '200527065057', 'Hospital Mentakab', '2020-05-27', 'No.60 Jalan Anggerik Heights 3, Taman Anggerik Heights, 28700, Bentong, Pahang', 'Zaleha binti Othman', 'Chinese', '01117975407'),
(166, 'Sharifah Azzatul Husna', 'Female', '97081024228837', 'Hospital Shah Alam', '2020-05-06', 'Kolej Kediaman Jantan', 'Nurul Izzati binti Khalid', 'Malay', '+36178888'),
(167, 'Nur Zulaikha binti Zahir', 'Female', '200320134456', 'Hospital Kuala Lumpur, Kuala Lumpur', '2020-03-20', 'Kg. Baru, Kuala Lumpur', 'Zuliana Rahim', 'Malay', '01356789906'),
(168, 'Siti Aina binti Amir', 'Female', '200507145567', 'Hospital Kuala Lumpur, Kuala Lumpur', '2020-05-07', 'Kg. Baru, Kuala Lumpur', 'Zaleha ', 'Malay', '0178893225'),
(169, 'Sharifah Dina binti Syed Iskandar', 'Female', '200515134456', 'Hospital Shah Alam', '2020-05-15', 'Kg.Baru, Kuala Lumpur', 'Nurul Izzati binti Khalid', 'Malay', '0134567890'),
(170, 'Nur Amira binti Shah', 'Female', '200508123345', 'Hospital Johor', '2020-05-08', 'Johor Bahru, Johor', 'Nurul Aina binti Amir', 'Malay', '01345670860'),
(171, 'Siti Aina binti Adam', 'Female', '200522123456', 'Hospital Bentong', '2020-05-22', 'Johor Bahru, Johor', 'Nurul Ain', 'Malay', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(225) NOT NULL,
  `sch_patientID` varchar(225) NOT NULL,
  `patientName` varchar(225) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `mykid` varchar(225) NOT NULL,
  `month_0` date NOT NULL,
  `month0_1` date NOT NULL,
  `month_1` date NOT NULL,
  `month_2` date NOT NULL,
  `month2_1` date NOT NULL,
  `month2_2` date NOT NULL,
  `month_3` date NOT NULL,
  `month3_1` date NOT NULL,
  `month3_2` date NOT NULL,
  `month_5` date NOT NULL,
  `month5_1` date NOT NULL,
  `month5_2` date NOT NULL,
  `month_6` date NOT NULL,
  `month6_1` date NOT NULL,
  `month_10` date NOT NULL,
  `month_12` date NOT NULL,
  `month12_1` date NOT NULL,
  `month_18` date NOT NULL,
  `month18_1` date NOT NULL,
  `month18_2` date NOT NULL,
  `month18_3` date NOT NULL,
  `years_4` date NOT NULL,
  `years_7` date NOT NULL,
  `years7_1` date NOT NULL,
  `years7_2` date NOT NULL,
  `years_13` date NOT NULL,
  `years_15` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `sch_patientID`, `patientName`, `birthday`, `mykid`, `month_0`, `month0_1`, `month_1`, `month_2`, `month2_1`, `month2_2`, `month_3`, `month3_1`, `month3_2`, `month_5`, `month5_1`, `month5_2`, `month_6`, `month6_1`, `month_10`, `month_12`, `month12_1`, `month_18`, `month18_1`, `month18_2`, `month18_3`, `years_4`, `years_7`, `years7_1`, `years7_2`, `years_13`, `years_15`) VALUES
(51, '132', 'Nadhah', '2020-05-17', '21311212', '2020-05-17', '2020-05-17', '2020-06-17', '2020-07-17', '2020-07-17', '2020-07-17', '2020-08-17', '2020-08-17', '2020-08-17', '2020-10-17', '2020-10-17', '2020-10-17', '2020-11-17', '2020-11-17', '2021-03-17', '2021-05-17', '2021-05-17', '2021-11-17', '2021-11-17', '2021-11-17', '2021-11-17', '2024-05-17', '2027-05-17', '2027-05-17', '2027-05-17', '2033-05-17', '2035-05-17'),
(52, '133', 'Nur Aina', '2020-05-04', '200504145567', '2020-05-04', '2020-05-04', '2020-06-04', '2020-07-04', '2020-07-04', '2020-07-04', '2020-08-04', '2020-08-04', '2020-08-04', '2020-10-04', '2020-10-04', '2020-10-04', '2020-11-04', '2020-11-04', '2021-03-04', '2021-05-04', '2021-05-04', '2021-11-04', '2021-11-04', '2021-11-04', '2021-11-04', '2024-05-04', '2027-05-04', '2027-05-04', '2027-05-04', '2033-05-04', '2035-05-04'),
(53, '134', 'Syed Amin', '2019-01-17', '190117123445', '2019-01-17', '2019-01-17', '2019-02-17', '2019-03-17', '2019-03-17', '2019-03-17', '2019-04-17', '2019-04-17', '2019-04-17', '2019-06-17', '2019-06-17', '2019-06-17', '2019-07-17', '2019-07-17', '2019-11-17', '2020-01-17', '2020-01-17', '2020-07-17', '2020-07-17', '2020-07-17', '2020-07-17', '2023-01-17', '2026-01-17', '2026-01-17', '2026-01-17', '2032-01-17', '2034-01-17'),
(56, '137', 'Muhammad Faris bin Jamal', '2020-05-27', '200527065057', '2020-05-27', '2020-05-27', '2020-06-27', '2020-07-27', '2020-07-27', '2020-07-27', '2020-08-27', '2020-08-27', '2020-08-27', '2020-10-27', '2020-10-27', '2020-10-27', '2020-11-27', '2020-11-27', '2021-03-27', '2021-05-27', '2021-05-27', '2021-11-27', '2021-11-27', '2021-11-27', '2021-11-27', '2024-05-27', '2027-05-27', '2027-05-27', '2027-05-27', '2033-05-27', '2035-05-27'),
(65, '166', 'Sharifah Azzatul Husna', '2020-05-06', '97081024228837', '2020-05-06', '2020-05-06', '2020-06-06', '2020-07-06', '2020-07-06', '2020-07-06', '2020-08-06', '2020-08-06', '2020-08-06', '2020-10-06', '2020-10-06', '2020-10-06', '2020-11-06', '2020-11-06', '2021-03-06', '2021-05-06', '2021-05-06', '2021-11-06', '2021-11-06', '2021-11-06', '2021-11-06', '2024-05-06', '2027-05-06', '2027-05-06', '2027-05-06', '2033-05-06', '2035-05-06'),
(66, '167', 'Nur Zulaikha binti Zahir', '2020-03-20', '200320134456', '2020-03-20', '2020-03-20', '2020-04-20', '2020-05-20', '2020-05-20', '2020-05-20', '2020-06-20', '2020-06-20', '2020-06-20', '2020-08-20', '2020-08-20', '2020-08-20', '2020-09-20', '2020-09-20', '2021-01-20', '2021-03-20', '2021-03-20', '2021-09-20', '2021-09-20', '2021-09-20', '2021-09-20', '2024-03-20', '2027-03-20', '2027-03-20', '2027-03-20', '2033-03-20', '2035-03-20'),
(67, '168', 'Siti Aina binti Amir', '2020-05-07', '200507145567', '2020-05-07', '2020-05-07', '2020-06-07', '2020-07-07', '2020-07-07', '2020-07-07', '2020-08-07', '2020-08-07', '2020-08-07', '2020-10-07', '2020-10-07', '2020-10-07', '2020-11-07', '2020-11-07', '2021-03-07', '2021-05-07', '2021-05-07', '2021-11-07', '2021-11-07', '2021-11-07', '2021-11-07', '2024-05-07', '2027-05-07', '2027-05-07', '2027-05-07', '2033-05-07', '2035-05-07'),
(68, '169', 'Sharifah Dina binti Syed Iskandar', '2020-05-15', '200515134456', '2020-05-15', '2020-05-15', '2020-06-15', '2020-07-15', '2020-07-15', '2020-07-15', '2020-08-15', '2020-08-15', '2020-08-15', '2020-10-15', '2020-10-15', '2020-10-15', '2020-11-15', '2020-11-15', '2021-03-15', '2021-05-15', '2021-05-15', '2021-11-15', '2021-11-15', '2021-11-15', '2021-11-15', '2024-05-15', '2027-05-15', '2027-05-15', '2027-05-15', '2033-05-15', '2035-05-15'),
(69, '170', 'Nur Amira binti Shah', '2020-05-08', '200508123345', '2020-05-08', '2020-05-08', '2020-06-08', '2020-07-08', '2020-07-08', '2020-07-08', '2020-08-08', '2020-08-08', '2020-08-08', '2020-10-08', '2020-10-08', '2020-10-08', '2020-11-08', '2020-11-08', '2021-03-08', '2021-05-08', '2021-05-08', '2021-11-08', '2021-11-08', '2021-11-08', '2021-11-08', '2024-05-08', '2027-05-08', '2027-05-08', '2027-05-08', '2033-05-08', '2035-05-08'),
(70, '171', 'Siti Aina binti Adam', '2020-05-22', '200522123456', '2020-05-22', '2020-05-22', '2020-06-22', '2020-07-22', '2020-07-22', '2020-07-22', '2020-08-22', '2020-08-22', '2020-08-22', '2020-10-22', '2020-10-22', '2020-10-22', '2020-11-22', '2020-11-22', '2021-03-22', '2021-05-22', '2021-05-22', '2021-11-22', '2021-11-22', '2021-11-22', '2021-11-22', '2024-05-22', '2027-05-22', '2027-05-22', '2027-05-22', '2033-05-22', '2035-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

CREATE TABLE `tbl_token_auth` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password_hash` varchar(225) NOT NULL,
  `selector_hash` varchar(225) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `user_role` varchar(225) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_fullname` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_dp` varchar(225) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_role`, `user_name`, `user_fullname`, `user_email`, `user_password`, `user_dp`, `user_phone`) VALUES
(1, 'Admin', 'Leo', 'Leonardo', 'leo@gmail.com', '12345', '', ''),
(7, 'Admin', 'Nasron', 'Anak Kumar', 'nas@gmail.com', '$2y$10$CnK2zHPtcTJ/v', 'user.png', '36178888'),
(8, 'Doctor', 'Nasrun', 'Miamor', 'nass@gmail.com', '$2y$10$8dnjiegNw7zehgneWesJ/.aV4Z/GV4HCJIubCNvK/X.QIH4L/0pSK', 'user.png', '01232323232'),
(9, 'Doctor', 'Faris', 'Muhd Faris', 'muhdf174@gmail.com', '$2y$10$zwXUzYvU/lODUPgBiC4iJesw3l.XXPvq4XOBuCg4iN8nkW0AVMSEu', 'LouhPe02GHme.png', '01989898989'),
(10, 'Admin', 'Abel', 'Azzatul Husna', 'azzatul@gmail.com', '$2y$10$lfIKZSYlqxz42XBoxWx20Ow8uERSTza6BX5uP7hr94zWqj1uVNkVW', 'user.png', '01345666666'),
(11, 'Superadmin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$5mXPV6AdSFJxPXVDvJU3Te.a0TDHt6lYBpeqh1o.Sax1r4TN6oMvW', 'user.png', '36178888'),
(13, 'Doctor', 'Amir', 'Amir Aizat bin Azim', 'amir@gmail.com', '$2y$10$DKs/5jtym/ApCw2FmmEWUeBjn.OXPREHSG2NWIXDuEBIupHGpOw7C', 'user.png', '01788889800'),
(14, 'Doctor', 'Miraz', 'Siti Amira', 'amira@gmail.com', '$2y$10$Wn83oJ9HSJ31JIdmqIZBmuKjAppz34C2.KLk4mtaN3v1X1MCutZbe', '4DkZFBLG2Ume.png', '01345934456'),
(15, 'Doctor', 'Siti Aina', 'Siti Aina binti Amir', 'aina@gmail.com', '$2y$10$UcK9YrEiTNiglpNmwZb.O.ZHXtNDJbeFv4Sa5EC4mFYaML9XgpMlK', 'TSiBxVaXIAme.png', '0134567889'),
(16, 'Doctor', 'Siti Aix', 'Siti Aix binti Yakob', 'siti@y.com', '$2y$10$v.hhDm6i27KbDoyHuOGDHOrY63J/iszy6QV2QhZ.8iMiyuftkuNlK', 'user.png', '01333345678'),
(17, 'Doctor', 'Muhd Amin', 'Muhd Amin bin Syed', 'amin@gmail.com', '$2y$10$f7U/61/2zXAd0HPKpMB9wukuE8VGCee1P3/TLF8OR.WKtaLQdlBs6', 'user.png', '01389439231'),
(18, 'Pending', 'Sera', 'Nur Sera', 'sera@gmail.com', '$2y$10$RiirGfeQmSCXynBGVU8M2eXEsHpWBkDcbBx2.fmfdvGuAbLigZQ1a', 'user.png', '36178888'),
(19, 'Pending', 'abx', 'abx', 'irdina@gmail.com', '$2y$10$Cxd4LZ0a37w/1BbskTV0A.mKO53pW3CbLKcu9pywt4RYbBK4pp/k2', 'user.png', '36178888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id_appt`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id_appt` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1831;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
