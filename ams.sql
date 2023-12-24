CREATE DATABASE ams;
use ams;
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO admin_users (username, password) VALUES
('admin', 'admin'),
('Nishant', 'admin');
CREATE TABLE staff_users (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO staff_users (username, password) VALUES
('admin', 'admin'),
('Nishant', 'admin');



CREATE TABLE asset (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_name VARCHAR(255) NOT NULL,
    date_of_expiry DATE NOT NULL,
    total_number INT NOT NULL
);

CREATE TABLE maintenance (
    maintenance_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT,
    assign_date DATE,
    last_maintenance_date DATE,
    staff_id INT,
    status VARCHAR(50),
    FOREIGN KEY (asset_id) REFERENCES asset(asset_id),
    FOREIGN KEY (staff_id) REFERENCES staff_users(staff_id)
);

