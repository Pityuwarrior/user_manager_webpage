<?php
if($belepve)
{
    header('Location: ./');
}
if(isset($_POST['send'])) 
{   
    
    $userid = Jelszo($_POST['nev'],$_POST['pw']);
    if($userid)
    {    
        $_SESSION['id'] = $userid;
        logintime($logtime, $userid);
        header('Location: ./');
    }
    else
    {
        echo "Sikertelen belépés!";
    }
}
?>
<section class = "flex_db">
        <div class = "flex_inner">
            <h2>Belépés a felhasználóba</h2>
            <form method='POST' action=''>
                <div class = "txt_filed">
                    <span class='adat'>Felhasználó név:</span>
                    <input type='text' name='nev' required>
                </div>
                <div class = "txt_filed">
                    <span class='adat'>Jelszó:</span>
                    <input type='password' name='pw' required>
                </div>
                <div class = "txt_filed">
                    <input class = "button" type='submit' name='send' value='Belépés'>  
                </div>
            </form>
        </div>
</section>