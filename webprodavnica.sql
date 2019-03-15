-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 12:26 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `idartikli` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `cena` double NOT NULL,
  `slika` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `kategorija_idkategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`idartikli`, `naziv`, `cena`, `slika`, `kategorija_idkategorija`) VALUES
(7, 'Air Max Pink', 8999.99, '../images/airMaxPink.png', 2),
(8, 'Zelene patike', 6056.43, '../images/maslinastoZelene.png', 2),
(9, 'Pink Nike Women', 12567.99, '../images/pinkNikeWomen.png', 2),
(10, 'Asics Za Trcanje', 7151.56, '	\r\n../images/asicsZaTrcanje.png', 1),
(12, 'Pink Converse', 3499.99, '../images/pinkConverse.png', 2),
(13, 'Pink Nike', 7899, '../images/pinkNike.png', 2),
(16, 'Plave Nike', 6000, '../images/plaveNike.png', 1),
(17, 'Plave Starke', 4600, '../images/plaveStarke.png', 1),
(19, 'Plavo Zute', 9678.89, '../images/plavoZute.png', 1),
(20, 'Roze Patike', 4444.44, ' ../images/rozePatike.png', 2),
(21, 'Salomon Plave', 6666.66, '../images/salomonPlave.png', 1),
(22, 'Sive', 5890, '../images/sive.png', 1),
(25, 'Star Wars Vans', 6555.9, '../images/starWarsVans.png', 2),
(26, 'Svetloplave Nike', 13679.99, '../images/svetloplaveNike.png', 2),
(27, 'White Women', 18999.99, '../images/whiteWomen.png', 2),
(28, 'Zelene Asics', 7888.88, '../images/zeleneAsics.png', 1),
(30, 'Zeleno Plave', 3400.9, '../images/zelenoPlave.png', 1),
(31, 'Zenske', 7600.67, '../images/zenskePlavePatike.png', 2),
(36, 'Zelene Nike', 8999.99, '../images/zeleneNike.png', 1),
(39, 'Patike Test', 223323, '../images/siveNike.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artikli_has_korpa`
--

CREATE TABLE `artikli_has_korpa` (
  `id_artikliHasKorpa` int(11) NOT NULL,
  `artikli_idartikli` int(11) NOT NULL,
  `korpa_idkorpa` int(11) NOT NULL,
  `velicine_idVelicine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `artikli_has_korpa`
--

INSERT INTO `artikli_has_korpa` (`id_artikliHasKorpa`, `artikli_idartikli`, `korpa_idkorpa`, `velicine_idVelicine`) VALUES
(284, 31, 65, 4);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `idgrad` int(200) NOT NULL,
  `ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`idgrad`, `ime`) VALUES
(1, 'Ada'),
(2, 'Aleksandrovac'),
(3, 'Apatin'),
(4, 'Aranđelovac'),
(5, 'Arilje'),
(6, 'Bačka Palanka'),
(7, 'Bačka Topola'),
(8, 'Banovci - Dunav'),
(9, 'Batajnica'),
(10, 'Bečej'),
(11, 'Bela Crkva'),
(12, 'Bela Zemlja'),
(13, 'Beograd'),
(14, 'Blace'),
(15, 'Bogatić'),
(16, 'Boleč'),
(17, 'Bor'),
(18, 'Borča'),
(19, 'Brus'),
(20, 'Bujanovac'),
(21, 'Crvenka'),
(22, 'Čačak'),
(23, 'Čajetina'),
(24, 'Ćićevac'),
(25, 'Ćuprija'),
(26, 'Despotovac'),
(27, 'Dobanovci'),
(28, 'Futog'),
(29, 'Gornji Milanovac'),
(30, 'Grocka'),
(31, 'Inđija'),
(32, 'Ivanjica'),
(33, 'Jagodina'),
(34, 'Jajinci-Beograd'),
(35, 'Kaluđerica'),
(36, 'Kanjiža'),
(37, 'Kikinda'),
(38, 'Kladovo'),
(39, 'Knjaževac'),
(40, 'Kostolac'),
(41, 'Kragujevac'),
(42, 'Kraljevo'),
(43, 'Krnjača'),
(44, 'Krnješevci'),
(45, 'Kruševac'),
(46, 'Kula'),
(47, 'Kuršumlija'),
(48, 'Kuzmin'),
(49, 'Laćarak'),
(50, 'Lazarevac'),
(51, 'Leskovac'),
(52, 'Leštane'),
(53, 'Loznica'),
(54, 'Mačvanska Mitrovica'),
(55, 'Majdanpek'),
(56, 'Mali Iđoš'),
(57, 'Martinci'),
(58, 'Mladenovac'),
(59, 'Negotin'),
(60, 'Niš'),
(61, 'Nova Pazova'),
(62, 'Novi Bečej'),
(63, 'Novi Pazar'),
(64, 'Novi Sad'),
(65, 'Obrenovac'),
(66, 'Odžaci'),
(67, 'Palić'),
(68, 'Pančevo'),
(69, 'Paraćin'),
(70, 'Pećinci'),
(71, 'Petrovac na Mlavi'),
(72, 'Petrovaradin'),
(73, 'Pirot'),
(74, 'Požarevac'),
(75, 'Požega'),
(76, 'Prijepolje'),
(77, 'Prokuplje'),
(78, 'Raška'),
(79, 'Resnik-Beograd'),
(80, 'Ruma'),
(81, 'Senta'),
(82, 'Sevojno'),
(83, 'Sivac'),
(84, 'Sjenica'),
(85, 'Smederevo'),
(86, 'Smederevska Palanka'),
(87, 'Sombor'),
(88, 'Sremčica'),
(89, 'Sremska Kamenica'),
(90, 'Sremska Mitrovica'),
(91, 'Stara Pazova'),
(92, 'Subotica'),
(93, 'Surčin'),
(94, 'Surdulica'),
(95, 'Svilajnac'),
(96, 'Šabac'),
(97, 'Šid'),
(98, 'Šimanovci'),
(99, 'Temerin'),
(100, 'Topola'),
(101, 'Trstenik'),
(102, 'Tutin'),
(103, 'Ub'),
(104, 'Ugrinovci'),
(105, 'Užice'),
(106, 'Valjevo'),
(107, 'Varvarin'),
(108, 'Velika Plana'),
(109, 'Veliko Gradište'),
(110, 'Veternik'),
(111, 'Vinča'),
(112, 'Vlasotince'),
(113, 'Vojka'),
(114, 'Vranje'),
(115, 'Vrbas'),
(116, 'Vrnjačka Banja'),
(117, 'Vršac'),
(118, 'Zaječar'),
(119, 'Zlatibor'),
(120, 'Zrenjanin'),
(121, 'Železnik');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idkategorija` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idkategorija`, `naziv`, `slika`) VALUES
(1, 'Muške patike', '../images/plaveStarke.png'),
(2, 'Ženske patike', '../images/zenskePlavePatike.png');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnici` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `e-mail` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `grad_idgrad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnici`, `ime`, `prezime`, `username`, `password`, `telefon`, `e-mail`, `adresa`, `grad_idgrad`) VALUES
(91, 'Dragutin', 'Ignjatovic', 'gagi', 'gagi', '0616485508', 'gagi@gmail.com', 'Fiskulturna 42', 68),
(92, 'Ivana', 'Gvozdenovic', 'ivana', 'ivana', '0693231960', 'ivana@gmail.com', 'Marsala Tita 14', 13),
(93, 'Marko', 'Maric', 'marko', 'marko', '0616442589', 'marko@gmail.com', 'Narodni front 12', 60),
(94, 'Jaanko', 'Janic', 'janko', 'janko', '063265125', 'janko@gmail.com', 'Radnicka 12', 64),
(95, 'Sanja', 'Rakic', 'sanja', 'sanja', '062564589', 'sanja@gmail.com', '4. oktobar 56', 106),
(96, 'Jelena', 'Davidovic', 'jelena', 'jelena', '069512365', 'jelena@gmail.com', 'Bosanska 44', 65),
(97, 'Stefan', 'Jovcic', 'jovka', 'jovka', '063263258', 'jovka@gmail.com', 'Bosanska 12', 105),
(98, 'Branislav', 'Atanasov', 'bane', 'bane', '063215542', 'bane@gmail.com', 'Fiskulturna 12', 69),
(99, 'Stefan', 'Atanasov', 'cefa', 'cefa', '061616525', 'cefa@gmail.com', 'Prvomajska 33', 13),
(100, 'Dino', 'Jovcic', 'dino', 'dino', '065525586', 'dino@gmail.com', 'Makedonska23', 42),
(101, 'Tijana', 'Surbatovic', 'tica', 'tica', '06265425', 'tica@gmail.com', 'makedonska34', 11),
(102, 'Bojana', 'Stojkovski', 'boka', 'boka', '06521586', 'boka@gmail.com', 'Srbijanska 78', 41),
(103, 'Jelena', 'Cukovic', 'cure', 'cure', '062565456', 'cure@gmail.com', 'Karadjordjeva 12', 73);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idkorpa` int(11) NOT NULL,
  `korisnici_idkorisnici` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idkorpa`, `korisnici_idkorisnici`) VALUES
(54, 91),
(55, 92),
(56, 93),
(57, 94),
(58, 95),
(59, 96),
(60, 97),
(61, 98),
(62, 99),
(63, 100),
(64, 101),
(65, 102),
(66, 103);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `idporudzbine` int(11) NOT NULL,
  `korisnici_idkorisnici` int(11) NOT NULL,
  `artikli_idartikli` int(11) NOT NULL,
  `velicine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `velicine`
--

CREATE TABLE `velicine` (
  `idvelicine` int(11) NOT NULL,
  `broj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `velicine`
--

INSERT INTO `velicine` (`idvelicine`, `broj`) VALUES
(1, 36),
(2, 37),
(3, 38),
(4, 39),
(5, 40),
(6, 41),
(7, 42),
(8, 43),
(9, 44),
(10, 45),
(11, 46),
(12, 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`idartikli`),
  ADD KEY `fk_artikli_kategorija1_idx` (`kategorija_idkategorija`);

--
-- Indexes for table `artikli_has_korpa`
--
ALTER TABLE `artikli_has_korpa`
  ADD PRIMARY KEY (`id_artikliHasKorpa`),
  ADD KEY `fk_artikli_has_korpa_korpa1_idx` (`korpa_idkorpa`),
  ADD KEY `fk_artikli_has_korpa_artikli1_idx` (`artikli_idartikli`),
  ADD KEY `velicine_idVelicine` (`velicine_idVelicine`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`idgrad`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idkategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnici`),
  ADD KEY `fk_korisnici_grad1_idx` (`grad_idgrad`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idkorpa`),
  ADD KEY `fk_korpa_korisnici1_idx` (`korisnici_idkorisnici`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`idporudzbine`),
  ADD KEY `fk_porudzbine_korisnici_idx` (`korisnici_idkorisnici`),
  ADD KEY `fk_porudzbine_artikli1_idx` (`artikli_idartikli`);

--
-- Indexes for table `velicine`
--
ALTER TABLE `velicine`
  ADD PRIMARY KEY (`idvelicine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `idartikli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `artikli_has_korpa`
--
ALTER TABLE `artikli_has_korpa`
  MODIFY `id_artikliHasKorpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `idgrad` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idkategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idkorpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `idporudzbine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `velicine`
--
ALTER TABLE `velicine`
  MODIFY `idvelicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikli`
--
ALTER TABLE `artikli`
  ADD CONSTRAINT `fk_artikli_kategorija1` FOREIGN KEY (`kategorija_idkategorija`) REFERENCES `kategorija` (`idkategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artikli_has_korpa`
--
ALTER TABLE `artikli_has_korpa`
  ADD CONSTRAINT `artikli_has_korpa_ibfk_1` FOREIGN KEY (`velicine_idVelicine`) REFERENCES `velicine` (`idvelicine`),
  ADD CONSTRAINT `fk_artikli_has_korpa_artikli1` FOREIGN KEY (`artikli_idartikli`) REFERENCES `artikli` (`idartikli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_artikli_has_korpa_korpa1` FOREIGN KEY (`korpa_idkorpa`) REFERENCES `korpa` (`idkorpa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `fk_korisnici_grad1` FOREIGN KEY (`grad_idgrad`) REFERENCES `grad` (`idgrad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `fk_korpa_korisnici1` FOREIGN KEY (`korisnici_idkorisnici`) REFERENCES `korisnici` (`idkorisnici`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD CONSTRAINT `fk_porudzbine_artikli1` FOREIGN KEY (`artikli_idartikli`) REFERENCES `artikli` (`idartikli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_porudzbine_korisnici` FOREIGN KEY (`korisnici_idkorisnici`) REFERENCES `korisnici` (`idkorisnici`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
