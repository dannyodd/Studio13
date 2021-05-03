-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 07:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i210_group13_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `product_id` int(11) NOT NULL,
  `album_title` varchar(255) NOT NULL,
  `album_genre` varchar(255) NOT NULL,
  `album_media_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`product_id`, `album_title`, `album_genre`, `album_media_type`) VALUES
(2, 'The Pick of Destiny', 'Rock', 'Vinyl'),
(3, 'Master of Reality', 'Heavy Metal', 'CD'),
(4, 'Old', 'Rap/Hip-Hop', 'Digital Download');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_name` varchar(25) NOT NULL,
  `artist_bio` text NOT NULL,
  `artist_image` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `user_id`, `artist_name`, `artist_bio`, `artist_image`) VALUES
(1, 2, 'Dio', 'Ronald James Padavona, known professionally as Ronnie James Dio, was an American heavy metal singer-songwriter who, after leaving the band Black Sabbath with drummer Vinny Appice, created the band \"Dio.\" Their debut album \"Holy Diver\" debuted in 1983 and peaked at number 61 on the Billboad 200 and was certified platinum in the United States.', 'diopic.png\r\n'),
(2, 3, 'Rival Sons', 'Rival Sons is an American rock band formed in Long Beach, California, in 2009. The band consists of Jay Buchanan (lead vocals), Scott Holiday (guitar), Dave Beste (bass guitar) and Michael Miley (drums). The band is joined by touring keyboard player Todd Ögren when on the road. They are signed to Atlantic Records via Dave Cobb\'s label Low Country Sound, an imprint of Elektra. They have released six albums and one EP.', 'RSpic.png'),
(3, 4, 'Black Sabbath', 'Black Sabbath were an English rock band formed in Birmingham in 1968 by guitarist Tony Iommi, drummer Bill Ward, bassist Geezer Butler and vocalist Ozzy Osbourne. They are often cited as pioneers of heavy metal music.[1] The band helped define the genre with releases such as Black Sabbath (1970), Paranoid (1970), and Master of Reality (1971). The band had multiple line-up changes following Osbourne\'s departure in 1979, with Iommi being the only constant member throughout its history.', 'BSpic.png'),
(4, 5, 'Danny Brown', 'Daniel Dewan Sewell (born March 16, 1981), known professionally as Danny Brown, is an American rapper and songwriter.[1][2] He is described by MTV as \"one of rap\'s most unique figures in recent memory\".[3]\r\n\r\nIn 2010, after amassing several mixtapes, Brown released his debut studio album, The Hybrid. Brown began to gain major recognition after the release of his second studio album, XXX, which received critical acclaim and earned him such accolades as Spin, as well as Metro Times \"Artist of the Year\".[4] In 2013, he entered a US Billboard chart, with the release of his third studio album, Old, which reached number 18 on the US Billboard 200 chart and spawned three singles, \"Dip\", \"25 Bucks\" and \"Smokin & Drinkin”, which peaked at number 31 on the Top R&B/Hip-Hop songs chart. His fourth studio album, Atrocity Exhibition, was released on September 27, 2016 and his fifth studio album, U Know What I\'m Sayin?, was released on October 4, 2019.', 'DBpic.png'),
(5, 6, 'Tenacious D', 'Tenacious D is an American comedy rock duo, formed in Los Angeles, California, in 1994. It was founded by actors Jack Black and Kyle Gass, who were members of The Actors\' Gang theater company at the time. The duo\'s name is derived from \"tenacious defense\", a phrase used by NBA basketball sportscaster Marv Albert. <br>\r\n<br>\r\nIn 2000, they signed with Epic Records and the year after released Tenacious D, their debut album featuring a full band, including Grohl on the drums. The first single \"Tribute\" has since achieved cult-status, contributing to their popularity in the United Kingdom, Sweden, Ireland and Australia.[4] In 2003, the band released The Complete Master Works, their first live concert DVD which achieved gold and platinum status by the RIAA.', 'TDpic.png');

-- --------------------------------------------------------

--
-- Table structure for table `line_items`
--

CREATE TABLE `line_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `line_qty` int(11) NOT NULL,
  `line_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line_items`
--

INSERT INTO `line_items` (`order_id`, `product_id`, `line_qty`, `line_total`) VALUES
(1, 1, 1, 14.99),
(2, 1, 1, 14.99),
(2, 3, 1, 14.99),
(2, 4, 1, 14.99),
(3, 3, 2, 29.98),
(4, 5, 1, 9.99),
(5, 2, 1, 24.99);

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `product_id` int(11) NOT NULL,
  `merch_type` varchar(255) DEFAULT NULL COMMENT 'For all products that are not albums - Can be null',
  `merch_color` varchar(255) DEFAULT NULL COMMENT 'For all products that are not albums - Can be null',
  `merch_size` varchar(255) DEFAULT NULL COMMENT 'For all products that are not albums - Can be null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`product_id`, `merch_type`, `merch_color`, `merch_size`) VALUES
(1, 'Hat', 'Black', 'One size fits all');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_time`, `order_total`) VALUES
(1, 7, '2020-08-27', '12:40:48', 14.99),
(2, 8, '2020-09-16', '19:33:35', 44.97),
(3, 9, '2020-10-13', '11:02:00', 29.98),
(4, 10, '2020-11-08', '12:20:04', 9.99),
(5, 7, '2020-11-12', '04:20:00', 24.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_description` text NOT NULL,
  `product_image_link` varchar(255) NOT NULL COMMENT 'Points to image stored in www/images folder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `artist_id`, `product_price`, `product_description`, `product_image_link`) VALUES
(1, 'Master of Reality Sock Cap', 3, 14.99, 'This is a black sock cap bearing the image of the album art from Black Sabbath\'s \"Master of Reality\" album.', 'sockcap.png'),
(2, 'The Pick of Destiny (Limited Edition Vinyl)', 5, 24.99, 'This is a limited edition vinyl release of Tenacious D\'s bestselling 2006 album \"The Pick of Destiny.\" The record is pressed from green vinyl and is signed by the band.', 'pickdestiny.png'),
(3, 'Master of Reality 2009 Remastered (CD)', 3, 14.99, 'This is the digitally remastered, 2009 re-release of Black Sabbath\'s double-platinum 1971 album \"Master of Reality.\" Enjoy one of the greatest heavy metal albums of all time, digitally remastered for high quality audio like never before.', 'mor.png'),
(4, 'Old (Digital Download)', 4, 14.99, 'This is a digital download of rapper Danny Brown\'s 2013 album \"Old,\" published by Fool\'s Gold Records. It is Brown\'s most critically acclaimed album to date, topping the charts at #3 in top rap albums and #18 overall in the U.S.', 'oldac.png'),
(5, 'Holy Diver Coffee Mug', 1, 9.99, 'This is a black coffee mug bearing the image of the album art from Dio\'s critically acclaimed debut album \"Holy Diver.\"', 'diomug.png'),
(11, 'Feral Roots (Digital Download)', 2, 14.99, 'Feral Roots is the sixth studio album by American rock band Rival Sons. It was released on January 25, 2019, through Low Country Sound and Atlantic Records. It is the band&#39;s first album since Hollow Bones, and their first release on Atlantic Records.', 'RsFR.png'),
(12, 'The Last in Line', 1, 14.99, 'The Last In Line is the second studio album by the American heavy metal band Dio, released on July 2, 1984. It is the first Dio album to feature former Rough Cutt keyboardist Claude Schnell. It became the band&#39;s highest-charting album in both the UK and the U.S., reaching number 4 and number 23, respectively.', 'LiL.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_email`, `user_fname`, `user_lname`, `user_password`) VALUES
(1, 1, 'admin@email.com', 'Admin', 'Adminson', 'password'),
(2, 2, 'ronjdio@email.com', 'Ronnie', 'Dio', 'diorulez'),
(3, 2, 'rivalsons@email.com', 'Jay', 'Buchanan', 'valkyrie'),
(4, 2, 'blacksabbath@email.com', 'Ozzy', 'Osbourne', 'handofdoom'),
(5, 2, 'dannybrown@email.com', 'Danny', 'Brown', 'coolranch'),
(6, 2, 'tenaciousd@email.com', 'Jack', 'Black', 'tenac'),
(7, 3, 'dudeguy@email.com', 'Guy', 'Dude', 'thedudeliest'),
(8, 3, 'jeffbridges@email.com', 'Jeff', 'Bridges', 'elduderino'),
(9, 3, 'mickfoley@email.com', 'Mick', 'Foley', 'wwehxc'),
(10, 3, 'tripleh@email.com', 'Hunter', 'Helmsley', 'dgenx'),
(17, 3, 'testuser@email.com', 'Fntest', 'Lntest', 'passtest'),
(18, 1, 'ryan@gmail.com', 'Ryan', 'Rohrbach', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `line_items`
--
ALTER TABLE `line_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `line_items`
--
ALTER TABLE `line_items`
  ADD CONSTRAINT `line_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `line_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD CONSTRAINT `merchandise_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
