CREATE DATABASE exercici1;
USE exercici1;
CREATE TABLE usuaris (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50),
email VARCHAR(100),
edat INT
);
INSERT INTO usuaris (nom, email, edat) VALUES
('Anna', 'anna@example.com', 30),
('Joan', 'joan@example.com', 22),
('Marta', 'marta@example.com', 27);
