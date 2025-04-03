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
-- Table structure for table expense_category
--

CREATE TABLE expense_category (
                                  id_category INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                  name_category VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table role
--

CREATE TABLE role (
                      id_role INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      name_role VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table expense_status
--

CREATE TABLE expense_status (
                                id_status INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                description_status VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
                      id_user INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      last_name VARCHAR(50) DEFAULT NULL,
                      first_name VARCHAR(50) DEFAULT NULL,
                      email VARCHAR(50) DEFAULT NULL,
                      role SMALLINT(6) DEFAULT NULL,
                      id_role INT(11) NOT NULL,
                      profile_picture VARCHAR(50) DEFAULT NULL,
                      FOREIGN KEY (id_role) REFERENCES role (id_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table expense
--

CREATE TABLE expense (
                         id_expense INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         amount INT(11) DEFAULT NULL,
                         creation_datetime DATETIME DEFAULT NULL,
                         modification_datetime DATETIME DEFAULT NULL,
                         description VARCHAR(50) DEFAULT NULL,
                         receipt VARCHAR(50) DEFAULT NULL,
                         id_user INT(11) NOT NULL,
                         id_user_validator INT(11) NOT NULL,
                         id_category INT(11) NOT NULL,
                         id_status INT(11) NOT NULL,
                         FOREIGN KEY (id_user) REFERENCES user (id_user),
                         FOREIGN KEY (id_user_validator) REFERENCES user (id_user),
                         FOREIGN KEY (id_category) REFERENCES expense_category (id_category),
                         FOREIGN KEY (id_status) REFERENCES expense_status (id_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table permission
--

CREATE TABLE permission (
                            id_permission INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name_permission VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table role_permission
--

CREATE TABLE role_permission (
                                 id_role INT(11) NOT NULL,
                                 id_permission INT(11) NOT NULL,
                                 PRIMARY KEY (id_role, id_permission),
                                 FOREIGN KEY (id_role) REFERENCES role (id_role),
                                 FOREIGN KEY (id_permission) REFERENCES permission (id_permission)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
