CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    parent_id INT DEFAULT NULL,
    FOREIGN KEY (parent_id) REFERENCES menu(id)
);

INSERT INTO menu (title, parent_id) VALUES 
('Каталог товаров', NULL),
('Мойки', 1),
('Ulgran', 2),
('Smth', 3),
('Smth', 3),
('Vigro Mramor', 2),
('HandMade', 2),
('Smth', 7),
('Smth', 7),
('Vigro Glass', 2),
('Фильтры', 1),
('Ulgran', 11),
('Smth', 12),
('Smth', 12),
('Vigro Mramor', 11);