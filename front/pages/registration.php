<?php
if(isset($_POST['send'])) 
{   
  if(validpw($_POST['pw1']))
  {
    if($_POST['pw1']==$_POST['pw2'])
    {
      $regtime = date('Y-m-d');
      $logtime = date('Y-m-d');
      $admin = false;
      $password=password_hash($_POST['pw1'], PASSWORD_DEFAULT);
      reg($_POST['user'],$_POST['email'],$password,$admin,$regtime,$logtime);
      header("Location: ./?menu=login");
    }
    else
    {
      echo("A két jelszó nem egyezik!");
    }
  }
  else
  {
    echo("A jelszó legalább 8 betűnek kell lennie!"); 
  }
  
}    
?>
<section class = "flex_db">
        <div class = "flex_inner">
            <h2>Fiók regisztrálása</h2>
            <form method='POST' action=''>
                <div class = "txt_filed">
                  <span class='adat'>Felhasználó:</span>
                  <input type='text' name = 'user' required>
                </div>
                <div class = "txt_filed">
                  <span class='adat'>Email:</span>
                  <input type='text' name = 'email' required>
                </div>
                <div class = "txt_filed">
                    <span class='adat'>Jelszó:</span>
                    <input type='password' name = 'pw1' required>
                </div>             
                <div class = "txt_filed">
                    <span class='adat'>Jelszó újra:</span>
                    <input type='password' name = 'pw2' required>
                </div> 
                <div>
                  <input class = "button" type='submit' name='send' value='Tovább'>  
                </div>
            </form>
        </div>
</section>