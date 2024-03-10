create database primefitness

CREATE TABLE members( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200), 
    email VARCHAR(200),
    phone INT(20),
    hide VARCHAR(200) DEFAULT 'Show'
);

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membership VARCHAR(200),
    cost VARCHAR(200),
    member_id INT,
    FOREIGN KEY (member_id) REFERENCES members(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fromdate DATE,
    todate DATE,
    status VARCHAR(200) DEFAULT 'Pending',
    service_id INT,
    FOREIGN KEY (service_id) REFERENCES services(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE admin (
    id INT PRIMARY KEY,
    username VARCHAR(200),
    password VARCHAR(200)
);

INSERT INTO admin (id,username,password) VALUES (1,'admin','admin123')

SELECT m.id,m.name,m.email,m.phone,s.membership,s.cost,o.fromdate,o.todate,o.status
                FROM members m
                JOIN services s on m.id  = s.member_id 
                JOIN orders o on s.id = o.service_id 
                WHERE m.hide = 'Show'
                ORDER BY s.cost desc
