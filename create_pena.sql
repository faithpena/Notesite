\c postgresql-elliptical-60301

DROP TABLE admin;
DROP TABLE cart;
DROP TABLE order_history;
DROP TABLE orders;
DROP TABLE products;
DROP TABLE subjects;
DROP TABLE users;

CREATE TABLE users (
  userid SERIAL NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255),
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  email VARCHAR(50),
  sex VARCHAR(10),
  birthdate DATE,
  contactno VARCHAR(11),
  PRIMARY KEY (userid)
);

CREATE TABLE admin (
	adminid SERIAL NOT NULL,
	userid INT REFERENCES users(userid) NOT NULL,
	PRIMARY KEY (adminid)
);

CREATE TABLE subjects (
	subjid SERIAL NOT NULL,
	subjname VARCHAR(25) NOT NULL,
	PRIMARY KEY (subjid)
);

CREATE TABLE products (
	prodid SERIAL NOT NULL,
	prodname VARCHAR(30) NOT NULL,
	description VARCHAR(350) NOT NULL,
	price FLOAT NOT NULL,
	subjid INT REFERENCES subjects(subjid) NOT NULL,
	isvisible BOOLEAN DEFAULT true NOT NULL,
	isavailable BOOLEAN DEFAULT true NOT NULL,
	quantity INTEGER NOT NULL,
	PRIMARY KEY (prodid)
);

CREATE TABLE cart (
	cartid SERIAL NOT NULL,
	userid INT REFERENCES users(userid) NOT NULL,
	prodid INT REFERENCES products(prodid) NOT NULL,
	PRIMARY KEY(cartid)
);

CREATE TABLE order_history (
	orderid SERIAL NOT NULL,
	userid INT REFERENCES users(userid) NOT NULL,
	orderdate DATE NOT NULL,
	total FLOAT DEFAULT 0 NOT NULL,
	PRIMARY KEY (orderid)
);

CREATE TABLE orders (
	orderid INT REFERENCES order_history(orderid) NOT NULL,
	prodid INT REFERENCES products(prodid) NOT NULL,
	itemquantity INT NOT NULL,
	currprice FLOAT NOT NULL
);
