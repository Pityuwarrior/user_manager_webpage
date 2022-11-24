<?php
$tid = telepetesIsDone();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/index.js"></script>
    <link rel="stylesheet" href="./template/style.css">
    <link rel="stylesheet" href="./template/table.css">
    <title>Belépés</title>
</head>
<body onload="startTime()">
    <header>
        <nav class = "menuflex">
            <label class = "logo">Felhasználó kezelő</label>
            <ul>
            <?php if(!$belepve): ?> 
                <?php if($tid <= 0): ?>
                    <li><a href='./?menu=telepito'>Telepito</a></li>
                <?php else: ?>
                    <li><a href='./?menu=registration'>Regisztralas</a></li>
                    <li><a href='./?menu=login'>Belepes</a></li>
                <?php endif; ?>    
            <?php else: ?>
                <li><a href='./?logout=yes'>Kijelentkezés</a></li>
            <?php endif; ?>
            </ul>
            </label>
        </nav>
    </header>
    <main>