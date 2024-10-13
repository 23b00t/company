DROP DATABASE IF EXISTS firma;
CREATE DATABASE firma;
USE firma;

CREATE TABLE IF NOT EXISTS mitarbeiter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    salary DECIMAL (6,2) NOT NULL
);

INSERT INTO mitarbeiter (firstName, lastName, gender, salary) VALUES
    ('Daniel', 'Kipp', 'm', 4200.00),
    ('John', 'Doe', 'm', 2300.00),
    ('Jane', 'Doe', 'w', 4200.00),
    ('Tom', 'Müller', 'm', 5000.00),
    ('Kim', 'Maier', 'd', 5000.00),
    ('Erika', 'Smith', 'w', 1000.00);
