<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Discover the latest in video games, news, reviews, guides, and trends in the gaming world. Follow updates on console, PC, and mobile games here.">
        <meta name="author" content="Kristina Aničić">
        <meta name="keywords" content="video games, gaming news, game reviews, game guides, latest games, PC games, console games, mobile games, indie games, gamers, gaming trends, gaming industry">
        <link rel="stylesheet" href="style.css">
        <title>GameSphere</title>
    </head>
    <body>
        
        <nav class="navbar">
            <ul>
                <li><a href="index.php?menu=1">Home</a></li>
                <li><a href="index.php?menu=2">News</a></li>
                <li><a href="index.php?menu=3">Contact</a></li>
                <li><a href="index.php?menu=4">About</a></li>
                <li><a href="index.php?menu=5">Gallery</a></li>
            </ul>
        </nav>
        <div class="banner"></div>

        <?php
        if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }

        print '<main>';
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

        ?>
    </body>
</html>