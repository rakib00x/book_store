-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 02:03 PM
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
-- Database: `bookstore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddBook` (`pname` VARCHAR(50), `pcat` INT, `price` DECIMAL(15,2), `disc_price` DECIMAL(15,2), `author` VARCHAR(50), `publisher` VARCHAR(50), `year` INT, `isbn` CHAR(13), `descr` TEXT, OUT `prodid` INT)  BEGIN
INSERT into products(pname,pcat,price,disc_price,descr,author,
publisher,year,isbn) 
VALUES(pname,pcat,price,disc_price,descr,author,publisher,year,isbn);
set prodid=last_insert_id();

update products p set pdf=concat(prodid,'.pdf'),photo=concat(prodid,'.jpg')
where p.prodid=prodid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CancelOrder` (`oid` INT)  BEGIN
delete from order_details where order_id=oid;

delete from orders where order_id=oid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConfirmOrder` (`oid` INT)  BEGIN
UPDATE orders set order_status='Confirmed' where order_id=oid;

insert into mybooks(userid,prodid,photo,pdf,pname)
select o.userid,p.prodid,photo,pdf,pname from products p join  order_details od
on p.prodid=od.prodid join orders o on o.order_id=od.order_id where o.order_id=oid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PlaceOrder` (`user` VARCHAR(40), OUT `orderid` INT)  BEGIN
insert into orders(userid) values(user);
set orderid=last_insert_id();

INSERT INTO order_details(prodid,qty,order_id) 
select prodid,qty,orderid from cart where userid=user;

delete from cart where userid=user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegisterUser` (IN `fname` VARCHAR(30), IN `userid` VARCHAR(40), IN `pwd` VARCHAR(20))  BEGIN
INSERT INTO users VALUES(fname,userid,pwd,'C');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateBook` (`pname` VARCHAR(50), `pcat` INT, `price` DECIMAL(15,2), `disc_price` DECIMAL(15,2), `author` VARCHAR(50), `publisher` VARCHAR(50), `year` INT, `isbn` CHAR(13), `descr` TEXT, `prodid` INT)  BEGIN
	UPDATE products p set pname=pname,price=price,pcat=pcat,disc_price=disc_price,
    descr=descr,author=author,year=year,publisher=publisher,isbn=isbn where p.prodid=prodid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userid` varchar(30) NOT NULL,
  `prodid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userid`, `prodid`, `qty`) VALUES
('andan@gmail.com', 171, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `category`) VALUES
(5, 'Computer Programming'),
(6, 'Database Programming'),
(12, 'Web Designing'),
(13, 'Basic Computer '),
(14, 'Networking'),
(15, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `cust_address`
--

CREATE TABLE `cust_address` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` char(10) NOT NULL,
  `pin` char(8) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_address`
--

INSERT INTO `cust_address` (`id`, `userid`, `name`, `mobile`, `pin`, `state`, `city`, `address`) VALUES
(1, 'anand@gmail.com', 'Anand Singh', '9878979879', '234234', 'up', 'Noida', 'Noida'),
(20, 'anand@gmail.com', 'Anand Singh', '0176150266', '3432', 'uiop', 'yuoi', 'artsy'),
(21, 'anand@gmail.com', 'Anand Singh', '0176150266', '3234', 'erfd', 'sder', 'sderf'),
(22, 'andan@gmail.com', 'Anand Singh', '01555433', '5643', 'c csddf', 'vfgd', 'drsgj');

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE `mybooks` (
  `userid` varchar(50) NOT NULL,
  `prodid` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `pdf` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mybooks`
--

INSERT INTO `mybooks` (`userid`, `prodid`, `photo`, `pdf`, `pname`) VALUES
('anand@gmail.com', 166, '166.jpg', '166.pdf', 'Rapidex Computer Course'),
('anand@gmail.com', 167, '167.jpg', '167.pdf', 'OOP with C++');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` varchar(30) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `addressid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `orderdate`, `userid`, `order_status`, `addressid`) VALUES
(6, '2022-05-19 19:44:09', 'anand@gmail.com', 'Pending', 1),
(7, '2022-05-19 19:46:34', 'anand@gmail.com', 'Confirmed', 2),
(8, '2022-05-19 20:02:59', 'anand@gmail.com', 'Pending', 3),
(9, '2022-05-19 20:06:50', 'anand@gmail.com', 'Pending', 4),
(10, '2022-05-19 20:08:51', 'anand@gmail.com', 'Pending', 5),
(11, '2022-11-18 05:23:28', 'anand@gmail.com', 'Pending', 6),
(12, '2022-11-18 06:28:08', 'anand@gmail.com', 'Pending', 8),
(13, '2022-11-18 06:31:00', 'anand@gmail.com', 'Pending', 9),
(14, '2022-11-18 08:31:36', 'anand@gmail.com', 'Pending', 15),
(15, '2022-11-18 08:33:05', 'anand@gmail.com', 'Pending', 16),
(16, '2022-11-18 11:17:24', 'anand@gmail.com', 'Pending', 17),
(17, '2022-11-18 11:18:41', 'anand@gmail.com', 'Pending', 18),
(18, '2022-11-18 11:21:18', 'anand@gmail.com', 'Pending', 19),
(19, '2022-11-18 12:07:16', 'anand@gmail.com', 'Pending', 20),
(20, '2022-11-18 12:22:13', 'anand@gmail.com', 'Pending', 21),
(21, '2022-11-18 12:53:03', 'andan@gmail.com', 'Pending', 22);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `prodid`, `qty`) VALUES
(7, 166, 1),
(19, 167, 1),
(20, 167, 1),
(21, 168, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pcat` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `ISBN` char(13) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `disc_price` decimal(16,2) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `descr` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodid`, `pname`, `pcat`, `author`, `publisher`, `year`, `ISBN`, `price`, `disc_price`, `photo`, `pdf`, `descr`, `create_date`) VALUES
(166, 'Rapidex Computer Course', 13, 'Anand Singh', 'BPB Publications', 2020, '6598565653232', '900.00', '800.00', '166.jpg', '166.pdf', 'Best computer fundamental book', '2021-03-19 21:39:40'),
(167, 'OOP with C++', 5, 'E. Balagurusamy', 'Oxford Press', 2019, '3252124562335', '800.00', '600.00', '167.jpg', '167.pdf', 'E Balagurusamy Book', '2021-03-19 21:49:04'),
(168, 'Photoshop Studio Skills', 12, 'Anand Singh', 'Oxford Press', 2019, '653623656232', '1200.00', '1100.00', '168.jpg', '168.pdf', 'test', '2021-03-20 06:38:37'),
(169, 'Computer Fundamentals', 13, 'P. K. Sinha', 'BPB Publications', 2020, '1111111111111', '900.00', '750.00', '169.jpg', '169.pdf', 'test', '2021-03-20 06:50:27'),
(170, 'Computer Networks', 14, 'Anand Singh', 'Oxford Press', 2020, '1236547887878', '1000.00', '800.00', '170.jpg', '170.pdf', 'test', '2021-03-20 07:44:41'),
(171, 'MS Excel 2007', 13, 'Anand Singh', 'Oxford Press', 2020, '4656896556565', '600.00', '500.00', '171.jpg', '171.pdf', 'test', '2021-03-20 09:10:49'),
(172, 'Data Structure', 5, 'Yashwant Kanetkar', 'BPB Publications', 2020, '3232656532323', '1200.00', '1000.00', '172.jpg', '172.pdf', 'test', '2021-03-20 11:32:32'),
(173, 'Let Us C', 5, 'Yashwant Kanetkar', 'BPB Publications', 2019, '1232323223223', '1000.00', '900.00', '173.jpg', '173.pdf', 'Best Book for C Programming', '2021-03-23 18:51:26'),
(174, 'HTML, CSS and Javascript', 12, 'Anand Singh', 'BPB Publications', 2020, '3236532323232', '1100.00', '1000.00', '174.jpg', '174.pdf', 'test', '2021-03-23 18:53:43'),
(175, 'MySQL Complete Reference', 6, 'Vikram Vaswani', 'Tata McGraw Hill', 2020, '2323656213233', '1200.00', '1000.00', '175.jpg', '175.pdf', 'Best Book for mysql', '2021-03-26 10:05:44'),
(176, 'SQL Server T-SQL', 6, 'Ben Forta', 'SAMS', 2019, '2154212456523', '1000.00', '900.00', '176.jpg', '176.pdf', 'SQL Server 2019 Book', '2021-03-26 10:06:50'),
(177, 'Oracle PL/SQL Programming', 6, 'Michael McLang', 'Tata McGraw Hill', 2020, '1122552222255', '900.00', '850.00', '177.jpg', '177.pdf', 'test', '2021-03-26 10:08:04'),
(178, 'Let Us C++', 5, 'Yashwant Kanetkar', 'BPB Publications', 2020, '1545653265685', '1000.00', '900.00', '178.jpg', '178.pdf', 'Let Us C++ Book', '2021-03-27 12:18:26'),
(179, 'Python Data Science', 15, 'Jake Vanderplas', 'Orelly', 2020, '1323332326222', '600.00', '550.00', '179.jpg', '179.pdf', '', '2021-05-16 18:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `review_star` varchar(255) NOT NULL,
  `review_details` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `userid`, `name`, `review_star`, `review_details`, `create_at`, `status`) VALUES
(4, 167, 0, 'Anand Singh', '3', 'hello', '2022-11-18 10:17:51', NULL),
(5, 168, 0, 'Anand Singh', '4', 'hello', '2022-11-18 12:50:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `number`, `amount`, `cvc`, `type`, `last_date`) VALUES
(4, '2345677', '1200.00', NULL, NULL, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `role` varchar(15) DEFAULT NULL,
  `toke_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `userid`, `pwd`, `role`, `toke_id`) VALUES
(1, 'Administrator', 'admin@admin.com', 'anand', 'Admin', 0),
(2, 'Anand Singh', 'andan@gmail.com', 'anand', 'C', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userid`,`prodid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `cust_address`
--
ALTER TABLE `cust_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD PRIMARY KEY (`userid`,`prodid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`prodid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cust_address`
--
ALTER TABLE `cust_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
