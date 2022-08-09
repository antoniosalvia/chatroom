<?php

    // Aufgabe Datenbank anlegen
    // on the fly
    // nur 1 Mal starten der Datei auf Servere notwendig

    define('HOST', 'localhost'); // Konstante
    define('USER', 'root'); // Grundeinstellung XAMPP
    define('PASS', '');

    try {
        $myPDO = new PDO('mysql:host='.HOST.';charset=utf8', USER, PASS);
    } catch(PDOException $f) {
        exit('Fehler'.$f->getMessage()); // gibt connect Fehler aus
    }
 
    // print_r(get_class_methods($myPDO));

    $myPDO->exec('CREATE DATABASE IF NOT EXISTS db_chat'); // Anlegen der DB
    $myPDO->exec('USE db_chat'); // Zugriff auf DB

    $myPDO->exec('CREATE TABLE IF NOT EXISTS tb_user(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT,
                    name VARCHAR(10) NOT NULL UNIQUE,
                    pass VARCHAR(128) NOT NULL,
                    email VARCHAR(255) NOT NULL
                )'
    );

    $myPDO->exec('CREATE TABLE IF NOT EXISTS tb_messages(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT,
                    text VARCHAR(255) NOT NULL,
                    id_user INT(11) NOT NULL,
                    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY(id_user) REFERENCES tb_user(id)
                )'
    );

    $myPDO->exec('INSERT INTO tb_user (name, pass, email)
                    VALUES ("Otto", "123", "test@test.de")'
    );
    
    $myPDO->exec('INSERT INTO tb_user (name, pass, email)
                    VALUES ("Lisa", "234", "lisa@test.de")'
    );

    $arr = $myPDO->errorInfo(); // bezieht sich auf letzten SQL Fehler
    echo $arr[2]; // Textausgabe des Fehlers
    
?>