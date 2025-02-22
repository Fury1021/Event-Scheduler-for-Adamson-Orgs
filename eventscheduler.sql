-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventscheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orgname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `orgname`, `email`, `contact`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'aduchess', 'aduchess123', 'AdUChess', 'aduchess@gmail.com', '06318467', 'aduchessfb', 'aduchesstwt', 'aduchessig'),
(2, 'AdUg', 'adugame123', 'AdUGame', 'Adugame@gmail.com', '09213654872', 'adugamefb', 'adugametwitter', 'adugameIg'),
(3, 'rota', 'rota123', 'Rotaract', 'rotaract@gmail.com', '0921456875', 'rotafb', 'rotatwt', 'rotaig');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(11) NOT NULL,
  `orgname` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `borrowed_chairs` int(11) DEFAULT NULL,
  `borrowed_tables` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `orgname`, `activity`, `venue`, `borrowed_chairs`, `borrowed_tables`, `description`, `date`, `image`, `status`, `adminid`) VALUES
(1, 'ADU GAME', 'PSITE ML TOURNAMENT', 'QC', 50, 50, 'Brace yourselves for an epic showdown! KALABOSO ADUG is alive and kicking, and theyre blazing their trail to the semis! 🔥💻 Get ready for some serious action! \r\nGet ready to witness their gaming prowess at the Finals on January 11, 2023, set to take place at the prestigious DLS Head Office in Pasig City. Mark your calendars for an unmissable clash!🎮✨', '2023-12-21', 'C:xampphtdocsPrototypedatabase/uploads/Copy of Add a heading (2).png', 'done', 2),
(2, 'ADU GAME', 'ML TOURNA', 'ADU', 51, 51, 'ml turna in adu', '2023-12-29', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/content_mobile-legends-battle-of-the-bands-2020-covid-19-lockdown-metro-manila.jpg', 'done', 2),
(3, 'ADU GAME', 'ENVIROCRAFT', 'SV building ', 30, 30, 'Get your game faces ready, guildmeyts! We invite you to join us for our environmental event Envirocraft: Crafting for the Future, are you ready to dive in? \r\nThis is an offline event where well design the next gaming adventure together. 🕹️✨\r\nMechanics For Joining:\r\n•Participants must register for the competition.\r\n•Participants can register as individuals or as part of a team. Teams can typically consist of 2 to 4\r\nmembers.\r\n•A panel of judges or organizers will review all submitted proposals and select the top concepts\r\nbased on creativity, environmental impact, and feasibility.\r\n•A panel of judges will evaluate the prototypes based on criteria including gameplay, environmental\r\nimpact, innovation, and overall quality.\r\n• Announcement of Winners:\r\nThe competition organizers will announce the winners, typically in a closing event or ceremony.\r\nPrizes or recognition will be awarded to the top entries.\r\nYou can start submitting your entry today and the deadline of submission will be until on December 30', '2023-12-30', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/400806797_739793138189674_5265697530015537752_n.jpg', 'done', 2),
(4, 'ADU GAME', '3D Game', 'Virtual', 0, 0, 'Whats up mga ka Guildmeyts! Are you ready to level up your knowledge?💡\r\nWe invite you to join us on October 21st for an immersive game talk focused on 3D GAME - Design, Develop, and Deploy Chapter 4: Esports Ecosystem! Dont miss out on this fantastic event! reserve your spot now and get ready to level up. 🚀🎮', '2023-10-21', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/391557734_722414596594195_4945100319236706399_n.jpg', 'upcoming', 2),
(5, 'ADU GAME', 'Gift Cards for Codashop', 'none', 0, 0, '#ACES is knocking and has a gift for you. 🥸\r\nThis October, your favorite games are back! Join forces with your pals and sign up at: app.acadarena.com/compete\r\nEvery participant will instantly be placed into a drawing to win one of ten Codashop gift cards worth PHP 1000! 🥳\r\nIts time for us to #gitgud, GUILDMEYTS! 😎', '2023-12-30', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/391565861_284565804536242_6747577317458314869_n.jpg', 'upcoming', 2),
(6, 'AduChess', 'Ang Babaeng Hindi Namamatay', 'Adu Theater', 500, 500, 'Saksihan ang propesiyang biyaya mula kay Bathala!\r\nNgayong ika-9 at 10 ng Pebrero, 2024, tunghayan ang dulang musikal na ihahandog ng Tinik ng Teatro-Adamson University kasama ang Himig Musicians of Adamson University. \r\nSama-sama nating abangan ang pagdating ng Ang Babaeng Hindi Namamatay mula sa panunulat nina Jehu Adolfo at Jasmine Cheng, sa direksyon ni Heart Romero. \r\nPARATING NA NGAYONG 2024!', '2024-01-09', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/namamatay.jpg', 'cancelled', 1),
(7, 'AduChess', 'Chat Session', '𝙊𝙕 𝘾𝙤𝙣𝙛𝙚𝙧𝙚𝙣𝙘𝙚 𝙍𝙤', 100, 100, 'The Adamson University Engineering Student Council proudly invites you to 𝓚𝓾𝓶𝓾𝓼𝓽𝓪 𝓚𝓪 𝓝𝓪𝓶𝓪𝓷, 𝓕𝓾𝓽𝓾𝓻𝓮 𝓔𝓷𝓰𝓲𝓷𝓮𝓮𝓻? — more  than just an ordinary chat session, its a vibrant escape from the grind.\r\nJoin us in creating a harmonious space where you can unwind, connect, and emerge ready to triumph over the challenges that await.\r\nMark your calendars this 𝗗𝗲𝗰𝗲𝗺𝗯𝗲𝗿 𝟰 and join us on 𝙊𝙕 𝘾𝙤𝙣𝙛𝙚𝙧𝙚𝙣𝙘𝙚 𝙍𝙤𝙤𝙢 from 𝟭:𝟬𝟬 𝗣.𝗠. to 𝟱:𝟬𝟬 𝗣.𝗠. and get ready to immerse yourself in the rhythm of relaxation and let the worries of the week dissipate.', '2023-12-04', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/407817770_811045540824838_5398269372933168443_n.jpg', 'upcoming', 1),
(8, 'AduChess', 'Online Orientation', 'Virtual', 0, 0, 'Come one, come all! QRC invites you to attend our ONLINE ORIENTATION for future CHEMICAL ENGINEERS, FOOD TECHNOLOGISTS, and MDs! Let QRC give you a glimpse on how we can help you jump start your goals!\r\nWHAT: QRC Online Orientation\r\nWHO: Students and alumni who will take the ChE, Food Tech, and NMAT Exams.\r\nWHEN: November 27 (Mon), 4:00 P.M.\r\nWe want to show how QRC is your ideal review partner! Well introduce the review program proper, the materials, fees and discounts.\r\nFreebies await! Just pre-register with the linkhttps://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2FHccQTWs&h=AT2uFKSFWdnIsJUSJnKkx9icVQXpCJHGX6XaEjN58LCgdb6aVMytQDJ7_Yt08nLpZMmBOYVGQHAbVWIVcz-FZJQfqnnwyFZ7IYTZlLg1lQXDFkTXP-ps28vqgCxs6Q1t4bz8rtLsVys5MhLWniI6&__tn__=-UK-R&c[0]=AT2fQfAFSJlGpP5yzavNpZkvMk-ZU1pIieIDOnURvj-4JAT2t_sQAfDmgoT9nuhwIxhOcol60mBIsTnCB6ni9YU6HC8HIMHGBqwq57grKZol-mNfc9__QjDwwhU-XPqtkppK7Yf6ELBXOA1HmE6COQJw1EKBX4GBAU-saMn1KzRsSmtegYDYYywJKvv_G0iHclIbwFq2pBy3r9vvL9_njEWIP5RTD7Lpe2ZktOaK2--VNdjNE4z1yezAXC2WqypEUWKlT4EyQSERdiqiAlQx below:', '2023-11-27', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/404258091_790941763051544_4670052114098047993_n.jpg', 'upcoming', 1),
(9, 'AduChess', 'Free Printing Services', 'AUSG office 2nd Floor FRC Building', 50, 50, 'Heads Up, Klasmeyts!\r\nFree Printing Services will now be offered for Recognized Student Organizations (RSOs) and Bonafide College Students at the Adamson University Student Government (AUSG) Office at the 2nd Floor of the FRC Building. This is intended to help the students and the organizations for easier printing of academic-related documents and organizational-related papers. \r\nFor the schedule of printing services for Recognized Student Organizations (RSOs), Mondays, Tuesdays and Fridays will be reserved for Academic Organizations. Tuesdays for Co-Academic Organizations and Thursdays for Socio-Civic Organizations. Only organizational documents will be accepted for free printing and will be on a first-come, first-serve basis. \r\nOn the other hand, for the Bonafide College Students, free printing services will be available during the Falconers Hub period of time in preparation for Prelims, Midterms, and Finals Periods every semester. Documents for printing must be responsibly used for academic purposes only. \r\nPrinting services will be available from 9 AM to 5 PM. All documents for printing must be submitted through email to ausgextensionservices@gmail.com. \r\nFull guidelines and schedules are conveniently posted outside the AUSG Office and are expected to be followed responsibly. \r\nThe implementation of this project is pledged by the Office of the Vice President for Internal Affairs and led by Mr. Kyle Matthew Ronquillo, who serves as the AUSG Vice President for Internal Affairs. Mr. Ronquillo spearheads the initiative, ensuring its effective execution and alignment with the objectives of the AUSG.', '2023-12-13', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/400708096_767231625214755_4263713765094021242_n.jpg', 'upcoming', 1),
(10, 'AduChess', 'PRE-KOLONYAL', 'Adu Theater', 500, 500, 'Heads up, ChEssmates!\r\nMagsipaghanda! Magsipaghanda! \r\nNarito na ang mga magpapalaganap ng propesiyang ibinigay ni Bathala. Mula pa sa panahon ng pre-kolonyal, handa na silang ipalaganap ang kwento ng propesiyang pambihirang gantimpala! \r\nAbangan ngayong ika-28 at 29 ng Nobyembre, 2023 sa ganap na 1:00 ng hapon. Sama-sama nating panoorin sa Adamson Theater ang dulang musikal na inihahandog ng Tinik ng Teatro-Adamson University at Himig Musicians of Adamson University. Sa panunulat nina Jehu Adolfo at Jasmine Cheng, mula sa direksyon ni Heart Romero, “Ang Babaeng Hindi Namamatay.” \r\nTARA NAT TUKLASIN ANG PROPESIYA! BILI NA!\r\n', '2023-11-28', 'C:xampphtdocsEVENTSCHEDULERUPDATED/uploads/399637924_734251625393935_6377103372602379819_n.jpg', 'upcoming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `contact`, `facebook`) VALUES
(1, 'Ryan', 'betlog', 'ryanjarapa@gmail.com', '0921647851', 'ryanfb'),
(4, 'Chaniquax', 'chani', 'chaniquax@gmail.com', '12345678910', 'chanifb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
