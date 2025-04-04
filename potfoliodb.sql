/* create a database and table for the contact form */
CREATE DATABASE portfoliodb;

/* Use the database  and create table */
USE portfoliodb;

CREATE TABLE IF NOT EXISTS contacts (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT,
    email TEXT,
    message TEXT
);