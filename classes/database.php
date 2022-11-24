<?php
function connect()
{
    {
            $host = "";
            $user = "";
            $password = "";
            $dbname = "";
        if(filesize("config.json") > 0)
        {
            $jsonString = file_get_contents('./config.json');
            $data = json_decode($jsonString, true);
            $host = $data["host"];
            $user = $data["user"];
            $password = $data["password"];
            $dbname = $data["dbname"];
        }
        static $dbh;
        if(!$dbh)
        {
            try
            {
                $dsn = "mysql:dbname=$dbname;host=$host";
                $dbh = new PDO($dsn, $user, $password);
                tablecreate(); 
            }
            catch(PDOException)
            {
                return null;
            }
            
        }
        return $dbh;
    }
}
?>