CREATE DATABASE MEDICAL_DB;
USE MEDICAL_DB;

CREATE USER 'loginer'@'localhost' IDENTIFIED BY '0pjO6N11CVFl';

CREATE TABLE
    Accounts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        isStaff BOOLEAN,
        userName VARCHAR(20),
        passwordHash CHAR(64),
        defaultPassword BOOLEAN DEFAULT TRUE
    );

GRANT SELECT ON MEDICAL_DB.Accounts TO 'loginer'@'localhost';

CREATE TABLE
    Items (
        itemId INT PRIMARY KEY AUTO_INCREMENT,
        itemName VARCHAR(20),
        unit VARCHAR(20)
    );

CREATE TABLE
    ResultSheets (
        sheetId INT PRIMARY KEY AUTO_INCREMENT,
        objectId INT,
        objectName VARCHAR(20),
        createDate DATE DEFAULT CURRENT_DATE,
        FOREIGN KEY (objectId) REFERENCES Accounts (id)
    );

CREATE TABLE
    ResultValues (
        id INT PRIMARY KEY AUTO_INCREMENT,
        sheetId INT,
        itemId INT,
        resultValue VARCHAR(20),
        FOREIGN KEY (sheetId) REFERENCES ResultSheets (sheetId),
        FOREIGN KEY (itemId) REFERENCES Items (itemId)
    );

INSERT INTO
    Accounts (isStaff, userName, passwordHash)
VALUES (TRUE, 'admin', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

-- 預設前端帳號密碼
-- 帳號:admin
-- 密碼:password