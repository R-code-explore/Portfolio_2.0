    <!--Imgs adds-->

    <form action="upload_imgs.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Importer</button>
    </form>

<!------Test image-->
<!------Test image-->

<?php

    require_once '../db_connexion/connect.php';

    $pdoImages = $db->prepare("SELECT * FROM `imgs`");
    $executeImages = $pdoImages->execute();
    $images = $pdoImages->fetchAll();
    foreach($images as $image): 

?>

<div class="test_image">
    <form action="./delete_image.php" method="POST">
    <img src="./uploads/<?=$image["name"];?>">
        <input type="radio" name="id" checked value="<?=$image["id"]?>">
        <input type="radio" name="name" checked value="<?=$image["name"]?>">
        <button type="submit" name="submit">Supprimer cette image</button>
    </form>
</div>

<?php
 endforeach;
?>

<style>
    .test_image{
        width: 400px;
    }
    .test_image > form > img{
        display: block;
        width: 100%;
    }
</style>

<!------>
<!------>

<!--Upload operation in backend-->

<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    //header("Location: ./home_admin.php?uploadSuccess");
                    //print_r($fileNameNew);
                    
                    //insertion nom photo en base de données
                    require '../db_connexion/connect.php';

                        $imgName = strip_tags($fileNameNew);
                
                        $sql = "INSERT INTO `imgs`(`id`, `name`) VALUES (NULL, :imgName)";
                
                        $query = $db->prepare($sql);
                
                        $query->bindValue(":imgName", $imgName, PDO::PARAM_STR);
                
                        if(!$query->execute()){
                            die("Il semble que vos infos n'ont pas été enregistrés");
                        }else{
                            header("Location: ./home_admin.php?uploadSuccess");
                        }

                    //////////////////////////////////

                }else{
                    echo "fichier trop volumineu";
                }
            }else{
                echo "Une erreur est survenu durant l'importation de ce fichier";
            }
        }else{
            echo "Importation de ce type de fichier impossible";
        }
    }
?>