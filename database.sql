-- Commande pour démarrer le serveur php : php -S localhost:8000 -t public

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

INSERT INTO types (name, created_at, updated_at) VALUES
('Type 1', NOW(), NOW()),
('Type 2', NOW(), NOW()),
('Type 3', NOW(), NOW()),
('Type 4', NOW(), NOW()),
('Type 5', NOW(), NOW()),
('Type 6', NOW(), NOW()),
('Type 7', NOW(), NOW()),
('Type 8', NOW(), NOW()),
('Type 9', NOW(), NOW()),
('Type 10', NOW(), NOW());

INSERT INTO companies (name, type_id, country, tva, created_at, updated_at) VALUES
('Company 1', 1, 'Country 1', 'TVA 1', NOW(), NOW()),
('Company 2', 2, 'Country 2', 'TVA 2', NOW(), NOW()),
('Company 3', 3, 'Country 3', 'TVA 3', NOW(), NOW()),
('Company 4', 4, 'Country 4', 'TVA 4', NOW(), NOW()),
('Company 5', 5, 'Country 5', 'TVA 5', NOW(), NOW()),
('Company 6', 6, 'Country 6', 'TVA 6', NOW(), NOW()),
('Company 7', 7, 'Country 7', 'TVA 7', NOW(), NOW()),
('Company 8', 8, 'Country 8', 'TVA 8', NOW(), NOW()),
('Company 9', 9, 'Country 9', 'TVA 9', NOW(), NOW()),
('Company 10', 10, 'Country 10', 'TVA 10', NOW(), NOW());
('Company 11', 1, 'Country 11', 'TVA 11', NOW(), NOW()),
('Company 12', 2, 'Country 12', 'TVA 12', NOW(), NOW()),
('Company 13', 3, 'Country 13', 'TVA 13', NOW(), NOW()),
('Company 14', 4, 'Country 14', 'TVA 14', NOW(), NOW()),
('Company 15', 5, 'Country 15', 'TVA 15', NOW(), NOW()),
('Company 16', 6, 'Country 16', 'TVA 16', NOW(), NOW()),
('Company 17', 7, 'Country 17', 'TVA 17', NOW(), NOW()),
('Company 18', 8, 'Country 18', 'TVA 18', NOW(), NOW()),
('Company 19', 9, 'Country 19', 'TVA 19', NOW(), NOW()),
('Company 20', 10, 'Country 20', 'TVA 20', NOW(), NOW()),
('Company 21', 1, 'Country 21', 'TVA 21', NOW(), NOW()),
('Company 22', 2, 'Country 22', 'TVA 22', NOW(), NOW()),
('Company 23', 3, 'Country 23', 'TVA 23', NOW(), NOW()),
('Company 24', 4, 'Country 24', 'TVA 24', NOW(), NOW()),
('Company 25', 5, 'Country 25', 'TVA 25', NOW(), NOW()),
('Company 26', 6, 'Country 26', 'TVA 26', NOW(), NOW()),
('Company 27', 7, 'Country 27', 'TVA 27', NOW(), NOW()),
('Company 28', 8, 'Country 28', 'TVA 28', NOW(), NOW()),
('Company 29', 9, 'Country 29', 'TVA 29', NOW(), NOW()),
('Company 30', 10, 'Country 30', 'TVA 30', NOW(), NOW());

INSERT INTO invoices (ref, id_company, created_at, updated_at) VALUES
('Invoice 1', 1, NOW(), NOW()),
('Invoice 2', 2, NOW(), NOW()),
('Invoice 3', 3, NOW(), NOW()),
('Invoice 4', 4, NOW(), NOW()),
('Invoice 5', 5, NOW(), NOW()),
('Invoice 6', 6, NOW(), NOW()),
('Invoice 7', 7, NOW(), NOW()),
('Invoice 8', 8, NOW(), NOW()),
('Invoice 9', 9, NOW(), NOW()),
('Invoice 10', 10, NOW(), NOW());

INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES
('Contact 1', 1, 'contact1@example.com', '1234567890', NOW(), NOW()),
('Contact 2', 2, 'contact2@example.com', '2345678901', NOW(), NOW()),
('Contact 3', 3, 'contact3@example.com', '3456789012', NOW(), NOW()),
('Contact 4', 4, 'contact4@example.com', '4567890123', NOW(), NOW()),
('Contact 5', 5, 'contact5@example.com', '5678901234', NOW(), NOW()),
('Contact 6', 6, 'contact6@example.com', '6789012345', NOW(), NOW()),
('Contact 7', 7, 'contact7@example.com', '7890123456', NOW(), NOW()),
('Contact 8', 8, 'contact8@example.com', '8901234567', NOW(), NOW()),
('Contact 9', 9, 'contact9@example.com', '9012345678', NOW(), NOW()),
('Contact 10', 10, 'contact10@example.com', '0123456789', NOW(), NOW());

INSERT INTO roles (name, created_at, updated_at) VALUES
('ADMIN', NOW(), NOW()),
('USER', NOW(), NOW());

INSERT INTO users (first_name, role_id, last_name, email, password, created_at, updated_at) VALUES
('John', 1, 'Doe', 'john.doe@example.com', 'password1', NOW(), NOW()),
('Jane', 2, 'Smith', 'jane.smith@example.com', 'password2', NOW(), NOW()),
('David', 2, 'Johnson', 'david.johnson@example.com', 'password3', NOW(), NOW()),
('Sarah', 2, 'Williams', 'sarah.williams@example.com', 'password4', NOW(), NOW()),
('Michael', 2, 'Brown', 'michael.brown@example.com', 'password5', NOW(), NOW()),
('Emily', 2, 'Jones', 'emily.jones@example.com', 'password6', NOW(), NOW()),
('Daniel', 2, 'Miller', 'daniel.miller@example.com', 'password7', NOW(), NOW()),
('Olivia', 2, 'Davis', 'olivia.davis@example.com', 'password8', NOW(), NOW()),
('William', 2, 'Wilson', 'william.wilson@example.com', 'password9', NOW(), NOW()),
('Sophia', 2, 'Taylor', 'sophia.taylor@example.com', 'password10', NOW(), NOW());

INSERT INTO permissions (name, created_at, updated_at) VALUES
('Permission 1', NOW(), NOW()),
('Permission 2', NOW(), NOW()),
('Permission 3', NOW(), NOW()),
('Permission 4', NOW(), NOW()),
('Permission 5', NOW(), NOW()),
('Permission 6', NOW(), NOW()),
('Permission 7', NOW(), NOW()),
('Permission 8', NOW(), NOW()),
('Permission 9', NOW(), NOW()),
('Permission 10', NOW(), NOW());

INSERT INTO roles_permission (permission_id, role_id) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 1);


ALTER TABLE invoices
ADD COLUMN due_date DATE AFTER ref;

UPDATE invoices
SET due_date = CURDATE();