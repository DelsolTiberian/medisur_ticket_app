-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

--
-- Database: medisur
--

-- --------------------------------------------------------

--
-- Table structure for table cat_frais
--

CREATE TABLE cat_frais (
  id_cat INT(11) NOT NULL,
  n_cat VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table frais
--

CREATE TABLE frais (
  id_frais INT(11) NOT NULL,
  montant INT(11) DEFAULT NULL,
  date_heure_creation DATETIME DEFAULT NULL,
  date_heure_modif DATETIME DEFAULT NULL,
  description VARCHAR(50) DEFAULT NULL,
  justificatif VARCHAR(50) DEFAULT NULL,
  id_utilisateur INT(11) NOT NULL,
  id_utilisateur_1 INT(11) NOT NULL,
  id_cat INT(11) NOT NULL,
  id_status INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table role
--

CREATE TABLE role (
  id_role INT(11) NOT NULL,
  nom_role VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table stat_frais
--

CREATE TABLE stat_frais (
  id_status INT(11) NOT NULL,
  desc_status VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  id_utilisateur INT(11) NOT NULL,
  nom VARCHAR(50) DEFAULT NULL,
  prenom VARCHAR(50) DEFAULT NULL,
  email VARCHAR(50) DEFAULT NULL,
  role SMALLINT(6) DEFAULT NULL,
  id_role INT(11) NOT NULL,
  photo_profil VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

ALTER TABLE cat_frais
  ADD PRIMARY KEY (id_cat);

ALTER TABLE frais
  ADD PRIMARY KEY (id_frais),
  ADD KEY id_utilisateur (id_utilisateur),
  ADD KEY id_utilisateur_1 (id_utilisateur_1),
  ADD KEY id_cat (id_cat),
  ADD KEY id_status (id_status);

ALTER TABLE role
  ADD PRIMARY KEY (id_role);

ALTER TABLE stat_frais
  ADD PRIMARY KEY (id_status);

ALTER TABLE user
  ADD PRIMARY KEY (id_utilisateur),
  ADD KEY id_role (id_role);

--
-- Constraints for dumped tables
--

ALTER TABLE frais
  ADD CONSTRAINT frais_ibfk_1 FOREIGN KEY (id_utilisateur) REFERENCES user (id_utilisateur),
  ADD CONSTRAINT frais_ibfk_2 FOREIGN KEY (id_utilisateur_1) REFERENCES user (id_utilisateur),
  ADD CONSTRAINT frais_ibfk_3 FOREIGN KEY (id_cat) REFERENCES cat_frais (id_cat),
  ADD CONSTRAINT frais_ibfk_4 FOREIGN KEY (id_status) REFERENCES stat_frais (id_status);

ALTER TABLE user
  ADD CONSTRAINT user_ibfk_1 FOREIGN KEY (id_role) REFERENCES role (id_role);

COMMIT;
