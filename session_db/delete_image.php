<?php

if(isset($_POST["submit"])){
    $nameImage = $_POST["name"];
    
    unlink("./uploads/$nameImage");

    require '../db_connexion/connect.php';

    $id = $_POST["id"];
                
    $sql = "DELETE FROM `imgs` WHERE id = $id";
                
    $query = $db->prepare($sql);
                
    $query->execute();
                
    if(!$query->execute()){
        die("Il semble que vos infos n'ont pas été enregistrés");
    }else{
        header("Location: ./home_admin.php?DeleteSuccess");
    }
}

?>