<?php
session_start();
if(isset($_SESSION["user"])){
    header('Location: ./session_db/home_admin.php');
    exit;
}

if(!empty($_POST)){
    if(isset($_POST["email"], $_POST["password"])
    && !empty($_POST["email"] && !empty($_POST["password"]))
    ){
        //Verification mail
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("Mail incorrect");
        }

        //Connexion a la db
        require_once './db_connexion/connect.php';

        $sql = "SELECT * FROM `user` WHERE `email` = :email";

        $query = $db->prepare($sql);

        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        
        $query->execute();

        $user = $query->fetch();

        if(!$user){
            die("Utilisateur inexistant");
        }
        
        //user existant, verification mot de passe

        if(!password_verify($_POST["password"], $user["mdp"])){
            die("mot de passe incorrect");
        }

        //User et mot de passe corrects
        //Ouverture de session PHP

        session_start();
        //Stock dans $_SESSION les infos users
        
        $_SESSION["user"] = [
            "id" => $user["id"],
            "nom" => $user["nom"],
            "email" => $user["email"]
        ];

        //redirection vers page compte

        header('Location: ./session_db/home_admin.php');

    }
}

?>

<head>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>

<h1>Connexion admin</h1>

<form method="post">
  
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="./index.php" class="btn btn-primary btn_accueil">Accueil</a>

<style>
    h1{
        display: block;
        text-align: center;
        margin: 40px auto;
    }

    form{
        width: 80%;
        max-width: 450px;
        margin: 40px auto;
    }

    .btn_accueil{
        display: block;
        text-align: center;
        width: 100px;
        margin: auto;
    }
</style>