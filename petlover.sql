-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 11:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petlover`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_post`
--

CREATE TABLE `adoption_post` (
  `post_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `imagepath` varchar(200) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `post_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoption_post`
--

INSERT INTO `adoption_post` (`post_id`, `username`, `location`, `description`, `imagepath`, `price`, `post_type`) VALUES
(18, 'sadiq', 'Dhaka', 'Dog.                                       ', 'images/7096.jpg', 100, 'free'),
(25, 'sadiq', 'Ctg', 'cat', 'images/5585.jpg', 200, 'free'),
(36, 'sadiq', 'Dhaka', 'I want to sell a cat.                                                                    ', 'images/4181.jpg', 1000, 'premium'),
(46, 'sadiq', 'Ctg', 'Cat.', 'images/5689.jpg', 1200, 'premium');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `organization_name` varchar(30) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `contact_no` char(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `admin_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`organization_name`, `address`, `contact_no`, `email`, `admin_name`) VALUES
('Bangladesh Animal Welfare Foun', 'Dhaka', '01717675766', 'animalwalfare@gmail.', 'admin'),
('Care For Paws', 'Dhaka', '0165817270', 'careforpet@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pet_food`
--

CREATE TABLE `pet_food` (
  `food_ID` int(11) NOT NULL,
  `pet_type` varchar(10) DEFAULT NULL,
  `food_name` varchar(20) DEFAULT NULL,
  `shop_owner_name` varchar(20) DEFAULT NULL,
  `shop_name` varchar(30) DEFAULT NULL,
  `shop_addrsess` varchar(30) DEFAULT NULL,
  `price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pp_payment`
--

CREATE TABLE `pp_payment` (
  `payment_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pp_payment`
--

INSERT INTO `pp_payment` (`payment_id`, `username`, `payment_date`, `amount`, `post_id`) VALUES
(1, 'sadiq', '2021-09-27', 150, 34),
(2, 'sadiq', '2021-09-27', 150, 35),
(3, 'sadiq', '2021-09-27', 150, 36),
(4, 'sadiq', '2021-09-27', 150, 38),
(5, 'sadiq', '2021-09-27', 150, 39),
(11, 'sadiq', '2021-09-29', 150, 46);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `review_details` varchar(100) NOT NULL,
  `ratings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `username`, `review_details`, `ratings`) VALUES
(1, 'sadiq', 'asasa', 5),
(3, 'sadiq', '111', 4),
(5, 'sadiq', 'It is really a good website.', 4),
(9, 'sadiq', 'It need some improvements', 3),
(10, 'sadiq', 'It is a good website.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` char(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `phone`, `username`, `password`, `user_type`) VALUES
('Abrar Sadiq', 'abrar@gmail.com', '01832366572', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
('asif', 'asif@gmail.com', '01234567897', 'asif', '827ccb0eea8a706c4c34a16891f84e7b', 'general'),
('sadiq', 'sadiq@gmail.com', '01832366573', 'sadiq', '827ccb0eea8a706c4c34a16891f84e7b', 'general'),
('samir', 'samir@gmail.com', '01832366574', 'samir', '250cf8b51c773f3f8dc8b4be867a9a02', 'general');

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE `vet` (
  `vet_id` int(10) NOT NULL,
  `vet_name` varchar(20) NOT NULL,
  `contact_number` char(11) NOT NULL,
  `vet_details` varchar(100) NOT NULL,
  `location` varchar(30) NOT NULL,
  `admin_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`vet_id`, `vet_name`, `contact_number`, `vet_details`, `location`, `admin_name`) VALUES
(4, 'Dr. Samir', '01832366572', 'Good doctor.', 'Dhaka', 'admin'),
(5, 'Dr. Abrar', '01832366575', 'Good doctor', 'Ctg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_post`
--
ALTER TABLE `adoption_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FKAdoption_p670433` (`username`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`organization_name`),
  ADD KEY `admin_name` (`admin_name`);

--
-- Indexes for table `pet_food`
--
ALTER TABLE `pet_food`
  ADD PRIMARY KEY (`food_ID`),
  ADD KEY `shop_owner_name` (`shop_owner_name`);

--
-- Indexes for table `pp_payment`
--
ALTER TABLE `pp_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD KEY `FKPayment191386` (`username`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FKReview706506` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`vet_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`),
  ADD KEY `FKVet54665` (`admin_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_post`
--
ALTER TABLE `adoption_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pet_food`
--
ALTER TABLE `pet_food`
  MODIFY `food_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pp_payment`
--
ALTER TABLE `pp_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `vet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_post`
--
ALTER TABLE `adoption_post`
  ADD CONSTRAINT `FKAdoption_p670433` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `emergency`
--
ALTER TABLE `emergency`
  ADD CONSTRAINT `emergency_ibfk_1` FOREIGN KEY (`admin_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `pet_food`
--
ALTER TABLE `pet_food`
  ADD CONSTRAINT `pet_food_ibfk_1` FOREIGN KEY (`shop_owner_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `pp_payment`
--
ALTER TABLE `pp_payment`
  ADD CONSTRAINT `FKPayment191386` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FKReview706506` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `vet`
--
ALTER TABLE `vet`
  ADD CONSTRAINT `FK_vet` FOREIGN KEY (`admin_name`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
