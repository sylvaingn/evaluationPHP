CREATE DATABASE IF NOT EXISTS immobilier;

USE immobilier;

CREATE TABLE IF NOT EXISTS logement (

id_logement		INT PRIMARY KEY AUTO_INCREMENT,
titre			VARCHAR(255),
adresse			TEXT,
ville			VARCHAR(100),
cp				INT(5),
surface			INT,
prix			INT,
photo			VARCHAR(255),
type 			VARCHAR(20),
description		LONGTEXT

) engine = InnoDB;