-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 10:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(3) NOT NULL,
  `con_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ci_lat` float NOT NULL,
  `ci_lon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `con_id`, `name`, `ci_lat`, `ci_lon`) VALUES
(1, 1, 'Kathmandu', 27.7172, 85.324),
(2, 1, 'Pokhara', 28.2096, 83.9856);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `con_lat` float NOT NULL,
  `con_lon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `con_lat`, `con_lon`) VALUES
(1, 'Nepal', 28.3949, 84.124),
(2, 'India', 20.5937, 78.9629),
(3, 'China', 35.8617, 104.195);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(3) NOT NULL,
  `cuisine_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `cuisine_name`) VALUES
(1, 'Asian'),
(2, 'Nepali'),
(3, 'Chinese'),
(4, 'Thai'),
(5, 'Italian'),
(6, 'Local Cuisine'),
(7, 'Indian'),
(9, 'Tibetan');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`id`, `name`) VALUES
(1, 'Bakery'),
(2, 'Fine Dinner'),
(3, 'Casual'),
(4, 'Cafe'),
(5, 'Fast Food');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(3) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_image` mediumtext NOT NULL,
  `meals_deals` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `food_name`, `food_image`, `meals_deals`) VALUES
(1, 'Burger', 'https://image.shutterstock.com/image-photo/fresh-tasty-chicken-burger-on-600w-1163579620.jpg', 20),
(2, 'Thukpa Recipe', 'https://thumbs.dreamstime.com/b/chicken-thukpa-black-bowl-isolated-white-background-tibetan-cuisine-noodle-soup-vegetables-meat-169254919.jpg', 25),
(3, 'Skewa Meat', 'https://thumbs.dreamstime.com/b/meat-skewer-herbs-lime-pita-bread-35683174.jpg', 10),
(4, 'MO:MO', 'https://thumbs.dreamstime.com/b/vegetarian-tibetan-momo-beans-21328588.jpg', 30),
(5, 'Milkshake(smoothie)', 'https://thumbs.dreamstime.com/b/milkshake-smoothie-chocolate-cherry-glass-selective-focus-69870320.jpg', 25),
(6, 'Vegetarian Chowmein', 'https://thumbs.dreamstime.com/b/vegetarian-chowmein-26696021.jpg', 50),
(7, 'Coffe', 'https://thumbs.dreamstime.com/b/cup-coffe-22352366.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(3) NOT NULL,
  `city_id` int(3) NOT NULL,
  `cuisine_id` int(3) NOT NULL,
  `establishment_id` int(3) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `special_item` varchar(100) NOT NULL,
  `restaurant_hours` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `restaurant_image` varchar(100) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `average_cost` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `most_popular` tinyint(1) NOT NULL,
  `is_food_popular` tinyint(1) NOT NULL,
  `images` longtext NOT NULL,
  `thumbnail_image` tinytext NOT NULL,
  `cuisines` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `city_id`, `cuisine_id`, `establishment_id`, `restaurant_name`, `special_item`, `restaurant_hours`, `location`, `rating`, `restaurant_image`, `food_image`, `average_cost`, `description`, `most_popular`, `is_food_popular`, `images`, `thumbnail_image`, `cuisines`) VALUES
(36, 1, 5, 4, 'Rosemary Kitchen & Coffee Shop', 'Coffee and Carrot Cake', '7:00 AM - 10:00 PM', 'Thamel Marga, Kathmandu', '4.8', '5e8d4a39c9818.jpg', '5e8d4a39c984e.jpg', '$$ - $$$', 'NAMASTE- welcome to the place of excellence! \"Food for the body is not enough. There must be food for the soul.\" -Dorothy Day Rosemary Kitchen does not have a long history back, but the humble appreciation of satisfied clients so far makes it a Legend! It has been two year that Rosemary Kitchen was open to serve the public. Since then, it has been serving the food for soul and accumulated great client base of internal and external tourists who come to visit the Himalayan Kingdom of Nepal.', 1, 1, '5e8d4a39c9884.jpg,5e8d4a39c9897.jpg,5e8d4a39c98a4.jpg,5e8d4a39c98b1.jpg,5e8d4a39c98bd.jpg,5e8d4a39c98ca.jpg', '5e8d4a39c977b.jpg', 'Local cuisine, Italian, French, Tibetan, Nepali, Vegetarian Friendly'),
(37, 1, 6, 2, 'Bhojan Griha', 'Vegetarian Friendly', '10:00 AM - 9:00 PM', 'Dillibazar, Kathmandu', '5.0', '5e8d57f8420c0.jpg', '5e8d57f8420d5.jpg', '$$-$$$', 'Bhojangriha, established in an ancient architectural building in Dillibazzar, is one of the finest and the largest Restaurant in Kathmandu valley. It specializes in Newari cuisines and consists of different floors to cater the eating experience and dishes. The unique dining style in the standardized architecture is the best thing here and the service as well.', 1, 1, '5e8d57f8420e8.jpg,5e8d57f8420fb.jpg,5e8d57f84210d.jpg,5e8d57f84211f.jpg,5e8d57f842131.jpg,5e8d57f842144.jpg', '5e8d57f84208e.jpg', 'Nepali, Asian'),
(38, 1, 2, 5, 'The Burger House And Crunchy Fried Chicken', 'Burger', '9:00 AM - 10:00 PM', 'Pepsicola, Kathmandu', '4.5', '5e8e9e05e3259.jpg', '5e8e9e05e327e.jpg', '$$-$$$', 'The Burger House &amp; Crunchy Fried Chicken Restaurant is the most sorted fast food sit down restaurant in the town. We are the best burger station in town.', 1, 1, '5e8e9e05e32a4.jpg,5e8e9e05e32cb.jpg,5e8e9e05e32ee.jpg,5e8e9e05e3312.jpg,5e8e9e05e3338.jpg,5e8e9e05e3366.jpg', '5e8e9e05e31e6.jpg', 'Nepali, Asian'),
(39, 1, 7, 2, 'Sarangi Vegetarian Restaurant', 'Vegan Options', '8:30 AM - 10:00 PM', 'Thamel 29, Kathmandu', '4.8', '5e8ea1e9b2f8d.jpg', '5e8ea1e9b2f9c.jpg', '$$-$$$', 'A social business that\'s contemporary in design, we serve high quality, vegetarian and vegan dishes. We welcome guests with good hearts that care about Nepal, its people and the environment. We have aquaponic garden on the rooftop growing organic veggies on site. Conveniently located right next door to the Kathmandu Guest House in the heart of Thamel, our restaurant is situated off the main street in the Shiva complex. We are at the back of the courtyard on the upper floors. This quiet location allows you to enjoy our delicious food, in a peaceful and spacious environment. We\'re proud to be 100% social business meaning all of our profits go toward empowering and assisting the Gandharba people in Nepal who rank lowest amongst the castes.', 1, 1, '5e8ea1e9b2fad.jpeg,5e8ea1e9b2fbb.jpg,5e8ea1e9b2fc8.jpeg,5e8ea1e9b2fd5.jpg,5e8ea1e9b2fe2.jpg,5e8ea1e9b2fef.jpg', '5e8ea1e9b2f63.jpeg', 'Indian, Fusion'),
(40, 9, 1, 1, 'Yangling Tibetan Restaurant', 'Tibetan Chowmein', '7:00 AM - 10:00 PM', 'Kaldhara Marg, Kathmandu', '3.8', '5e8eae03c563c.jpg', '5e8eae03c5659.jpg', '$$-$$$', 'This is the best place to eat mo mo and other Tibetan cuisines in Kathmandu Valley, You can come with your family and all of them love to eat there.', 1, 1, '5e8eae03c5677.jpg,5e8eae03c5693.jpg,5e8eae03c56aa.jpg,5e8eae03c56c2.jpg,5e8eae03c56dc.jpg,5e8eae03c56f2.jpg', '5e8eae03c55ce.jpg', 'Asian, Tibetan, Nepali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
