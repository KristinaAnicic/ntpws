<?php
    define('__APP__', TRUE);

print'
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Discover the latest in video games, news, reviews, guides, and trends in the gaming world. Follow updates on console, PC, and mobile games here.">
        <meta name="author" content="Kristina Aničić">
        <meta name="keywords" content="video games, gaming news, game reviews, game guides, latest games, PC games, console games, mobile games, indie games, gamers, gaming trends, gaming industry">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>GameSphere</title>
    </head>
    <body>';
        
        if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }

        print'
        <!--<nav class="navbar navbar-expand-lg">
            <ul>
                <li><a href="index.php?menu=1">Home</a></li>
                <li><a href="index.php?menu=2">News</a></li>
                <li><a href="index.php?menu=3">Contact</a></li>
                <li><a href="index.php?menu=4">About</a></li>
                <li><a href="index.php?menu=5">Gallery</a></li>
            </ul>
        </nav>-->
        
        <nav class="navbar navbar-expand-lg">
            <div class="container">
            <div class="navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=1">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=2">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=3">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=4">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=5">Gallery</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        '; 

        # Homepage
        if (!isset($menu) || $menu == 1) { 
            echo '<div class="banner-wrapper">
                <div class="banner"></div>
                <div class="content col-md-3 col-sm-5">
                    <h1>The Best Games Out There</h1>
                    <p>Explore the latest news, reviews, and guides to stay ahead in the gaming world.</p>
                </div>
            </div>';
        }
        echo '<main>';

        # Homepage
        if (!isset($menu) || $menu == 1) { include("home.php"); }
        # News
        else if ($menu == 2) { include("news.php"); }
        
        # Contact
        else if ($menu == 3) { include("contact.php"); }
        
        # About us
        else if ($menu == 4) { include("about-us.php"); }

        # Gallery
        else if ($menu == 5) { include("gallery.php"); }

        echo '</main>';

    print'    
    </body>
</html>';
?>