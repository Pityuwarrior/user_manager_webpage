<?php
include("./classes/database.php");
function tablecreate()
{
    $sql = 
        "CREATE TABLE IF NOT EXISTS `norbert`.`nove_norbert_users` 
        ( 
        `id` INT NULL AUTO_INCREMENT , 
        `username` VARCHAR(20) ,
        `email` VARCHAR(200) ,
        `password` VARCHAR(200) ,
        `admin` BOOLEAN NOT NULL ,
        `banned` BOOLEAN NOT NULL ,
        `regtime` DATE NULL , 
        `logtime` DATE NULL , 
        PRIMARY KEY (`id`)
        )";
        $e = connect ()->prepare($sql);
        $e->execute();
}
function reg($user, $email, $pw, $admin, $regtime, $logtime)
{
    $banned = false;
    $sql = <<<SQL
    INSERT INTO nove_norbert_users(username, email, password, admin, banned, regtime, logtime)
    VALUES (?,?,?,?,?,?,?)
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$user, $email, $pw, $admin, $banned, $regtime, $logtime]);
}
function isNotEmpty()
{   
    try{
        $sql = <<<SQL
        SELECT 
        COUNT(id)
        FROM nove_norbert_users
        SQL;
        $e = connect ()->query($sql);
        $e->execute();
        $result = $e->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    catch(PDOException)
    {
        return null;
    }
    
}
function Jelszo($nev, $pw)
{
    $sql="SELECT * FROM nove_norbert_users
        WHERE username = ? ";
    $e = connect()->prepare($sql);
    $e->execute([$nev]);
    $result = $e->fetch(PDO::FETCH_ASSOC);
    if (isset($result['password'])) 
    {
        return password_verify($pw, $result['password']) ?$result["id"]: false;
    }
    return false;
}
function userinfo()
{
    global $belepve;
    global $nev;
    if(!$belepve)
    {
        return null;
    }
    $sql="SELECT * FROM nove_norbert_users
        WHERE id = ? ";
    $e = connect()->prepare($sql);
    $e->execute([$nev]);
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function userdata($id){
    $sql = <<<SQL
    SELECT 
    admin,
    username
    FROM nove_norbert_users
    WHERE id = $id 
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function users($id)
{
    $sql = <<<SQL
    SELECT *
    FROM nove_norbert_users
    WHERE id NOT LIKE $id
    ORDER BY id ASC; 
    SQL;
    $e = connect ()->query($sql);
    $e->execute();
    $result = $e->fetchall(PDO::FETCH_ASSOC);
    return $result;
}
function logintime($logtime, $id)
{
    $sql = <<<SQL
    UPDATE nove_norbert_users
    SET logtime = ?
    WHERE id = ?;
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$logtime,$id]);
}
function torles2($id)
{
    $sql = <<<SQL
    DELETE FROM nove_norbert_users WHERE id = ?;
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$id]);
}
function giveadmin($id)
{
    $sql = <<<SQL
    UPDATE nove_norbert_users
    SET logtime = true
    WHERE id = ?;
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$$id]);
}
function ban($id)
{
    $sql = <<<SQL
    UPDATE nove_norbert_users
    SET ban = true
    WHERE id = ?;
    SQL;
    $e = connect ()->prepare($sql);
    $e->execute([$$id]);
}