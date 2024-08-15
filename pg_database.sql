CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    level SMALLINT NOT NULL DEFAULT 1,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE trandmark (
    id_trandmark SERIAL PRIMARY KEY,
    name_trandmark VARCHAR(255) NOT NULL
);

CREATE TABLE type (
    id_type SERIAL PRIMARY KEY,
    name_type VARCHAR(255) NOT NULL
);

CREATE TABLE product (
    id_product SERIAL PRIMARY KEY,
    name_product VARCHAR(255) NOT NULL,
    price NUMERIC(10, 2) NOT NULL,
    quanity INTEGER NOT NULL,
    id_trandmark INTEGER,
    id_type INTEGER,
    image VARCHAR(255),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_trandmark) REFERENCES trandmark(id_trandmark),
    FOREIGN KEY (id_type) REFERENCES type(id_type)
);

CREATE TABLE bill (
    id_bill SERIAL PRIMARY KEY,
    payment_method VARCHAR(50) NOT NULL,
    id_user INTEGER,
    total NUMERIC(10, 2) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE detailorder (
    id_detailorder SERIAL PRIMARY KEY,
    id_product INTEGER,
    size VARCHAR(10),
    id_bill INTEGER,
    quanity_order INTEGER NOT NULL,
    sub_total NUMERIC(10, 2) NOT NULL,
    FOREIGN KEY (id_product) REFERENCES product(id_product),
    FOREIGN KEY (id_bill) REFERENCES bill(id_bill)
);

CREATE TABLE size (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE product_size (
    id_product_size SERIAL PRIMARY KEY,
    size_id INTEGER,
    id_product INTEGER,
    FOREIGN KEY (size_id) REFERENCES size(id),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
);
