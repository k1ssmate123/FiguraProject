-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 27. 08:33
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `figura`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `address`
--

CREATE TABLE `address` (
  `userId` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` int(4) NOT NULL,
  `door` varchar(255) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `address`
--

INSERT INTO `address` (`userId`, `city`, `postalCode`, `door`, `Address`, `phone`) VALUES
(1, 'Tab', 8660, '', 'Kossuth Lajos utca 53', '+3684343253');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Levesek'),
(2, 'Előételek'),
(3, 'Húsételek'),
(4, 'Hal ételek'),
(5, 'Tészták'),
(6, 'Köretek'),
(7, 'Kímélő ételek'),
(8, 'Gyermek menük'),
(9, 'Saláták'),
(10, 'Pizzák'),
(11, 'Tejfölös alapú pizzák'),
(12, 'Specialitások'),
(13, 'Desszertek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groupconn`
--

CREATE TABLE `groupconn` (
  `conId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `groupconn`
--

INSERT INTO `groupconn` (`conId`, `orderId`, `itemId`, `quantity`) VALUES
(21, 2, 1, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menuitems`
--

CREATE TABLE `menuitems` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` int(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `itemDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `menuitems`
--

INSERT INTO `menuitems` (`itemId`, `itemName`, `itemPrice`, `categoryId`, `itemDescription`) VALUES
(1, 'Fokhagyma krémleves', 795, 1, NULL),
(2, 'Paradicsomleves mozzarellával', 975, 1, NULL),
(3, 'Húsleves gazdagon házi májgombóccal', 1210, 1, NULL),
(4, 'Magyaros gulyásleves', 1340, 1, NULL),
(5, 'Camambert rántva áfonyalekvárral', 2185, 2, NULL),
(6, 'Rántott Trappista sajt majonézzel', 2185, 2, NULL),
(7, 'Klasszikus sertéspörkölt', 2185, 3, NULL),
(8, 'Fokhagymás-tejfölös rántott szelet sajttal', 2185, 3, NULL),
(9, 'Rántott sertésszelet (GM)', 2185, 3, NULL),
(10, 'Rántott sertésszelet extra adag (GM)', 2915, 3, NULL),
(11, 'Cordon Bleu sertéskarajból', 2185, 3, NULL),
(12, 'Szaftos cigánypecsenye', 2185, 3, NULL),
(13, 'Parmezános bundás csirkemell chilis avokádós majonézzel', 2305, 3, NULL),
(14, 'Hawaii csirkemell', 2305, 3, 'sajt, sonka, ananász'),
(15, 'Kapros juhtúróval töltött csirkemell szezámmagos bundában', 2305, 3, NULL),
(16, 'Vadsült áfonyalekvárral', 3040, 3, NULL),
(17, 'Pisztráng egészben, mandulás bundában', 135, 4, 'Ft/dkg'),
(18, 'Egész fogas, roston sütve', 185, 4, 'Ft/dkg'),
(19, 'Túrós csusza szalonnapörccel', 1940, 5, NULL),
(20, 'Spagetti bolognai módra', 1940, 5, NULL),
(21, 'Steakburgonya', 915, 6, NULL),
(22, 'Krokett', 670, 6, NULL),
(23, 'Hasábburgonya', 670, 6, NULL),
(24, 'Galuska', 670, 6, NULL),
(25, 'Párolt rizs', 670, 6, NULL),
(26, 'Pirított burgonya', 670, 6, NULL),
(27, 'Rántott gombafej tartármártással', 1695, 7, NULL),
(28, 'Görög pásztorsaláta', 1695, 7, 'jégsaláta, sárgarépa, lilakáposzta, fetasajt, fokhagyma, olívia'),
(29, 'Fitness saláta', 2305, 7, 'jégsaláta, csirkemell csíkok, sárgarpéa, cékla, kukorica'),
(30, 'Dínó falatkák hasábburgonyával', 1085, 8, NULL),
(31, 'Nutellás palacsinta', 670, 8, NULL),
(32, 'Csemegeuborka', 610, 9, NULL),
(33, 'Káposztasaláta', 610, 9, NULL),
(34, 'Házi vegyes vágott', 610, 9, NULL),
(35, 'Margarit', 1290, 10, 'Par., sajt, paradicsomkarika, bazsalikom'),
(36, 'Pumukli', 1490, 10, 'Par., sajt, sonka'),
(37, 'Vegas', 1550, 10, 'Par., sajt, kukorica, brokkoli, gomba, olíva'),
(38, 'Stan', 1550, 10, 'Par., sajt, sonka, gomba'),
(39, 'Kukori', 1550, 10, 'Par., sajt, sonka, kukorica'),
(40, 'Pan', 1550, 10, 'Par., sajt, szalámi'),
(41, 'Marly', 1550, 10, 'Par., sajt, sonka, ananász'),
(42, 'Vivaldi', 1750, 10, 'Par., négy féle sajt'),
(43, 'Hemingway', 1750, 10, 'Par., sajt, tonhal, hagyma, olivabogyó'),
(44, 'Csikós', 1550, 10, 'Par., sajt, kolbász, hagyma, paprika'),
(45, 'Betyár', 1550, 10, 'Par., sajt, sonka, hagyma, bacon'),
(46, 'Top Gun', 1750, 10, 'Par., sajt, sonka, szalámi, gomba, kukorica');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ordercon`
--

CREATE TABLE `ordercon` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cim` varchar(255) NOT NULL,
  `orderTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ordercon`
--



-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `secondName` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userId`, `email`, `pwd`, `firstName`, `secondName`, `admin`) VALUES
(1, 'admin@figura.hu', '$2y$10$EjqxbuH0cePBeUKcE66GS.GUM4kq33OcdR6hfJlt4nZqSxIH6j4W6', 'Teszt', 'Teszt', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`userId`);

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `groupconn`
--
ALTER TABLE `groupconn`
  ADD PRIMARY KEY (`conId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `itemId` (`itemId`);

--
-- A tábla indexei `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- A tábla indexei `ordercon`
--
ALTER TABLE `ordercon`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `groupconn`
--
ALTER TABLE `groupconn`
  MODIFY `conId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT a táblához `ordercon`
--
ALTER TABLE `ordercon`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Megkötések a táblához `groupconn`
--
ALTER TABLE `groupconn`
  ADD CONSTRAINT `groupconn_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `ordercon` (`orderId`),
  ADD CONSTRAINT `groupconn_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `menuitems` (`itemId`);

--
-- Megkötések a táblához `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);

--
-- Megkötések a táblához `ordercon`
--
ALTER TABLE `ordercon`
  ADD CONSTRAINT `ordercon_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
