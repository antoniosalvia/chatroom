<?php

    class Controller {

        private $r;
        private $view; // Instanz für View

        public function __construct() {
            $this->r = $_REQUEST;
            foreach($this->r as $key => $value) {
                $this->r[$key] = strip_tags($value); // XSS Cross-site scripting  
            }
            // Prüfe alle Requests
            $this->view = new View();

            switch(key($this->r)) { // ?message=...
                case 'message' : Model::putIntoDB($this->r['message'], $_SESSION['userid']);
                    header('Location: chat.php');
                    break;
                case 'update' : $maxid = Model::getMaxId() - 10;
                    $data = Model::getAllMessages($maxid);
                    $this->view->setTemplate($data); // Ansicht bekommt Daten
                    break;
                case 'login' : $hash = hash('sha512', $this->r['pass']); // Verschlüsselung
                    $id = Model::getCheckLogin($this->r['email'], $this->r['name'], $hash);
                    if($id) {
                        $_SESSION['userid'] = $id; // id eines Users
                        $name = Model::getUserName($id);
                        file_put_contents('userlist.csv', $id.';'.$name."\r\n", FILE_APPEND);
                    }  
                    break;
                case 'logout' : $arr = file('userlist.csv', FILE_IGNORE_NEW_LINES || FILE_SKIP_EMPTY_LINES);
                    foreach($arr as $index => $line) {
                        list($id, $name) = explode(';', $line); // id;name in CSV
                        if($_SESSION['userid'] == $id) unset($arr[$index]); // Zeile entfernen
                    }
                    file_put_contents('userlist.csv', implode("\r\n", $arr)); // Array to string
                    session_destroy(); // Session komplett auflösen
                    header('Location: chat.php'); // Ansicht aktualisieren
                    break;
                default: // mach nichts
            }
            
        }

    }

?>