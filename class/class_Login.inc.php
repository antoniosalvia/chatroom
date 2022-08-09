<?php

    class Login {

        public function __construct() {
            if(isset($_SESSION['userid'])) {
                $template = '<form method="GET">
                <input id="message" type="text" name="message" placeholder="Ihre Nachricht">
                <input type="submit" value="Senden">
                </form><br>
                <div>
                    <span class="emoji" onclick="emoji(this.innerHTML)">&#128512;</span>
                    <span class="emoji" onclick="emoji(this.innerHTML)">&#128513;</span>
                    <span class="emoji" onclick="emoji(this.innerHTML)">&#128514;</span>
                </div>
                <a href="?logout=true">Logout</a>';
            }else {
                $template = '<form method="GET">
                <input type="hidden" name="login" value="true" >
                <input type="email" name="email" placeholder="Ihre E-Mail"><br>
                <input type="text" name="name" placeholder="Ihr Name"><br>
                <input type="password" name="pass" placeholder="Ihr Passwort"><br>
                <button>Anmelden</button>
                </form>';
            }
            echo $template;
        }

    }

?>