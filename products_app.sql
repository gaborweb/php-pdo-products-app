-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 04. 18:20
-- Kiszolgáló verziója: 10.1.39-MariaDB
-- PHP verzió: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `products_app`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `account`
--

CREATE TABLE `account` (
  `id` int(5) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `account`
--

INSERT INTO `account` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Leo Nardo', 'leo01', '4100c4d44da9177247e44a5fc1546778');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termektipus`
--

CREATE TABLE `termektipus` (
  `id` int(5) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termektipus`
--

INSERT INTO `termektipus` (`id`, `nev`) VALUES
(1, 'élelmiszer'),
(2, 'elektronika'),
(3, 'háztartás'),
(4, 'élvezeti cikk');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarolttermekek`
--

CREATE TABLE `vasarolttermekek` (
  `id` int(5) NOT NULL,
  `termekId` int(5) NOT NULL,
  `termeknev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `darab` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `vasarlo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vasarolttermekek`
--

INSERT INTO `vasarolttermekek` (`id`, `termekId`, `termeknev`, `darab`, `ar`, `vasarlo`) VALUES
(1, 2, 'LG LCD TV', 2, 350000, 'Jane Doe'),
(2, 4, 'Jameson Irish Whiskey', 1, 7900, 'John Doe'),
(3, 1, 'Paprika', 3, 400, 'Jack Smith'),
(4, 3, 'Porszívó', 1, 35000, 'Jon Jones');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termektipus`
--
ALTER TABLE `termektipus`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vasarolttermekek`
--
ALTER TABLE `vasarolttermekek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termekId` (`termekId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `account`
--
ALTER TABLE `account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `termektipus`
--
ALTER TABLE `termektipus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `vasarolttermekek`
--
ALTER TABLE `vasarolttermekek`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
