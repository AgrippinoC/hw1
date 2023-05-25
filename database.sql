Create DATABASE hw1Casaccio;
USE hw1Casaccio;

CREATE TABLE users (
    id integer primary key auto_increment,
    name varchar(255) not null,
    surname varchar(255) not null,
	username varchar(16) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null
) Engine = InnoDB;

CREATE TABLE preferiti (
    id integer primary key auto_increment,
    user varchar(16) not null,
    arance varchar(255)
) Engine = InnoDB;

CREATE TABLE commenti (
    id integer primary key auto_increment,
    user varchar(16) not null,
    commenti varchar(255),
    stella integer(5)
) Engine = InnoDB;