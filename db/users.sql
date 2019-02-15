-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 15. úno 2019, 10:29
-- Verze serveru: 5.6.24
-- Verze PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `kurzy`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `password` char(128) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('administrator','redaktor','registrovaný') COLLATE utf8_czech_ci NOT NULL DEFAULT 'registrovaný',
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `email`) VALUES
(8, 'hurvinek', '$2y$10$GkPE98xPcdeNK9JM0RnivOMjyNoqzxZNa.FJBiI85ip/NFm9h.G5m', 'Hurvínek', '', 'hurvinek@komedie.cz'),
(9, 'spejbl', '$2y$10$LC8qu6bw1Wa8Gyt87UfB.uBJqmkODpiM0jgpR16TMl0dO.cBjqwEW', 'Spejbl', '', 'spejbl@komedie.cz'),
(10, 'manicka', '$2y$10$uNgCKpqbZp8jAlfPKt4u8..Wl3fGJlVkQuyuoJzzt2L8l8xVNT9py', 'Mánička', 'redaktor', 'manicka@komedie.cz'),
(11, 'admin', '$2y$10$LiBARAo8BDnA5DboIqDNHesjx2SVm5N.8t/qqDjYC9U/.9/FjVH.2', 'Administrator', 'administrator', 'admin@skola.cz');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
