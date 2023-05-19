DROP DATABASE IF EXISTS pizzayolo;

CREATE DATABASE pizzayolo;
USE pizzayolo;

CREATE TABLE pizza (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(5, 2) NOT NULL,
    discount DECIMAL(5, 2) NOT NULL DEFAULT 0,
    image VARCHAR(255)
);

CREATE TABLE `order` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(100) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_pizza (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    pizza_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    FOREIGN KEY (order_id) REFERENCES `order`(id),
    FOREIGN KEY (pizza_id) REFERENCES pizza(id)
);

INSERT INTO pizza (id, name, price, discount, image) 
VALUES 
(11, 'Pizzananas', 8.50, 0, 'pizzananas.png'),
(22, 'Pizzaquipique', 9.50, 3, 'pizzaquipique.png'),
(33, 'Pizzarcenciel', 10.00, 0, 'pizzarcenciel.png');

INSERT INTO `order` (id, user_email, order_date)
VALUES
(1, 'gabriel@tentacode.dev', '2023-05-01 11:00:00'),
(2, 'gabriel@tentacode.dev', '2023-05-02 11:00:00'),
(3, 'gabriel@tentacode.dev', '2023-05-03 11:00:00'),
(4, 'jean.bon@example.com',  '2023-05-04 10:30:00'),
(5, 'gabriel@tentacode.dev', '2023-05-05 11:00:00'),
(6, 'gabriel@tentacode.dev', '2023-05-06 11:00:00'),
(7, 'gabriel@tentacode.dev', '2023-05-07 11:00:00');

INSERT INTO order_pizza (order_id, pizza_id, quantity)
VALUES
(1, 11, 1),
(1, 33, 1),
(2, 22, 1),
(2, 33, 1),
(3, 11, 1),
(4, 11, 3),
(4, 22, 2),
(4, 33, 5),
(5, 11, 1),
(5, 22, 1),
(6, 11, 2),
(7, 11, 1),
(7, 33, 1);