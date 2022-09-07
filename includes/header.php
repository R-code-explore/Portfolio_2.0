<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="Author" content="Eduard R.C.">
    <meta name="Description" content="Full-stack web developper / développeur web full-stack /  Portfolio Raimond-code / CV-Raimond-code / Raimond-code.com / développeur web France / French web developer">

    <!-- css.gg -->
    <link href='https://css.gg/css' rel='stylesheet'>   
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
    <!---->

    <!--Animation & tricks css & js-->
    <link rel="icon" type="image/x-icon" href="./assets/logo.png">

    <link rel="stylesheet" href="<?=$css_link;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💻<?=$page_title;?></title>
</head>
<body>
    <header class="header">
    
        <div class="logo_title">
            <h1 class="title">Raimond-code.com</h1>
            <img src="./assets/logo.png" class="logo">
        </div>

        <div class="menu_desktop">
            <a href="#contact" class="menu_link_desktop">Contact</a>
            <a href="" class="menu_link_desktop">Projets</a>
            <a href="" class="menu_link_desktop">Contact</a>
            <a href="" class="menu_link_desktop">A propos</a>
            <a href="" class="menu_link_desktop">Ce que je propose</a>
        </div>

        <div class="menu_phone" onclick="openMenu()">
            <p class="general_btn">Menu</p>
        </div>

    </header>

<div id="block_phone_menu">
    <button class="general_btn" onclick="closeMenu()">X</button>
    <a href="#contact" class="menu_link_desktop" onclick="closeMenu()">Contact</a>
    <a href="" class="menu_link_desktop" onclick="closeMenu()">Projets</a>
    <a href="" class="menu_link_desktop" onclick="closeMenu()">Contact</a>
    <a href="" class="menu_link_desktop" onclick="closeMenu()">A propos</a>
    <a href="" class="menu_link_desktop" onclick="closeMenu()">Ce que je propose</a>
</div>