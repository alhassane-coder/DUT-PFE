-- ============================================================
-- Base de donnees : stock (Gestion de stock - PFE DUT)
-- Reconstituee depuis le code source (analyse des requetes)
-- Compatible MySQL 5.7+ / MariaDB / InfinityFree (utf8mb4)
-- ============================================================

SET NAMES utf8mb4;

-- ------------------------------------------------------------
-- Table super_administrateur (directeur)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS super_administrateur (
  id_admin INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(50) NOT NULL,
  firstName VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  tel VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_admin),
  UNIQUE KEY uq_admin_login (login)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table fournisseurs (inscription libre + activation email)
-- active : 0 = en attente d'activation, 1 = active
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS fournisseurs (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  tel VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  active TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_fourn_login (login),
  UNIQUE KEY uq_fourn_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table informaticien (cree par le super admin, blocable)
-- active : 1 = actif, 0 = bloque
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS informaticien (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  firstName VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  tel VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  active TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (id),
  UNIQUE KEY uq_info_login (login),
  UNIQUE KEY uq_info_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table magasinier (cree par l'informaticien)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS magasinier (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  firstName VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  tel VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_mag_login (login),
  UNIQUE KEY uq_mag_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table produits
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS produits (
  idproduit INT NOT NULL AUTO_INCREMENT,
  nomproduit VARCHAR(50) NOT NULL,
  nomfamille VARCHAR(50) NOT NULL,
  qte_produit INT NOT NULL DEFAULT 0,
  expire_date VARCHAR(30) NOT NULL,
  prix DECIMAL(10,2) NOT NULL DEFAULT 0,
  tva DECIMAL(5,2) NOT NULL DEFAULT 0,
  qrcode VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (idproduit)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table appel_offre (appels d'offre publies par l'informaticien)
-- answered : 0 = sans reponse, 1 = repondu
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS appel_offre (
  id INT NOT NULL AUTO_INCREMENT,
  produit VARCHAR(50) NOT NULL,
  qte INT NOT NULL DEFAULT 0,
  date VARCHAR(50) NOT NULL,
  description TEXT,
  answered TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table reponses (reponses des fournisseurs aux appels d'offre)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS reponses (
  id INT NOT NULL AUTO_INCREMENT,
  fournissName VARCHAR(50) NOT NULL,
  produit VARCHAR(50) NOT NULL,
  qte INT NOT NULL DEFAULT 0,
  answer TEXT NOT NULL,
  date VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table news (nouveautes annoncees par les fournisseurs)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS news (
  id INT NOT NULL AUTO_INCREMENT,
  fournissName VARCHAR(50) NOT NULL,
  produit VARCHAR(50) NOT NULL,
  qte INT NOT NULL DEFAULT 0,
  date VARCHAR(50) NOT NULL,
  description TEXT,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Table historique (journal des evenements)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS historique (
  idhistorique INT NOT NULL AUTO_INCREMENT,
  evenement TEXT NOT NULL,
  date VARCHAR(50) NOT NULL,
  PRIMARY KEY (idhistorique)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- DONNEES INITIALES
-- Mot de passe de tous les comptes ci-dessous : 123456
-- (hash bcrypt $2y$ - modifiez-les apres le premier login)
-- ============================================================

-- Super administrateur : login=admin / mot de passe=123456
INSERT INTO super_administrateur (id_admin, login, password, name, firstName, email, tel) VALUES
(1, 'admin', '$2y$10$he8odXaQ9i4jYUzHBM4WUu3b6mwnZxOK.7fohbc8OutUlWRtDMZG6', 'PFE', 'RT2', 'pfert2021@gmail.com', '06689567');

-- Informaticien de test : login=info / mot de passe=123456 (compte actif)
INSERT INTO informaticien (login, name, firstName, email, tel, password, active) VALUES
('info', 'Informaticien', 'Test', 'info@pfe.ci', '0666666666', '$2y$10$he8odXaQ9i4jYUzHBM4WUu3b6mwnZxOK.7fohbc8OutUlWRtDMZG6', 1);
