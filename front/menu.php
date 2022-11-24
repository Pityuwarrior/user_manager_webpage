<?php
/*
$fajl = "./front/pages/kezdolap.php";
if(isset($_GET['menu']))
{
    switch ($_GET['menu'])
    {
        case "telepito": {$fajl="./front/pages/telepito_page1.php";break;}
        case "telepito2": {$fajl="./front/pages/telepito_page2.php";break;}
        case "telepito3": {$fajl="./front/pages/telepito_page3.php";break;}
        case "login": {$fajl="./front/pages/login.php";break;}
        case "registration": {$fajl="./front/pages/registration.php";break;}
        default: {$fajl="./front/pages/kezdolap.php";break;}
    }
}
*/

$fajl = "./front/pages/kezdolap.php";
if(isset($_GET['menu']))
{
    $menu = $_GET['menu'];
    if (!telepetesIsDone())
    {
        switch ($menu)
        {
            case "telepito": {$fajl="./front/pages/telepito_page1.php";break;}
            case "telepito2": {$fajl="./front/pages/telepito_page2.php";break;}
            case "telepito3": {$fajl="./front/pages/telepito_page3.php";break;}
            default: {$fajl="./front/pages/telepito_page1.php";break;}
        }
    }
    else
    {
        switch ($menu)
        {
            case "kezdolap": {$fajl="./front/pages/kezdolap.php";break;}
            case "login": {$fajl="./front/pages/login.php";break;}
            case "login": {$fajl="./front/pages/login.php";break;}
            case "registration": {$fajl="./front/pages/registration.php";break;}
            default: {$fajl="./front/pages/kezdolap.php";break;}
        }
    }
}

?>