<?php

if(isset($_POST['submit'])){

    require_once '../db_connexion/connect.php';

    $id = $_POST['txt_id'];

    $txtPrev = strip_tags($_POST['prev_intro']);
                
    $sql = "UPDATE `imgs` SET `txt`=:txtImage WHERE `id` = '$id'";
                
    $query = $db->prepare($sql);
                
    $query->bindValue(":txtImage", $txtPrev, PDO::PARAM_STR);
                
    if(!$query->execute()){
        die("Il semble que vos infos n'ont pas été enregistrés");
    }else{
    header("Location: ./home_admin.php?txtUpdateSuccess"); 
    }

}else{
    echo "nothing sends";
}