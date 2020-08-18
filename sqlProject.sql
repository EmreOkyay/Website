/* THESE TABLES WERE USED WITH POPSQL*/

CREATE TABLE Product(
    product_name varchar(256) PRIMARY KEY not null,
    product_price int(10) not null,
    product_stock int(10) not null,
    product_image varchar(200)
);

CREATE TABLE Login(
    email varchar(50) PRIMARY KEY not null,
    pass varchar(50) not null
);

SELECT * FROM Product;

SELECT * FROM Login;

DROP TABLE Login;

DROP TABLE Product;
