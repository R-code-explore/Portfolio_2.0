<?php
session_start();
if(!isset($_SESSION["user"]["id"]) == 1){
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</head>

<h1>Mon compte</h1>

<style>
    a{display: block;}

    #mdp_change{
        display: block;
        width: 80%;
        max-width: 350px;
        text-align: center;
        margin: 40px auto;
    }

    .pass_change{
        display: block;
        width: 80%;
        margin: 40px auto;
    }
</style>

<form action="./logout.php">
    <button type="submit" class="btn btn-primary">Disconect</button>
</form>

<form class="pass_change" id="pass_change pass_open" action="./mdp_change.php" method="post">

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>

</form>

<form action="./del_msg.php" method="post">
    <button type="submit" id="del_msg" class="btn btn-danger">Delete all messages</button>
    <style>
        #del_msg{
            display: block;
            margin: 10px;
        }
    </style>
</form>

<!--Imgs prev modification-->
<!--Imgs prev modification-->

<?php

    require_once '../db_connexion/connect.php';

    $pdoImages = $db->prepare("SELECT * FROM `imgs`");
    $executeImages = $pdoImages->execute();
    $images = $pdoImages->fetchAll();

    $uploadImage_folder = './uploads/';

    foreach($images as $image): 

?>

<div class="imgs_prev_section">
    
    <p class="prev_title">Aperçu n° : <?=$image['id']?></p>
    
    <form action="upload_imgs.php" method="post" enctype="multipart/form-data" class="img_prev">

        <input type="radio" name="img_id" id="img_id" value="<?=$image['id'];?>" checked>

        <div class="img_prev_presentation">
            <img src="<?=$uploadImage_folder.$image['name_1'];?>"><!--Require 
        l'image 1-->
            <label for="img_1">Changer image 1</label>
            <input type="file" name="img_1" id="img_1">
        </div>
        
        <div class="img_prev_presentation">
            <img src="<?=$uploadImage_folder.$image['name_2'];?>"><!--Require 
        l'image 1-->
            <label for="img_2">Changer image 1</label>
            <input type="file" name="img_2" id="img_2">
        </div>

        <div class="img_prev_presentation">
            <img src="<?=$uploadImage_folder.$image['name_3'];?>"><!--Require 
        l'image 1-->
            <label for="img_3">Changer image 1</label>
            <input type="file" name="img_3" id="img_3">
        </div>
        
        <button type="submit" name="submit" value="submit">Changer les images</button>
    </form>

    <form method="post" action="./txt_update.php" class="txt_modifier">
        <label for="prev_intro">Modification texte de présentation ( 140 caractères max )</label>
        <input type="radio" name="txt_id" id="txt_id" value="<?=$image['id'];?>" checked>
        <textarea name="prev_intro" id="prev_intro" class="txt_prev_intro" maxlength="140"><?=utf8_encode($image['txt'])?></textarea><!--Require txt d'intro-->
        
        <button type="submit" name="submit" id="submit">Modifier le txt</button>
    
    </form>

</div>

<?php endforeach; ?>

<style> .lettre_count_section{display:flex} .count_leter{padding: 0 10px;} .txt_modifier{margin-top: 20px} </style>

    <script type="text/javascript">
        var elt = document.getElementsByName('prev_intro')
        //elt.size = 10;

        for (var i = 0; i < elt.length; i++){
            var maxlength = elt[i].getAttribute('maxlength')
            //console.log(maxlength)

            //console.log(elt[i].innerHTML)
        }

        //let maxcaract = 10
        //elt.maxLength = maxcaract

</script>

<!-------------->
<!-------------->

<style>
    .imgs_prev_section{
        display: block;
        width: 80%;
        max-width: 750px;
        padding: 20px;
        border: 2px solid black;
        border-radius: 10px;
        margin: auto;
    }

    .img_prev{display: flex;}
    .img_prev_presentation{
        display: block;
        width: 150px;
        height: 120px;
        margin: 15px 15px;
    }
    .img_prev_presentation img{
        display: block;
        width: 100%;
        height: 70%;
        object-fit: cover;
    }

    .img_prev button{
        display: flex;
        height: 30px;
        margin: 15px 0;
    }

    .txt_prev_intro{
        width: 100%;
        height: 250px;
        resize: none;
    }
</style>

<!----------------------------->
<!----------------------------->

<?php
        require_once '../db_connexion/connect.php';

        $pdoMessages = $db->prepare("SELECT * FROM `mess`");

        $executeMessages = $pdoMessages->execute();

        $messages = $pdoMessages->fetchAll();
        
        foreach($messages as $message):
    ?>

        <div class="message">
            <div class="message_form"><strong>Nom et prénom : </strong><?=$message["name"]?></div>

            <div class="message_form"><strong>Email : </strong><?=$message["email"]?></div>
            
            <div class="message_form"><strong>Message : </strong><br><?=$message["mess"]?></div>
        </div>

    <?php endforeach; ?>    
</div>

<style>
    .message{
        display: block;
        width: 80%;
        max-width: 650px;
        margin: 20px auto;
        border: solid 1px black;
        border-radius: 10px;
        padding: 15px;
    }
    .message_form{
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>