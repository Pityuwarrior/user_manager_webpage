<?php

if(!telepetesIsDone())
{
    header("Location: ./?menu=telepito1");
}

if($belepve)
{
    $ud = userdata($nev);
    $users = users($nev);
}
?>
<section class = "flex_kezdolap">
    <div class = "flex_inner">
        <?php if(!$belepve): ?>
            <h2>Üdvözlöm az oldalamon!</h2> 
            <p>
            A további mületekhez kérem jelentkezzen be.     
            </p>
            <p>
            Vagy regisztráljon új felhasználót. 
            </p>
        <?php else: ?>
            <h2><?=$ud["username"]?></h2>
            <div id = "clock"></div>
            <?php if($ud["admin"]): ?>
                <form method='POST' action=''>   
                    <div>
                        <input class = "admin_button" type='submit' name='send' value='Felhasználók kezelése'>  
                    </div>
                </form>
                <?php if(isset($_POST['send'])): ?>
                    <table>
                        <tr>
                            <th class='str'>Név</th>
                            <th class='ctr'>Belépési Idő</th>
                            <th class='ctr'>Regisztráció Ideje</th>
                            <th class='ctr'>Rang</th>
                            <th class='ctr'>Bannolás</th>
                            <th class='ctr'>Törlés</th>
                            <th class='ctr'>Admin rang adás</th>
                        </tr>
                    <?php foreach($users as $u): ?>
                        <tr>
                            <td><?= $u['username'] ?></td>
                            <td><?= $u['logtime'] ?></td>
                            <td><?= $u['regtime'] ?></td>
                            <td><?= $u['admin']==='1' ? "Admin" : "User"?></td>
                            <td><a href='./?ban=yes'><img class='icon' src='./template/ban.png' title='Bannolás' alt='Bannolás'></td>
                            <td><img class='icon' src='./template/delete.png' title='Bannolás' alt='Bannolás'></td>
                            <td><?php if($u['admin'] == 0): ?> <img class='icon' src='./template/adminadd.png' title='Bannolás' alt='Bannolás'> <?php endif; ?></td>
                        </tr>
                    <?php endforeach; ?>    
                <?php endif; ?>    
            <?php else: ?>
                
            <?php endif; ?>
        <?php endif; ?>
        
    </div>
</section>