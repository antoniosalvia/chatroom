<?php

    class Model {

        public  static function putIntoDB($message, $id){
            $sql = 'INSERT INTO tb_messages(text, id_user)
                    VALUES(?,?)'; // SQL-Injection Schutz durch Platzhalter
            $mask = Service::setPrepare($sql); // verschiebe in RAM
            $mask->bindValue(1, $message, PDO::PARAM_STR); // sicher
            $mask->bindValue(2, $id, PDO::PARAM_INT); // sicher von externen

            Service::execInDB($mask); // ausführen im Service
        }

        public static function getMaxId() {
            $sql = 'SELECT MAX(id) FROM tb_messages';
            $mask = Service::setPrepare($sql);
            return Service::getOneValueFromDB($mask); // gibt maximale id 
        }

        public static function getAllMessages($maxid) {
            $sql = 'SELECT tb_messages.text, tb_messages.time, tb_user.name, tb_user.id
                    FROM tb_messages INNER JOIN tb_user 
                    ON tb_messages.id_user = tb_user.id LIMIT ?,10';
                    
            $mask = Service::setPrepare($sql);
            return Service:: getArrayFromDB($mask);
        }

        public static function getCheckLogin($mail, $name, $pass) {
            $sql = 'SELECT id FROM tb_user WHERE name = ? AND email = ? AND pass = ?';
            $mask = Service::setPrepare($sql);
            $mask->bindValue(1, $name, PDO::PARAM_STR);
            $mask->bindValue(2, $mail, PDO::PARAM_STR);
            $mask->bindValue(3, $pass, PDO::PARAM_STR);
            return Service::getOneValueFromDB($mask); // Ergbenis ist eine id
        }

        public static function getUserName($id) {
            $sql = 'SELECT name FROM tb_user WHERE id = ?';
            $mask = Service::setPrepare($sql);
            $mask->bindValue(1, $id, PDO::PARAM_STR);
            return Service::getOneValueFromDB($mask);
        }

    }

?>