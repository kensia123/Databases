--Alicia Cook
--Dudleen Paul
--Kensia Saint-Hilaire


DROP DATABASE IF EXISTS mls; 

CREATE DATABASE mls;

USE mls; 

CREATE TABLE Property (
	address VARCHAR(50) PRIMARY KEY,
	ownerName VARCHAR(30) NOT NULL,
	price INTEGER NOT NULL
); 

CREATE TABLE House (
	bedrooms INTEGER NOT NULL,
	bathrooms INTEGER NOT NULL,
	size INTEGER NOT NULL, 
	address VARCHAR(50) NOT NULL,
	FOREIGN KEY(address) REFERENCES Property(address)
); 

CREATE TABLE BusinessProperty(
	type CHAR(20) NOT NULL,
	size INTEGER NOT NULL, 
	address VARCHAR(50) NOT NULL, 
	FOREIGN KEY(address) REFERENCES Property(address)
); 

CREATE TABLE Firm(
	id INTEGER PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	address VARCHAR(50) NOT NULL
); 

CREATE TABLE Agent(
	agentId INTEGER PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	phone CHAR(12) NOT NULL,
	firmId INTEGER NOT NULL, 
	dateStarted DATE NOT NULL,
	FOREIGN KEY(firmId) REFERENCES Firm(id)
);

CREATE TABLE Listings(
	mlsNumber INTEGER PRIMARY KEY, 
	address VARCHAR(50) NOT NULL, 
	agentId INTEGER NOT NULL, 
	dateListed DATE NOT NULL,
	FOREIGN KEY(address) REFERENCES Property(address),
	FOREIGN KEY(agentID) REFERENCES Agent(agentId)
);

CREATE TABLE Buyer(
	id INTEGER PRIMARY KEY, 
	name VARCHAR(30) NOT NULL, 
	phone CHAR(12) NOT NULL, 
	propertyType CHAR(20) NOT NULL, 
	bedrooms INTEGER, 
	bathrooms INTEGER, 
	businessPropertyType CHAR(20), 
	minimumPreferredPrice INTEGER NOT NULL, 
	maximumPreferredPrice INTEGER NOT NULL
); 

CREATE TABLE Works_With(
	buyerId INTEGER, 
	agentID INTEGER,
	FOREIGN KEY(agentID) REFERENCES Agent(agentId),
	FOREIGN KEY(buyerId) REFERENCES Buyer(id)
); 


INSERT INTO Property (address, ownerName, price) VALUES ('1234 Mullbary Way', 'John Smith', 250000); 
INSERT INTO Property (address, ownerName, price) VALUES ('1256 Mullbary Way', 'Emily Johnson', 150000); 
INSERT INTO Property (address, ownerName, price) VALUES ('1397 Red Pine Trail', 'Michael Williams', 100000); 
INSERT INTO Property (address, ownerName, price) VALUES ('8976 Dixie Drive', 'Sarah Brown', 600000); 
INSERT INTO Property (address, ownerName, price) VALUES ('444 Capitol Circle Way', 'David Jones', 800000); 
INSERT INTO Property (address, ownerName, price) VALUES ('345 Oakwood Drive', 'Sophia Davis', 255000); 
INSERT INTO Property (address, ownerName, price) VALUES ('872 Willow Lane', 'James Miller', 600000); 
INSERT INTO Property (address, ownerName, price) VALUES ('1221 Rosewood Avenue', 'Olivia Wilson', 600000); 
INSERT INTO Property (address, ownerName, price) VALUES ('524 Pinehill Road', 'William Moore', 700000); 
INSERT INTO Property (address, ownerName, price) VALUES ('760 Birch Street', 'Ava Taylor', 900000); 
INSERT INTO Property (address, ownerName, price) VALUES ('449 Capitol Circle Way', 'Ava John', 200000); 


INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (2, 2, 2500, '1234 Mullbary Way'); 
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (3, 4, 3500, '1256 Mullbary Way'); 
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (2, 1, 2000, '1397 Red Pine Trail'); 
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (3, 4, 4500, '8976 Dixie Drive'); 
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (2, 2, 2700, '444 Capitol Circle Way');  
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES (3, 2, 2700, '449 Capitol Circle Way');  


INSERT INTO BusinessProperty (type, size, address) VALUES ('office', 3000, '345 Oakwood Drive'); 
INSERT INTO BusinessProperty (type, size, address) VALUES ('office', 4000, '872 Willow Lane'); 
INSERT INTO BusinessProperty (type, size, address) VALUES ('Store Front', 5000, '1221 Rosewood Avenue'); 
INSERT INTO BusinessProperty (type, size, address) VALUES ('Store Front', 6000, '524 Pinehill Road'); 
INSERT INTO BusinessProperty (type, size, address) VALUES ('Gas Station', 10000, '760 Birch Street'); 


INSERT INTO Firm (id, name, address) VALUES (001, 'Anderson & Associated', '219 Aspen Way'); 
INSERT INTO Firm (id, name, address) VALUES (002, 'Greenfield Consulting', '463 Cedar Boulevard'); 
INSERT INTO Firm (id, name, address) VALUES (003, 'Parker, Smith & Co.', '3310 Elm Street'); 
INSERT INTO Firm (id, name, address) VALUES (004, 'Horizon Solutions', '805 Magnolia Court'); 
INSERT INTO Firm (id, name, address) VALUES (005, 'Williams & Partners', '1923 Maple Avenue'); 


INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES (001, 'Robert Anderson', '5551234567', 001, '2023-10-15'); 
INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES (002, 'Isabella Thomas', '8009876543', 001, '2002-07-01'); 
INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES (003, 'Daniel Jackson', '2125550183', 002, '2023-12-04'); 
INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES (004, 'Mia White', '4155558945', 003, '2022-09-20'); 
INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES (005, 'Christopher Harris', '2025551122', 005, '2020-11-24'); 


INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (001, '1234 Mullbary Way', 001, '2024-12-09'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (002, '1256 Mullbary Way', 001, '2024-01-12'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (003, '1397 Red Pine Trail', 002, '2023-09-10'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (004, '8976 Dixie Drive', 002, '2023-07-07'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (005, '444 Capitol Circle Way', 003, '2024-06-06'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (006, '345 Oakwood Drive', 003, '2024-08-12'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (007, '872 Willow Lane', 004, '2022-12-09'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (008, '1221 Rosewood Avenue', 004, '2023-04-16'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (009, '524 Pinehill Road', 005, '2020-12-24'); 
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES (010, '760 Birch Street', 005, '2022-03-25'); 


INSERT INTO Buyer(id, name, phone, propertyType, bedrooms, bathrooms, minimumPreferredPrice, maximumPreferredPrice) VALUES (001, 'Alicia Cook', '5618767885', 'House', 2, 2, 0, 500000); 
INSERT INTO Buyer(id, name, phone, propertyType, bedrooms, bathrooms, minimumPreferredPrice, maximumPreferredPrice) VALUES (002, 'Rodolph Adonis', '5612937885', 'House', 3, 4, 200000, 1000000); 
INSERT INTO Buyer(id, name, phone, propertyType, bedrooms, bathrooms, minimumPreferredPrice, maximumPreferredPrice) VALUES (003, 'Billy Joe', '5611234567', 'House', 2, 1, 0, 200000); 
INSERT INTO Buyer(id, name, phone, propertyType, businessPropertyType, minimumPreferredPrice, maximumPreferredPrice) VALUES (004, 'Franny Jane', '5612345678', 'Business Property', 'office', 250000, 700000); 
INSERT INTO Buyer(id, name, phone, propertyType, businessPropertyType, minimumPreferredPrice, maximumPreferredPrice) VALUES (005, 'Jane Doe', '5613456789', 'Business Property', 'Store Front', 500000, 1000000); 


INSERT INTO Works_With (buyerId, agentID) VALUES (001, 001); 
INSERT INTO Works_With (buyerId, agentID) VALUES (002, 002); 
INSERT INTO Works_With (buyerId, agentID) VALUES (003, 003); 
INSERT INTO Works_With (buyerId, agentID) VALUES (004, 004); 
INSERT INTO Works_With (buyerId, agentID) VALUES (005, 005); 
INSERT INTO Works_With (buyerId, agentID) VALUES (004, 001); 
INSERT INTO Works_With (buyerId, agentID) VALUES (005, 002); 
