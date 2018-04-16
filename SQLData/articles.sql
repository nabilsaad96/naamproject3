-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 11:02 PM
-- Server version: 5.6.39
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(10000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `date_created`, `person_id`) VALUES
(18, 'asjf;slkdfj', '2018-03-30 22:25:23', 43),
(19, 'asjf;slkdfj', '2018-03-30 22:25:27', 43),
(20, 'ja;lksdjf', '2018-03-30 22:29:48', 43),
(21, 'another comments', '2018-03-30 22:31:03', 43),
(22, 'final test hopefully works', '2018-03-30 22:33:46', 43),
(24, 'asdf', '2018-03-30 22:43:20', 42),
(25, 'asdf', '2018-03-30 22:43:22', 42),
(26, 'added a comment\n', '2018-03-30 22:44:22', 38),
(28, 'Wow. I learned so much.', '2018-03-30 22:51:54', 29),
(29, 'I love this site!', '2018-03-30 22:52:10', 29);

-- --------------------------------------------------------

--
-- Table structure for table `quick_info`
--

CREATE TABLE `quick_info` (
  `id` int(11) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `personID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quick_info`
--

INSERT INTO `quick_info` (`id`, `details`, `personID`) VALUES
(1, 'Born: April 21, 1926', 1),
(2, 'Coronation: June 2, 1953', 1),
(3, 'Reign: February 6, 1952-present', 1),
(4, 'Spouse: Prince Philip married 1947', 1),
(5, 'Child: Prince Charles', 1),
(6, 'Child: Princess Anne', 1),
(7, 'Child: Prince Andrew', 1),
(8, 'Child: Prince Edward', 1),
(14, 'ffd', 2),
(15, 'ffdsdfsfd', 2),
(28, 'sdafsdf', 1),
(31, 'hduhudhufasd', 3),
(32, 'Test Description', 1),
(33, 'fdgfdhbfvhbjfsbhlkfsdf', 0),
(34, 'DATABASE CHECK', 0),
(35, 'TESTTTTTT', 1),
(36, 'bhdahbdshbdfshbjdfsbhjfsdbhjfshbjfhbfsdhbfsd', 1),
(38, 'uio', 5),
(39, 'dsaasfdsa', 29),
(40, 'asdfasdf', 29),
(41, 'jh', 30),
(42, 'hj', 30),
(43, 'Test', 30);

-- --------------------------------------------------------

--
-- Table structure for table `royalty`
--

CREATE TABLE `royalty` (
  `id` int(11) NOT NULL,
  `fname_ortitle` varchar(100) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `info_small` varchar(500) NOT NULL DEFAULT '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras turpis turpis, tempus vel neque sit amet, pretium scelerisque est. Ut volutpat a lacus ac egestas. Donec facilisis lacus vitae sagittis sagittis. Suspendisse potenti. Nam hendrerit augue quis risus gravida, vel feugiat sem mattis. Praesent libero tellus, molestie et arcu id, volutpat euismod ante. Maecenas ut erat eu nibh semper rutrum egestas a eros. ',
  `info_large` varchar(3000) NOT NULL DEFAULT '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pharetra ex. Aliquam nec neque sagittis, dapibus odio lacinia, pellentesque libero. Duis porttitor erat nisi, rhoncus vulputate orci eleifend nec. Morbi at interdum urna. Nam scelerisque neque pharetra risus rutrum faucibus. Vestibulum quis dignissim augue. Morbi vel viverra urna, at ultrices mi. Fusce rhoncus nisl mi, eu sodales dui fringilla id. Praesent eu pellentesque erat. In convallis, urna eget varius dictum, lorem est dignissim lectus, quis mattis erat turpis at erat. Suspendisse potenti. Curabitur lacus leo, iaculis ac lacinia id, sollicitudin non neque. Maecenas accumsan commodo faucibus.  Donec volutpat mattis ante, in molestie purus aliquet sed. Vivamus ex tellus, lacinia eu ipsum id, elementum efficitur tellus. Donec a massa nec lectus suscipit sagittis. Proin mauris mi, posuere sed turpis eget, aliquet rhoncus ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec maximus mauris sed dui congue, vel mollis turpis ultricies. Donec egestas pellentesque erat, sed dapibus velit mollis nec. Integer risus elit, sollicitudin eget purus at, viverra varius odio. Vivamus iaculis ultrices risus, sed accumsan nisi. Aenean non mauris elit. Maecenas nisi elit, pharetra vitae imperdiet id, fermentum vitae nibh. Morbi feugiat facilisis mollis. Vestibulum consectetur fringilla mi in hendrerit. Maecenas ultrices urna leo. Proin iaculis, dui eget iaculis ullamcorper, urna massa aliquam ante, eget ultricies sem sem et ante. Nunc placerat lorem vitae magna maximus, eget fringilla lacus vulputate.  Morbi luctus posuere dignissim. In urna ex, ullamcorper sit amet placerat id, imperdiet in eros. Sed lectus nunc, mollis nec libero sed, mattis mattis magna. Proin vitae quam sollicitudin, gravida lacus nec, venenatis lacus. Suspendisse in risus a ex fringilla accumsan sit amet sit amet dui. Aenean sapien nisl, porta eu tincidunt non, aliquam quis nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla tincidunt ac leo sit amet condimentum. Curabitur a sollicitudin augue. Ut id condimentum lacus. Aliquam tempor felis sit amet lorem suscipit consequat. Aenean molestie faucibus lectus, fermentum consequat neque rhoncus quis.  Phasellus scelerisque imperdiet nulla, vitae rutrum magna fringilla vitae. Curabitur feugiat dolor odio, ut semper neque mollis vel. Vestibulum faucibus dui iaculis turpis ullamcorper, at cursus magna egestas. Vivamus dictum convallis aliquam. Pellentesque sagittis nunc lacus, sodales blandit tellus fermentum vel. Nam nec feugiat neque. Suspendisse sed tristique leo. In felis mi, faucibus fringilla enim sollicitudin, laoreet consequat urna. Nam at malesuada leo. ',
  `quick_info` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `royalty`
--

INSERT INTO `royalty` (`id`, `fname_ortitle`, `last_name`, `file_name`, `info_small`, `info_large`, `quick_info`) VALUES
(29, 'Chapels at Butner Dedicat', ' ', 'article1.PNG', '', 'One year ago the Camp Butner chapels were dedicated in a fitting ceremony which had amongst the speakers, post commander Col. H. W. Huntley: the post chaplain (now overseas) C. W. Hough: division champlain T. H. Reagen, and many churchmen from nearby towns. In the short time of a year, much has been done to make the chapels on the post more beautiful and inspiring and to encourage the men to seek spiritual aid.', NULL),
(30, 'Chaplain Rides Circuit in an Airplane', ' ', 'article2.PNG', '', 'The war has brought back the circuit rider, that famed clerical figure of another era, but this time he uses an airplane instead of a horse. Chaplain (Capt.) William E. Taggart, who was chaplain of the 19th bombardment group, United States army air forces, has told about it. Chaplain Taggart wears the Silver Star, awarded him for gallantry in the Southwest Pacific. An army chaplain assigned to an air corps unit in a combat theater learns that he cannot expect his men to attend his services regularly, Chaplain Taggart said. So he has to go to the men. Many times I have boarded a plane and gone to the men. hidden maybe in the jungle and awaiting a chance to attack or to fly on a defensive mission. They havent time to listen to sermons, and the chaplain has to go by each plane, give a short religious message to the pilot and the members of his crew and then hurry on to the next. It is circuit riding all over again but a little more modern than that which we had in the old days.\r\nA chaplain doesnt have to sell the Word of God to his men. His main job is seeing that religion is always made available to them. Of course, he has the never-ending job of visiting the sick and the wounded, the reviving of the spirits of the downhearted and the burying of the glorious dead. He never feels his work is through, but he also never feels that the seeds he sows do not bear fruit. All around him he can see the fruits of his work. There is a need for more and more chaplains and, even with the full quota assigned to us, there wont be enough to do the job as well as we of the church would like to see it done.\r\n', NULL),
(34, 'Pictorial Review Of The Nation In War Time', ' ', 'article3.PNG', '', 'Religious leadership at Fort Huachuca is a great factor in the extensive soldier welfare program at the post, according to Col. Edwin N. Hardy, post commander. Shown in the picture above are: left to right, Capt. Oscar W. Sedam, assistant post chaplain, Rev. I. Lynd Esch, of Los Angeles, Calif.: Lt. Col. L. J. Beasley, 92nd Division chaplain; Capt. Joseph A. Griffin, post chaplain; Rev. Harry V. Richardson, of Tuskegee, Ala., member of the Preaching Mission; Lt. Col. Roscoe C. Giles, chief, surgical service, Station Hospital No. 1; First Lt. Granville H. Martin, assistant post chaplain. 1 his group was part of the preaching mission, which was so enthusiastically received at the noted Army post', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_info`
--
ALTER TABLE `quick_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `royalty`
--
ALTER TABLE `royalty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quick_info`
--
ALTER TABLE `quick_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `royalty`
--
ALTER TABLE `royalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
