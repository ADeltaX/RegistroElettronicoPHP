-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 21, 2019 alle 14:47
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scuola`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annotazioni`
--

CREATE TABLE `annotazioni` (
  `IdAnnotazione` int(11) NOT NULL,
  `Studente` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Descrizione` text,
  `IdMateria` int(11) DEFAULT NULL,
  `IdProfessore` int(11) DEFAULT NULL,
  `Tipologia` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `argomenti`
--

CREATE TABLE `argomenti` (
  `IdArgomento` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Descrizione` text,
  `IdMateria` int(11) DEFAULT NULL,
  `IdProfessore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `assenze`
--

CREATE TABLE `assenze` (
  `IdAssenza` int(11) NOT NULL,
  `Studente` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `TipoAssenza` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `assenze`
--

INSERT INTO `assenze` (`IdAssenza`, `Studente`, `Classe`, `Anno`, `Data`, `TipoAssenza`) VALUES
(7, 4, '1°A', '2018', '2019-05-20 06:48:38', 'Assente'),
(8, 12, '1°A', '2018', '2019-05-20 06:48:38', 'Assente');

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`Classe`, `Anno`) VALUES
('1°A', '2018'),
('2°A', '2018'),
('3°A', '2018'),
('4°A', '2018');

-- --------------------------------------------------------

--
-- Struttura della tabella `comunicazioni`
--

CREATE TABLE `comunicazioni` (
  `IdComunicazione` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Contenuto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `genitorestudente`
--

CREATE TABLE `genitorestudente` (
  `Genitore` varchar(32) NOT NULL,
  `Studente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `genitorestudente`
--

INSERT INTO `genitorestudente` (`Genitore`, `Studente`) VALUES
('genitore1', 1),
('genitore2', 2),
('genitore3', 3),
('genitore4', 4),
('genitore5', 5),
('genitore6', 6),
('genitore7', 7),
('genitore8', 8),
('genitore9', 9),
('genitore10', 10),
('genitore11', 11),
('genitore12', 12),
('genitore13', 13),
('genitore14', 14),
('genitore15', 15),
('genitore16', 16),
('genitore17', 17),
('genitore18', 18),
('genitore19', 19),
('genitore20', 20),
('genitore21', 21),
('genitore22', 22),
('genitore23', 23),
('genitore24', 24);

-- --------------------------------------------------------

--
-- Struttura della tabella `gestutenti`
--

CREATE TABLE `gestutenti` (
  `Utente` varchar(32) NOT NULL,
  `Nome` text NOT NULL,
  `Cognome` text NOT NULL,
  `Email` text NOT NULL,
  `DataDiNascita` date NOT NULL,
  `CodiceFiscale` varchar(16) NOT NULL,
  `Residenza` text NOT NULL,
  `Cellulare` varchar(15) NOT NULL,
  `PercorsoFoto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `gestutenti`
--

INSERT INTO `gestutenti` (`Utente`, `Nome`, `Cognome`, `Email`, `DataDiNascita`, `CodiceFiscale`, `Residenza`, `Cellulare`, `PercorsoFoto`) VALUES
('genitore1', 'Filomena', 'Milanesi', 'FilomenaMilanesi@fakelog.it', '1983-12-29', 'NXZYHP31T52B632W', 'Via San Pietro Ad Aram, 14', '03608536839', NULL),
('genitore10', 'Gioacchino', 'Neri', 'GioacchinoNeri@fakelog.it', '1998-01-26', 'GCCNRE98R26C27NF', 'Incrocio Ferrara 90', '+46 90 07774521', NULL),
('genitore11', 'Selvaggia', 'D\'angelo', 'SelvaggiaDangelo@fakelog.it', '1993-01-16', 'SLVDGL93D16C27NN', 'Contrada Diana 4 Piano 1', '+39 035 187 118', NULL),
('genitore12', 'Moreno', 'Guerra', 'MorenoGuerra@fakelog.it', '2010-01-25', 'MRNGRR01S25C27NS', 'Contrada Fiore 87 Piano 3', '+09 92 56782432', NULL),
('genitore13', 'Ninfa', 'Russo', 'NinfaRusso@fakelog.it', '1989-01-08', 'NNFRSS89R08C27NA', 'Rotonda Bernardi 5', '+01 78 4310786', NULL),
('genitore14', 'Doriana', 'Santoro', 'DorianaSantoro@fakelog.it', '1978-01-14', 'DRNSTR78B14C27NG', 'Rotonda Noah 81', '+51 266 02 15 0', NULL),
('genitore15', 'Amedeo', 'D\'amico', 'AmedeoDamico@fakelog.it', '1976-01-22', 'MDADMC76L22C27NJ', 'Rotonda Vitali 223 Appartamento 62', '+10 913 7961415', NULL),
('genitore16', 'Deborah', 'Messina', 'DeborahMessina@fakelog.it', '1975-01-04', 'DBRMSN75H04C27NF', 'Strada Sartori 06', '+95 80 87666554', NULL),
('genitore17', 'Cesidia', 'Rizzo', 'CesidiaRizzo@fakelog.it', '1999-01-26', 'CSDRZZ99B26C27NU', 'Strada Genziana 4 Appartamento 23', '+60 55 4360119', NULL),
('genitore18', 'Noemi', 'Riva', 'NoemiRiva@fakelog.it', '1995-01-09', 'NMORVI95M09C27NV', 'Borgo Marchetti 74 Appartamento 41', '+88 125 6162551', NULL),
('genitore19', 'Gianmarco', 'Romano', 'GianmarcoRomano@fakelog.it', '1972-01-02', 'GNMRMN72T02C27NK', 'Borgo Testa 692', '+39 364 184 401', NULL),
('genitore2', 'Manuele', 'Guerra', 'ManueleGuerra@fakelog.it', '1994-01-20', 'MNLGRR94H20C27NP', 'Rotonda Lombardo 528', '+64 890 47 80 6', NULL),
('genitore20', 'Rosita', 'Fabbri', 'RositaFabbri@fakelog.it', '1963-01-01', 'RSTFBR63E01C27NT', 'Contrada Rizzo 078', '+83 6196 852125', NULL),
('genitore21', 'Costantino', 'Montanari', 'CostantinoMontanari@fakelog.it', '1993-01-16', 'CSTMTN93E16C27ND', 'Rotonda Villa 79', '+76 8197 559595', NULL),
('genitore22', 'Alighiero', 'Pellegrino', 'AlighieroPellegrino@fakelog.it', '1963-01-27', 'LGHPLG63R27C27NB', 'Borgo Marvin 3', '+13 483 4473796', NULL),
('genitore23', 'Dimitri', 'De', 'DimitriDe@fakelog.it', '1998-01-03', 'DMTDEX98C03C27NN', 'Contrada Mariani 16', '+11 176 9916508', NULL),
('genitore24', 'Santo', 'D\'angelo', 'SantoDangelo@fakelog.it', '1964-01-11', 'SNTDGL64R11C27NA', 'Via Miriam 226 Piano 7', '+39 313 725 382', NULL),
('genitore3', 'Bibiana', 'Piras', 'BibianaPiras@fakelog.it', '1982-01-25', 'BBNPRS82R25C27NK', 'Contrada Parisi 16 Piano 2', '+39 351 685 526', NULL),
('genitore4', 'Elga', 'Messina', 'ElgaMessina@fakelog.it', '1975-01-11', 'LGEMSN75S11C27NV', 'Piazza Galli 9 Appartamento 60', '+66 1937 473673', NULL),
('genitore5', 'Ingrid', 'Sanna', 'IngridSanna@fakelog.it', '1992-01-19', 'NGRSNN92M19C27NA', 'Strada Orfeo 2', '+88 543 18 28 3', NULL),
('genitore6', 'Mercedes', 'Gatti', 'MercedesGatti@fakelog.it', '1968-01-05', 'MRCGTT68C05C27NY', 'Borgo Grassi 630 Appartamento 01', '+41 60 2162290', NULL),
('genitore7', 'Cassiopea', 'Pellegrini', 'CassiopeaPellegrini@fakelog.it', '1985-01-23', 'CSSPLG85E23C27NG', 'Borgo Ferrara 45', '+11 8875 553109', NULL),
('genitore8', 'Loretta', 'Carbone', 'LorettaCarbone@fakelog.it', '1976-01-19', 'LRTCBN76E19C27NI', 'Borgo Kai 97', '038 948 8779', NULL),
('genitore9', 'Penelope', 'Testa', 'PenelopeTesta@fakelog.it', '1987-01-26', 'PNLTST87T26C27NF', 'Borgo Nayade 916 Appartamento 74', '+94 022 71 56 0', NULL),
('professore1', 'Erminio', 'Calabrese', 'ErminioCalabrese@fakelog.it', '1979-01-28', 'QSTNHZ68C21C075Q', 'Via Solfatara, 146', '03571922485', NULL),
('professore2', 'Fatima', 'Ferri', 'FatimaFerri@fakelog.it', '1961-01-18', 'FTMFRR61H18C27NL', 'Strada Teseo 329', '+96 55 54977217', NULL),
('professore3', 'Pericle', 'Guerra', 'PericleGuerra@fakelog.it', '1995-01-18', 'PRCGRR95T18C27NU', 'Contrada Fiore 62', '+39 072 670 531', NULL),
('professore4', 'Monia', 'Ferri', 'MoniaFerri@fakelog.it', '1955-01-19', 'MNOFRR55H19C27NH', 'Rotonda Marino 80 Piano 7', '+94 78 58238814', NULL),
('studente1', 'Palmiro', 'Lucciano', 'PalmiroLucciano@fakelog.it', '2011-10-19', 'RZKLXS33D66L277L', 'Via San Domenico, 53', '03229969817', 'studente_bb01b22f-44fa-48d7-b619-caa393fa1130.jpg'),
('studente10', 'Renato', 'Sanna', 'RenatoSanna@fakelog.it', '1995-01-02', 'RNTSNN95M02C27NN', 'Rotonda Danny 74,', '941 57224761', NULL),
('studente11', 'Odone', 'Ferraro', 'OdoneFerraro@fakelog.it', '1997-01-18', 'DNOFRR97E18C27NW', 'Incrocio Mancini, 40', '2699 84465286', NULL),
('studente12', 'Luna', 'Esposito', 'LunaEsposito@fakelog.it', '1996-01-26', 'LNUSST96P26C27NH', 'Piazza Bettino, 74', '096 854 8849', NULL),
('studente13', 'Isabel', 'Pellegrini', 'IsabelPellegrini@fakelog.it', '1998-01-16', 'SBLPLG98M16C27NJ', 'Contrada Graziano, 78 Appartamento 85', '602 54 23 5843', NULL),
('studente14', 'Arturo', 'Bianco', 'ArturoBianco@fakelog.it', '1999-01-25', 'RTRBNC99R25C27NP', 'Via Bianco, 820', '5812 64528611', NULL),
('studente15', 'Prisca', 'Russo', 'PriscaRusso@fakelog.it', '1980-01-06', 'PRSRSS80E06C27NA', 'Contrada Palmieri, 06', '338 49 15 9210', NULL),
('studente16', 'Fulvio', 'Costa', 'FulvioCosta@fakelog.it', '1962-01-03', 'FLVCST62A03C27NW', 'Contrada Ian, 4', '6187 3381810', NULL),
('studente17', 'Mercedes', 'Palmieri', 'MercedesPalmieri@fakelog.it', '1999-01-19', 'MRCPMR99C19C27NZ', 'Borgo Orlando, 46', '141 2138407', NULL),
('studente18', 'Ludovico', 'Bianchi', 'LudovicoBianchi@fakelog.it', '1972-01-27', 'LDVBCH72R27C27NG', 'Strada Donatella 592,', '381 46 99 5837', NULL),
('studente19', 'Ilario', 'Conti', 'IlarioConti@fakelog.it', '1987-01-05', 'LRICNT87R05C27NG', 'Via Pacifico, 634', '365 868 682', NULL),
('studente2', 'Davis', 'Messina', 'DavisMessina@fakelog.it', '1966-01-07', 'DVSMSN66M07C27NL', 'Piazza Graziano, 2', '011 316 859', NULL),
('studente20', 'Flaviana', 'Bianco', 'FlavianaBianco@fakelog.it', '1999-01-28', 'FLVBNC99R28C27NU', 'Piazza Ferretti, 476', '049 648 703', NULL),
('studente21', 'Olimpia', 'Serra', 'OlimpiaSerra@fakelog.it', '1996-01-08', 'LMPSRR96A08C27NN', 'Via Marini 2, Appartamento 75', '080 209 667', NULL),
('studente22', 'Ione', 'Gatti', 'IoneGatti@fakelog.it', '1984-01-02', 'NIOGTT84P02C27NN', 'Rotonda Ferrara, 1', '7316 9195056', NULL),
('studente23', 'Demi', 'Pellegrino', 'DemiPellegrino@fakelog.it', '1957-01-15', 'DMEPLG57H15C27NI', 'Borgo Pellegrino, 244', '321 4631240', NULL),
('studente24', 'Zelida', 'Carbone', 'ZelidaCarbone@fakelog.it', '1981-01-12', 'ZLDCBN81C12C27NR', 'Rotonda Ferdinando, 2', '063 064 854', NULL),
('studente3', 'Domingo', 'Serra', 'DomingoSerra@fakelog.it', '1962-01-21', 'DMNSRR62S21C27NR', 'Via Amato, 238 Appartamento 09', '494 3273401', NULL),
('studente4', 'Carlo', 'Bruno', 'CarloBruno@fakelog.it', '1997-01-30', 'CRLBRN97D30C27NR', 'Via Fabbri, 0', '+47 1469 346244', NULL),
('studente5', 'Demis', 'Negri', 'DemisNegri@fakelog.it', '1995-01-19', 'DMSNGR95S19C27NO', 'Piazza Cattaneo, 6 Appartamento 73', '48 4523847', NULL),
('studente6', 'Monia', 'Ferretti', 'MoniaFerretti@fakelog.it', '1997-01-12', 'MNOFRT97B12C27NM', 'Rotonda Umberto 64,', '2667 49346459', NULL),
('studente7', 'Mietta', 'Guerra', 'MiettaGuerra@fakelog.it', '1969-01-22', 'MTTGRR69P22C27NU', 'Via Edvige, 45', '022 146 192', NULL),
('studente8', 'Giulietta', 'Ferretti', 'GiuliettaFerretti@fakelog.it', '1963-01-05', 'GLTFRT63H05C27NY', 'Incrocio Antonio 35,', '0674 3978286', NULL),
('studente9', 'Gaetano', 'Costa', 'GaetanoCosta@fakelog.it', '1976-01-27', 'GTNCST76B27C27NH', 'Strada Leone, 60', '8302 8824875', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `IdMateria` int(11) NOT NULL,
  `Descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`IdMateria`, `Descrizione`) VALUES
(1, 'Matematica e Complementi di Algebra'),
(2, 'Sistemi e Reti'),
(3, 'Storia dell\'Arte'),
(4, 'Italiano'),
(5, 'Telecomunicazioni');

-- --------------------------------------------------------

--
-- Struttura della tabella `pagelle`
--

CREATE TABLE `pagelle` (
  `IdPagella` int(11) NOT NULL,
  `Studente` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Contenuto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `IdProfessore` int(11) NOT NULL,
  `Utente` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`IdProfessore`, `Utente`) VALUES
(1, 'professore1'),
(2, 'professore2'),
(3, 'professore3'),
(4, 'professore4');

-- --------------------------------------------------------

--
-- Struttura della tabella `professorimaterie`
--

CREATE TABLE `professorimaterie` (
  `IdProfMat` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `IdMateria` int(11) DEFAULT NULL,
  `IdProfessore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `professorimaterie`
--

INSERT INTO `professorimaterie` (`IdProfMat`, `Classe`, `Anno`, `IdMateria`, `IdProfessore`) VALUES
(1, '1°A', '2018', 4, 1),
(2, '4°A', '2018', 5, 2),
(3, '3°A', '2018', 3, 3),
(4, '1°A', '2018', 2, 4),
(5, '2°A', '2018', 2, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `Studente` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `Utente` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Studente`, `Classe`, `Anno`, `Utente`) VALUES
(1, '3°A', '2018', 'studente1'),
(10, '1°A', '2018', 'studente10'),
(11, '3°A', '2018', 'studente11'),
(12, '1°A', '2018', 'studente12'),
(13, '3°A', '2018', 'studente13'),
(14, '1°A', '2018', 'studente14'),
(15, '3°A', '2018', 'studente15'),
(16, '1°A', '2018', 'studente16'),
(17, '2°A', '2018', 'studente17'),
(18, '4°A', '2018', 'studente18'),
(19, '4°A', '2018', 'studente19'),
(2, '4°A', '2018', 'studente2'),
(20, '4°A', '2018', 'studente20'),
(21, '4°A', '2018', 'studente21'),
(22, '4°A', '2018', 'studente22'),
(23, '3°A', '2018', 'studente23'),
(24, '1°A', '2018', 'studente24'),
(3, '1°A', '2018', 'studente3'),
(4, '1°A', '2018', 'studente4'),
(5, '2°A', '2018', 'studente5'),
(6, '1°A', '2018', 'studente6'),
(7, '2°A', '2018', 'studente7'),
(8, '2°A', '2018', 'studente8'),
(9, '2°A', '2018', 'studente9');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Utente` varchar(32) NOT NULL,
  `Password` varchar(128) DEFAULT NULL,
  `TipoUtente` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Utente`, `Password`, `TipoUtente`) VALUES
('genitore1', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore10', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore11', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore12', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore13', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore14', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore15', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore16', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore17', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore18', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore19', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore2', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore20', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore21', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore22', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore23', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore24', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore3', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore4', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore5', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore6', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore7', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore8', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('genitore9', '$2y$10$p0ciyDwrGXxYwfv2NQmFsub.GFw/g9nb.gwV49Ffe8qkep0eXKmMq', '2'),
('professore1', '$2y$10$WPnzP2L4ibTfJauucvEtduAqpfEZMEiz/U2WvOwl7WaDhjBfr5ggq', '1'),
('professore2', '$2y$10$WPnzP2L4ibTfJauucvEtduAqpfEZMEiz/U2WvOwl7WaDhjBfr5ggq', '1'),
('professore3', '$2y$10$WPnzP2L4ibTfJauucvEtduAqpfEZMEiz/U2WvOwl7WaDhjBfr5ggq', '1'),
('professore4', '$2y$10$WPnzP2L4ibTfJauucvEtduAqpfEZMEiz/U2WvOwl7WaDhjBfr5ggq', '1'),
('studente1', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente10', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente11', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente12', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente13', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente14', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente15', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente16', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente17', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente18', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente19', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente2', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente20', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente21', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente22', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente23', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente24', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente3', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente4', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente5', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente6', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente7', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente8', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3'),
('studente9', '$2y$10$lGN1FHgLeRy/wnCeyBtzKuTk8CMd9fbq6Ev72inUMOOtduF2ahjAe', '3');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `IdVoto` int(11) NOT NULL,
  `Studente` int(11) NOT NULL,
  `Classe` varchar(8) NOT NULL,
  `Anno` varchar(4) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Voto` text,
  `IdMateria` int(11) DEFAULT NULL,
  `IdProfessore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `voti`
--

INSERT INTO `voti` (`IdVoto`, `Studente`, `Classe`, `Anno`, `Data`, `Voto`, `IdMateria`, `IdProfessore`) VALUES
(15, 3, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(16, 4, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(17, 6, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(18, 10, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(19, 12, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(20, 14, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(21, 16, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1),
(22, 24, '1°A', '2018', '2019-05-20 07:24:28', 'NC', 4, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annotazioni`
--
ALTER TABLE `annotazioni`
  ADD PRIMARY KEY (`IdAnnotazione`),
  ADD KEY `IdProfessore` (`IdProfessore`),
  ADD KEY `IdMateria` (`IdMateria`),
  ADD KEY `Studente` (`Studente`,`Anno`),
  ADD KEY `annotazioni_ibfk_3` (`Classe`,`Anno`);

--
-- Indici per le tabelle `argomenti`
--
ALTER TABLE `argomenti`
  ADD PRIMARY KEY (`IdArgomento`),
  ADD KEY `IdProfessore` (`IdProfessore`),
  ADD KEY `IdMateria` (`IdMateria`);

--
-- Indici per le tabelle `assenze`
--
ALTER TABLE `assenze`
  ADD PRIMARY KEY (`IdAssenza`),
  ADD KEY `Studente` (`Studente`,`Anno`),
  ADD KEY `assenze_ibfk_1` (`Classe`,`Anno`);

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`Classe`,`Anno`);

--
-- Indici per le tabelle `comunicazioni`
--
ALTER TABLE `comunicazioni`
  ADD PRIMARY KEY (`IdComunicazione`);

--
-- Indici per le tabelle `genitorestudente`
--
ALTER TABLE `genitorestudente`
  ADD PRIMARY KEY (`Genitore`) USING BTREE,
  ADD KEY `Genitore` (`Genitore`),
  ADD KEY `Studente` (`Studente`);

--
-- Indici per le tabelle `gestutenti`
--
ALTER TABLE `gestutenti`
  ADD PRIMARY KEY (`Utente`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`IdMateria`);

--
-- Indici per le tabelle `pagelle`
--
ALTER TABLE `pagelle`
  ADD PRIMARY KEY (`IdPagella`),
  ADD KEY `Studente` (`Studente`),
  ADD KEY `Classe` (`Classe`,`Anno`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`IdProfessore`);

--
-- Indici per le tabelle `professorimaterie`
--
ALTER TABLE `professorimaterie`
  ADD PRIMARY KEY (`IdProfMat`),
  ADD KEY `IdMateria` (`IdMateria`),
  ADD KEY `IdProfessore` (`IdProfessore`),
  ADD KEY `Classe` (`Classe`,`Anno`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`Studente`,`Classe`,`Anno`),
  ADD KEY `Utente` (`Utente`),
  ADD KEY `Classe` (`Classe`,`Anno`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Utente`);

--
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`IdVoto`),
  ADD KEY `IdMateria` (`IdMateria`),
  ADD KEY `IdProfessore` (`IdProfessore`),
  ADD KEY `Studente` (`Studente`),
  ADD KEY `Classe` (`Classe`,`Anno`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `assenze`
--
ALTER TABLE `assenze`
  MODIFY `IdAssenza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `voti`
--
ALTER TABLE `voti`
  MODIFY `IdVoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `annotazioni`
--
ALTER TABLE `annotazioni`
  ADD CONSTRAINT `annotazioni_ibfk_1` FOREIGN KEY (`IdProfessore`) REFERENCES `professori` (`IdProfessore`),
  ADD CONSTRAINT `annotazioni_ibfk_2` FOREIGN KEY (`IdMateria`) REFERENCES `materie` (`IdMateria`),
  ADD CONSTRAINT `annotazioni_ibfk_3` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);

--
-- Limiti per la tabella `argomenti`
--
ALTER TABLE `argomenti`
  ADD CONSTRAINT `argomenti_ibfk_1` FOREIGN KEY (`IdProfessore`) REFERENCES `professori` (`IdProfessore`),
  ADD CONSTRAINT `argomenti_ibfk_2` FOREIGN KEY (`IdMateria`) REFERENCES `materie` (`IdMateria`);

--
-- Limiti per la tabella `assenze`
--
ALTER TABLE `assenze`
  ADD CONSTRAINT `assenze_ibfk_1` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);

--
-- Limiti per la tabella `genitorestudente`
--
ALTER TABLE `genitorestudente`
  ADD CONSTRAINT `genitorestudente_ibfk_1` FOREIGN KEY (`Genitore`) REFERENCES `utenti` (`Utente`),
  ADD CONSTRAINT `genitorestudente_ibfk_2` FOREIGN KEY (`Studente`) REFERENCES `studenti` (`Studente`);

--
-- Limiti per la tabella `gestutenti`
--
ALTER TABLE `gestutenti`
  ADD CONSTRAINT `gestutenti_ibfk_1` FOREIGN KEY (`Utente`) REFERENCES `utenti` (`Utente`);

--
-- Limiti per la tabella `pagelle`
--
ALTER TABLE `pagelle`
  ADD CONSTRAINT `pagelle_ibfk_1` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);

--
-- Limiti per la tabella `professorimaterie`
--
ALTER TABLE `professorimaterie`
  ADD CONSTRAINT `professorimaterie_ibfk_2` FOREIGN KEY (`IdMateria`) REFERENCES `materie` (`IdMateria`),
  ADD CONSTRAINT `professorimaterie_ibfk_3` FOREIGN KEY (`IdProfessore`) REFERENCES `professori` (`IdProfessore`),
  ADD CONSTRAINT `professorimaterie_ibfk_4` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`Utente`) REFERENCES `utenti` (`Utente`),
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`IdMateria`) REFERENCES `materie` (`IdMateria`),
  ADD CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`IdProfessore`) REFERENCES `professori` (`IdProfessore`),
  ADD CONSTRAINT `voti_ibfk_3` FOREIGN KEY (`Classe`,`Anno`) REFERENCES `classi` (`Classe`, `Anno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
