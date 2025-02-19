-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 22. led 2025, 12:46
-- Verze serveru: 10.1.31-MariaDB
-- Verze PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `bartosp_hskolekce`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(5, 'admin', '$2y$10$3naboZxQjVn1vUNjtqyJmuiloFmH8kR5Hg20q5yRjZswi2X.Nvtoa', 1),
(6, 'mochakaramel', '$2y$10$CZQ/B/fv3vUMUzsnnB2Ha.sGcyWhPcxm0emmSCNPEzCCTnMZM6TBG', 0),
(7, 'zda', '$2y$10$HsPQiZEgemVjdQBY/0BFsuE0E2mtCBEYt0UT3x/kVg61pfOvMqjuK', 0),
(8, 'rara', '$2y$10$0copIUw5etIbqIUEcJEgUO/iTnPLquRoUnYa/71E8diyV49ZcA1gm', 0),
(9, 'parek', '$2y$10$ZzcVm4PX2o/oAQLamwRUSO.YFajwUt8tBocd2joxV8XBP.ck/ukem', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `user_texts`
--

CREATE TABLE `user_texts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `user_texts`
--
ALTER TABLE `user_texts`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `user_texts`
--
ALTER TABLE `user_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
