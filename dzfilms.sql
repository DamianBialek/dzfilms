DROP DATABASE IF EXISTS `dzfilms`;

--
-- Baza danych: `dzfilms`
--
CREATE DATABASE `dzfilms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dzfilms`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nick` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `nick`) VALUES
(1, 'test@test.pl', '$2y$10$4YpzcLxf2yRmkFuzN7v3B.3vWLEQiTLfItgvfl6nMRUyxfjN7/8tW', 'Admin Test');

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kryminał'),
(2, 'Akcja'),
(3, 'Komedia'),
(4, 'Sensacyjny'),
(5, 'Dramat'),
(6, 'Dokumentalny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `customers` (`id`, `email`, `password`, `nick`) VALUES (1, 'test@test.pl', '$2y$10$4YpzcLxf2yRmkFuzN7v3B.3vWLEQiTLfItgvfl6nMRUyxfjN7/8tW', 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `category_id` int(11) NOT NULL,
  `available` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `thumbnail`, `price`, `category_id`, `available`) VALUES
(1, 'Potrójna granica', 'Byli żołnierze sił specjalnych, którzy ledwo wiążą koniec z końcem, postanawiają ukraść 75 milionów dolarów południowoamerykańskiemu baronowi narkotykowemu.', 'https://ssl-gfx.filmweb.pl/po/05/60/560560/7876279.6.jpg', '15.00', 1, 1),
(2, 'Kapitan Marvel', 'Ziemska kobieta po kontakcie z obcą rasą Kree otrzymuje nadludzkie moce.', 'https://ssl-gfx.filmweb.pl/po/64/90/726490/7866639.6.jpg', '25.00', 2, 1),
(3, 'Green Book', 'Drobny cwaniaczek z Bronksu zostaje szoferem ekstrawaganckiego muzyka z wyższych sfer i razem wyruszają na wielotygodniowe tournée.', 'https://ssl-gfx.filmweb.pl/po/96/30/809630/7873350.6.jpg', '30.00', 3, 1),
(4, 'Przemytnik', 'Ponad 80-letni Earl Stone będący na granicy bankructwa dostaje propozycję lukratywnej pracy. Jako kierowca staje się nieświadomym przemytnikem narkotyków na usługach meksykańskiego kartelu.', 'https://ssl-gfx.filmweb.pl/po/84/37/808437/7873670.6.jpg', '5.00', 2, 0),
(5, 'Kurier', 'Jan Nowak-Jezioranski, legendarny \"kurier z Warszawy\" przyjmuje misję przedostania się z okupowanej Polski do Londynu. Po przybyciu przekazuje również wiadomości dotyczące Armii Krajowej.', 'https://ssl-gfx.filmweb.pl/po/01/92/810192/7874217.6.jpg', '8.35', 4, 1),
(6, 'Po prostu przyjaźń', 'Przyjaźń grupy ludzi zostaje wystawiona na próbę w obliczu życiowych przeciwności. ', 'https://ssl-gfx.filmweb.pl/po/79/15/767915/7769839.6.jpg', '25.56', 3, 1),
(7, 'Wszyscy wiedzą', 'Laura wraz z dwójką dzieci powraca do rodzinnego miasteczka w Hiszpanii na wesele siostry. Imprezę przerywa zniknięcie Irene, jej nastoletniej córki.', 'https://ssl-gfx.filmweb.pl/po/33/45/763345/7875323.6.jpg', '19.99', 5, 1),
(8, 'Leaving Neverland', 'Dwaj mężczyźni, którzy w dzieciństwie przyjaźnili się z Michaelem Jacksonem, opowiadają swoją historię. ', 'https://ssl-gfx.filmweb.pl/po/51/52/825152/7878708.6.jpg', '29.99', 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies_customers`
--

CREATE TABLE `movies_customers` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rental_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comm_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movies_customers`
--
ALTER TABLE `movies_customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `movies_customers`
--
ALTER TABLE `movies_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE USER IF NOT EXISTS 'dzfilms'@'localhost' IDENTIFIED BY 'dzfilms';
GRANT ALL PRIVILEGES ON * . * TO 'dzfilms'@'localhost';

CREATE USER IF NOT EXISTS 'dzfilms'@'%' IDENTIFIED BY 'dzfilms';
GRANT ALL PRIVILEGES ON * . * TO 'dzfilms'@'%';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
