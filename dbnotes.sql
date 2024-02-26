

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblnotes`
--

CREATE TABLE `tblnotes` (
  `notesId` int(11) NOT NULL,
  `tilte` text NOT NULL,
  `dateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotes`
--

INSERT INTO `tblnotes` (`notesId`, `tilte`, `dateCreated`) VALUES
(100, 'a', '2024-02-26'),
(109, 'zzzzzzzzzzz', '2024-02-26'),
(110, 'zxzczxczxczx', '2024-02-26'),
(111, 'ADOBO', '2024-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `tblnote_list`
--

CREATE TABLE `tblnote_list` (
  `listId` int(11) NOT NULL,
  `notesId` int(11) NOT NULL,
  `list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnote_list`
--

INSERT INTO `tblnote_list` (`listId`, `notesId`, `list`) VALUES
(3, 100, 'Pork'),
(4, 100, 'Toyo'),
(5, 100, 'Vinegar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`notesId`);

--
-- Indexes for table `tblnote_list`
--
ALTER TABLE `tblnote_list`
  ADD PRIMARY KEY (`listId`),
  ADD KEY `tblnote_list_ibfk_1` (`notesId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `notesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tblnote_list`
--
ALTER TABLE `tblnote_list`
  MODIFY `listId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblnote_list`
--
-- ALTER TABLE `tblnote_list`
--   ADD CONSTRAINT `tblnote_list_ibfk_1` FOREIGN KEY (`notesId`) REFERENCES `tblnotes` (`notesId`) ON UPDATE CASCADE;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
