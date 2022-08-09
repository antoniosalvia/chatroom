<?php

    $password = '234';
    echo 'sha512 Prüfsumme für '.$password.'<br>';
    echo hash('sha512', $password);


?>