-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2013 at 12:14 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Name` varchar(30) NOT NULL,
  `Password` varchar(50) DEFAULT 'admin',
  `Mobile Number` bigint(12) DEFAULT NULL,
  `Email id` varchar(50) DEFAULT NULL,
  `Department` varchar(6) DEFAULT NULL,
  `Previleges` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Password`, `Mobile Number`, `Email id`, `Department`, `Previleges`) VALUES
('bqtmpa', '21232f297a57a5a743894a0e4a801fc3', 8721498233, 'bqtmpa@gmail.com', 'BBM', '2'),
('cujant', 'admin', 8516116863, 'cujant@gmail.com', 'PUC', '2'),
('flyvbq', 'admin', 8530146860, 'flyvbq@gmail.co.in', 'ISE', '2'),
('gtvorq', 'admin', 8586815830, 'gtvorq@msn.co.uk', 'MBA', '2'),
('ljmvaa', 'admin', 8688492194, 'ljmvaa@hotmail.co.in', 'EEE', '2'),
('omjcgp', 'admin', 8739313410, 'omjcgp@hotmail.co.jp', 'CSE', '2'),
('pqqhud', 'admin', 8645893115, 'pqqhud@gmail.com', 'CIVIL', '2'),
('pqwdex', 'admin', 8767691326, 'pqwdex@yahoo.co.in', 'MCA', '2'),
('rubitd', 'admin', 8752787534, 'rubitd@rediffmail.com', 'MTECH', '2'),
('tllzmc', 'admin', 8717926448, 'tllzmc@hotmail.co.uk', 'ECE', '2'),
('udzrhf', 'admin', 8530746921, 'udzrhf@hotmail.co.jp', 'BT', '2'),
('zjgrtx', 'admin', 8672208311, 'zjgrtx@msn.co.jp', 'TCE', '2'),
('znsuim', 'admin', 8528163080, 'znsuim@gmail.co.in', 'ME', '2');

-- --------------------------------------------------------

--
-- Table structure for table `history table`
--

CREATE TABLE IF NOT EXISTS `history table` (
  `book id` bigint(6) NOT NULL DEFAULT '0',
  `user id` bigint(6) NOT NULL DEFAULT '0',
  `Date of issual` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`book id`,`user id`,`Date of issual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live transaction`
--

CREATE TABLE IF NOT EXISTS `live transaction` (
  `user id` bigint(6) NOT NULL DEFAULT '0',
  `book id` bigint(6) NOT NULL DEFAULT '0',
  `date of issual` date DEFAULT NULL,
  `due date` date DEFAULT NULL,
  PRIMARY KEY (`user id`,`book id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live transaction`
--

INSERT INTO `live transaction` (`user id`, `book id`, `date of issual`, `due date`) VALUES
(1100, 1642, '2013-04-30', '2013-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `recommender`
--

CREATE TABLE IF NOT EXISTS `recommender` (
  `userid` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `authors` varchar(100) DEFAULT NULL,
  `edition` varchar(10) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`userid`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommender`
--

INSERT INTO `recommender` (`userid`, `title`, `authors`, `edition`, `publisher`, `feedback`) VALUES
(1100, 'fafl', 'kavi', '3', '', ''),
(10000, 'finite automata and formal languages', 'XYZ', '', '', 'need it for placements'),
(10010, 'finite automata and formal languages', 'Dr. kavi mahesh', '1', 'Winley India', 'this is the main book for FAFL subject in 4th sem.There is a shortage of this book in library'),
(10014, 'and', 'dsfs', 'j', 'lk', 'hajdab');

-- --------------------------------------------------------

--
-- Table structure for table `reservation table`
--

CREATE TABLE IF NOT EXISTS `reservation table` (
  `book id` bigint(6) NOT NULL DEFAULT '0',
  `user id` bigint(6) NOT NULL DEFAULT '0',
  `Date of reservation` date DEFAULT NULL,
  `status` enum('live','expired') DEFAULT NULL,
  PRIMARY KEY (`book id`,`user id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation table`
--

INSERT INTO `reservation table` (`book id`, `user id`, `Date of reservation`, `status`) VALUES
(0, 1100, '2013-04-28', 'live'),
(2359, 1100, '2013-04-28', 'live'),
(34111, 10014, '2013-04-27', 'live');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `book id` bigint(6) NOT NULL DEFAULT '0',
  `review id` bigint(6) DEFAULT NULL,
  PRIMARY KEY (`book id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`book id`, `review id`) VALUES
(1642, 301023),
(1985, 301024),
(2309, 301025),
(2359, 301026),
(2395, 301027),
(17725, 301028),
(17728, 301029),
(18760, 301030),
(34111, 301031),
(34126, 301032),
(34278, 301033),
(34474, 301034),
(34579, 301035),
(34772, 301036),
(34946, 301037),
(35026, 301038),
(40485, 301039),
(40643, 301040),
(80532, 301042),
(90532, 301042),
(98532, 301042);

-- --------------------------------------------------------

--
-- Table structure for table `review table`
--

CREATE TABLE IF NOT EXISTS `review table` (
  `review id` bigint(6) NOT NULL,
  `card id` bigint(6) NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`review id`,`card id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review table`
--

INSERT INTO `review table` (`review id`, `card id`, `comments`) VALUES
(301023, 10016, 'deviates from the actual topic'),
(301023, 10024, 'explains the concepts very clearly. graphics is amazing.'),
(301024, 1100, 'qwerty'),
(301024, 10019, 'has too many mistakes'),
(301024, 10055, 'does not cover the college syllabus'),
(301024, 10058, 'is not worth of spending your time'),
(301024, 10137, 'requires a dictionary to read and understand'),
(301025, 10016, 'is good only till section 3'),
(301025, 10029, 'has too many mistakes'),
(301026, 10084, 'does not have good graphics'),
(301026, 10099, 'does not cover the college syllabus'),
(301026, 10116, 'good for placement point of view'),
(301026, 10128, 'is very very good'),
(301027, 10143, 'good for placement point of view'),
(301027, 10144, 'is very very good'),
(301028, 10142, 'very bad'),
(301029, 10041, 'readable'),
(301029, 10110, 'does not have good graphics'),
(301030, 10127, 'good for placement point of view'),
(301031, 10050, 'does not have good graphics'),
(301032, 10000, 'has too many mistakes'),
(301032, 10014, 'requires a dictionary to read and understand'),
(301033, 10020, 'does not have good graphics'),
(301033, 10106, 'readable'),
(301033, 10124, 'not for beginners'),
(301033, 10133, 'readable'),
(301034, 10031, 'is very very good'),
(301034, 10064, 'deviates from the actual topic'),
(301034, 10152, 'does not cover the college syllabus'),
(301035, 10070, 'does not have good graphics'),
(301036, 10015, 'requires a dictionary to read and understand'),
(301036, 10068, 'is good only till section 3'),
(301036, 10106, 'is very very good'),
(301037, 10085, 'very bad'),
(301037, 10129, 'good for placement point of view'),
(301038, 10020, 'very bad'),
(301038, 10031, 'readable'),
(301038, 10041, 'readable'),
(301038, 10125, 'not for beginners'),
(301039, 10031, 'very bad'),
(301039, 10036, 'deviates from the actual topic'),
(301039, 10081, 'is good only till section 3'),
(301039, 10130, 'has too many mistakes'),
(301040, 10098, 'very bad'),
(301040, 10140, 'is not worth of spending your time'),
(301042, 10014, ' hahah\r\n'),
(301042, 10045, 'is very very good'),
(301042, 10053, 'is very very good'),
(301042, 10076, 'does not cover the college syllabus');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `user_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `suggestion` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`,`suggestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`user_id`, `date`, `suggestion`) VALUES
(1100, '2013-04-28', 'ascx'),
(10024, '2013-04-23', 'want 2 counters in library for issuals'),
(10024, '2013-04-23', 'we want library to be open on saturdays also');

-- --------------------------------------------------------

--
-- Table structure for table `table 3`
--

CREATE TABLE IF NOT EXISTS `table 3` (
  `Id` int(5) NOT NULL DEFAULT '0',
  `Title` varchar(84) DEFAULT NULL,
  `SubTitle` varchar(25) DEFAULT NULL,
  `Authors` varchar(47) DEFAULT NULL,
  `Volume` int(1) DEFAULT NULL,
  `Publisher` varchar(26) DEFAULT NULL,
  `Edition` varchar(8) DEFAULT NULL,
  `Department` varchar(15) DEFAULT NULL,
  `Price` decimal(6,2) DEFAULT NULL,
  `Subject` varchar(30) DEFAULT NULL,
  `Keywords` varchar(61) DEFAULT NULL,
  `Reference` varchar(3) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 3`
--

INSERT INTO `table 3` (`Id`, `Title`, `SubTitle`, `Authors`, `Volume`, `Publisher`, `Edition`, `Department`, `Price`, `Subject`, `Keywords`, `Reference`, `Status`) VALUES
(1642, 'Mechanical estimating and costing: Including project planning', '', 'Banga T R\r\nSharma S C', 0, 'New Delhi : Khanna,', '1st ed.', 'Central Library', 22.50, '', 'Mechanical estimating', 'No', 'not available'),
(1985, 'Basic engineering thermodynamics', '', 'Choudhury, T Roy', 0, 'T M H, Delhi', '', 'Central Library', 48.00, '', 'Thermodynamics', 'No', 'available'),
(2309, 'Electronic measurements and instrumentation', '', 'Oliver, Bernard M  Ed.\r\nCage, John M  Ed.', 0, 'M H B', '', 'Central Library', 13.95, '', '', 'No', 'available'),
(2359, 'Fundamentals of gas dynamics', '', 'Yadao K L', 0, 'New Delhi : Khanna,', '', 'Central Library', 25.00, '', 'Gas dynamics', 'No', 'available'),
(2395, 'The alternating current circuit', '', 'Rieger, Heinz', 0, 'New Delhi : Wiley Eastern,', '', 'Central Library', 25.00, '', 'Circuits', 'Yes', 'available'),
(17725, 'Wireless digital communications: Modulation and spread spectrum applications', '', 'Feher, Kamilo', 0, 'New Delhi : PHI,', '', 'Central Library', 275.00, '', 'Wireless communications\r\nDigital communications', 'No', 'available'),
(17728, 'Reference book for composites technology  V1', '', 'Lee, Stuart M. Ed.', 0, 'Technomic, Lancaster', '', 'Central Library', 4818.00, '', 'Composite technology', 'Yes', 'available'),
(18760, 'Control systems engineering', '', 'Nagrath, I J\r\nGopal, M', 0, 'Bangalore : New Age, ', ' 3rd ed.', 'Central Library', 240.00, '', 'Control systems', 'No', 'available'),
(34111, 'Advanced quantum mechanics', '', 'Sakurai, J. J', 0, 'Pearson', '', 'Central Library', 295.00, '', 'Advanced,quantum,mechanics', 'Yes', 'available'),
(34126, 'Advances in life sciences', '', 'Arvind Kumar\r\nSingh, Lalan Kumar', 0, 'APH publ.', '', 'Central Library', 1995.00, '', 'Advances,sciences', 'Yes', 'available'),
(34278, 'Chemical engineering V.6 : chemical engineering design', '', 'Sinnott, R K\r\nCoulson\r\nRichardson''s', 0, 'Butterworth', '3rd ed.', 'Central Library', 675.00, '', 'Chemical,engineering,V.6,:,chemical,engineering', 'No', 'available'),
(34474, 'STL tutorial and reference guide: C++ programming with the standard template library', '', 'Musser, David R\r\nDerge, Gillmer J\r\nSaini, Atul', 0, 'Pearson', '', 'Central Library', 350.00, '', 'STL,tutorial,guide:,C++,programming,standard,template,library', 'No', 'available'),
(34579, 'Digital principles and design', '', 'Givone, Donald D', 0, 'TMH', '', 'IS', 0.00, '', 'Digital', 'No', 'available'),
(34772, 'General intelligence for students', '', 'James, B', 0, '', '', 'Central Library', 60.00, '', 'intelligence', 'Yes', 'available'),
(34946, 'Power of mind', '', 'Gillchrest, Muriel Nayes', 0, 'Crest', '', 'Central Library', 125.00, '', 'mind', 'Yes', 'available'),
(35026, 'Text book of data interpretation and data sufficiency : a modern approach', '', 'Singh, G P\r\nRakesh Kumar', 0, 'Kiran', '1st ed.', 'Central Library', 150.00, '', 'interpretation,sufficiency,:', 'Yes', 'available'),
(40485, 'Cost accounting : principles and practice', '', 'Jain, S P\r\nNarang, K L', 0, 'Kalyani', '', 'Central Library', 290.00, '', 'Cost,accounting,:', 'No', 'available'),
(40643, 'The electronics handbook', '', 'Whitaker, Jerry C.ed\r\nDorf, Richard C ed', 0, 'CRC Press', '', 'CS', 1000.00, '', 'electronics', 'No', 'available'),
(43951, 'Management of business logistics : a supply chain perspective', '', 'Coyle, John J; Bardi, Edward J; Langley, C John', 0, 'Thomson', '7th ed.', 'Central Library', 425.00, '', 'Management,business,logistics,:,supply,chain', 'Yes', 'available'),
(80532, 'Data Mining', 'A top down approach', 'Alfred Aho', 0, 'TMH', '1', 'CSE', 550.00, 'Computer Science', 'data,mining,database', 'Yes', 'available'),
(90532, 'Data Mining', 'A top down approach', 'Alfred Aho', 0, 'TMH', '1', 'CSE', 550.00, 'Computer Science', 'data,mining,database', 'Yes', 'available'),
(98532, 'Data Mining', 'A top down approach', 'Alfred Aho', 0, 'TMH', '1', 'CSE', 550.00, 'Computer Science', 'data,mining,database', 'Yes', 'available'),
(98564, 'Data Mining', 'A top down approach', 'Alfred Aho', 0, 'TMH', '1', 'CSE', 550.00, 'Computer Science', 'data,mining,database', 'Yes', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Card Number` bigint(6) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL DEFAULT 'pesit',
  `Mobile Number` bigint(12) DEFAULT NULL,
  `Email id` varchar(50) DEFAULT NULL,
  `Department` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Card Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='contains information about the users' AUTO_INCREMENT=10161 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Card Number`, `Name`, `Password`, `Mobile Number`, `Email id`, `Department`) VALUES
(1100, 'sunad', '7998730c62c4a8d0bb98f1bfb41ab56f', 9900959033, 'sunadbhandary@gmail.com', 'CSE'),
(10000, 'sunad', '7998730c62c4a8d0bb98f1bfb41ab56f', 9900959033, 'sunad_bhandary@yahoo.co.in', 'ISE'),
(10001, 'Abdus', 'pesit', 321654987, 'abdusster@gmail.com', 'CSE'),
(10005, 'alok', 'pesit', 47576287, 'alok@gmail.com', 'CSE'),
(10006, 'abhishek', 'pesit', -812013448, 'abhishek@gmail.com', 'CSE'),
(10007, 'abhishek', 'pesit', 7986521450, 'abhishek@gmail.com', 'CSE'),
(10009, 'lsykxi', 'pesit', 9745338676, 'lsykxi@hotmail.co.uk', 'MTECH'),
(10010, 'chlfur', 'pesit', 9532678384, 'chlfur@yahoo.com', 'CSE'),
(10011, 'nsttzs', 'pesit', 9742147975, 'nsttzs@msn.co.in', 'CIVIL'),
(10012, 'kszser', 'pesit', 9534241593, 'kszser@yahoo.co.jp', 'ME'),
(10013, 'rzmvwf', 'pesit', 9795123062, 'rzmvwf@yahoo.com', 'CSE'),
(10014, 'bwddkb', '21966429d7aa777d6f444b587a63bed6', 9789648044, 'bwddkb@rediffmail.co.jp', 'MTECH'),
(10015, 'fltkig', 'pesit', 9613687796, 'fltkig@rediffmail.com', 'ISE'),
(10016, 'obyrfc', 'pesit', 9689942393, 'obyrfc@msn.com', 'ISE'),
(10017, 'swyszs', 'pesit', 9594838645, 'swyszs@yahoo.com', 'ME'),
(10018, 'nurhxk', 'pesit', 9779936367, 'nurhxk@rediffmail.co.in', 'MTECH'),
(10019, 'mowxws', 'pesit', 9677642808, 'mowxws@rediffmail.co.uk', 'PUC'),
(10020, 'znuurt', 'pesit', 9746036861, 'znuurt@msn.com', 'TCE'),
(10021, 'nvwlce', 'pesit', 9676803185, 'nvwlce@yahoo.com', 'CIVIL'),
(10022, 'atblfw', 'pesit', 9604417462, 'atblfw@hotmail.co.jp', 'CIVIL'),
(10023, 'asjdhc', 'pesit', 9734668401, 'asjdhc@yahoo.co.uk', 'ECE'),
(10024, 'eoxplf', 'pesit', 9776427342, 'eoxplf@hotmail.co.in', 'PUC'),
(10025, 'gewofb', 'pesit', 9523176259, 'gewofb@gmail.co.uk', 'PUC'),
(10026, 'udstpr', 'pesit', 9637652415, 'udstpr@rediffmail.com', 'ME'),
(10027, 'pcuuwn', 'pesit', 9648619396, 'pcuuwn@yahoo.co.jp', 'MBA'),
(10028, 'tsifsj', 'pesit', 9760506482, 'tsifsj@msn.co.in', 'CIVIL'),
(10029, 'gipglv', 'pesit', 9541945081, 'gipglv@yahoo.co.in', 'EEE'),
(10030, 'nuwcuf', 'pesit', 9595978846, 'nuwcuf@msn.co.in', 'MCA'),
(10031, 'mklmmd', 'pesit', 9760455399, 'mklmmd@yahoo.com', 'BBM'),
(10032, 'rrzpwn', 'pesit', 9676897515, 'rrzpwn@hotmail.co.in', 'TCE'),
(10033, 'xodexa', 'pesit', 9790441976, 'xodexa@msn.com', 'BBM'),
(10034, 'dwaqlo', 'pesit', 9616119698, 'dwaqlo@rediffmail.co.uk', 'EEE'),
(10035, 'vksyfk', '21966429d7aa777d6f444b587a63bed6', 9588082147, 'vksyfk@msn.co.jp', 'CIVIL'),
(10036, 'lljqzu', 'pesit', 9773957641, 'lljqzu@hotmail.co.uk', 'BBM'),
(10037, 'kzhtgg', 'pesit', 9716541572, 'kzhtgg@gmail.com', 'CIVIL'),
(10038, 'iqlhle', 'pesit', 9564124361, 'iqlhle@msn.co.jp', 'BBM'),
(10039, 'weybyu', 'pesit', 9703625759, 'weybyu@yahoo.com', 'MTECH'),
(10040, 'rwnqub', 'pesit', 9544883568, 'rwnqub@rediffmail.co.in', 'CIVIL'),
(10041, 'mdudol', 'pesit', 9530659161, 'librarypesit@gmail.com', 'PUC'),
(10042, 'pzlbkm', 'pesit', 9760885028, 'pzlbkm@gmail.co.uk', 'ECE'),
(10043, 'tkafta', 'pesit', 9604151568, 'tkafta@msn.co.in', 'EEE'),
(10044, 'rfwszz', 'pesit', 9772600874, 'rfwszz@gmail.co.in', 'ME'),
(10045, 'wwguqb', 'pesit', 9651128027, 'wwguqb@msn.co.jp', 'BBM'),
(10046, 'tihxgf', 'pesit', 9783640829, 'tihxgf@yahoo.co.uk', 'CIVIL'),
(10047, 'ogcqqv', 'pesit', 9758631789, 'ogcqqv@hotmail.co.in', 'TCE'),
(10048, 'vbqnwr', 'pesit', 9680232568, 'vbqnwr@gmail.co.in', 'CSE'),
(10049, 'xorybh', 'pesit', 9745963705, 'xorybh@yahoo.co.in', 'CIVIL'),
(10050, 'luegbc', 'pesit', 9615936349, 'luegbc@rediffmail.com', 'BT'),
(10051, 'wfbvxv', 'pesit', 9590410987, 'wfbvxv@rediffmail.co.jp', 'TCE'),
(10052, 'rhihib', 'pesit', 9529687738, 'rhihib@rediffmail.co.in', 'MCA'),
(10053, 'dvmgvl', 'pesit', 9558360074, 'dvmgvl@msn.co.jp', 'ME'),
(10054, 'aldrhf', 'pesit', 9660907212, 'aldrhf@gmail.com', 'ISE'),
(10055, 'gzpwrr', 'pesit', 9670423995, 'gzpwrr@rediffmail.co.uk', 'ECE'),
(10056, 'racmya', 'pesit', 9702805231, 'racmya@hotmail.com', 'ISE'),
(10057, 'mhcwux', 'pesit', 9790695283, 'mhcwux@yahoo.co.in', 'CIVIL'),
(10058, 'yoaztj', 'pesit', 9517393934, 'yoaztj@hotmail.co.jp', 'TCE'),
(10059, 'omkqrc', 'pesit', 9538827767, 'omkqrc@rediffmail.co.in', 'EEE'),
(10060, 'glwyws', 'pesit', 9563483171, 'glwyws@msn.co.uk', 'ME'),
(10061, 'kqjbbl', 'pesit', 9751196683, 'kqjbbl@rediffmail.co.jp', 'TCE'),
(10062, 'kreohc', 'pesit', 9712843270, 'kreohc@rediffmail.co.in', 'BBM'),
(10063, 'dagxpz', 'pesit', 9579331230, 'dagxpz@hotmail.co.uk', 'ECE'),
(10064, 'hoqvfs', 'pesit', 9654129959, 'hoqvfs@msn.co.in', 'PUC'),
(10065, 'owexrm', 'pesit', 9746867788, 'owexrm@rediffmail.co.in', 'ISE'),
(10066, 'kziyit', 'pesit', 9713857892, 'kziyit@yahoo.co.in', 'MTECH'),
(10067, 'jxsznq', 'pesit', 9685620779, 'jxsznq@gmail.co.uk', 'BT'),
(10068, 'whrwct', 'pesit', 9552357259, 'whrwct@yahoo.co.in', 'EEE'),
(10069, 'pyunxj', 'pesit', 9737634369, 'pyunxj@gmail.co.jp', 'ISE'),
(10070, 'luyyuu', 'pesit', 9547383275, 'luyyuu@rediffmail.co.uk', 'BBM'),
(10071, 'vorbsd', 'pesit', 9672317630, 'vorbsd@msn.co.in', 'PUC'),
(10072, 'epaokm', 'pesit', 9702124021, 'epaokm@gmail.co.jp', 'ME'),
(10073, 'hslruq', 'pesit', 9738135599, 'hslruq@msn.com', 'BBM'),
(10074, 'xugknt', 'pesit', 9637348240, 'xugknt@yahoo.co.uk', 'TCE'),
(10075, 'xzqzmu', 'pesit', 9618357273, 'xzqzmu@gmail.com', 'CIVIL'),
(10076, 'smicoz', 'pesit', 9612966785, 'smicoz@hotmail.com', 'PUC'),
(10077, 'pygfpy', 'pesit', 9518470019, 'pygfpy@rediffmail.co.in', 'MCA'),
(10078, 'ovgdof', 'pesit', 9711369792, 'ovgdof@hotmail.co.jp', 'MTECH'),
(10079, 'duvuew', 'pesit', 9635878196, 'duvuew@hotmail.co.in', 'ME'),
(10080, 'iilrsc', 'pesit', 9738278730, 'iilrsc@gmail.com', 'EEE'),
(10081, 'dfacsj', 'pesit', 9718444786, 'dfacsj@rediffmail.co.in', 'MTECH'),
(10082, 'ohnnbp', 'pesit', 9592611169, 'ohnnbp@yahoo.com', 'PUC'),
(10083, 'fgecnt', 'pesit', 9646726242, 'fgecnt@hotmail.co.jp', 'CSE'),
(10084, 'sjyoiq', 'pesit', 9780675710, 'sjyoiq@gmail.co.jp', 'MCA'),
(10085, 'pxoioy', 'pesit', 9719908226, 'pxoioy@yahoo.co.in', 'PUC'),
(10086, 'ujnbhp', 'pesit', 9677750445, 'ujnbhp@msn.co.jp', 'CIVIL'),
(10087, 'wbffei', 'pesit', 9719888152, 'wbffei@hotmail.co.in', 'MTECH'),
(10088, 'qblqhk', 'pesit', 9627732407, 'qblqhk@gmail.co.in', 'MBA'),
(10089, 'xmnkpf', 'pesit', 9669044106, 'xmnkpf@gmail.co.jp', 'EEE'),
(10090, 'wgylbf', 'pesit', 9528187287, 'wgylbf@yahoo.co.jp', 'TCE'),
(10091, 'jqsljh', 'pesit', 9681697372, 'jqsljh@gmail.co.uk', 'PUC'),
(10092, 'xpligj', 'pesit', 9662204112, 'xpligj@rediffmail.co.jp', 'MCA'),
(10093, 'rjieas', 'pesit', 9753917655, 'rjieas@gmail.co.in', 'PUC'),
(10094, 'uaqyxf', 'pesit', 9597727700, 'uaqyxf@hotmail.co.uk', 'BT'),
(10095, 'owxstv', 'pesit', 9686767547, 'owxstv@yahoo.co.in', 'ECE'),
(10096, 'mvrzvi', 'pesit', 9770548876, 'mvrzvi@yahoo.co.jp', 'MCA'),
(10097, 'ukwpcs', 'pesit', 9694381457, 'ukwpcs@rediffmail.co.in', 'MCA'),
(10098, 'zcezla', 'pesit', 9532036954, 'zcezla@hotmail.co.uk', 'ECE'),
(10099, 'xxcrxi', 'pesit', 9624837884, 'xxcrxi@rediffmail.com', 'TCE'),
(10100, 'icfdzs', 'pesit', 9560959405, 'icfdzs@yahoo.co.uk', 'MBA'),
(10101, 'sgujsg', 'pesit', 9735168457, 'sgujsg@hotmail.com', 'TCE'),
(10102, 'qvhtkx', 'pesit', 9543961087, 'qvhtkx@yahoo.co.in', 'MCA'),
(10103, 'wsdxwg', 'pesit', 9599873437, 'wsdxwg@rediffmail.co.uk', 'BBM'),
(10104, 'bqzwms', 'pesit', 9777733246, 'bqzwms@hotmail.co.uk', 'TCE'),
(10105, 'hufkgy', 'pesit', 9673254035, 'hufkgy@hotmail.co.uk', 'BBM'),
(10106, 'wtocez', 'pesit', 9604430531, 'wtocez@rediffmail.co.jp', 'TCE'),
(10107, 'xlmvrn', 'pesit', 9700045230, 'xlmvrn@msn.co.jp', 'CIVIL'),
(10108, 'jcphzr', 'pesit', 9680736351, 'jcphzr@rediffmail.com', 'MBA'),
(10109, 'qibjep', 'pesit', 9531103471, 'qibjep@msn.co.jp', 'MTECH'),
(10110, 'pxsgnv', 'pesit', 9570609620, 'pxsgnv@msn.co.in', 'BBM'),
(10111, 'qcipgr', 'pesit', 9756311375, 'qcipgr@rediffmail.co.in', 'BT'),
(10112, 'hwilzv', 'pesit', 9517961176, 'hwilzv@gmail.co.in', 'CSE'),
(10113, 'hgwoof', 'pesit', 9557651014, 'hgwoof@yahoo.co.in', 'CSE'),
(10114, 'vpkkzi', 'pesit', 9678998322, 'vpkkzi@hotmail.co.uk', 'BT'),
(10115, 'pfkkso', 'pesit', 9664686737, 'pfkkso@msn.co.jp', 'ME'),
(10116, 'heqsyd', 'pesit', 9776444116, 'heqsyd@rediffmail.co.jp', 'BT'),
(10117, 'jgqbrh', 'pesit', 9560796102, 'jgqbrh@yahoo.co.uk', 'CSE'),
(10118, 'qnuwsg', 'pesit', 9747295835, 'qnuwsg@yahoo.com', 'BBM'),
(10119, 'nnqcai', 'pesit', 9524599224, 'nnqcai@gmail.com', 'MCA'),
(10120, 'xzfsco', 'pesit', 9696358700, 'xzfsco@rediffmail.co.jp', 'ECE'),
(10121, 'musrvr', 'pesit', 9651664242, 'musrvr@gmail.co.in', 'CIVIL'),
(10122, 'xrbwdx', 'pesit', 9556186839, 'xrbwdx@rediffmail.co.uk', 'ECE'),
(10123, 'ibjudu', 'pesit', 9641384197, 'ibjudu@gmail.co.jp', 'ME'),
(10124, 'bpuzby', 'pesit', 9781334173, 'bpuzby@hotmail.co.uk', 'BBM'),
(10125, 'qrptoq', 'pesit', 9635989787, 'qrptoq@gmail.co.uk', 'ISE'),
(10126, 'lqcdvh', 'pesit', 9550567260, 'lqcdvh@msn.co.in', 'ME'),
(10127, 'ggpmov', 'pesit', 9772612210, 'ggpmov@msn.co.uk', 'MBA'),
(10128, 'yctmwf', 'pesit', 9658819555, 'yctmwf@msn.co.uk', 'ISE'),
(10129, 'fraxbx', 'pesit', 9563723815, 'fraxbx@gmail.co.in', 'MCA'),
(10130, 'kuzkqq', 'pesit', 9786400571, 'kuzkqq@gmail.co.in', 'MBA'),
(10131, 'okhamp', 'pesit', 9676817666, 'okhamp@rediffmail.co.uk', 'MBA'),
(10132, 'pszuhe', 'pesit', 9667846319, 'pszuhe@yahoo.co.in', 'PUC'),
(10133, 'bzjtsp', 'pesit', 9705006224, 'bzjtsp@gmail.co.uk', 'EEE'),
(10134, 'yvvfnk', 'pesit', 9571850256, 'yvvfnk@msn.co.jp', 'ME'),
(10135, 'jsrgwf', 'pesit', 9647216793, 'jsrgwf@rediffmail.co.jp', 'BBM'),
(10136, 'hwmrti', 'pesit', 9732501454, 'hwmrti@hotmail.co.jp', 'BT'),
(10137, 'mnkwuu', 'pesit', 9643025794, 'mnkwuu@msn.com', 'ISE'),
(10138, 'usnpel', 'pesit', 9796401102, 'usnpel@msn.co.uk', 'ME'),
(10139, 'tgpvkf', 'pesit', 9680485515, 'tgpvkf@msn.co.uk', 'ME'),
(10140, 'kqozqb', 'pesit', 9523490355, 'kqozqb@rediffmail.co.uk', 'ECE'),
(10141, 'wyjkta', 'pesit', 9770118714, 'wyjkta@yahoo.com', 'BT'),
(10142, 'urtmdj', 'pesit', 9603225230, 'urtmdj@hotmail.co.in', 'TCE'),
(10143, 'niwoaw', 'pesit', 9658624804, 'niwoaw@hotmail.com', 'PUC'),
(10144, 'xtzjbi', 'pesit', 9684119585, 'xtzjbi@msn.co.jp', 'ISE'),
(10145, 'wswlhi', 'pesit', 9743225069, 'wswlhi@yahoo.co.in', 'MTECH'),
(10146, 'yduxdh', 'pesit', 9542793179, 'yduxdh@msn.co.in', 'CIVIL'),
(10147, 'hojpoa', 'pesit', 9764742210, 'hojpoa@gmail.co.jp', 'MTECH'),
(10148, 'hvlbno', 'pesit', 9594987393, 'hvlbno@msn.com', 'ME'),
(10149, 'iyeaov', 'pesit', 9626082292, 'iyeaov@msn.co.jp', 'BBM'),
(10150, 'jhshtt', 'pesit', 9535167885, 'jhshtt@msn.co.uk', 'ECE'),
(10151, 'yvbqwy', 'pesit', 9785022418, 'yvbqwy@yahoo.co.uk', 'MBA'),
(10152, 'antymo', 'pesit', 9654296296, 'antymo@hotmail.co.uk', 'CIVIL'),
(10153, 'gpidlj', 'pesit', 9771800973, 'gpidlj@rediffmail.co.jp', 'CIVIL'),
(10154, 'aeszns', 'pesit', 9552348374, 'aeszns@msn.co.in', 'EEE'),
(10155, 'pktllz', 'pesit', 9603153371, 'pktllz@hotmail.co.jp', 'CIVIL'),
(10156, 'bzjgrt', 'pesit', 9776655250, 'bzjgrt@msn.co.jp', 'MBA'),
(10157, 'udzrhf', 'pesit', 9726795002, 'udzrhf@hotmail.co.jp', 'ECE'),
(10158, 'ssb', '21966429d7aa777d6f444b587a63bed6', NULL, NULL, NULL),
(10159, 'ssb', '21966429d7aa777d6f444b587a63bed6', NULL, NULL, NULL),
(10160, 'ssb', '21966429d7aa777d6f444b587a63bed6', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
