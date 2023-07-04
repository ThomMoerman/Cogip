-- Création de la base de données
CREATE DATABASE IF NOT EXISTS CogipDB;

-- Utilisation de la base de données
USE CogipDB;

-- Définition du moteur de stockage InnoDB
SET default_storage_engine=InnoDB;

-- Création de la table "types"
CREATE TABLE IF NOT EXISTS types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME
) ENGINE=InnoDB;

-- Création de la table "companies"
CREATE TABLE IF NOT EXISTS companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    type_id INT,
    country VARCHAR(50),
    tva VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (type_id) REFERENCES types(id)
) ENGINE=InnoDB;

-- Création de la table "invoices"
CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref VARCHAR(50),
    id_company INT,
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (id_company) REFERENCES companies(id)
) ENGINE=InnoDB;

-- Création de la table "contacts"
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    company_id INT,
    email VARCHAR(50),
    phone VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (company_id) REFERENCES companies(id)
) ENGINE=InnoDB;

-- Création de la table "roles"
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME
) ENGINE=InnoDB;

-- Création de la table "users"
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    role_id INT,
    last_name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB;

-- Création de la table "permissions"
CREATE TABLE IF NOT EXISTS permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME
) ENGINE=InnoDB;


-- Création de la table "roles_permission"
CREATE TABLE IF NOT EXISTS roles_permission (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permission_id INT,
    role_id INT,
    FOREIGN KEY (permission_id) REFERENCES permissions(id),
    FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB;
