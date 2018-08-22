-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2018 at 07:11 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambica`
--

-- --------------------------------------------------------

--
-- Table structure for table `am_admin`
--

CREATE TABLE `am_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rites` varchar(10) NOT NULL,
  `last_logged` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_admin`
--

INSERT INTO `am_admin` (`id`, `username`, `email`, `password`, `rites`, `last_logged`, `last_updated`) VALUES
(1, 'admin', 'jigarpandya7375@gmail.com', 'YWRtaW4=', '1111111', '2018-06-21 17:39:26', '2013-03-31 09:51:49'),
(2, 'dipubhai', 'info@ambicacaterers.in', 'ZGlwdWJoYWkxMjM=', '11011111', '2018-06-21 17:52:50', '2018-06-21 17:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `am_category`
--

CREATE TABLE `am_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `cat_desc` longtext NOT NULL,
  `cat_image` varchar(300) NOT NULL,
  `cat_date` date NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_category`
--

INSERT INTO `am_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`, `cat_date`, `status`) VALUES
(1, 'MOCKTAILS', 'MOCKTAILS DESCRIPTION....ADD...HERE', 'am_cat_1364782670.jpg', '2013-04-01', 'ACTIVE'),
(2, 'COLD APPETIZER', 'COLD APPETIZER DESCRIPTION HERE.....', 'am_cat_1364782945.jpg', '2013-04-01', 'ACTIVE'),
(3, 'THANDAI', 'THANDAI DESCRIPT COMES HERE..', 'am_cat_1364783407.jpg', '2013-04-01', 'ACTIVE'),
(4, 'HOT  APPETIZER', 'HOT  APPETIZER DESCRIPTION GOES HERE....', 'am_cat_1364783667.jpg', '2013-04-01', 'ACTIVE'),
(5, 'STARTER', 'STARTER DESCRIPT ON GOES HERE....', 'am_cat_1364784260.jpg', '2013-04-01', 'ACTIVE'),
(6, 'CHAAT', 'CHAAT DESCRIPTION GOES HERE...', 'am_cat_1364784714.jpg', '2013-04-01', 'ACTIVE'),
(7, 'RAJWADI MITHAI', 'RAJWADI MITHAI DESCRIPTON GOES HERE..', 'am_cat_1364785945.jpg', '2013-04-01', 'ACTIVE'),
(8, 'MITHAI', 'MITHAI DESCRIPTION GOES HERE...', 'am_cat_1364786567.jpg', '2013-04-01', 'ACTIVE'),
(9, 'BENGALI MITHAI', 'BENGALI MITHAI description goes here..', 'am_cat_1364788045.jpg', '2013-04-01', 'ACTIVE'),
(10, 'LIVE TAVA SWEET', 'LIVE TAVA SWEET description goes here...', 'am_cat_1364788146.jpg', '2013-04-01', 'ACTIVE'),
(11, 'FARSAN', 'FARSAN description goes here...', 'am_cat_1364788588.jpg', '2013-04-01', 'ACTIVE'),
(12, 'BOIL FARSAN', 'BOIL FARSAN DESCRIPTION GOES HERE...', 'am_cat_1364789386.jpg', '2013-04-01', 'ACTIVE'),
(13, 'TANDUR / NAN / PURI', 'TANDUR / NAN / PURI DESCRIPTON GOES HERE..', 'am_cat_1364789749.jpg', '2013-04-01', 'ACTIVE'),
(14, 'PUNJABI SABJI', 'PUNJABI SABJI deslajdsf goes here...', 'am_cat_1364790259.jpg', '2013-04-01', 'ACTIVE'),
(15, 'GUJARATI SABJI', 'GUJARATI SABJI DESCRIPTIO GOES HERE...', 'am_cat_1364792382.jpg', '2013-04-01', 'ACTIVE'),
(16, 'SALAD', 'SALAD descripton goes here...', 'am_cat_1364793387.jpg', '2013-04-01', 'ACTIVE'),
(17, 'TALVANI', 'TALVANI description goes here...', 'am_cat_1364793709.jpg', '2013-04-01', 'ACTIVE'),
(18, 'RAITA', 'RAITA Description goes here...', 'am_cat_1364793927.jpg', '2013-04-01', 'ACTIVE'),
(19, 'CHATNI', 'CHATNI description goes here..', 'am_cat_1364794144.jpg', '2013-04-01', 'ACTIVE'),
(20, 'PICKLES', 'PICKLES description goes here..', 'am_cat_1364794413.jpg', '2013-04-01', 'ACTIVE'),
(21, 'DAL / KADHI', 'DAL / KADHI DESC. GOES HERE.', 'am_cat_1364796085.jpg', '2013-04-01', 'ACTIVE'),
(22, 'PULAV', 'PULAV des. here...', 'am_cat_1364796464.jpg', '2013-04-01', 'ACTIVE'),
(23, 'KHICHADI', 'KHICHADI desc Goes here..', 'am_cat_1364796631.jpg', '2013-04-01', 'ACTIVE'),
(24, 'SOUTH INDIAN', 'SOUTH INDIAN DES. GOES HERE...', 'am_cat_1364796880.jpg', '2013-04-01', 'ACTIVE'),
(25, 'KATHIYAWADI', 'KATHIYAWADI DESC..GOES...HERE...', 'am_cat_1364797242.jpg', '2013-04-01', 'ACTIVE'),
(26, 'RAJASTHANI', 'RAJASTHANI des. goes here..', 'am_cat_1364797464.jpg', '2013-04-01', 'ACTIVE'),
(27, 'CHINESE', 'CHINESE DES GOES HERE..', 'am_cat_1364797671.jpg', '2013-04-01', 'ACTIVE'),
(28, 'MAXICAN', 'MAXICAN desc. goes here...', 'am_cat_1364798011.jpg', '2013-04-01', 'ACTIVE'),
(29, 'BAKED DISH', 'BAKED DISH DESC GOES HERE....', 'am_cat_1364798738.jpg', '2013-04-01', 'ACTIVE'),
(30, 'LIVE PASTA WITH', 'LIVE PASTA WITH DESC. GOES HERE.', 'am_cat_1364798958.jpg', '2013-04-01', 'ACTIVE'),
(31, 'ICE - CREAM', 'ICE - CREAM DESC GOES HERE...\r\n', 'am_cat_1364799064.jpg', '2013-04-01', 'ACTIVE'),
(32, 'DESSERT', 'DESSERT GOES HERE..', 'am_cat_1364799451.jpg', '2013-04-01', 'ACTIVE'),
(33, 'FOR EVER', 'FOR EVER DES. GOES HERE...', 'am_cat_1364799673.jpg', '2013-04-01', 'ACTIVE'),
(34, 'MUKHWAS', 'MUKHWAS DES. GOES HERE.', 'am_cat_1364799936.jpg', '2013-04-01', 'ACTIVE'),
(35, 'AT LAST', 'AT LAST des. goes here..', 'am_cat_1364800126.jpg', '2013-04-01', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `am_faraskhana`
--

CREATE TABLE `am_faraskhana` (
  `fk_id` int(11) NOT NULL,
  `fk_title` varchar(200) NOT NULL,
  `fk_desc` longtext NOT NULL,
  `fk_image` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `fk_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_faraskhana`
--

INSERT INTO `am_faraskhana` (`fk_id`, `fk_title`, `fk_desc`, `fk_image`, `status`, `fk_date`) VALUES
(1, 'Ambica Caterers', 'Enjoy the Fresh food... Not frozen...', 'am_main_1529231405.jpg', 'ACTIVE', '2013-04-22'),
(2, 'Ambica Caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231702.jpg', 'ACTIVE', '2013-04-22'),
(3, 'Ambica Caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231436.jpg', 'ACTIVE', '2013-05-28'),
(4, 'Ambica caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231450.jpg', 'ACTIVE', '2016-03-17'),
(6, 'Ambica Caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231872.jpg', 'ACTIVE', '2018-06-17'),
(7, 'Ambica caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231961.jpg', 'ACTIVE', '2018-06-17'),
(8, 'Ambica caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529231989.jpg', 'ACTIVE', '2018-06-17'),
(9, 'Ambica caterers', 'Enjoy our Delicious desserts with love...', 'am_main_1529233175.jpg', 'ACTIVE', '2018-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `am_mail`
--

CREATE TABLE `am_mail` (
  `mail_id` int(11) NOT NULL,
  `mail_title` varchar(200) NOT NULL,
  `mail_content` longtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_mail`
--

INSERT INTO `am_mail` (`mail_id`, `mail_title`, `mail_content`, `status`) VALUES
(1, 'Content 1', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n<!--general stylesheet-->\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td><!--container-->\r\n			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:626px">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align:middle">\r\n						<table align="center" border="0" cellpadding="0" cellspacing="0" style="height:97px; width:579px">\r\n							<tbody>\r\n								<tr>\r\n									<td style="text-align:left; vertical-align:middle"><img alt="" src="http://webstuffs.in/images/logo.png" style="display:block; height:50px; margin:4px 0px 0px; width:200px" /></td>\r\n									<td style="text-align:left; vertical-align:middle">\r\n									<h1><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Web Stuffs.in</strong></h1>\r\n									</td>\r\n									<td style="text-align:center; vertical-align:middle">\r\n									<h2>&nbsp;</h2>\r\n\r\n									<h2>&nbsp;</h2>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-color:#ffffff; border-style:solid; border-width:3px; width:100%">\r\n							<tbody>\r\n								<tr>\r\n									<td><!--content--><!--article-->\r\n									<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n												<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="vertical-align:middle">\r\n															<h3 style="margin-left:17px">Me lius quod ii legunt saepius claritas</h3>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt. Demonstraverunt lectores legere me lius quod ii legunt saepius claritas est etiam processus dynamicus qui sequitur.</p>\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="vertical-align:middle">\r\n															<h3 style="margin-left:17px">Ut laoreet dolore magna, aliquam erat</h3>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align="left" border="0" cellpadding="0" cellspacing="0" style="width:190px">\r\n																<tbody>\r\n																	<tr>\r\n																		<td><img alt="istockphoto" src="images/test-photo.jpg" style="border-color:#ffffff; border-style:solid; border-width:3px; float:left; height:164px; width:164px" /></td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt. Demonstraverunt lectores legere me lius quod ii legunt saepius claritas est etiam processus dynamicus qui sequitur.</p>\r\n\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod. Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh. Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh.</p>\r\n\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh.</p>\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="vertical-align:middle">\r\n															<h3 style="margin-left:17px">Et iusto odio dignissim qui blandit praesent</h3>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align="center" border="0" cellpadding="0" cellspacing="0">\r\n																<tbody>\r\n																	<tr>\r\n																		<td><img alt="" src="images/bullet-2.png" style="display:block; height:15px; width:5px" /></td>\r\n																		<td>\r\n																		<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n																		</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td><img alt="" src="images/bullet-2.png" style="display:block; height:15px; width:5px" /></td>\r\n																		<td>\r\n																		<p>Ipsum dolor sit amet consectetuer adipiscing elit sed diam</p>\r\n																		</td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td><img alt="" src="images/bullet-2.png" style="display:block; height:15px; width:5px" /></td>\r\n																		<td>\r\n																		<p>Demonstraverunt lectores legere me lius quod ii legunt saepius claritas est etiam processus dynamicus qui sequitur.</p>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="vertical-align:middle">\r\n															<h3 style="margin-left:17px">Ut laoreet dolore magna, aliquam erat</h3>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<table align="left" border="0" cellpadding="0" cellspacing="0" style="width:190px">\r\n																<tbody>\r\n																	<tr>\r\n																		<td><img alt="istockphoto" src="images/test-photo.jpg" style="border-color:#ffffff; border-style:solid; border-width:3px; float:left; height:164px; width:164px" /></td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt. Demonstraverunt lectores legere me lius quod ii legunt saepius claritas est etiam processus dynamicus qui sequitur. Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod.</p>\r\n\r\n															<p>Quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh.</p>\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n										<!-- /article-->\r\n									</table>\r\n									</td>\r\n									<!--/content-->\r\n								</tr>\r\n								<tr>\r\n									<td colspan="2" style="border-color:#b6bec9; text-align:center; vertical-align:middle">\r\n									<p>abcWidgets and the abcWidgets Logo are registered trademarks of abcWidgets Corp.<br />\r\n									ABCWidgets Corp - 123 Some Street, City, ST 99999. Ph +1 4 1477 89 745</p>\r\n\r\n									<p>Don&rsquo;t want to receive these emails anymore? You can unsubscribe</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--/container--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Active'),
(2, 'Content 2', 'demo', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `am_menu_image`
--

CREATE TABLE `am_menu_image` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(200) NOT NULL,
  `menu_desc` longtext NOT NULL,
  `menu_image` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `menu_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_menu_image`
--

INSERT INTO `am_menu_image` (`menu_id`, `menu_title`, `menu_desc`, `menu_image`, `status`, `menu_date`) VALUES
(11, 'asdf', 'asdfsd', 'am_menu_1365184068.jpg', 'ACTIVE', '2013-04-05'),
(12, 'asdf', 'asdf', 'am_menu_1365183614.jpg', 'ACTIVE', '2013-04-05'),
(13, 'asdf', 'asdfas', 'am_menu_1365303551.jpg', 'ACTIVE', '2013-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `am_message`
--

CREATE TABLE `am_message` (
  `mess_id` int(11) NOT NULL,
  `mess_text` longtext NOT NULL,
  `mess_email` varchar(200) NOT NULL,
  `mess_status` enum('READ','UNREAD') NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `mess_phone` varchar(200) NOT NULL,
  `mess_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_message`
--

INSERT INTO `am_message` (`mess_id`, `mess_text`, `mess_email`, `mess_status`, `user_name`, `mess_phone`, `mess_ip`) VALUES
(1, 'I want to two type of categorying', 'jigarpandya7375@gmail.com', 'READ', 'jigar', '9898573804', '127.0.0.1'),
(2, 'dal ,rice, kauchumber, and all item you like', 'ketul@gmail.com', 'READ', 'ketul patel', '9737548463', '180.215.16.119'),
(3, 'requiredment', 'jigar@demo.com', 'UNREAD', 'name', '986574636321', '127.0.0.1'),
(4, 'requiredment', 'jigar@demo.com', 'UNREAD', 'name', '986574636321', '127.0.0.1'),
(5, 'requiredment', 'jigar@demo.com', 'UNREAD', 'name', '986574636321', '127.0.0.1'),
(6, 'requiredment', 'jigar@demo.com', 'READ', 'name', '986574636321', '127.0.0.1'),
(7, 'requiredment', 'jigar@demo.com', 'READ', 'name', '986574636321', '127.0.0.1'),
(8, 'requiredment', 'jigar@demo.com', 'UNREAD', 'name', '986574636321', '127.0.0.1'),
(9, 'requiredment', 'jigar@demo.com', 'READ', 'name', '986574636321', '127.0.0.1'),
(10, 'asdf', 'asdf', 'UNREAD', 'asdf', 'asdf', '127.0.0.1'),
(11, 'asdf', 'asdf', 'READ', 'asdf', 'asdf', '127.0.0.1'),
(12, 'asdf', 'asdf', 'UNREAD', 'asdf', 'asdf', '127.0.0.1'),
(13, 'asdf', 'asdf', 'UNREAD', 'asdf', 'asdf', '127.0.0.1'),
(14, 'asdf', 'asd', 'UNREAD', 'ads', 'asd', '127.0.0.1'),
(15, 'asdf', 'asdf', 'UNREAD', 'asdf', 'asdf', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `am_newsletter`
--

CREATE TABLE `am_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_newsletter`
--

INSERT INTO `am_newsletter` (`id`, `email`, `status`) VALUES
(1, 'dhruvil@yhaoo.com', 'Active'),
(2, 'jgiar@yhaoo.co', 'Active'),
(4, 'jigarpandya7375@gmail.com', 'Active'),
(5, 'demo@gmail.com', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `am_sub_category`
--

CREATE TABLE `am_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_sub_category`
--

INSERT INTO `am_sub_category` (`sub_cat_id`, `sub_cat_name`, `cat_name`, `cat_id`, `status`) VALUES
(10, 'Blue Lagoon', 'MOCKTAILS', 1, 'ACTIVE'),
(11, 'Strawberry Float', 'MOCKTAILS', 1, 'ACTIVE'),
(12, 'Swis Strrawberry', 'MOCKTAILS', 1, 'ACTIVE'),
(13, 'Lichi Limca Float', 'MOCKTAILS', 1, 'ACTIVE'),
(14, 'Paradise Ice land', 'MOCKTAILS', 1, 'ACTIVE'),
(15, 'Mr. Pink', 'MOCKTAILS', 1, 'ACTIVE'),
(16, 'Orange Colada', 'MOCKTAILS', 1, 'ACTIVE'),
(17, 'Black Dragon', 'MOCKTAILS', 1, 'ACTIVE'),
(18, 'Orange Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(19, 'Mosambi Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(20, 'Pineapple Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(21, 'Black Grap Juice', 'COLD APPETIZER', 2, 'INACTIVE'),
(22, 'Pineapple Mosambi Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(23, 'Black Grap Pineapple Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(24, 'Cocktail Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(25, 'Ganga Jumna Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(26, 'Falsa Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(27, 'Watermelon Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(28, 'Fruit Punch Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(29, 'Apple Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(30, 'Mango Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(31, 'Chickoo Juice', 'COLD APPETIZER', 2, 'ACTIVE'),
(32, 'Banana Shack', 'COLD APPETIZER', 2, 'ACTIVE'),
(33, 'Sitafal Shack', 'COLD APPETIZER', 2, 'ACTIVE'),
(34, 'Coconut Water', 'COLD APPETIZER', 2, 'ACTIVE'),
(35, 'Baflo / lemon Kothmir Mix', 'THANDAI', 3, 'ACTIVE'),
(36, 'Thandai / Jaljiral', 'THANDAI', 3, 'ACTIVE'),
(37, 'Tamato Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(38, 'Corn Tomato Cheese Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(39, 'Tomato Dhaniya Sorba', 'HOT  APPETIZER', 4, 'ACTIVE'),
(40, 'Peas Palak Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(41, 'Vegetable Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(42, 'Sweet Corn Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(43, 'Manchow Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(44, 'Green Peas Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(45, 'Hot & Sour Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(46, 'Chinese Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(47, 'Minestrone Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(48, 'Continental Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(49, 'Tomato Coconut Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(50, 'Tomato Pasta Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(51, 'Hot Garlic Ginger Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(52, 'Lemon Coriander Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(53, 'Veg. Clear Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(54, 'Asian Green Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(55, 'Broccoli Almond Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(56, 'Tomato Italian Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(57, 'Noodles Veg. Soup', 'HOT  APPETIZER', 4, 'ACTIVE'),
(58, 'Mini Bharkharwadi', 'STARTER', 5, 'ACTIVE'),
(59, 'Cheese Panner Samosa', 'STARTER', 5, 'ACTIVE'),
(60, 'Dry Samosa', 'STARTER', 5, 'ACTIVE'),
(61, 'Cheese Panner Potali', 'STARTER', 5, 'ACTIVE'),
(62, 'Panner Tikka', 'STARTER', 5, 'ACTIVE'),
(63, 'Potato Finger', 'STARTER', 5, 'ACTIVE'),
(64, 'Ponk Wada', 'STARTER', 5, 'ACTIVE'),
(65, 'Mini Samosa', 'STARTER', 5, 'ACTIVE'),
(66, 'Hara Bhara Kabab', 'STARTER', 5, 'ACTIVE'),
(67, 'Mutter Samosa', 'STARTER', 5, 'ACTIVE'),
(68, 'Monaco Biscuit', 'STARTER', 5, 'ACTIVE'),
(69, 'Kaju Masala', 'STARTER', 5, 'ACTIVE'),
(70, 'Badam Masala', 'STARTER', 5, 'ACTIVE'),
(71, 'Pineapple Panner Cheery Stick', 'STARTER', 5, 'ACTIVE'),
(72, 'Panner Babycorn Chilli', 'STARTER', 5, 'ACTIVE'),
(73, 'Panner Fudina', 'STARTER', 5, 'ACTIVE'),
(74, 'Panner Lifafa', 'STARTER', 5, 'ACTIVE'),
(75, 'Vonton', 'STARTER', 5, 'ACTIVE'),
(76, 'Mini Spring Roll', 'STARTER', 5, 'ACTIVE'),
(77, 'Cheese Panner Franky', 'STARTER', 5, 'ACTIVE'),
(78, 'Coin Pizza', 'STARTER', 5, 'ACTIVE'),
(79, 'Potato Rosty', 'STARTER', 5, 'ACTIVE'),
(80, 'Mini Dabeli', 'STARTER', 5, 'ACTIVE'),
(81, 'Delhi Chaat', 'CHAAT', 6, 'ACTIVE'),
(82, 'Allu Chaat', 'CHAAT', 6, 'ACTIVE'),
(83, 'Dahi Papdi', 'CHAAT', 6, 'ACTIVE'),
(84, 'Kela Tikki', 'CHAAT', 6, 'ACTIVE'),
(85, 'Millennium Tikki', 'CHAAT', 6, 'ACTIVE'),
(86, 'Shahenshahi Tikki', 'CHAAT', 6, 'ACTIVE'),
(87, 'Navratna Tikki', 'CHAAT', 6, 'ACTIVE'),
(88, 'Ratalu Tikki', 'CHAAT', 6, 'ACTIVE'),
(89, 'Allu Tikki with Chhole', 'CHAAT', 6, 'ACTIVE'),
(90, 'Hydrabadi Chilla', 'CHAAT', 6, 'ACTIVE'),
(91, 'Panner Chilla', 'CHAAT', 6, 'ACTIVE'),
(93, 'Lachha Kachori', 'CHAAT', 6, 'ACTIVE'),
(94, 'Burger', 'CHAAT', 6, 'ACTIVE'),
(95, 'Mini Pizza', 'CHAAT', 6, 'ACTIVE'),
(96, 'Sandwich', 'CHAAT', 6, 'ACTIVE'),
(97, 'Chhole Bhature', 'CHAAT', 6, 'ACTIVE'),
(98, 'Ghever Chaat', 'CHAAT', 6, 'ACTIVE'),
(99, 'Dhokla Chaat', 'CHAAT', 6, 'ACTIVE'),
(100, 'Idli Takatak', 'CHAAT', 6, 'ACTIVE'),
(101, 'Samosa Chaat', 'CHAAT', 6, 'ACTIVE'),
(102, 'Kachori Dahi Chatni', 'CHAAT', 6, 'ACTIVE'),
(103, 'Corn Patis', 'CHAAT', 6, 'ACTIVE'),
(104, 'Mirchi Vada', 'CHAAT', 6, 'ACTIVE'),
(105, 'Panner Papdi Chaat', 'CHAAT', 6, 'ACTIVE'),
(106, 'Tava Mathura Chaat', 'CHAAT', 6, 'ACTIVE'),
(107, 'Dahi Gujiya', 'CHAAT', 6, 'ACTIVE'),
(108, 'Rajbhog Chaat', 'CHAAT', 6, 'ACTIVE'),
(109, 'Panner Lifafa', 'CHAAT', 6, 'ACTIVE'),
(110, 'Shimla Kangan', 'CHAAT', 6, 'ACTIVE'),
(111, 'Navratna Chaat', 'CHAAT', 6, 'ACTIVE'),
(112, 'Corn chaat', 'CHAAT', 6, 'ACTIVE'),
(113, 'Imarati Chaat', 'CHAAT', 6, 'ACTIVE'),
(114, 'Pavbhaji', 'CHAAT', 6, 'ACTIVE'),
(115, 'Pani Puri', 'CHAAT', 6, 'ACTIVE'),
(116, 'Mutter Chilla', 'CHAAT', 6, 'ACTIVE'),
(117, 'Ragda Petis', 'CHAAT', 6, 'ACTIVE'),
(118, 'Bhel Puri', 'CHAAT', 6, 'ACTIVE'),
(119, 'Sev Puri', 'CHAAT', 6, 'ACTIVE'),
(120, 'Live Dhokla', 'CHAAT', 6, 'ACTIVE'),
(121, 'Ratalu Tikki', 'CHAAT', 6, 'ACTIVE'),
(122, 'Papdi Lot', 'CHAAT', 6, 'ACTIVE'),
(123, 'Palak Patta Chaat', 'CHAAT', 6, 'ACTIVE'),
(124, 'Chhole Samosa Chaat', 'CHAAT', 6, 'ACTIVE'),
(125, 'Kathod Matka Chaat', 'CHAAT', 6, 'ACTIVE'),
(126, 'Panner Banycorn Veg. Chaat', 'CHAAT', 6, 'ACTIVE'),
(127, 'Bun Samosa Chholle Chaat', 'CHAAT', 6, 'ACTIVE'),
(128, 'Wada Pav', 'CHAAT', 6, 'ACTIVE'),
(129, 'Kaju Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(130, 'Kaju Barfi- Kaju Katri', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(131, 'Kaju Samosa - Sangam katri', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(132, 'Kaju Pista Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(133, 'Kaju Nargis', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(134, 'Kaju Sandwich', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(135, 'Kaju Angeer Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(136, 'Kaju Kopra Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(137, 'Kaju Apple', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(138, 'Kaju Tadbuch', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(139, 'Kaju Narangi', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(140, 'Kaju Mysore', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(141, 'Kaju Angeer Khajur Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(142, 'Kaju Makai', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(143, 'Kaju Pan Masala', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(144, 'kaju  Angeer Tos', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(145, 'Kaju Kasata', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(146, 'Kaju Jalebi', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(147, 'Kaju Katri', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(148, 'Badam Katri', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(149, 'Badam Barfi', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(150, 'Badam Pan', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(151, 'Badam Apple', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(152, 'Badam Roll', 'RAJWADI MITHAI', 7, 'ACTIVE'),
(153, 'Kansar', 'MITHAI', 8, 'ACTIVE'),
(154, 'Lapsi', 'MITHAI', 8, 'ACTIVE'),
(155, 'Imarti', 'MITHAI', 8, 'ACTIVE'),
(156, 'Mung Dal Halwa', 'MITHAI', 8, 'ACTIVE'),
(157, 'Rava Halwa', 'MITHAI', 8, 'ACTIVE'),
(158, 'Dudhi Halwa', 'MITHAI', 8, 'ACTIVE'),
(159, 'Gajar Halwa', 'MITHAI', 8, 'ACTIVE'),
(160, 'Badam halwa', 'MITHAI', 8, 'ACTIVE'),
(161, 'Kaju Halwa', 'MITHAI', 8, 'ACTIVE'),
(162, 'Lila Nariyel Halwa', 'MITHAI', 8, 'ACTIVE'),
(163, 'Angeer Halwa', 'MITHAI', 8, 'ACTIVE'),
(164, 'Santra Halwa', 'MITHAI', 8, 'ACTIVE'),
(165, 'Chickoo Halwa', 'MITHAI', 8, 'ACTIVE'),
(166, 'Rajwadi Halwa', 'MITHAI', 8, 'ACTIVE'),
(167, 'Bundi Ladu', 'MITHAI', 8, 'ACTIVE'),
(168, 'Motichur Ladu', 'MITHAI', 8, 'ACTIVE'),
(169, 'Gehu ladu', 'MITHAI', 8, 'ACTIVE'),
(170, 'Gulab Jamun', 'MITHAI', 8, 'ACTIVE'),
(171, 'Bikaneri Jamun', 'MITHAI', 8, 'ACTIVE'),
(172, 'Kala jam ', 'MITHAI', 8, 'ACTIVE'),
(173, 'Malpuda', 'MITHAI', 8, 'ACTIVE'),
(174, 'Rajwadi Malpuda', 'MITHAI', 8, 'ACTIVE'),
(175, 'Dudh Jalebi', 'MITHAI', 8, 'ACTIVE'),
(176, 'Rabdi Malpuda', 'MITHAI', 8, 'ACTIVE'),
(177, 'Mava Maluda', 'MITHAI', 8, 'ACTIVE'),
(178, 'Pineapple Jalebi', 'MITHAI', 8, 'ACTIVE'),
(179, 'Apple Jaebi', 'MITHAI', 8, 'ACTIVE'),
(180, 'Panner Jalebi', 'MITHAI', 8, 'ACTIVE'),
(181, 'Kesar Jalebi', 'MITHAI', 8, 'ACTIVE'),
(182, 'Angeer Vedhmi', 'MITHAI', 8, 'ACTIVE'),
(183, 'Angeer Patra', 'MITHAI', 8, 'ACTIVE'),
(184, 'Khajur Angeer Vedhmi', 'MITHAI', 8, 'ACTIVE'),
(185, 'Dal Vedhmi', 'MITHAI', 8, 'ACTIVE'),
(186, 'Ghever', 'MITHAI', 8, 'ACTIVE'),
(187, 'Mohan Thal', 'MITHAI', 8, 'ACTIVE'),
(188, 'Churmana ladu', 'MITHAI', 8, 'ACTIVE'),
(189, 'Magas', 'MITHAI', 8, 'ACTIVE'),
(190, 'Son Papdi', 'MITHAI', 8, 'ACTIVE'),
(191, 'Mysore', 'MITHAI', 8, 'ACTIVE'),
(192, 'Coprapak', 'MITHAI', 8, 'ACTIVE'),
(193, 'Barfi', 'MITHAI', 8, 'ACTIVE'),
(194, 'Chocolate Barfi', 'MITHAI', 8, 'ACTIVE'),
(195, 'Surti Barfi', 'MITHAI', 8, 'ACTIVE'),
(196, 'Angeer Barfi', 'MITHAI', 8, 'ACTIVE'),
(197, 'Tirangi Barfi', 'MITHAI', 8, 'ACTIVE'),
(198, 'Bombay Barfi', 'MITHAI', 8, 'ACTIVE'),
(199, 'Mava Barfi', 'MITHAI', 8, 'ACTIVE'),
(200, 'Dry Fruit Barfi', 'MITHAI', 8, 'ACTIVE'),
(201, 'Badam Barfi', 'MITHAI', 8, 'ACTIVE'),
(202, 'Kesar Pista Ghari', 'MITHAI', 8, 'ACTIVE'),
(203, 'Dry Fruit Ghari', 'MITHAI', 8, 'ACTIVE'),
(204, 'Sargam', 'MITHAI', 8, 'ACTIVE'),
(205, 'Mava Apple', 'MITHAI', 8, 'ACTIVE'),
(206, 'Mava Pineapple', 'MITHAI', 8, 'ACTIVE'),
(207, 'Mava Bati', 'MITHAI', 8, 'ACTIVE'),
(208, 'Badam Pista Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(209, 'Chocolate Almond Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(210, 'Kesar Pista Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(211, 'Sitafal Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(212, 'Santra Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(213, 'Apple Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(214, 'Dry Fruit Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(215, 'Ghever Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(216, 'Pineapple Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(217, 'Straberry Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(218, 'Angeer Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(219, 'Angeer Akhort Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(220, 'Angur Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(221, 'Sutarfeni Basundi', 'BENGALI MITHAI', 9, 'ACTIVE'),
(222, 'Ras Malai', 'BENGALI MITHAI', 9, 'ACTIVE'),
(223, 'Ras Gulla', 'BENGALI MITHAI', 9, 'ACTIVE'),
(224, 'Chum Chum', 'BENGALI MITHAI', 9, 'ACTIVE'),
(225, 'Kamal Bhog', 'BENGALI MITHAI', 9, 'ACTIVE'),
(226, 'Mother India', 'BENGALI MITHAI', 9, 'ACTIVE'),
(227, 'Malai Sandwich', 'BENGALI MITHAI', 9, 'ACTIVE'),
(228, 'Cream Salad \r\n', 'BENGALI MITHAI', 9, 'ACTIVE'),
(229, 'Aam Ras', 'BENGALI MITHAI', 9, 'ACTIVE'),
(230, 'Illaichi Srikhan', 'BENGALI MITHAI', 9, 'ACTIVE'),
(231, 'Dry Fruit Srikhand', 'BENGALI MITHAI', 9, 'INACTIVE'),
(232, 'Mango Matho', 'BENGALI MITHAI', 9, 'ACTIVE'),
(233, 'Pineapple Matho', 'BENGALI MITHAI', 9, 'ACTIVE'),
(234, 'Rajbhog Matho', 'BENGALI MITHAI', 9, 'ACTIVE'),
(235, 'Butter Scotch Matho', 'BENGALI MITHAI', 9, 'ACTIVE'),
(236, 'Tava Seasolar', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(237, 'Halwa Seasolar', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(238, 'Rajwadi Gulab Jamun', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(239, 'Imarti Rabdi', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(240, 'Mava Malpuda With Rabdi', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(241, 'Khajur Angeer Vedhmi', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(242, 'Dudh Jalebi', 'LIVE TAVA SWEET', 10, 'ACTIVE'),
(244, 'Panjabi Samosa', 'FARSAN', 11, 'ACTIVE'),
(245, 'Chinese Samosa', 'FARSAN', 11, 'ACTIVE'),
(246, 'Corn Samosa', 'FARSAN', 11, 'ACTIVE'),
(247, 'Lilva Samosa', 'FARSAN', 11, 'ACTIVE'),
(248, 'Dal Samosa', 'FARSAN', 11, 'ACTIVE'),
(249, 'Pan Samosa', 'FARSAN', 11, 'ACTIVE'),
(250, 'Panner Samosa', 'FARSAN', 11, 'ACTIVE'),
(251, 'Patti Samosa', 'FARSAN', 11, 'ACTIVE'),
(252, 'Dahi Wada', 'FARSAN', 11, 'ACTIVE'),
(253, 'Kanda Wada', 'FARSAN', 11, 'ACTIVE'),
(254, 'Kaju Wada', 'FARSAN', 11, 'ACTIVE'),
(255, 'Vegetable Wada', 'FARSAN', 11, 'ACTIVE'),
(256, 'Bataka Wada', 'FARSAN', 11, 'ACTIVE'),
(257, 'Dal Wada', 'FARSAN', 11, 'ACTIVE'),
(258, 'Marcha Wada', 'FARSAN', 11, 'ACTIVE'),
(259, 'Pav Wada', 'FARSAN', 11, 'ACTIVE'),
(260, 'Mutter Kachori', 'FARSAN', 11, 'ACTIVE'),
(261, 'Makai Ghughra', 'FARSAN', 11, 'ACTIVE'),
(262, 'Veg. Ghughra', 'FARSAN', 11, 'ACTIVE'),
(263, 'Lilva Ni Kachori', 'FARSAN', 11, 'ACTIVE'),
(264, 'Lila Mag Ni Kachori', 'FARSAN', 11, 'ACTIVE'),
(265, 'Brad Roll', 'FARSAN', 11, 'ACTIVE'),
(266, 'Papad Roll', 'FARSAN', 11, 'ACTIVE'),
(267, 'Petis', 'FARSAN', 11, 'ACTIVE'),
(268, 'Mutter Petis', 'FARSAN', 11, 'ACTIVE'),
(269, 'Ratalu Petis', 'FARSAN', 11, 'ACTIVE'),
(270, 'Lilva na Ghughra', 'FARSAN', 11, 'ACTIVE'),
(271, 'Corn Kachori', 'FARSAN', 11, 'ACTIVE'),
(272, 'Veg. Sandwich', 'FARSAN', 11, 'ACTIVE'),
(273, 'Dabeli', 'FARSAN', 11, 'ACTIVE'),
(274, 'Veg. Upma', 'FARSAN', 11, 'ACTIVE'),
(275, 'Bread Butter', 'FARSAN', 11, 'ACTIVE'),
(276, 'Methina Ghota', 'FARSAN', 11, 'ACTIVE'),
(277, 'Palak Panner Roll', 'FARSAN', 11, 'ACTIVE'),
(278, 'Veg. Golden Coin', 'FARSAN', 11, 'ACTIVE'),
(279, 'Surti Samosa', 'FARSAN', 11, 'ACTIVE'),
(280, 'Veg. Buf Wada', 'FARSAN', 11, 'ACTIVE'),
(281, 'Veg. Khari', 'FARSAN', 11, 'ACTIVE'),
(282, 'Ratalu na Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(283, 'Marcha Na Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(284, 'Bataka Na Bhujiya', 'FARSAN', 11, 'ACTIVE'),
(285, 'Dakor Na Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(286, 'Palak Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(287, 'Dal Na Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(288, 'Mix Bhajiya', 'FARSAN', 11, 'ACTIVE'),
(289, 'Chaat Basket', 'FARSAN', 11, 'ACTIVE'),
(290, 'Green Garden', 'FARSAN', 11, 'ACTIVE'),
(291, 'Idla', 'BOIL FARSAN', 12, 'ACTIVE'),
(292, 'Trirangi Idla', 'BOIL FARSAN', 12, 'ACTIVE'),
(293, 'Tritangi Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(294, 'Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(295, 'Sandwich Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(296, 'Choda Methi Na Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(297, 'Chinese Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(298, 'Damni Dhokla', 'BOIL FARSAN', 12, 'ACTIVE'),
(299, 'Muthiya -4 Variety', 'BOIL FARSAN', 12, 'ACTIVE'),
(300, 'Patra No Chatako', 'BOIL FARSAN', 12, 'ACTIVE'),
(301, 'Patra', 'BOIL FARSAN', 12, 'ACTIVE'),
(302, 'Khandvi', 'BOIL FARSAN', 12, 'ACTIVE'),
(303, 'Lasoon Marcha Khandvi', 'BOIL FARSAN', 12, 'ACTIVE'),
(304, 'Handvo', 'BOIL FARSAN', 12, 'ACTIVE'),
(305, 'Vegetable Handvo', 'BOIL FARSAN', 12, 'ACTIVE'),
(306, 'Dudhi No Handvo', 'BOIL FARSAN', 12, 'ACTIVE'),
(307, 'Khaman', 'BOIL FARSAN', 12, 'ACTIVE'),
(308, 'Nylon Khaman', 'BOIL FARSAN', 12, 'ACTIVE'),
(309, 'Tamtam Khaman', 'BOIL FARSAN', 12, 'ACTIVE'),
(310, 'Plain Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(311, 'Roomali Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(312, 'Butter Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(313, 'Stuff Paratha - Lachachha Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(314, 'Khasta Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(315, 'Gajar Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(316, 'Fudina Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(317, 'Cheese Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(318, 'Veg. Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(319, 'Alu Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(320, 'Lachchha Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(321, 'Alu Matter Paratha', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(322, 'Butter Nan', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(323, 'Cheese Nan', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(324, 'Khandari Nan', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(325, 'Baby Nan', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(326, 'Fulka Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(327, 'Missi Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(328, 'Matla Rotli', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(329, 'Double Roti', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(330, 'Bhakhri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(331, 'Methi Na Thepla', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(332, 'Locha Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(333, 'Rava Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(334, 'Palak Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(335, 'Trirangi Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(336, 'Bit Ni Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(337, 'Gajra ni Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(338, 'Goba Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(339, 'Ratalu Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(340, 'Farsi Puri', 'TANDUR / NAN / PURI', 13, 'ACTIVE'),
(341, 'Panner Tikka lababdar', 'PUNJABI SABJI', 14, 'ACTIVE'),
(342, 'Panner Kolhapuri', 'PUNJABI SABJI', 14, 'ACTIVE'),
(343, 'Panner Corn Makhni', 'PUNJABI SABJI', 14, 'ACTIVE'),
(344, 'Panner Korma', 'PUNJABI SABJI', 14, 'ACTIVE'),
(345, 'Panner Pasanda', 'PUNJABI SABJI', 14, 'ACTIVE'),
(346, 'Panner Lazeez', 'PUNJABI SABJI', 14, 'ACTIVE'),
(347, 'Panner Sabji Ka Mela', 'PUNJABI SABJI', 14, 'ACTIVE'),
(348, 'Nanhi Sabji Ka Mela', 'PUNJABI SABJI', 14, 'ACTIVE'),
(349, 'Panner  Butter Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(350, 'Panner Tava', 'PUNJABI SABJI', 14, 'ACTIVE'),
(351, 'Panner  Mashroom Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(352, 'Panner Kadai', 'PUNJABI SABJI', 14, 'ACTIVE'),
(353, 'Panner Bhuraji', 'PUNJABI SABJI', 14, 'ACTIVE'),
(354, 'Panner Hydrabadi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(355, 'Palak Panner ', 'PUNJABI SABJI', 14, 'ACTIVE'),
(356, 'Panner Flower', 'PUNJABI SABJI', 14, 'ACTIVE'),
(357, 'Panner Shahi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(358, 'Panner  Mutter', 'PUNJABI SABJI', 14, 'ACTIVE'),
(359, 'Panner Fudina', 'PUNJABI SABJI', 14, 'ACTIVE'),
(360, 'Panner Capsicum', 'PUNJABI SABJI', 14, 'ACTIVE'),
(361, 'Kaju Panner Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(362, 'Panner  Palak Kaju', 'PUNJABI SABJI', 14, 'ACTIVE'),
(363, 'Panner  Chilli Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(364, 'Panner Chat-pata', 'PUNJABI SABJI', 14, 'ACTIVE'),
(365, 'Methi Metter Malai', 'PUNJABI SABJI', 14, 'ACTIVE'),
(366, 'Veg. Kofta', 'PUNJABI SABJI', 14, 'ACTIVE'),
(367, 'Alu Kofta', 'PUNJABI SABJI', 14, 'ACTIVE'),
(368, 'Malai Kofta', 'PUNJABI SABJI', 14, 'ACTIVE'),
(369, 'Mix Veg. Kofta', 'PUNJABI SABJI', 14, 'ACTIVE'),
(370, 'Palak Kofta', 'PUNJABI SABJI', 14, 'ACTIVE'),
(371, 'Dum-Alu', 'PUNJABI SABJI', 14, 'ACTIVE'),
(372, 'Kashmiri Alu', 'PUNJABI SABJI', 14, 'ACTIVE'),
(373, 'Bataka Fudina', 'PUNJABI SABJI', 14, 'ACTIVE'),
(374, 'Alu Gobi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(375, 'Rajasthani Bataka', 'PUNJABI SABJI', 14, 'ACTIVE'),
(376, 'Jodhpuri Bataka', 'PUNJABI SABJI', 14, 'ACTIVE'),
(377, 'Alu Fundina (Green Gravy)', 'PUNJABI SABJI', 14, 'ACTIVE'),
(378, 'Bataka Capsicum', 'PUNJABI SABJI', 14, 'ACTIVE'),
(379, 'Punjabi Flower', 'PUNJABI SABJI', 14, 'ACTIVE'),
(380, 'Dahi Flower', 'PUNJABI SABJI', 14, 'ACTIVE'),
(381, 'Kaju Mutter Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(382, 'Navratna Korma', 'PUNJABI SABJI', 14, 'ACTIVE'),
(383, 'Stuff Bhindi Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(384, 'Parvar Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(385, 'Capsicum Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(386, 'Tomato Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(387, 'Bhindi Masala Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(388, 'Flower Masala Punjabi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(389, 'Veg. Kolhapuri', 'PUNJABI SABJI', 14, 'ACTIVE'),
(390, 'Veg. Jaipuri', 'PUNJABI SABJI', 14, 'ACTIVE'),
(391, 'Kathi Kabab', 'PUNJABI SABJI', 14, 'ACTIVE'),
(392, 'Panner Mehi Malai', 'PUNJABI SABJI', 14, 'ACTIVE'),
(393, 'Chhole Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(394, 'Kaju masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(395, 'Palak Babycorn', 'PUNJABI SABJI', 14, 'ACTIVE'),
(396, 'Vegetable Kadhi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(397, 'Mix Vegetable', 'PUNJABI SABJI', 14, 'ACTIVE'),
(398, 'Kaju Koya Masala', 'PUNJABI SABJI', 14, 'ACTIVE'),
(399, 'Tava Sabji', 'PUNJABI SABJI', 14, 'ACTIVE'),
(400, 'Deewani Handi', 'PUNJABI SABJI', 14, 'ACTIVE'),
(401, 'Amrutsari Special', 'PUNJABI SABJI', 14, 'ACTIVE'),
(402, 'Patiyala Special', 'PUNJABI SABJI', 14, 'ACTIVE'),
(403, 'Kaju Panner Makhani', 'PUNJABI SABJI', 14, 'ACTIVE'),
(404, 'Corn Panner ', 'PUNJABI SABJI', 14, 'ACTIVE'),
(405, 'Gujarati Mix', 'GUJARATI SABJI', 15, 'ACTIVE'),
(406, 'Bhinda Vatana Capsicum', 'GUJARATI SABJI', 15, 'ACTIVE'),
(407, 'Bhindi Capsicum Tomato', 'GUJARATI SABJI', 15, 'ACTIVE'),
(408, 'Bhindi Masala', 'GUJARATI SABJI', 15, 'ACTIVE'),
(409, 'Turiya Patra Capsicum', 'GUJARATI SABJI', 15, 'ACTIVE'),
(410, 'Vatana Patra Capsicum', 'GUJARATI SABJI', 15, 'ACTIVE'),
(411, 'Dahi Bhinda', 'GUJARATI SABJI', 15, 'ACTIVE'),
(412, 'Turiya Patra Vatana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(413, 'Turiya Patra ', 'GUJARATI SABJI', 15, 'ACTIVE'),
(414, 'Mung Vatana Khandvi', 'GUJARATI SABJI', 15, 'ACTIVE'),
(415, 'Parvar Patra kela', 'GUJARATI SABJI', 15, 'ACTIVE'),
(416, 'Undhiyu', 'GUJARATI SABJI', 15, 'ACTIVE'),
(417, 'Tava Undhiyu', 'GUJARATI SABJI', 15, 'ACTIVE'),
(418, 'Bataka Rasadar', 'GUJARATI SABJI', 15, 'ACTIVE'),
(419, 'Bataka Ringan', 'GUJARATI SABJI', 15, 'ACTIVE'),
(420, 'Bataka Vatana Tomato', 'GUJARATI SABJI', 15, 'ACTIVE'),
(421, 'Bataka Chips', 'GUJARATI SABJI', 15, 'ACTIVE'),
(422, 'Bataka Fry Dal', 'GUJARATI SABJI', 15, 'ACTIVE'),
(423, 'Dana Muthiya', 'GUJARATI SABJI', 15, 'ACTIVE'),
(424, 'Kela Vatana Tomato', 'GUJARATI SABJI', 15, 'ACTIVE'),
(425, 'Bataka Palak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(426, 'Sev Flower', 'GUJARATI SABJI', 15, 'ACTIVE'),
(427, 'Kaju Karela', 'GUJARATI SABJI', 15, 'ACTIVE'),
(428, 'Dana Pana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(429, 'Kakdi Dana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(430, 'Khakdi Dana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(431, 'Tindoda Chips', 'GUJARATI SABJI', 15, 'ACTIVE'),
(432, 'Parvar Ravaiya', 'GUJARATI SABJI', 15, 'ACTIVE'),
(433, 'Bataka Ringan Ravaiya', 'GUJARATI SABJI', 15, 'ACTIVE'),
(434, 'Kakdi Ravaiya', 'GUJARATI SABJI', 15, 'ACTIVE'),
(435, 'Dudhi Chana Dal Nu Shak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(436, 'Gatta Nu Shak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(437, 'Papad Methi Nu Shak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(438, 'Ringan Vatana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(439, 'Ringan Papdi', 'GUJARATI SABJI', 15, 'ACTIVE'),
(440, 'Cabbage Vatana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(441, 'Flower Vatana Tomato', 'GUJARATI SABJI', 15, 'ACTIVE'),
(442, 'Punch Kutiya Shak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(443, 'Suran Tatalu Shak', 'GUJARATI SABJI', 15, 'ACTIVE'),
(444, 'Deshi Chana', 'GUJARATI SABJI', 15, 'ACTIVE'),
(445, 'Desi Val', 'GUJARATI SABJI', 15, 'ACTIVE'),
(446, 'Ranguni Val', 'GUJARATI SABJI', 15, 'ACTIVE'),
(447, 'Green Gujarati', 'GUJARATI SABJI', 15, 'ACTIVE'),
(448, 'Green Salad', 'SALAD', 16, 'ACTIVE'),
(449, 'Kachumbar', 'SALAD', 16, 'ACTIVE'),
(450, 'Russian Salad', 'SALAD', 16, 'ACTIVE'),
(451, 'Fruit Salad', 'SALAD', 16, 'ACTIVE'),
(452, 'Red Cabbage With Apple', 'SALAD', 16, 'ACTIVE'),
(453, 'Hari Mirch Hari Pyaz', 'SALAD', 16, 'ACTIVE'),
(454, 'Mung Chana Capsicum Salad', 'SALAD', 16, 'ACTIVE'),
(455, 'Counter Salad', 'SALAD', 16, 'ACTIVE'),
(456, 'Orange Dressing Salad', 'SALAD', 16, 'ACTIVE'),
(457, 'Macroni Salad', 'SALAD', 16, 'ACTIVE'),
(458, 'Macroni Capsicum Salad', 'SALAD', 16, 'ACTIVE'),
(459, 'Smoky Alu Salad', 'SALAD', 16, 'ACTIVE'),
(460, 'Thai Salad', 'SALAD', 16, 'ACTIVE'),
(461, 'Maxican Salad', 'SALAD', 16, 'ACTIVE'),
(462, 'Papad-Papdi', 'TALVANI', 17, 'ACTIVE'),
(463, 'Papad', 'TALVANI', 17, 'ACTIVE'),
(464, 'Masala Papad', 'TALVANI', 17, 'ACTIVE'),
(465, 'Roasted Papad', 'TALVANI', 17, 'ACTIVE'),
(466, 'Mini Masala Papad', 'TALVANI', 17, 'ACTIVE'),
(467, 'Disco Papad', 'TALVANI', 17, 'ACTIVE'),
(468, 'Sukvani', 'TALVANI', 17, 'ACTIVE'),
(469, 'Friems', 'TALVANI', 17, 'ACTIVE'),
(470, 'Chana Dal', 'TALVANI', 17, 'ACTIVE'),
(471, 'Chana Chor Garam', 'TALVANI', 17, 'ACTIVE'),
(472, 'Chatpatu', 'TALVANI', 17, 'ACTIVE'),
(473, 'Italian Chips', 'TALVANI', 17, 'ACTIVE'),
(474, 'Masala Khichiya', 'TALVANI', 17, 'ACTIVE'),
(475, 'Bundi Raita', 'RAITA', 18, 'ACTIVE'),
(476, 'Fruit Raita', 'RAITA', 18, 'ACTIVE'),
(477, 'Kakadhi Raita', 'RAITA', 18, 'ACTIVE'),
(478, 'Pineapple Raita', 'RAITA', 18, 'ACTIVE'),
(479, 'Jeera Raita', 'RAITA', 18, 'ACTIVE'),
(480, 'Mix Raita', 'RAITA', 18, 'ACTIVE'),
(481, 'Dungadi Raita', 'RAITA', 18, 'ACTIVE'),
(482, 'Kharak Raita', 'RAITA', 18, 'ACTIVE'),
(483, 'Keda Nu Raita', 'RAITA', 18, 'ACTIVE'),
(484, 'Bataka Raita', 'RAITA', 18, 'ACTIVE'),
(485, 'Apple Raita', 'RAITA', 18, 'ACTIVE'),
(486, 'Punjabi Raita', 'RAITA', 18, 'ACTIVE'),
(487, 'Plain Dahi', 'RAITA', 18, 'ACTIVE'),
(488, 'Jeera Chhas', 'RAITA', 18, 'ACTIVE'),
(489, 'Mithi Chatni', 'CHATNI', 19, 'ACTIVE'),
(490, 'Green Chatni', 'CHATNI', 19, 'ACTIVE'),
(491, 'Fudina Ni Chatni', 'CHATNI', 19, 'ACTIVE'),
(492, 'Lasoon Ni Chatni', 'CHATNI', 19, 'ACTIVE'),
(493, 'Coconut Ni Chatni', 'CHATNI', 19, 'ACTIVE'),
(494, 'Tal Daliyani Chatni', 'CHATNI', 19, 'ACTIVE'),
(495, 'Lila Dhana Ni Chatni', 'CHATNI', 19, 'ACTIVE'),
(496, 'Amli Chatni', 'CHATNI', 19, 'ACTIVE'),
(497, 'Khajur Amli Ni Chatni', 'CHATNI', 19, 'ACTIVE'),
(498, 'Mango Pickle', 'PICKLES', 20, 'ACTIVE'),
(499, 'Mix Pickle', 'PICKLES', 20, 'ACTIVE'),
(500, 'Gajar Pickle', 'PICKLES', 20, 'ACTIVE'),
(501, 'Green Onion Pickle', 'PICKLES', 20, 'ACTIVE'),
(502, 'Kakdi Pickle', 'PICKLES', 20, 'ACTIVE'),
(503, 'Mula Pickle', 'PICKLES', 20, 'ACTIVE'),
(504, 'Jamfal Pickle', 'PICKLES', 20, 'ACTIVE'),
(505, 'Lili Draksh Pickle', 'PICKLES', 20, 'ACTIVE'),
(506, 'Tindora Pickle', 'PICKLES', 20, 'ACTIVE'),
(507, 'Gujarati Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(508, 'Marvadi Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(509, 'Punjabi Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(510, 'Hydrabadi Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(511, 'PanchravDal', 'DAL / KADHI', 21, 'ACTIVE'),
(512, 'Dal makhni', 'DAL / KADHI', 21, 'ACTIVE'),
(513, 'Dal Jaipuri', 'DAL / KADHI', 21, 'ACTIVE'),
(514, 'Dal Maharani', 'DAL / KADHI', 21, 'ACTIVE'),
(515, 'Mung Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(516, 'Val Ni Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(517, 'Lachko Dal', 'DAL / KADHI', 21, 'ACTIVE'),
(518, 'Dal Dhokli', 'DAL / KADHI', 21, 'ACTIVE'),
(519, 'Gujrati Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(520, 'Punjabi Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(521, 'Bundi Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(522, 'Dabka Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(523, 'Palak Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(524, 'Lasoon Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(525, 'Onion Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(526, 'Kathiyavadi Kadhi', 'DAL / KADHI', 21, 'ACTIVE'),
(527, 'Plain Rice', 'PULAV', 22, 'ACTIVE'),
(528, 'Jeera Rice', 'PULAV', 22, 'ACTIVE'),
(529, 'Peas Pulav', 'PULAV', 22, 'ACTIVE'),
(530, 'Veg. Pulav', 'PULAV', 22, 'ACTIVE'),
(531, 'Kashmiri Pulav', 'PULAV', 22, 'ACTIVE'),
(532, 'Mutter Panner Pulav', 'PULAV', 22, 'ACTIVE'),
(533, 'Marathi Pulav', 'PULAV', 22, 'ACTIVE'),
(534, 'Hydrabadi Pulav', 'PULAV', 22, 'ACTIVE'),
(535, 'Plain Khichadi', 'KHICHADI', 23, 'ACTIVE'),
(536, 'Masala Khichadi', 'KHICHADI', 23, 'ACTIVE'),
(537, 'Lilva Khichadi', 'KHICHADI', 23, 'ACTIVE'),
(538, 'Mung Dal Khichadi', 'KHICHADI', 23, 'ACTIVE'),
(539, 'Bajri No Khichado', 'KHICHADI', 23, 'ACTIVE'),
(540, 'Rajvadi Khichado', 'KHICHADI', 23, 'ACTIVE'),
(541, 'Tomato Uttappa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(542, 'Masala Uttappa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(543, 'Jodhapuri Dhosa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(544, 'Plain Dhosa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(545, 'Mysore Masala Dhosa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(546, 'Uttappa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(547, 'Onion Uttappa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(548, 'Mini Dhosa', 'SOUTH INDIAN', 24, 'ACTIVE'),
(549, 'Idli Sambhar', 'SOUTH INDIAN', 24, 'ACTIVE'),
(550, 'Vada Sambhar', 'SOUTH INDIAN', 24, 'ACTIVE'),
(551, 'Dahi Vada', 'SOUTH INDIAN', 24, 'ACTIVE'),
(552, 'Fry Idli', 'SOUTH INDIAN', 24, 'ACTIVE'),
(553, 'Idli Takatak', 'SOUTH INDIAN', 24, 'ACTIVE'),
(554, 'Sambhar - Chatni', 'SOUTH INDIAN', 24, 'ACTIVE'),
(555, 'Sev - Temato', 'KATHIYAWADI', 25, 'ACTIVE'),
(556, 'Rotla', 'KATHIYAWADI', 25, 'ACTIVE'),
(557, 'Ghee - Gud', 'KATHIYAWADI', 25, 'ACTIVE'),
(558, 'Ringan Bharthu', 'KATHIYAWADI', 25, 'ACTIVE'),
(559, 'Vaghareli Khichdi', 'KATHIYAWADI', 25, 'ACTIVE'),
(560, 'Kadi', 'KATHIYAWADI', 25, 'ACTIVE'),
(561, 'Lasaniya Bataka', 'KATHIYAWADI', 25, 'ACTIVE'),
(562, 'Dhokdi Shak', 'KATHIYAWADI', 25, 'ACTIVE'),
(563, 'Chhas', 'KATHIYAWADI', 25, 'ACTIVE'),
(564, 'Fafda', 'KATHIYAWADI', 25, 'ACTIVE'),
(565, 'Gathiya', 'KATHIYAWADI', 25, 'ACTIVE'),
(566, 'Besan Gatta', 'KATHIYAWADI', 25, 'ACTIVE'),
(567, 'Dal - Bati', 'RAJASTHANI', 26, 'ACTIVE'),
(568, 'Churma Na ladu', 'RAJASTHANI', 26, 'ACTIVE'),
(569, 'Ker Sangari', 'RAJASTHANI', 26, 'ACTIVE'),
(570, 'Vadi Papdi', 'RAJASTHANI', 26, 'ACTIVE'),
(571, 'Rajasthani Alu', 'RAJASTHANI', 26, 'ACTIVE'),
(572, 'Marwadi Dal', 'RAJASTHANI', 26, 'ACTIVE'),
(573, 'Ram Khichri', 'RAJASTHANI', 26, 'ACTIVE'),
(574, 'Rajasthani Kadhi', 'RAJASTHANI', 26, 'ACTIVE'),
(575, 'Veg. Hakka Nuddles', 'CHINESE', 27, 'ACTIVE'),
(576, 'Veg. Fried Rice', 'CHINESE', 27, 'ACTIVE'),
(577, 'American Chowpsy', 'CHINESE', 27, 'ACTIVE'),
(578, 'Veg. Manchurian', 'CHINESE', 27, 'ACTIVE'),
(579, 'Spring Roll', 'CHINESE', 27, 'ACTIVE'),
(580, 'Veg. Chau Chau', 'CHINESE', 27, 'ACTIVE'),
(581, 'Manchurian Rice', 'CHINESE', 27, 'ACTIVE'),
(582, 'Fried Rice', 'CHINESE', 27, 'ACTIVE'),
(583, 'Chinese Bhel', 'CHINESE', 27, 'ACTIVE'),
(584, 'Relanos', 'MAXICAN', 28, 'ACTIVE'),
(585, 'Maxican Bins Cutlet', 'MAXICAN', 28, 'ACTIVE'),
(586, 'Corn Berrytoes', 'MAXICAN', 28, 'ACTIVE'),
(587, 'Talos', 'MAXICAN', 28, 'ACTIVE'),
(588, 'Maxican Tava', 'MAXICAN', 28, 'ACTIVE'),
(589, 'Maxican Hot-Pot With Corn Chips', 'MAXICAN', 28, 'ACTIVE'),
(590, 'Chips Cherrytoes', 'MAXICAN', 28, 'ACTIVE'),
(591, 'Veg. Berrytoes', 'MAXICAN', 28, 'ACTIVE'),
(592, 'Nachhos With Salsa Sauce', 'MAXICAN', 28, 'ACTIVE'),
(593, 'Berrytoes', 'MAXICAN', 28, 'ACTIVE'),
(594, 'Maxican Brown Rice', 'MAXICAN', 28, 'ACTIVE'),
(595, 'Enchiladas', 'MAXICAN', 28, 'ACTIVE'),
(596, 'Thai Green Curry', 'MAXICAN', 28, 'ACTIVE'),
(597, 'Thai Curry', 'MAXICAN', 28, 'ACTIVE'),
(598, 'Maxican Bins Curry', 'MAXICAN', 28, 'ACTIVE'),
(599, 'Maxican Bins Pizza', 'MAXICAN', 28, 'ACTIVE'),
(600, 'Veg. Baked Dish', 'BAKED DISH', 29, 'ACTIVE'),
(601, 'Palak Baked Dish', 'BAKED DISH', 29, 'ACTIVE'),
(602, 'Veg. Augratin', 'BAKED DISH', 29, 'ACTIVE'),
(603, 'Spaghetti Pineapple Baked', 'BAKED DISH', 29, 'ACTIVE'),
(604, 'Baked Macroni', 'BAKED DISH', 29, 'ACTIVE'),
(605, 'Palak - Corn - Pineapple', 'BAKED DISH', 29, 'ACTIVE'),
(606, 'Microni With Pineapple', 'BAKED DISH', 29, 'ACTIVE'),
(607, 'Cheese Sauce', 'LIVE PASTA WITH', 30, 'ACTIVE'),
(608, 'Tomato Sauce', 'LIVE PASTA WITH', 30, 'ACTIVE'),
(609, 'Palak Sauce', 'LIVE PASTA WITH', 30, 'ACTIVE'),
(610, 'Kesar Pista Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(611, 'Kaju Draksh  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(612, 'American Dry Fruit', 'ICE - CREAM', 31, 'ACTIVE'),
(613, 'Butter Scotch  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(614, 'Rajbhog  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(615, 'Mango  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(616, 'Black Current  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(617, 'Mava  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(618, 'Sitafal  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(619, 'Chocolate  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(620, 'Rajasthani Kulfi', 'ICE - CREAM', 31, 'ACTIVE'),
(621, 'Vanila  Ice-Cream', 'ICE - CREAM', 31, 'ACTIVE'),
(622, 'Trifale Pudding', 'DESSERT', 32, 'ACTIVE'),
(623, 'Chocolate Pudding', 'DESSERT', 32, 'ACTIVE'),
(624, 'Choco Tuckle pudding', 'DESSERT', 32, 'ACTIVE'),
(625, 'Orange Pudding', 'DESSERT', 32, 'ACTIVE'),
(626, 'Chocolate Strawberry', 'DESSERT', 32, 'ACTIVE'),
(627, 'Chocolate Pineapple', 'DESSERT', 32, 'ACTIVE'),
(628, 'Chocolate Peach', 'DESSERT', 32, 'ACTIVE'),
(629, 'Kulfi Faluda', 'DESSERT', 32, 'ACTIVE'),
(630, 'Rabdi Faluda', 'DESSERT', 32, 'ACTIVE'),
(631, 'Tea', 'FOR EVER', 33, 'ACTIVE'),
(632, 'Coffee', 'FOR EVER', 33, 'ACTIVE'),
(633, 'Milk', 'FOR EVER', 33, 'ACTIVE'),
(634, 'Bornvita', 'FOR EVER', 33, 'ACTIVE'),
(635, 'Ilaichi Milk', 'FOR EVER', 33, 'ACTIVE'),
(636, 'Kesar Milk', 'FOR EVER', 33, 'ACTIVE'),
(637, 'Kadhi Milk', 'FOR EVER', 33, 'ACTIVE'),
(638, 'Dhana Dal', 'MUKHWAS', 34, 'ACTIVE'),
(639, 'Lili Valiyali', 'MUKHWAS', 34, 'ACTIVE'),
(640, 'Kharek', 'MUKHWAS', 34, 'ACTIVE'),
(641, 'Hajma Hajam', 'MUKHWAS', 34, 'ACTIVE'),
(642, 'Rajwadi Mukhwas', 'MUKHWAS', 34, 'ACTIVE'),
(643, 'Pan Counter', 'MUKHWAS', 34, 'ACTIVE'),
(644, 'Mitha Pan', 'MUKHWAS', 34, 'ACTIVE'),
(645, 'Singoda Pan', 'MUKHWAS', 34, 'ACTIVE'),
(646, 'Mineral Water', 'AT LAST', 35, 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am_admin`
--
ALTER TABLE `am_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `am_category`
--
ALTER TABLE `am_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `am_faraskhana`
--
ALTER TABLE `am_faraskhana`
  ADD PRIMARY KEY (`fk_id`);

--
-- Indexes for table `am_mail`
--
ALTER TABLE `am_mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `am_menu_image`
--
ALTER TABLE `am_menu_image`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `am_message`
--
ALTER TABLE `am_message`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `am_newsletter`
--
ALTER TABLE `am_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `am_sub_category`
--
ALTER TABLE `am_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `am_admin`
--
ALTER TABLE `am_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `am_category`
--
ALTER TABLE `am_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `am_faraskhana`
--
ALTER TABLE `am_faraskhana`
  MODIFY `fk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `am_mail`
--
ALTER TABLE `am_mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `am_menu_image`
--
ALTER TABLE `am_menu_image`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `am_message`
--
ALTER TABLE `am_message`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `am_newsletter`
--
ALTER TABLE `am_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `am_sub_category`
--
ALTER TABLE `am_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
