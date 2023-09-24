-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 12:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duombaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `prisijungimo_vardas` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `slaptazodis` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`prisijungimo_vardas`, `slaptazodis`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `krepselis`
--

CREATE TABLE `krepselis` (
  `idd` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `prisijungimo_vardas` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kaina` int(100) NOT NULL,
  `nuotrauka` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prekes`
--

CREATE TABLE `prekes` (
  `ID` int(11) NOT NULL,
  `pavadinimas` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `data` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `kaina` int(10) NOT NULL,
  `aprasymas` varchar(3000) COLLATE utf8mb4_bin NOT NULL,
  `reikalavimai` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `nuotrauka` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kategorija` varchar(20) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `prekes`
--

INSERT INTO `prekes` (`ID`, `pavadinimas`, `data`, `kaina`, `aprasymas`, `reikalavimai`, `nuotrauka`, `kategorija`) VALUES
(21, 'HITMAN 3', '2022', 30, 'HITMAN 3\n\nIO Interactive pristato trečią ir paskutinę World of Assassination trilogijos dalį, užbaigiančią Hitman bei Hitman 2 žaidimų siužetus. Paskutinį kartą įkūnykite ikoniškąjį Agent 47 ir pagaliau užbaikite visus nebaigtus kontraktus, kuriuos sėkmingai įvykdyti gali tik profesionalus, šaltakraujis žudikas! Čia jus kaip mat į siužetą įtrauks asmeninė šio bevardžio agento kelionė, kupina tiek viską pasiglemžiančios tamsos, tiek neblėstančios vilties - visa tai gali turėti tiek vieną, dramatišką pabaigą. Įsigykite HITMAN 3 (PC) Steam key ir tyliai slinkite šešėliais įspūdingiausiuose pasaulio kampeliuose! Laukia tik mirtis!', 'OS: 64-bit Windows 10\nProcesorius: Intel CPU Core i7 4790 4 GHz\nAtmintis: 16 GB RAM\nGrafika: Nvidia GPU GeForce GTX 1070 / AMD GPU Radeon RX Vega 56 8GB\nDirectX: 12\nTalpa: 80 GB', 'hitman.jpeg', 'veiksmo'),
(22, 'Call of Duty 4: Modern Warfare', '2010', 15, 'Call of Duty: Modern Warfare Remastered is a well-polished version to what is one of the most critically acclaimed games throughout the history of FPS genre. Enjoy highly improved textures, phisically based rendering, high-dynamic range lighting and so much more! Multiple award winning classic and global phenomena returns as an experience that fans of the new generation simply cannot walk by.', 'OS: Microst® Windows® XP/Vista (Windows 95/98/ME/2000 are uned)\r\nProcesorius: Intel® Pentium® 4 2.4 Ghz / AMD(R) 64 (TM) 2800+ / Intel® AMD® 1.8 Ghz Dual Coreed\r\nAtmintis: 512MB RAM (Windows® XP), 768MB RAM (Vista®)\r\nGrafika: NVIDIA Gece 6600 or ATI Radeon® 9800Pro\r\nTalpa: 8GB', 'modern.jpeg', 'fps'),
(23, 'The Elder Scrolls V: Skyrim', '2011', 20, 'The Elder Scrolls V: Skyrim pažymi dar vieną skyrių legendinėje The Elder Scrolls sagoje, sukurtoje „Bethesda Game Studios“. Atviro pasaulio potyriai, kvapą gniaužianti senųjų laikų istorija, legendos apie nuožmius karius, narsiai kovojusius šiaurės salose ir, galiausiai, misijos, kurios neleis nuobodžiauti net labiausiai patyrusiems RPG žaidimų entuziastams. Šis žaidimas turi viską. Nors išleistas jau prieš kelerius metus, žaidimas tikrai nepaseno ir vis dar suteikia nesibaigiančias valandas pramogų, tad įsigyk The Elder Scrolls V: Skyrim Steam key ir junkis prie linksmybių! ', 'OS: Microst® Windows® XP/Vista (Windows 95/98/ME/2000 are uned)\r\nProcesorius: Intel® Pentium® 4 2.4 Ghz / AMD(R) 64 (TM) 2800+ / Intel® AMD® 1.8 Ghz Dual Coreed\r\nAtmintis: 512MB RAM (Windows® XP), 768MB RAM (Vista®)\r\nGrafika: NVIDIA Gece 6600 or ATI Radeon® 9800Pro\r\nTalpa: 8GB', 'skyrim.jpg', 'veiksmo'),
(24, 'Kadras', '2020', 5, 'Kadras', 'Reikalavimai', '2kad.png', 'nuotykiu'),
(25, 'Su dievu', '2018', 10, 'Žaidimas', 'Bulvė', '20292570_1519256368134810_424009466_n.jpg', 'mmo'),
(26, 'NBA 2K23 ', '2022', 60, 'Pasiruošk įtampai ir džiaugsmui žaidžiant krepšinio aikštelėje! Tikras krepšinio žaidimo džiaugsmas laukia tavęs NBA 2K23 (PC) Steam key pavidalu. Nusiteik įvairiems žaidimo režimams ir naujiems elementams, kuriuos siūlo naujausia serijos dalis. Karjeros režimas šį kartą dar labiau išplėtotas, o taip pat tavęs laukia galimybė susikurti savo svajonių komandą bei kiti sugrįžtantys ir nauji elementai. Galėsi žaisti už visas istorines NBA komandas ir kovoti prieš dirbtinį intelektą arba kitus žaidėjus, nesvarbu ar jie tavo draugai, ar žmonės iš viso pasaulio. Naujausia NBA dalis yra tiesiog tobulas žaidimas vakarėliui, paliekantis pačias geriausias emocijas, azarto jausmą ir norą žaisti vėl.', 'Reikalavimai', 'nba2k23.jpg', 'sporto'),
(27, 'Kingdom Come: Deliverance', '2019', 20, 'Svarstote, ar pirkti „Kingdom Come Deliverance“ verta? Atsakome: tikrai taip. Tai nuostabi proga papulti į Šventosios Romos Imperijos laikų istorija paremtą atvirą pasaulį. Šis „Warhorse Studios“ sukurtas žaidimas – tai žiauri ir labai tikroviška viduramžių laikų patirtis. Jau nuo pirmų žingsnių pažinsite negailestingą šio vaidmenų žaidimo sistemą ir taps aišku, kad žaisti lengva tikrai nebus.\r\n\r\n\r\nTiesiog Henris\r\n\r\n\r\n„Kingdom Come Deliverance“ žaidimo aktyvavimo kodas leis patirti itin aštrių pojūčių pilną istoriją. Ji prasidės Bohemijoje, pagrindinio veikėjo, kalvio sūnaus Henrio, įprastam gyvenimui sudužus į šipulius. Užpuolus gaujai plėšikų išžudoma visa Henrio šeima ir net draugai, o jis pats tik per plauką sugeba išlikti gyvas. Kontekstas išties nesmagus, laimei, kerštui galimybių ir priemonių tikrai pakaks – tereikės atkaklumo ir ypatingos valios.', 'Reikalavimai', 'kingdom.jpeg', 'rpg');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymai`
--

CREATE TABLE `uzsakymai` (
  `id` int(100) NOT NULL,
  `vardas` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `pavarde` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `el_pastas` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `atsiskaitymo_budas` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `idz` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `uzsakymai`
--

INSERT INTO `uzsakymai` (`id`, `vardas`, `pavarde`, `el_pastas`, `atsiskaitymo_budas`, `idz`) VALUES
(22, 'Enre', 'enre', 'ee@f.vom', 'korta', 24),
(23, 'Enrikas', 'Aldas', 'gytis@mail.com', 'korta', 24),
(24, 'ee', 'Aldas', 'ffff@ffff.com', 'korta', 22),
(25, 'ee', 'Enrikas', 'eee@gmail.com', 'korta', 22),
(26, 'EEE', 'Aldas', 'ee@f.vom', 'pavedimas', 23),
(27, 'Gytukas', 'Gudaitis', 'gytukas01@gmail.com', 'pavedimas', 22);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `prisijungimo_vardas` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `vardas` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pavarde` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slaptazodis` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `el_pastas` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`prisijungimo_vardas`, `vardas`, `pavarde`, `slaptazodis`, `el_pastas`) VALUES
('', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
('222', '', 'Enrikas', 'b59c67bf196a4758191e42f76670ceba', 'eee@gmail.com'),
('ABC', 'Enrikas', 'Enrikas', '81dc9bdb52d04dc20036dbd8313ed055', 'eee@gmail.com'),
('Enre', 'Enrikas', 'Vaiciulis', '81dc9bdb52d04dc20036dbd8313ed055', ''),
('FFF', 'ffff', 'fffffff', '81dc9bdb52d04dc20036dbd8313ed055', 'ffff@ffff.com'),
('Gytasas', 'Gytis', 'Gudaitis', '81dc9bdb52d04dc20036dbd8313ed055', 'sexy@mail.com'),
('Gytis', 'Gytis', 'Gudaitis', '3418d41cb48adc979e5352d4cc751b12', 'gytuks@gmail.com'),
('Rokutas01', 'ee', 'Enrikas', '73bfe74c5ff64692a0e0bf217f632eef', 'ee@f.vom'),
('dddddddd', 'Gytis', 'Enrikas', '706db108edd9c5bcaca5e8b17a3cad25', 'ee@f.vom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`prisijungimo_vardas`);

--
-- Indexes for table `krepselis`
--
ALTER TABLE `krepselis`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `prisijungimo_vardas` (`prisijungimo_vardas`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`prisijungimo_vardas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krepselis`
--
ALTER TABLE `krepselis`
  MODIFY `idd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `prekes`
--
ALTER TABLE `prekes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krepselis`
--
ALTER TABLE `krepselis`
  ADD CONSTRAINT `krepselis_ibfk_1` FOREIGN KEY (`prisijungimo_vardas`) REFERENCES `vartotojai` (`prisijungimo_vardas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
