<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "raimond_code");

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

try{
    $db = new PDO($dsn, DBUSER, DBPASS);
}catch(PDOException $e){
    die($e->getMessage());
}

?>