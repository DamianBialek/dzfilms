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
  `nick` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `account_balance` decimal(10,2) NOT NULL DEFAULT '100.00'
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
  `available` int(1) NOT NULL DEFAULT '1',
  `trailer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `thumbnail`, `price`, `category_id`, `available`, `trailer`, `active`) VALUES
(1, 'Potrójna granica', 'Byli żołnierze sił specjalnych, którzy ledwo wiążą koniec z końcem, postanawiają ukraść 75 milionów dolarów południowoamerykańskiemu baronowi narkotykowemu.', 'https://ssl-gfx.filmweb.pl/po/05/60/560560/7876279.6.jpg', '15.00', 1, 1, 'HrT0d1c7tzM', 0),
(2, 'Kapitan Marvel', 'Ziemska kobieta po kontakcie z obcą rasą Kree otrzymuje nadludzkie moce.', 'https://ssl-gfx.filmweb.pl/po/64/90/726490/7866639.6.jpg', '25.00', 1, 0, 'JeefCLSZXOo', 1),
(3, 'Green Book', 'Drobny cwaniaczek z Bronksu zostaje szoferem ekstrawaganckiego muzyka z wyższych sfer i razem wyruszają na wielotygodniowe tournée.', 'https://ssl-gfx.filmweb.pl/po/96/30/809630/7873350.6.jpg', '30.00', 1, 0, 'QkZxoko_HC0', 1),
(4, 'Przemytnik', 'Ponad 80-letni Earl Stone będący na granicy bankructwa dostaje propozycję lukratywnej pracy. Jako kierowca staje się nieświadomym przemytnikem narkotyków na usługach meksykańskiego kartelu.', 'https://ssl-gfx.filmweb.pl/po/84/37/808437/7873670.6.jpg', '5.00', 1, 0, 'F7G1iCQnwws', 1),
(5, 'Kurier', 'Jan Nowak-Jezioranski, legendarny \"kurier z Warszawy\" przyjmuje misję przedostania się z okupowanej Polski do Londynu. Po przybyciu przekazuje również wiadomości dotyczące Armii Krajowej.', 'https://ssl-gfx.filmweb.pl/po/01/92/810192/7874217.6.jpg', '18.35', 1, 1, 'EHYkF4w3GnI', 1),
(6, 'Po prostu przyjaźń', 'Przyjaźń grupy ludzi zostaje wystawiona na próbę w obliczu życiowych przeciwności. ', 'https://ssl-gfx.filmweb.pl/po/79/15/767915/7769839.6.jpg', '25.56', 1, 1, 'd8BOYpF8Wy8', 1),
(7, 'Wszyscy wiedzą', 'Laura wraz z dwójką dzieci powraca do rodzinnego miasteczka w Hiszpanii na wesele siostry. Imprezę przerywa zniknięcie Irene, jej nastoletniej córki.', 'https://ssl-gfx.filmweb.pl/po/33/45/763345/7875323.6.jpg', '19.99', 1, 1, 'g_tPH5osx1s', 1),
(8, 'Leaving Neverland', 'Dwaj mężczyźni, którzy w dzieciństwie przyjaźnili się z Michaelem Jacksonem, opowiadają swoją historię. ', 'https://ssl-gfx.filmweb.pl/po/51/52/825152/7878708.6.jpg', '29.99', 1, 1, 'R_Ze8LjzV7Q', 1),
(9, 'Cisza', 'Rodzina pewnej nastolatki poszukuje schronienia na odludziu po tym, jak świat zaatakowały przerażające stworzenia, które polują na ludzi, korzystając ze świetnego słuchu.', 'https://ssl-gfx.filmweb.pl/po/76/74/827674/7879930.6.jpg', '29.99', 1, 1, 'XCDpm9CMIPs', 1),
(10, 'Sędzia (2014)', 'Odnoszący sukcesy adwokat powraca do rodzinnego miasta na pogrzeb matki, gdzie dowiaduje się, że jego ojciec, miejscowy sędzia, podejrzany jest o morderstwo.', 'https://ssl-gfx.filmweb.pl/po/07/14/630714/7637769.6.jpg', '9.99', 1, 1, 'KmCFOblYxZs', 1),
(11, 'W rytmie Kuby', 'Historia nowoorleańskiego zespołu \"Preservation Hall Jazz Band\", który odtwarza swoje muzyczne korzenie.', 'https://ssl-gfx.filmweb.pl/po/83/93/828393/7882111.6.jpg', '25.00', 1, 1, 'G4CC2w1ZOVo', 1),
(12, 'Terapia', 'Zbuntowana 16-letnia Isabell przyjeżdża do małej wioski w polskich Sudetach. Nie będzie to jednak wakacyjny wypoczynek, bo przyjechała razem z matką na grupową terapię.', 'https://ssl-gfx.filmweb.pl/po/41/53/804153/7883184.6.jpg', '20.00', 1, 1, 'sIMqUmUUyQs', 1),
(13, 'Piękny umysł', 'Geniusz matematyczny John Nash za wszelką cenę pragnie opracować teorię, dzięki której zostanie cenionym naukowcem. Przeszkodą staje się jego stopniowo rozwijająca choroba.', 'https://ssl-gfx.filmweb.pl/po/18/64/31864/7521208.6.jpg', '8.00', 1, 1, 'wK1JtKdvr4Y', 1),
(14, 'Ocalić i zginąć', 'Franck jest jednym z najlepszych strażaków w Paryżu. Ich credo to: ratuj albo giń! Ma piękną żonę, spodziewają się bliźniąt, są szczęśliwi. Podczas jednej z interwencji gaszenia pożaru Franck z poświęceniem ratuje swoich kolegów, a sam wpada w pułapkę ognia. Kiedy budzi się w centrum leczenia oparzeń, uświadamia sobie, że jego twarz rozpłynęła się w płomieniach, a jego ciało już nigdy nie będzie takie samo. Czy teraz ktoś \"uratuje\" jego? Czy będzie to wciąż kochająca żona? A może młoda ciężarna kobieta, która da mu nową pracę?', 'https://ssl-gfx.filmweb.pl/po/86/48/808648/7881428.6.jpg', '14.50', 1, 1, 'TOahQt9YBgg', 1),
(15, 'Podły, okrutny, zły', 'Kronika zbrodni Teda Bundy\'ego z perspektywy jego długoletniej dziewczyny Elizabeth Kloepfer, która nie wierzyła w prawdę o nim.', 'https://ssl-gfx.filmweb.pl/po/61/58/796158/7880438.6.jpg', '45.00', 1, 1, 'd6D9Wa6uO68', 1),
(16, 'Trzy kroki od siebie', 'Stella Grant (Haley Lu Richardson) już za chwilę będzie miała siedemnaście lat… Jak każda nastolatka nie odrywa się od laptopa i z całego serca kocha swoich najlepszych przyjaciół. Od innych nastolatek odróżnia ją jednak to, że większość życia spędza w szpitalu, cierpiąc na mukowiscydozę. Jej życie to zwyczaje, zasady i samokontrola – to dzięki nim żyje. Wszystko to zostanie poddane wielkiej próbie, gdy pozna czarującego Willa Newmana (Cole Sprouse), również pacjenta szpitala. Ich rodzącą się bliskość torpeduje… dystans, który muszą od siebie zachować – trzy kroki – aby nie pogorszyć swej sytuacji zdrowotnej. Tylko jak to zrobić, kiedy uczucie zaczyna wymykać się spod kontroli? A do tego Will nie chce się leczyć, nie wierzy w życie odmierzane dystansem trzech kroków. To właśnie Stella spróbuje wszystkiego, by zawalczył o życie i zdrowie. Ale czy uda się ocalić kogoś, kogo kochasz, jeśli nawet nie możesz go dotknąć?', 'https://ssl-gfx.filmweb.pl/po/45/66/814566/7882313.6.jpg', '38.99', 1, 1, 'k9vF9YRa-c0', 1),
(17, 'Kraina cudów', 'June, urodzona optymistka, dla której każdy nowy dzień jest nową przygodą, niespodziewanie odkrywa nieprawdopodobne, ukryte w lesie wesołe miasteczko – pełne niezwykłych atrakcji i zabawnych mówiących zwierząt. Tyle że coś tam nie gra… June wkrótce odkryje, że park istnieje tylko w jej wyobraźni, jest więc jedyną osobą, która może zaprowadzić tam porządek. Dziewczynka łączy siły z niezwykłymi zwierzakami, by ocalić park i przywrócić jego cudowną atmosferę.', 'https://ssl-gfx.filmweb.pl/po/46/70/764670/7882317.6.jpg', '28.00', 1, 1, 'gEgemK6xgIM', 1),
(18, 'Oddech', 'Para australijskich nastolatków pragnie uciec od małomiasteczkowej monotonii. W poszukiwaniu przygody trafiają pod skrzydła Sando - guru surfingu, który zostaje ich mentorem.', 'https://ssl-gfx.filmweb.pl/po/60/61/746061/7818395.6.jpg', '23.50', 1, 1, 'woobXyzLEDY', 1);


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
