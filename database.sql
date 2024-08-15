CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    level TINYINT NOT NULL DEFAULT 1,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE trandmark (
    id_trandmark INT AUTO_INCREMENT PRIMARY KEY,
    name_trandmark VARCHAR(255) NOT NULL
);

CREATE TABLE type (
    id_type INT AUTO_INCREMENT PRIMARY KEY,
    name_type VARCHAR(255) NOT NULL
);

CREATE TABLE product (
    id_product INT AUTO_INCREMENT PRIMARY KEY,
    name_product VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quanity INT NOT NULL,
    id_trandmark INT,
    id_type INT,
    image VARCHAR(255),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_trandmark) REFERENCES trandmark(id_trandmark),
    FOREIGN KEY (id_type) REFERENCES type(id_type)
);

CREATE TABLE bill (
    id_bill INT AUTO_INCREMENT PRIMARY KEY,
    payment_method VARCHAR(50) NOT NULL,
    id_user INT,
    total DECIMAL(10, 2) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE detailorder (
    id_detailorder INT AUTO_INCREMENT PRIMARY KEY,
    id_product INT,
    size VARCHAR(10),
    id_bill INT,
    quanity_order INT NOT NULL,
    sub_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_product) REFERENCES product(id_product),
    FOREIGN KEY (id_bill) REFERENCES bill(id_bill)
);

CREATE TABLE size (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE product_size (
    id_product_size INT AUTO_INCREMENT PRIMARY KEY,
    size_id INT,
    id_product INT,users
    FOREIGN KEY (size_id) REFERENCES size(id),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
);

CREATE TABLE size (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);
