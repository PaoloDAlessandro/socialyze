-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 25, 2022 alle 16:39
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialyze`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `badges`
--

INSERT INTO `badges` (`id`, `id_user`, `category`, `lvl`) VALUES
(13, 7, 'coding', 1),
(14, 1, 'coding', 1),
(15, 6, 'coding', 1),
(16, 1, 'coding', 1),
(17, 8, 'coding', 1),
(18, 8, 'coding', 1),
(19, 9, 'coding', 1),
(22, 10, 'coding', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `id_user_1` int(11) NOT NULL,
  `id_user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `id_user_sender` int(11) NOT NULL,
  `id_user_receiver` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `id_user_sender`, `id_user_receiver`, `date`) VALUES
(1, 10, 1, '2022-02-25'),
(2, 10, 9, '2022-02-25'),
(3, 10, 7, '2022-02-25'),
(4, 14, 12, '2022-02-25'),
(5, 12, 7, '2022-02-25'),
(6, 12, 9, '2022-02-25'),
(7, 12, 1, '2022-02-25'),
(8, 12, 11, '2022-02-25'),
(9, 12, 13, '2022-02-25');

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `room_id` varchar(13) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `room_id`, `time`) VALUES
(209, 7, 'ciao', '61c8b9d81529b', '2021-12-28 12:35:30'),
(210, 7, 'come stai?', '61c8b9d81529b', '2021-12-28 12:35:33'),
(211, 7, '', '61c8b9d81529b', '2021-12-28 12:35:33'),
(212, 7, 'comestai?', '61c8b9d81529b', '2021-12-28 12:35:37'),
(213, 7, 'xzx', '61c8b9d81529b', '2021-12-28 12:35:59'),
(214, 7, 'ti passo la psw', '61c8b9d81529b', '2021-12-28 12:36:05'),
(215, 7, 'eccola', '61c8b9d81529b', '2021-12-28 12:36:08'),
(216, 7, ':', '61c8b9d81529b', '2021-12-28 12:36:08'),
(217, 7, 'd', '61c8b9d81529b', '2021-12-28 12:36:09'),
(218, 7, 'sads', '61c8b9d81529b', '2021-12-28 12:36:10'),
(219, 7, 'd', '61c8b9d81529b', '2021-12-28 12:36:10'),
(220, 7, 'dd', '61c8b9d81529b', '2021-12-28 12:36:11'),
(221, 7, '', '61c8b9d81529b', '2021-12-28 12:36:12'),
(222, 7, '', '61c8b9d81529b', '2021-12-28 12:36:13'),
(223, 7, 'ddddddddddddddddd', '61c8b9d81529b', '2021-12-28 12:36:15'),
(224, 7, 'ciaoo', '61c8b9d81529b', '2021-12-28 15:34:10'),
(225, 7, 'ciao a tutti', '61c8b9d81529b', '2021-12-28 15:34:15'),
(226, 7, 'come state?', '61c8b9d81529b', '2021-12-28 15:34:19'),
(227, 7, 'Ciao!', '61c8b9d81529b', '2021-12-28 18:49:06'),
(228, 7, 'come stai?', '61c8b9d81529b', '2021-12-28 18:49:11'),
(229, 1, 'Bene!', '61c8b9d81529b', '2021-12-28 18:49:15'),
(230, 7, 'ciao', '61c8b9d81529b', '2022-01-03 16:57:39'),
(231, 7, 'come stai?', '61c8b9d81529b', '2022-01-03 16:57:41'),
(232, 7, 'ciao', '61c8b9d81529b', '2022-01-05 00:08:03'),
(233, 7, 'come stai', '61c8b9d81529b', '2022-01-05 00:08:05'),
(234, 7, 'io sto bene ', '61c8b9d81529b', '2022-01-05 00:08:06'),
(235, 7, 'lol', '61c8bab05ffc2', '2022-01-06 23:13:40'),
(236, 7, 'ho rotto tutto', '61c8bab05ffc2', '2022-01-06 23:13:43'),
(237, 7, 'ciao', '61c8b9d81529b', '2022-01-08 16:31:11'),
(238, 7, 'Ciao!', '61c8b9d81529b', '2022-01-11 19:10:44'),
(239, 7, 'Come stai?', '61c8b9d81529b', '2022-01-11 19:10:48'),
(240, 1, 'Tutto bene e tu?', '61c8b9d81529b', '2022-01-11 19:10:55'),
(241, 7, 'io tutto bene, grazie!', '61c8b9d81529b', '2022-01-11 19:11:04'),
(242, 1, 'come mai qui?', '61c8b9d81529b', '2022-01-11 19:11:11'),
(243, 7, 'ma sto cazzeggiando ', '61c8b9d81529b', '2022-01-11 19:11:16'),
(244, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:19'),
(245, 7, 's', '61c8b9d81529b', '2022-01-11 19:11:20'),
(246, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:22'),
(247, 7, 'aa', '61c8b9d81529b', '2022-01-11 19:11:22'),
(248, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:22'),
(249, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:22'),
(250, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:23'),
(251, 7, 'aa', '61c8b9d81529b', '2022-01-11 19:11:23'),
(252, 7, 'aa', '61c8b9d81529b', '2022-01-11 19:11:23'),
(253, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:23'),
(254, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:23'),
(255, 7, 'aa', '61c8b9d81529b', '2022-01-11 19:11:24'),
(256, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:24'),
(257, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:24'),
(258, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:37'),
(259, 7, 'a', '61c8b9d81529b', '2022-01-11 19:11:38'),
(260, 7, 'se', '61c8b9d81529b', '2022-01-11 19:11:39'),
(261, 7, 'we', '61c8b9d81529b', '2022-01-11 19:11:40'),
(262, 7, 'e', '61c8b9d81529b', '2022-01-11 19:11:41'),
(263, 7, 'e', '61c8b9d81529b', '2022-01-11 19:11:42'),
(264, 7, 'we', '61c8b9d81529b', '2022-01-11 19:11:43'),
(265, 7, 'wqe', '61c8b9d81529b', '2022-01-11 19:11:44'),
(266, 7, 'wqeeqwe', '61c8b9d81529b', '2022-01-11 19:11:46'),
(267, 7, 'wqeqwe', '61c8b9d81529b', '2022-01-11 19:11:47'),
(268, 7, 'eqweqwe', '61c8b9d81529b', '2022-01-11 19:11:49'),
(269, 7, 'Cia', '61c8b9d81529b', '2022-01-13 22:47:11'),
(270, 7, 'Ciao', '61c8b9d81529b', '2022-01-13 22:47:15'),
(271, 7, 'Caio', '61c8bab05ffc2', '2022-01-15 14:06:47'),
(272, 1, 'ciao', '61c8bab05ffc2', '2022-01-15 14:06:51'),
(273, 7, 'come stai', '61c8bab05ffc2', '2022-01-15 14:08:04'),
(274, 7, 'bene', '61c8bab05ffc2', '2022-01-15 14:08:12'),
(275, 7, 'Ciao', '61c8bab05ffc2', '2022-01-21 17:32:27'),
(276, 7, 'come stai', '61c8bab05ffc2', '2022-01-21 17:33:21'),
(277, 1, 'Ciao!', '61c8bab05ffc2', '2022-01-26 15:51:49'),
(278, 6, 'ciao', '61c8bab05ffc2', '2022-01-26 15:51:56'),
(279, 1, 'come stai?', '61c8bab05ffc2', '2022-01-26 15:52:01'),
(280, 6, 'bene', '61c8bab05ffc2', '2022-01-26 15:52:04'),
(281, 6, 'we', '61c8bab05ffc2', '2022-01-26 15:52:12'),
(282, 6, 'we', '61c8bab05ffc2', '2022-01-26 15:52:13'),
(283, 6, 'we', '61c8bab05ffc2', '2022-01-26 15:52:16'),
(284, 6, 'wee', '61c8bab05ffc2', '2022-01-26 15:52:17'),
(285, 6, 'okkk', '61c8bab05ffc2', '2022-01-26 15:52:20'),
(286, 6, 'ciaooo', '61c8bab05ffc2', '2022-01-26 15:52:22'),
(287, 1, 'ciao', '61c8bab05ffc2', '2022-01-26 16:52:07'),
(288, 1, 'come stai', '61c8bab05ffc2', '2022-01-26 16:52:17'),
(289, 1, 'well done', '61c8bab05ffc2', '2022-01-26 16:52:23'),
(290, 1, 'ciao Riccardo', '61c8bab05ffc2', '2022-01-26 16:52:25'),
(291, 1, 'come stai?', '61c8bab05ffc2', '2022-01-26 16:52:28'),
(292, 6, 'tutto bene', '61c8bab05ffc2', '2022-01-26 16:52:32'),
(293, 8, 'ciao', '61c8bab05ffc2', '2022-02-11 08:28:53'),
(294, 8, 'ciao', '61c8bab05ffc2', '2022-02-11 08:29:22'),
(295, 8, 'come stai', '61c8bab05ffc2', '2022-02-11 08:29:29'),
(296, 8, 'ciao', '61c8bab05ffc2', '2022-02-11 14:00:26'),
(297, 8, 'come stai?', '61c8bab05ffc2', '2022-02-11 14:00:29'),
(298, 8, 'Ciao', '61c8bab05ffc2', '2022-02-11 14:06:56'),
(299, 9, 'ciao', '61c8bab05ffc2', '2022-02-11 14:07:37'),
(300, 8, 'come stai?', '61c8bab05ffc2', '2022-02-11 14:07:42'),
(301, 8, 'caoù', '61c8bab05ffc2', '2022-02-11 14:07:51'),
(302, 8, '', '61c8bab05ffc2', '2022-02-11 14:07:51'),
(303, 8, 'sadsadada', '61c8bab05ffc2', '2022-02-11 14:07:54'),
(304, 1, 'ciao', '61c8bab05ffc2', '2022-02-18 09:47:19'),
(305, 1, 'come stai?', '61c8bab05ffc2', '2022-02-18 09:47:24'),
(306, 1, 'come siaa', '61c8bab05ffc2', '2022-02-18 09:47:27'),
(307, 1, 'vrevkekrv', '61c8bab05ffc2', '2022-02-18 09:47:29'),
(308, 10, 'Ciao Omar', '61c8bab05ffc2', '2022-02-21 14:56:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `rooms`
--

CREATE TABLE `rooms` (
  `id` varchar(13) NOT NULL,
  `category` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `icon_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`id`, `category`, `size`, `level`, `img_name`, `icon_name`) VALUES
('61c8b9d81529b', 'Politics', 35, 2, 'politics.jpg', 'fas fa-user-tie'),
('61c8ba93ee17c', 'Science', 25, 3, 'science.jpg', 'fas fa-flask'),
('61c8ba9aa3838', 'Math', 14, 1, 'math.jpg', 'fas fa-calculator'),
('61c8baa25cbe4', 'Gaming', 5, 2, 'gaming.jpg', 'fas fa-gamepad'),
('61c8baa9e35b2', 'Personal finance', 50, 3, 'personal-finance.jpg', 'fas fa-piggy-bank'),
('61c8bab05ffc2', 'Coding', 25, 1, 'coding.jpg', 'fas fa-code'),
('61c8bab59b255', 'Communication', 30, 1, 'communication.jpg', 'fas fa-bullhorn'),
('61c8baba8bb61', 'Marketing', 50, 3, 'marketing.jpg', 'far fa-chart-bar');

-- --------------------------------------------------------

--
-- Struttura della tabella `scoring`
--

CREATE TABLE `scoring` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scoring`
--

INSERT INTO `scoring` (`id`, `id_user`, `category`, `score`, `date`) VALUES
(57, 7, 'coding', 4, '2022-01-21 18:29:50'),
(58, 7, 'coding', 0, '2022-01-22 12:44:48'),
(62, 6, 'coding', 4, '2022-01-26 16:51:37'),
(64, 1, 'coding', 4, '2022-01-26 17:51:33'),
(65, 1, 'coding', 2, '2022-01-26 17:54:19'),
(66, 8, 'coding', 4, '2022-02-11 09:28:00'),
(67, 8, 'coding', 4, '2022-02-11 15:01:20'),
(68, 9, 'coding', 4, '2022-02-11 15:07:29'),
(69, 10, 'coding', 4, '2022-02-21 15:55:52'),
(71, 10, 'coding', 4, '2022-02-23 15:43:05');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `psw` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `psw`, `email`, `avatar_name`) VALUES
(1, 'paolodalex', 'f2842c2e061f3092e8d50b598ad8ffdc7167cdcc0303844e25a9805c0798682a', 'paolodalex96@gmail.com', 'paolodalex.jpeg'),
(6, 'test', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd', 'eslplayofficial@gmail.com', 'default.png'),
(7, 'Paolo', '903df96fc681e18013e5d46b5ba181267650b61b70dd22c44237a3a64d59fe99', 'eslplayofficial@gmail.com', 'CardanoCollection.png'),
(8, 'dalex', 'dfd73160dc667b6e90f572f21aecf9f11daab6797f9ef34bb82a54d6d8c25b40', 'paolodalex96@gmail.com', 'default.png'),
(9, 'prova', '6258a5e0eb772911d4f92be5b5db0e14511edbe01d1d0ddd1d5a2cb9db9a56ba', 'paolodalex96@gmail.com', 'default.png'),
(10, 'ciao', '88b1cca59060320e5e5662a7da636884eb7580f4dc7e22cfb6f88b8f99045a71', 'ciao@gmial.com', 'esercizio 4.png'),
(11, 'RiccardoVerderio', 'a8c74be4620f9d27922c56582207e95be48a4605cbfce6b96e89af0a79cfd029', 'riccardoverderio@gmai.com', 'user_3.jpg'),
(12, 'MarcoStefani', 'f9dd014cae75eee7dd9c6a88bdf40bdce950419cce614e15938162a533838356', 'marcostefani@gmail.com', 'user_2.jpg'),
(13, 'VinceGrasso', '53f43fa261042607e64dc5ba9a73411378c481bd2bf17967d832a7eff6e4dfcb', 'vincegrasso@gmail.com', 'user_4.jpg'),
(14, 'jessicaNigri', 'e0ebb6a470815dab232770d1c5572128ddd0ffd1a2023872d682dba32f8791c7', 'jessicanigri@gmail.com', 'user_1.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `users_in_room`
--

CREATE TABLE `users_in_room` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_room` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users_in_room`
--

INSERT INTO `users_in_room` (`id`, `id_user`, `id_room`) VALUES
(540, 6, '61c8bab05ffc2');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `scoring`
--
ALTER TABLE `scoring`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users_in_room`
--
ALTER TABLE `users_in_room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT per la tabella `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `users_in_room`
--
ALTER TABLE `users_in_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
