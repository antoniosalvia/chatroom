<?php include 'autoloader.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat</title>

</head>

<body>

    <h1>My Chat</h1>

    <div id="output">Text laden...</div>

    <div id="userlist"></div>

    <?php new Login(); ?>

    <!-- <form method="GET">
        <input type="text" name="message" placeholder="Ihre Nachricht">
        <input type="submit" value="Senden">
    </form><br> -->

    <!-- Anmeldeformular -->
    <!-- <form mmethod="get">
        <input type="hidden" name="login" value="true" >
        <input type="email" name="email" placeholder="Ihre E-Mail"><br>
        <input type="text" name="name" placeholder="Ihr Name"><br>
        <input type="password" name="pass" placeholder="Ihr Passwort"><br>
        <button>Anmelden</button>
    </form> -->

    <script src="js/chat.js"></script>

</body>

</html>