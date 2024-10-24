USE firma;

DROP TABLE IF EXISTS rental;

CREATE TABLE IF NOT EXISTS rental (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employeeId INT NOT NULL,
    carId INT NOT NULL,
    rentalFrom DATETIME NOT NULL,
    rentalTo DATETIME,
    FOREIGN KEY (employeeId) REFERENCES employee(id),
    FOREIGN KEY (carId) REFERENCES car(id),
    CHECK (rentalFrom < rentalTo)
);

INSERT INTO rental (employeeId, carId, rentalFrom, rentalTo) VALUES
    (1, 1, '2024-10-22 08:00:00', '2024-10-22 18:00:00'),
    (3, 2, '2024-10-23 09:00:00', '2024-10-23 17:00:00'),
    (4, 3, '2024-10-24 10:00:00', '2024-10-24 15:00:00'),
    (5, 4, '2024-10-25 07:30:00', '2024-10-25 16:30:00'),
    (6, 1, '2024-10-26 12:00:00', '2024-10-26 20:00:00');
