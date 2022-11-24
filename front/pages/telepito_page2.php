<?php
    
    $connect=connect(); 
    if($connect != null)
    {
        header("Location: ./?menu=telepito3");
    }
    if(isset($_POST['send'])) 
    {   
        $db_data = array(
            'host' => $_POST['host'],
            'user' => $_POST['felnev'],
            'password' => $_POST['pw'],
            'dbname' => $_POST['dbname']
        );
        $jsonString = json_encode($db_data, JSON_PRETTY_PRINT);
        $fp = fopen('./config.json', 'w');
        fwrite($fp, $jsonString);
        fclose($fp);
        $connect; 
    }
?>
<section class = "flex_db">
        <div class = "flex_inner">
            <h2>Adatbázis regisztrálása</h2>
            <form method='POST' action=''>
                <div class = "txt_filed">
                    <span class='adat'>Cím:</span>
                    <input type='text' name = 'host' required>
                </div>
                <div class = "txt_filed">
                    <span class='adat'>Felhasználónév:</span>
                    <input type='text' name = 'felnev' required>
                </div>            
                <div class = "txt_filed">
                    <span class='adat'>Jelszó:</span>
                    <input type='password' name = 'pw'>
                </div> 
                <div class = "txt_filed">
                    <span class='adat'>Adatbázis neve:</span>
                    <input type='text' name = 'dbname' required>
                </div>
                <div>
                    <input class = "button" type='submit' name='send' value='Tovább'>  
                </div> 
            </form>
            <?php 
                if(isset($_POST['send'])) 
                { 
                    if(!$connect)
                    {
                        echo("Hibás adatbevitel!");
                    }
                }
            ?>
        </div>
</section>