-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 01:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `post` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Sportd', 6),
(2, 'Entertainment', 1),
(3, 'Politics', 6),
(4, 'Health', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(9999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `post_date` varchar(50) DEFAULT NULL,
  `author` int DEFAULT NULL,
  `post_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(59, 'Bangladesh restores mobile internet after 11-day blackout to quell protests', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\n', '3', '31 Jul,2024', 35, 'AP23072355240588-1721972961.jpg'),
(60, 'Bangladesh authorities detain student protest leaders in hospital', 'Police had initially denied that Nahid Islam, Abu Bakar Mazumdar and Asif Mahmud were taken into custody. But Home Minister Asaduzzaman Khan subsequently told reporters: “They themselves were feeling insecure. They think that some people were threatening them.”\r\nWhile Khan did not confirm whether the three had been formally arrested, he told reporters late on Friday, “We think for their own security they needed to be interrogated to find out who was threatening them. After the interrogation, we will take the next course of action.\r\n', '1', '31 Jul,2024', 35, 'AP24212646144536-1722377992.jpeg'),
(61, 'How Bangladesh rickshaw pullers saved lives amid quota protest clashes', 'A group of rickshaw pullers found themselves caught in the fray. A tear gas shell flew towards them, prompting a hasty retreat towards the nearby Malibagh Circle, a bustling avenue. Their retreat was accompanied by defiant voices raised in protest against the authorities: “If anything happens to us [rickshaw pullers], we will ignite fires in every house!”\r\nAmong them was Shaheen, originally from Cumilla district some 180km (112 miles) away.\r\nIt was a horrifying scene,” he recounted, his voice trembling, the memory still vivid in his mind. “The police were firing at the protesters, who were retaliating by throwing', '3', '31 Jul,2024', 36, 'somshod 1.jpeg'),
(62, 'Bangladesh authorities detain student protest leaders in hospital', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\nPolice had initially denied that Nahid Islam, Abu Bakar Mazumdar and Asif Mahmud were taken into custody. But Home Minister Asaduzzaman Khan subsequently told reporters: “They themselves were feeling insecure. They think that some people were threatening them.” ', '3', '31 Jul,2024', 36, 'th.jpeg'),
(63, 'Bangladesh restores mobile internet after 11-day blackout to quell protests', 'prompting a hasty retreat towards the nearby Malibagh Circle, a bustling avenue. Their retreat was accompanied by defiant voices raised in protest against the authorities: “If anything happens to us [rickshaw pullers], we will ignite fires in every house!”\r\nAmong them was Shaheen, originally from Cumilla district some 180km (112 miles) away.\r\nIt was a horrifying scene,” he recounted, his voice trembling, the memory still vivid in his mind. “The police were firing at the protesters, who were retaliating by throwing', '3', '31 Jul,2024', 36, 'WhatsApp Image 2024-06-26 at 10.44.39_131ec5c0.jpg'),
(64, 'Bangladesh restores mobile internet after 11-day blackout to quell protests', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\nA group of rickshaw pullers found themselves caught in the fray. A tear gas shell flew towards them, prompting a hasty retreat towards the nearby Malibagh Circle, a bustling avenue. Their retreat was accompanied by defiant voices raised in protest against the authorities: “If anything happens to us [rickshaw pullers], we will ignite fires in every house!”', '3', '31 Jul,2024', 35, 'OIF.jpeg'),
(65, 'How Bangladesh rickshaw pullers saved lives amid quota protest clashes', 'A group of rickshaw pullers found themselves caught in the fray. A tear gas shell flew towards them, prompting a hasty retreat towards the nearby Malibagh Circle, a bustling avenue. Their retreat was accompanied by defiant voices raised in protest against the authorities: “If anything happens to us [rickshaw pullers], we will ignite fires in every house!”', '2', '31 Jul,2024', 35, 'th.jpeg'),
(66, 'Bangladesh authorities detain student protest leaders in hospital', 'Police had initially denied that Nahid Islam, Abu Bakar Mazumdar and Asif Mahmud were taken into custody. But Home Minister Asaduzzaman Khan subsequently told reporters: “They themselves were feeling insecure. They think that some people were threatening them.”\r\nWhile Khan did not confirm whether the three had been formally arrested, he told reporters late on Friday, “We think for their own security they needed to be interrogated to find out who was threatening them. After the interrogation, we will take the next course of action.\r\n\r\n', '1', '31 Jul,2024', 35, 'OIP (2).jpeg'),
(67, 'Israel says it targets senior Hezbollah commander in strike on Beirut', 'A group of rickshaw pullers found themselves caught in the fray. A tear gas shell flew towards them, prompting a hasty retreat towards the nearby Malibagh Circle, a bustling avenue. Their retreat was accompanied by defiant voices raised in protest against the authorities: “If anything happens to us [rickshaw pullers], we will ignite fires in every house!”\r\nAmong them was Shaheen, originally from Cumilla district some 180km (112 miles) away.\r\nIt was a horrifying scene,” he recounted, his voice trembling, the memory still vivid in his mind. “The police were firing at the protesters, who were retaliating by throwing\r\n ', '4', '31 Jul,2024', 35, 'OIP (4).jpeg'),
(68, 'Israel and the United States have blamed Hezbollah for the attack. ', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\n ', '4', '31 Jul,2024', 35, 'OIP (3).jpeg'),
(69, 'Police had initially denied that Nahid Islam, Abu Bakar Mazumdar and Asif Mahmud were taken into', 'Police had initially denied that Nahid Islam, Abu Bakar Mazumdar and Asif Mahmud were taken into custody. But Home Minister Asaduzzaman Khan subsequently told reporters: “They themselves were feeling insecure. They think that some people were threatening them.”\r\nWhile Khan did not confirm whether the three had been formally arrested, he told reporters late on Friday, “We think for their own security they needed to be interrogated to find out who was threatening them. After the interrogation, we will take the next course of action.\r\n', '2', '31 Jul,2024', 36, 'th (1).jpeg'),
(70, 'India beat Sri Lanka in Super Over to sweep T20 series', 'Washington Sundar, who claimed 2-23 earlier, bagged two wickets in the sudden death scenario as Sri Lanka managed only two runs in four balls and the tourists completed the win in style with Suryakumar hitting a boundary from the first ball.\r\nEarlier, chasing 138 for a consolation win on a crumbling pitch, Sri Lanka ', '1', '31 Jul,2024', 37, 'photo.jpg'),
(71, 'Bangladesh restores mobile internet after 11-day blackout to quell protests', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\n', '4', '31 Jul,2024', 37, 'OIP (5).jpeg'),
(72, 'Bangladesh restores mobile internet after 11-day blackout to quell protests', 'We have decided to restore the 4G network connectivity from 3pm [09:00 GMT] today,” the state minister said, following a meeting with internet service providers (ISP) and other stakeholders in the capital Dhaka.\r\nSocial media platforms such as WhatsApp, Facebook, TikTok and YouTube, however, remain restricted. The broadband internet connectivity was restored on Tuesday, but a vast majority of internet users in Bangladesh rely on mobile devices to connect with the world\r\n', '3', '31 Jul,2024', 35, 'th.jpeg'),
(76, 'Brazil s all-time leading goalscorer Marta walked off the', 'Brazil were level when Marta was sent off just before half-time, with Spain, scoring in the 68th minute and then the 17th minute of second-half injury time - an extension prompted by multiple injury delays - to maintain their 100% record.\r\nMarta, 38, won Olympic silver at Athens 2004 and Beijing 2008, losing to the United States on both occasions.\r\n   ', '4', '31 Jul,2024', 35, 'piccccc-01.jpeg'),
(77, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.  \r\n ', '4', '31 Jul,2024', 36, 'Screenshot (40) copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`websitename`, `logo`, `footerdesc`) VALUES
('S M SUMON', 'th (2).jpeg', ' Copy Right ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(35, 'S M ', 'Sumon', 'sumon', '51c13e545516fc982b4edbb913417ecd', 1),
(36, 'ashik', 'sheik', 'ashik', '51c13e545516fc982b4edbb913417ecd', 0),
(37, 'try', 'name', 'try', '51c13e545516fc982b4edbb913417ecd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
