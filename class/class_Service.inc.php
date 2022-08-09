<?php

    // Datenbankverbindung aufbauen
    // Routinen
    // SQL-Injection SIcherheit

    class Service    {

        public static $instancePDO; // garantiert eine DB-Verbindung

        public static function connectDB(){
            self::$instancePDO = new PDO('mysql:host=localhost;dbname=db_chat;charset=utf8mb4', 'root', '');
        }

        public static function setPrepare($sql) { // SQL-Injection Schutz
            self::connectDB();
            return self::$instancePDO->prepare($sql); // im RAM kopieren
        }

        public static function execInDB($mask) {
            return $mask->execute(); //Schreibvorgang
        }

        public static function getArrayFromDB($mask) {
            $mask->execute(); // SELECT * FROM...
            return $mask->fetchAll(); // Rückgabe assoziatives Array
        }

        public static function getOneValueFromDB($mask) {
            $mask->execute();
            return $mask->fetchColumn(); // 1 Wert als Rückgabe
        }

    }

?>