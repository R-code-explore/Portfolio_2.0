<?php
session_start();
if(!isset($_SESSION["user"]["id"]) == 1){
    header('Location: ../index.php');
    exit;
}
//Verification de l'envois du form

if(!empty($_POST)){
    //Verification du remplissage des champs
    if(isset($_POST["password"]) && !empty($_POST["password"])
    ){
        //Formulaire complet

        //Hash du mdp
        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);

        //Enregistrement de BD

        require_once '../db_connexion/connect.php';

        $sql = "UPDATE `user` SET mdp = '$pass' WHERE `id` = 1";

        $query = $db->prepare($sql);

        $query->execute();

        header('Location: ./home_admin.php');

    }else{
        die("formulaire incomplet");
    }
}

?>