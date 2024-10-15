USE firma;

DROP TABLE IF EXISTS auto;

CREATE TABLE IF NOT EXISTS car (
    id INT AUTO_INCREMENT PRIMARY KEY,
    licensePlate VARCHAR(255) NOT NULL,
    manufacturer VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL
);

INSERT INTO car (licensePlate, manufacturer, type) VALUES
    ('B-YG 235', 'VW', 'Limosiene'),
    ('B-BQ 235', 'BMW', 'Coupe'),
    ('KL-LK 23', 'Audi', 'Caprio');
