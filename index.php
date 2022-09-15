<?php

$page_title = "Raimond-code.com / Accueil";
$css_link = "./css/style.css";

$header_pages_1 = "Contact";
$header_link_1 = "#contact";

$header_pages_2 = "Projets";
$header_link_2 = "./projets.php";

$header_pages_3 = "Blog";
$header_link_3 = "./blog.php";

$header_pages_4 = "A propos";
$header_link_4 = "#about_id";

$header_pages_5 = "Ce que je propose";
$header_link_5 = "#services_id";

include './includes/header.php';
?>

<div class="banner" id="to_top">
        <h3 class="sub_title">Développeur web Full-Stack</h3>
        <div class="banner_content">

            <div class="banner_left">
                <h3 class="bonjour">Bonjour,<br>et bienvenue</h3>
                <div class="left_banner_buttons">
                    <a href="#about_id" class="general_btn">Naviguer</a>
                    <a href="#contact" class="general_btn">Me contacter</a>
                </div>
            </div>

            <div class="banner_sep_bar"></div>

            <div class="banner_right">
                <div class="icons_link">
                    <img src="./assets/codeur_icone.jpg" class="icon_link_1">
                    <img src="./assets/github_icone.png" class="icon_link">
                    <img src="./assets/linkedin_icone.png" class="icon_link">
                    <img src="./assets/malt_icone.png" class="icon_link">
                </div>

                <video autoplay muted loop class="video_banner">
                    <source src="./assets/0001-0120.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video> 
            </div>
        
        </div>
    </div>

    <!--Index part_1 ( About )-->

    <section class="about_desktop" id="about_id">
        <p class="para about_txt_desktop">Passionné par l'informatique et le développement en général, j'ai tapé mes premières lignes de code à l'âge de 13 / 14 ans pour mes jeux ( création de serveurs en java, la plus part du temps ). Bien plus tard en étant passé par quelques secteurs de métiers, j'ai choisis ma voix que j'explore maintenant depuis environ 2 ans.
<br><br>
Je me suis principalement formé en autodidacte et suivi ensuite un parcours en e-learning afin de valider mes compétences officiellement.
<br><br>
Plusieurs missions effectuées en tant qu'indépendant pour particuliers et professionnels.
<br>
Ces différentes expériences m'ont permis de travailler à en renforcer mes compétences en:
<br>
    - Traitement et gestion du back-end ( PHP, SQL, NodeJs et différents frameworks les accompagnant )
<br>
    - Expérience et interface utilisateur sur les sites et apps web ( SASS, Javascript, HTML / CSS et différents frameworks qui les accompagnent )
<br>
    - Traitement et gestion de système de paiement en ligne
<br>
    - Et également à l'administration système et sécurité.</p>
        <div class="about_photo_title_desktop">
            <h3 class="about_title">A propos de moi</h3>
            <img src="./assets/Profile.jpg">
        </div>
    </section>

    <section class="about_mobile" id="about_id">
    <div class="about_photo_title_mobile">
            <h3 class="about_title">A propos de moi</h3>
            <img src="./assets/Profile.jpg">
        </div>
        <p class="para about_txt_mobile">Passionné par l'informatique et le développement en général, j'ai tapé mes premières lignes de code à l'âge de 13 / 14 ans pour mes jeux ( création de serveurs en java, la plus part du temps ). Bien plus tard en étant passé par quelques secteurs de métiers, j'ai choisis ma voix que j'explore maintenant depuis environ 2 ans.
<br><br>
Je me suis principalement formé en autodidacte et suivi ensuite un parcours en e-learning afin de valider mes compétences officiellement.
<br><br>
Plusieurs missions effectuées en tant qu'indépendant pour particuliers et professionnels.
<br>
Ces différentes expériences m'ont permis de travailler à en renforcer mes compétences en:
<br>
    - Traitement et gestion du back-end ( PHP, SQL, NodeJs et différents frameworks les accompagnant )
<br>
    - Expérience et interface utilisateur sur les sites et apps web ( SASS, Javascript, HTML / CSS et différents frameworks qui les accompagnent )
<br>
    - Traitement et gestion de système de paiement en ligne
<br>
    - Et également à l'administration système et sécurité.</p>
    </section>

    <section class="service" id="services_id">
        <h3 class="service_title">Mes services</h3>
        <p class="para service_txt">
            - Création d’un site / application web pour votre activité. Que vous soyez un   particulier, une entreprise, une association ou simplement développer votre blog  en ligne, je saurais m’en charger.
            <br>
            <br>
            - Refonte de vôtre application / site web
            <br>
            <br>
            - Maintenance de cette / ces dernières.
            Evidemment, une fois ce site ou application créer ou recréer, l’idéal serait d’apporter une maintenance tout le long de son existence et cette maintenance est fortement conseillé pour plusieurs points :
            <br>
            <br>
            - La sécurité de vôtre site : Alors là, je ne vais pas me faire des amis, mais tout ce que l’on a pu vous vendre ou vous faire entendre par le passé sur le fait qu' un tel ou un tel vous promet une sécurité optimale dans laquelle il est impossible d’y pénétrer.. n’y croyez pas un seul mot, une sécurité peut être optimale mais pas infaillible, tout est une question de moyen ou de temps, mais je l’explique un peu plus en détails <a href="">juste ici >> .</a> Cependant, on peut, en apportant les bonnes solutions, une bonne veille sur toutes les mises à jours, ainsi que par moment les bonnes lignes de code, limiter fortement ce risque.
            <br>
            <br>
            - Et la correction de bugs, ou mises à jour des différentes technologies que votre site / application / base de données utilise.
            <br>
            <br>
            N'hésitez donc pas à me contacter pour en discuter plus en détails et au plaisir de travailler ensemble. Me contacter en <a href="#contact">cliquant ici.</a>
        </p>
    </section>

    <div class="sep_bar"></div>

    <section class="work_prev_section">

    <h3 class="prev_global_title">Aperçu des projets</h3>

    <div class="work_prev">

    <?php  

        require_once './db_connexion/connect.php';

        $pdoPrevs = $db->prepare("SELECT * FROM `imgs`");
        $executePrevs = $pdoPrevs->execute();
        $prevs = $pdoPrevs->fetchAll();

        foreach($prevs as $prev):

    ?>

    <div class="prev_div">
        <h3 class="prev_title"><?=$prev['txt']?></h3>
        
        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="./session_db/uploads/<?=$prev['name_1']?>"></div>
                <div class="slide"><img src="./session_db/uploads/<?=$prev['name_2']?>"></div>
                <div class="slide"><img src="./session_db/uploads/<?=$prev['name_3']?>"></div>
            </div>
        </div>

    </div>

    <?php endforeach; ?>

    </div>

    <a href="./projets.php" class="view_all_project">Voir plus de projets et réalisations</a>

    </section>

    <div class="sep_bar"></div>

    <form action="" class="contact" id="contact">

    <h3 class="contact_title">Contactez-moi</h3>

        <input type="text" name="name" id="name" placeholder="Votre nom et prénom(s)" required>
        
        <input type="email" name="email" id="email" placeholder="Votre email" required>

        <textarea name="mess" id="mess" placeholder="Votre message" required></textarea>

        <button class="general_btn send_msg" id="send_msg" type="submit" name="submit">Envoyer</button>

    </form>

<?php
include './includes/footer.html';
?>