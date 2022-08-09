<?php

// bei Erstkontakt mit Webseite wird Schlüssel erzeugt und im HTTP Header als 
// Cookie Response an den Client verschickt; jeder Client bekommt eine eigene Session ID
session_start(); // darf nur 1 mal pro Script verwendet werden; Sessionverwaltungsbefehle stehen jetzt zur Verfügung

// laden der Klassen zur Kommunikation

spl_autoload_register(function ($class_name) {
    require_once('class/class_'.$class_name.'.inc.php');
});

new Controller();

?>