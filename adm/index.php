<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Devgate - Administrativo</title>
    </head>
    <body>
        <?php 
            require './vendor/autoload.php';

            $home = new Core\ConfigController();
            $home->loadPage();
        ?>
    </body>
</html>