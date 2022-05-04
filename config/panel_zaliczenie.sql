-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Kwi 2022, 13:11
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `panel_zaliczenie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `to_do`
--

CREATE TABLE `to_do` (
  `id_listy` int(11) NOT NULL COMMENT 'Id listy, zadania',
  `id_users` int(11) NOT NULL COMMENT 'Id użytkownika',
  `dane` text NOT NULL COMMENT 'Dane zawarte w liście',
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL COMMENT 'Id Użytkownika',
  `username` varchar(50) NOT NULL COMMENT 'Nazwa Użytkownika',
  `imie` varchar(30) NOT NULL COMMENT 'Imię Użytkownika',
  `nazwisko` varchar(60) NOT NULL COMMENT 'Nazwisko Użytkownika',
  `haslo` varchar(50) NOT NULL COMMENT 'Hasło max 50 znaki',
  `email` varchar(90) NOT NULL COMMENT 'E-mail Użytkownika',
  `is_admin` int(11) NOT NULL COMMENT 'Administrator - 1; Użytkownik - 2',
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `username`, `imie`, `nazwisko`, `haslo`, `email`, `is_admin`, `create_datetime`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.pl', 1, '2022-04-23 13:08:59');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `to_do`
--
ALTER TABLE `to_do`
  ADD PRIMARY KEY (`id_listy`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `to_do`
--
ALTER TABLE `to_do`
  MODIFY `id_listy` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id listy, zadania';

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Użytkownika', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
