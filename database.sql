CREATE DATABASE adeco_supplier_management;

USE adeco_supplier_management;

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    email VARCHAR(100),
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE purchases(
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT NOT NULL,

    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

CREATE TABLE purchase_details(
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT NOT NULL,

    product VARCHAR(255) NOT NULL,
    amount INT NOT NULL DEFAULT 0,
    price DECIMAL(10, 2) NOT NULL,

    FOREIGN KEY (purchase_id) REFERENCES purchases(id)
);