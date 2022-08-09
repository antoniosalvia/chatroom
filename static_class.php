<?php

    // Statische  Variablen und Methoden

    class Ball {

        private $color;

        public static $filling = 'Luft'; // überregional, für alle Objekte gilt

        public function setColor($c) {
            $this->color = $c;
        }

        public function getColor() {
            echo 'Meine Farbe:'. $this->color;
        }

        public static function getFilling() {
            
        }

    }

    // Klasse wird zu Objekt, ist über instanz steueerbar
    $instanz = new Ball();
    $instanz->setColor('red');
    $instanz->getColor();

    $instanz::$filling = 'Wasser';
    echo $instanz::$filling;
    echo ball::$filling;


?>