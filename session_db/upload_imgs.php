<?php
    if(isset($_POST['submit'])){
        //$file = $_FILES['file'];
        
        $id = $_POST['img_id'];

        //Avant update, suppresion des images à remplacer/////////
                //Avant update, suppresion des images à remplacer/////////
                    
                require_once '../db_connexion/connect.php';

                $pdo_img1 = $db->prepare("SELECT `name_1` FROM `imgs` WHERE id = $id");
                $pdo_img1->execute();
                $db_request_img1 = $pdo_img1->fetch();
                
                $pdo_img2 = $db->prepare("SELECT `name_2` FROM `imgs` WHERE id = $id");
                $pdo_img2->execute();
                $db_request_img2 = $pdo_img2->fetch();

                $pdo_img3 = $db->prepare("SELECT `name_3` FROM `imgs` WHERE id = $id");
                $pdo_img3->execute();
                $db_request_img3 = $pdo_img3->fetch();

                $db_img1 = $db_request_img1['name_1'];
                $db_img2 = $db_request_img2['name_2'];
                $db_img3 = $db_request_img3['name_3'];

                //echo $db_img1['name_1'], $db_img2['name_2'], $db_img3['name_3'];

                unlink("./uploads/$db_img1");
                unlink("./uploads/$db_img2");
                unlink("./uploads/$db_img3");

                /////////////////////////
                /////////////////////////

        $fileName_1 = $_FILES['img_1']['name'];
        $fileTmpName_1 = $_FILES['img_1']['tmp_name'];
        $fileSize_1 = $_FILES['img_1']['size'];
        $fileError_1 = $_FILES['img_1']['error'];
        $fileType_1 = $_FILES['img_1']['type'];

        $fileName_2 = $_FILES['img_2']['name'];
        $fileTmpName_2 = $_FILES['img_2']['tmp_name'];
        $fileSize_2 = $_FILES['img_2']['size'];
        $fileError_2 = $_FILES['img_2']['error'];
        $fileType_2 = $_FILES['img_2']['type'];

        $fileName_3 = $_FILES['img_3']['name'];
        $fileTmpName_3 = $_FILES['img_3']['tmp_name'];
        $fileSize_3 = $_FILES['img_3']['size'];
        $fileError_3 = $_FILES['img_3']['error'];
        $fileType_3 = $_FILES['img_3']['type'];


        //Upload process///////////////////
        //Upload process///////////////////

        $fileExt_1 = explode('.', $fileName_1);
        $fileActualExt_1 = strtolower(end($fileExt_1));

        $allowed_1 = array('jpg', 'jpeg', 'png', 'pdf');

        $fileExt_2 = explode('.', $fileName_2);
        $fileActualExt_2 = strtolower(end($fileExt_2));

        $allowed_2 = array('jpg', 'jpeg', 'png', 'pdf');

        $fileExt_3 = explode('.', $fileName_3);
        $fileActualExt_3 = strtolower(end($fileExt_3));

        $allowed_3 = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt_1, $allowed_1) && in_array($fileActualExt_2, $allowed_2) && in_array($fileActualExt_3, $allowed_3)){
            if($fileError_1 === 0 && $fileError_2 === 0 && $fileError_3 === 0){
                if($fileSize_1 < 2100000 && $fileSize_2 < 2100000 && $fileSize_3 < 2100000){
                    
                    $fileNameNew_1 = uniqid('', true).".".$fileActualExt_1;
                    $fileDestination_1 = 'uploads/'.$fileNameNew_1;

                    $fileNameNew_2 = uniqid('', true).".".$fileActualExt_2;
                    $fileDestination_2 = 'uploads/'.$fileNameNew_2;

                    $fileNameNew_3 = uniqid('', true).".".$fileActualExt_3;
                    $fileDestination_3 = 'uploads/'.$fileNameNew_3;

                    move_uploaded_file($fileTmpName_1, $fileDestination_1);
                    move_uploaded_file($fileTmpName_2, $fileDestination_2);
                    move_uploaded_file($fileTmpName_3, $fileDestination_3);
                    //header("Location: ./home_admin.php?uploadSuccess");
                    //print_r($fileNameNew);
                    
                    //insertion nom photo en base de données
                    require_once '../db_connexion/connect.php';

                        $imgName_1 = strip_tags($fileNameNew_1);
                        $imgName_2 = strip_tags($fileNameNew_2);
                        $imgName_3 = strip_tags($fileNameNew_3);
                
                        $sql = "UPDATE `imgs` SET `name_1`=:imgName1,`name_2`=:imgName2,`name_3`=:imgName3 WHERE `id` = '$id'";
                
                        $query = $db->prepare($sql);
                
                        $query->bindValue(":imgName1", $imgName_1, PDO::PARAM_STR);
                        $query->bindValue(":imgName2", $imgName_2, PDO::PARAM_STR);
                        $query->bindValue(":imgName3", $imgName_3, PDO::PARAM_STR);
                
                        if(!$query->execute()){
                            die("Il semble que vos infos n'ont pas été enregistrés");
                        }else{
                            header("Location: ./home_admin.php?uploadSuccess");

                            //echo $imgName_1 . ' ' . $imgName_2 . ' ' . $imgName_3; 
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
    
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
    
    }
?>