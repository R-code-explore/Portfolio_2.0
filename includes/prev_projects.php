<div class="prev_section">

    <h3 class="prev_title">Aperçu de certains projets</h3>
    <style>
        .prev_title{
            color:white;
            text-align: center;
            line-height: 60px;
        }
    </style>

    <?php  

        require_once './db_connexion/connect.php';

        $pdoPrevs = $db->prepare("SELECT * FROM `imgs`");
        $executePrevs = $pdoPrevs->execute();
        $prevs = $pdoPrevs->fetchAll();

        foreach($prevs as $prev):

    ?>

    <div class="prev_div">
        <!-----Carousel bootstrap ----->
        <!-----Carousel bootstrap ----->

        <p class="prev_text"><?=utf8_encode($prev['txt']);?></p>
            
        <div class="slider">
        <div class="slides">
            <div class="prev_slide"><img src="./session_db/uploads/<?=$prev['name_1'];?>" class="prev_img"></div>
            <div class="prev_slide"><img src="./session_db/uploads/<?=$prev['name_2'];?>" class="prev_img"></div>
            <div class="prev_slide"><img src="./session_db/uploads/<?=$prev['name_3'];?>" class="prev_img"></div>
        </div>
        </div>

        <!------------>
        <!------------>
    </div>

    <?php endforeach; ?>

    <a href="" class="go_projects">Voir tous les projets >></a>
</div>

<style>
    .go_projects{
        display: block;
        color: white;
        font-size: 1em;
        text-align: center;
        margin: 20px auto;
        transition: .3s ease-in-out;
    }

    .go_projects:hover{
        color: skyblue;
        transition: .3s ease-in-out;
    }

    .prev_section{
        position: relative;
        background: black;
        width: 100%;
        padding: 40px 0;
        margin: 0;

        z-index: 5;
    }

    .prev_div{
        width: 90%;
        max-width: 560px;
        padding: 10px;
        border: solid 2px white;
        border-radius: 10px;
        margin: auto;
    }
    .prev_text{
        width: 320px;
        margin: auto;
        color: white;
    }

    /*Carousel & images */
    .slider{
        width: 320px;
        overflow: hidden;
        margin: 15px auto;
        border-radius: 10px;
    }
    .slides{
        width: calc(360px * 3);
        animation: slide 12s infinite;
    }
    
    .prev_slide{
        width: 320px;
        float: left;
    }

    .prev_img{
        display: block;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    @keyframes slide {
        0% {
            transform: translateX(0);
        }

        10% {
            transform: translateX(0);
        }

        33% {
            transform: translateX(-360px);
        }

        66% {
            transform: translateX(-720px);
        }

        100% {
            transform: translateX(0);
        }
    }

    /****************** */
</style>