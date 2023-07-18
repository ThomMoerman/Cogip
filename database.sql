-- Commande pour démarrer le serveur php : php -S localhost:8000 -t public

DROP DATABASE IF EXISTS cogipDB;

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS cogipDB;

-- Utilisation de la base de données
USE cogipDB;

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
    due_date DATETIME,
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
('Client', NOW(), NOW()),
('Supplier', NOW(), NOW());

INSERT INTO companies (name, type_id, country, tva, created_at, updated_at) VALUES
('ACME Corporation', 1, 'United States', 'US123456789', NOW(), NOW()),
('Globex Industries', 2, 'Canada', 'CA987654321', NOW(), NOW()),
('Eureka Enterprises', 2, 'United Kingdom', 'GB987654321', NOW(), NOW()),
('MegaCorp', 2, 'Germany', 'DE123456789', NOW(), NOW()),
('Innovatech Solutions', 2, 'France', 'FR987654321', NOW(), NOW()),
('Techtronics', 1, 'Australia', 'AU123456789', NOW(), NOW()),
('Advantage Systems', 2, 'Japan', 'JP987654321', NOW(), NOW()),
('Apex Innovations', 2, 'Brazil', 'BR123456789', NOW(), NOW()),
('Vanguard Enterprises', 1, 'India', 'IN987654321', NOW(), NOW()),
('GlobalTech', 2, 'China', 'CN123456789', NOW(), NOW()),
('Strategic Solutions', 1, 'South Africa', 'ZA987654321', NOW(), NOW()),
('Infinite Technologies', 2, 'Mexico', 'MX123456789', NOW(), NOW()),
('Alpha Corporation', 2, 'Spain', 'ES987654321', NOW(), NOW()),
('Nexus Industries', 1, 'Italy', 'IT123456789', NOW(), NOW()),
('Optimum Systems', 1, 'Netherlands', 'NL987654321', NOW(), NOW()),
('TechMasters', 2, 'Switzerland', 'CH123456789', NOW(), NOW()),
('Pioneer Solutions', 1, 'Sweden', 'SE987654321', NOW(), NOW()),
('Astra Enterprises', 2, 'Russia', 'RU123456789', NOW(), NOW()),
('ProActive Technologies', 2, 'South Korea', 'KR987654321', NOW(), NOW()),
('Prime Innovations', 1, 'Argentina', 'AR123456789', NOW(), NOW()),
('Spectrum Corporation', 1, 'Turkey', 'TR987654321', NOW(), NOW()),
('Dynamic Systems', 2, 'United Arab Emirates', 'AE123456789', NOW(), NOW()),
('Global Solutions', 2, 'Saudi Arabia', 'SA987654321', NOW(), NOW()),
('Momentum Enterprises', 2, 'Egypt', 'EG123456789', NOW(), NOW()),
('Interlink Solutions', 1, 'Singapore', 'SG987654321', NOW(), NOW()),
('Synergy Industries', 2, 'Poland', 'PL123456789', NOW(), NOW()),
('Elevate Corporation', 2, 'Israel', 'IL987654321', NOW(), NOW()),
('Zenith Technologies', 2, 'Greece', 'GR123456789', NOW(), NOW()),
('Innovative Systems', 2, 'Portugal', 'PT987654321', NOW(), NOW()),
('Vita Enterprises', 1, 'Ireland', 'IE123456789', NOW(), NOW());

INSERT INTO invoices (ref, due_date, id_company, created_at, updated_at) VALUES
('F20220913-001', DATE_ADD(NOW(), INTERVAL 20 DAY), 1, DATE_SUB(NOW(), INTERVAL 2 DAY), DATE_SUB(NOW(), INTERVAL 2 DAY)),
('F20220913-002', DATE_ADD(NOW(), INTERVAL 25 DAY), 2, DATE_SUB(NOW(), INTERVAL 3 DAY), DATE_SUB(NOW(), INTERVAL 3 DAY)),
('F20220914-003', DATE_ADD(NOW(), INTERVAL 28 DAY), 3, DATE_SUB(NOW(), INTERVAL 1 DAY), DATE_SUB(NOW(), INTERVAL 1 DAY)),
('F20220914-004', DATE_ADD(NOW(), INTERVAL 30 DAY), 4, DATE_SUB(NOW(), INTERVAL 2 DAY), DATE_SUB(NOW(), INTERVAL 2 DAY)),
('F20220914-005', DATE_ADD(NOW(), INTERVAL 35 DAY), 5, DATE_SUB(NOW(), INTERVAL 3 DAY), DATE_SUB(NOW(), INTERVAL 3 DAY)),
('F20220915-006', DATE_ADD(NOW(), INTERVAL 40 DAY), 6, NOW(), NOW()),
('F20220915-007', DATE_ADD(NOW(), INTERVAL 22 DAY), 7, NOW(), NOW()),
('F20220915-008', DATE_ADD(NOW(), INTERVAL 23 DAY), 8, NOW(), NOW()),
('F20220916-009', DATE_ADD(NOW(), INTERVAL 26 DAY), 9, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220916-010', DATE_ADD(NOW(), INTERVAL 30 DAY), 10, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY)),
('F20220917-011', DATE_ADD(NOW(), INTERVAL 22 DAY), 11, NOW(), NOW()),
('F20220917-012', DATE_ADD(NOW(), INTERVAL 23 DAY), 12, NOW(), NOW()),
('F20220918-013', DATE_ADD(NOW(), INTERVAL 26 DAY), 13, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220918-014', DATE_ADD(NOW(), INTERVAL 30 DAY), 14, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY)),
('F20220918-015', DATE_ADD(NOW(), INTERVAL 22 DAY), 15, NOW(), NOW()),
('F20220919-016', DATE_ADD(NOW(), INTERVAL 23 DAY), 16, NOW(), NOW()),
('F20220919-017', DATE_ADD(NOW(), INTERVAL 26 DAY), 17, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220920-018', DATE_ADD(NOW(), INTERVAL 30 DAY), 18, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY)),
('F20220920-019', DATE_ADD(NOW(), INTERVAL 22 DAY), 19, NOW(), NOW()),
('F20220921-020', DATE_ADD(NOW(), INTERVAL 23 DAY), 20, NOW(), NOW()),
('F20220921-021', DATE_ADD(NOW(), INTERVAL 26 DAY), 21, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220922-022', DATE_ADD(NOW(), INTERVAL 30 DAY), 22, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY)),
('F20220922-023', DATE_ADD(NOW(), INTERVAL 22 DAY), 23, NOW(), NOW()),
('F20220923-024', DATE_ADD(NOW(), INTERVAL 23 DAY), 24, NOW(), NOW()),
('F20220923-025', DATE_ADD(NOW(), INTERVAL 26 DAY), 25, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220924-026', DATE_ADD(NOW(), INTERVAL 30 DAY), 26, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY)),
('F20220924-027', DATE_ADD(NOW(), INTERVAL 22 DAY), 27, NOW(), NOW()),
('F20220925-028', DATE_ADD(NOW(), INTERVAL 23 DAY), 28, NOW(), NOW()),
('F20220925-029', DATE_ADD(NOW(), INTERVAL 26 DAY), 29, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 1 DAY)),
('F20220926-030', DATE_ADD(NOW(), INTERVAL 30 DAY), 30, DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY));


INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES
('John Smith', 1, 'john.smith@example.com', '+1 (123) 456-7890', NOW(), NOW()),
('Emma Johnson', 2, 'emma.johnson@example.com', '+44 2345678901', NOW(), NOW()),
('Pierre Dupont', 3, 'pierre.dupont@example.com', '33 3456789012', NOW(), NOW()),
('Maria García', 4, 'maria.garcia@example.com', '+49 4567890123', NOW(), NOW()),
('Hiroshi Tanaka', 5, 'hiroshi.tanaka@example.com', '+81 5678901234', NOW(), NOW()),
('Sophie Martin', 6, 'sophie.martin@example.com', '+61 6789012345', NOW(), NOW()),
('Miguel Silva', 7, 'miguel.silva@example.com', '+55 7890123456', NOW(), NOW()),
('Luca Rossi', 8, 'luca.rossi@example.com', '+39 8901234567', NOW(), NOW()),
('Rajesh Patel', 9, 'rajesh.patel@example.com', '+91 9012345678', NOW(), NOW()),
('Liam Wilson', 10, 'liam.wilson@example.com', '+27 0123456789', NOW(), NOW()),
('Sophia Lee', 11, 'sophia.lee@example.com', '+1 (234) 567-8901', NOW(), NOW()),
('Mohammed Ali', 12, 'mohammed.ali@example.com', '+44 3456789012', NOW(), NOW()),
('Julie Lefebvre', 13, 'julie.lefebvre@example.com', '33 4567890123', NOW(), NOW()),
('Carlos Rodríguez', 14, 'carlos.rodriguez@example.com', '+49 5678901234', NOW(), NOW()),
('Kazuki Suzuki', 15, 'kazuki.suzuki@example.com', '+81 6789012345', NOW(), NOW()),
('Eva Martínez', 16, 'eva.martinez@example.com', '+61 7890123456', NOW(), NOW()),
('Gabriel Santos', 17, 'gabriel.santos@example.com', '+55 8901234567', NOW(), NOW()),
('Alessio Romano', 18, 'alessio.romano@example.com', '+39 9012345678', NOW(), NOW()),
('Neha Patel', 19, 'neha.patel@example.com', '+91 0123456789', NOW(), NOW()),
('Olivia Wilson', 20, 'olivia.wilson@example.com', '+27 1234567890', NOW(), NOW()),
('Benjamin Thomas', 21, 'benjamin.thomas@example.com', '+1 (345) 678-9012', NOW(), NOW()),
('Amelia Scott', 22, 'amelia.scott@example.com', '+44 4567890123', NOW(), NOW()),
('Lucas Dubois', 23, 'lucas.dubois@example.com', '33 5678901234', NOW(), NOW()),
('Sofia Rodriguez', 24, 'sofia.rodriguez@example.com', '+49 6789012345', NOW(), NOW()),
('Yuto Yamamoto', 25, 'yuto.yamamoto@example.com', '+81 7890123456', NOW(), NOW()),
('Léa Rousseau', 26, 'lea.rousseau@example.com', '+61 8901234567', NOW(), NOW()),
('Mateo Fernández', 27, 'mateo.fernandez@example.com', '+55 9012345678', NOW(), NOW()),
('Chiara Rossi', 28, 'chiara.rossi@example.com', '+39 0123456789', NOW(), NOW()),
('Arjun Patel', 29, 'arjun.patel@example.com', '+91 1234567890', NOW(), NOW()),
('Emily Wilson', 30, 'emily.wilson@example.com', '+27 2345678901', NOW(), NOW());

INSERT INTO roles (name, created_at, updated_at) VALUES
('ADMIN', NOW(), NOW()),
('USER', NOW(), NOW()),
('MODERATOR', NOW(), NOW());

INSERT INTO users (first_name, role_id, last_name, email, password, created_at, updated_at) VALUES
('Jean-Christian', 1, 'Ranu', 'jean-christian.ranu@example.com', 'Ranu', NOW(), NOW()),
('Muriel', 3, 'Perrache', 'muriel.perrache@example.com', 'Perrache', NOW(), NOW()),
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