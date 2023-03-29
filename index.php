<?php
include_once './Ab.php';
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar Kártya</title>
</head>
<link rel="stylesheet" href="stilus.css">

<body>
    <main>
        <?php
        $adatbazis = new Ab();
        $adatbazis->adatleker2("név", "kép", "szín");
        $adatbazis->kapcsolatBezar();
        ?>
    </main>
</body>

</html>