<?php

    class UserList {

        public function __construct() {
            $linearr = file('../userlist.csv'); // Zeilenweise in array generiert
            $template = '';
            foreach($linearr as $line) {
                list($id, $name) = explode(';', $line); // string to array
                $template .= $name.'<br>';
            }
            echo $template;
        }

    }

    new UserList();

?>