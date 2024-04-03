SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone ="+00:00";



CREATE TABLE'tbladmin'(
    'ID' int(10) NOT NULL,
    'AdminName' varchar(120) DEFAULT NULL,
    'UserName' varchar(120) DEFAULT NULL,
    'MobileNumber' bigint(10) DEFAULT NULL,
    'Email' varchar(200) DEFAULT NULL,
    'Password' varchar(200) DEFAULT NULL,
    'AdminRegdate' timestamp NULL DEFAULT CURRENT_TIMESTAMP()
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;