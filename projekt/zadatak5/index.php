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
        if(isset($_GET['article'])) { $article   = (int)$_GET['article']; }

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
            // Glavna stranica - banner-home
            echo '<div class="banner-wrapper banner-home">
                    <div class="banner"></div>
                    <div class="banner-content col-md-3 col-sm-5">
                        <h1>The Best Games Out There</h1>
                        <p>Explore the latest news, reviews, and guides to stay ahead in the gaming world.</p>
                    </div>
                </div>';
        } else {
            echo '<div class="banner-wrapper banner-other">
                    <div class="banner"></div>
                    <div class="banner-content col-md-3 col-sm-5">';
        
            switch ($menu) {
                case 2:
                    echo '<h1>News</h1>';
                    break;
                case 3:
                    echo '<h1>Contact Form</h1>';
                    break;
                case 4:
                    echo '<h1>About Us</h1>';
                    break;
                case 5:
                    echo '<h1>Gallery</h1>';
                    break;
                default:
                    echo '<h1>Page</h1>';
                    break;
            }
        
            echo '</div>
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
        <footer>
        <div class="social">
            <p>Social media:<br>
	            <a href="https://www.linkedin.com/in/kanicic/" target="_blank"><img src="img/linkedin.svg" alt="Linkedin" title="Linkedin" style="width:24px; margin:0"></a>
                <a href="https://x.com/home" target="_blank"><img src="img/twitter.svg" alt="Twitter" title="Twitter" style="width:24px; margin-top:0"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="img/youtube.svg" alt="Youtube" title="Youtube" style="width:24px; margin-top:0"></a>
            <p>
        </div>   
        <div class="footer-container">
                <p>Copyright &copy; ' . date("Y") . ' Kristina Aničić.
                    <a href="https://github.com/KristinaAnicic/ntpws.git" target="_blank">
                        <img src="img/github.svg" title="Github" alt="Github" style="width:24px; margin: 0"
                    </a>
                </p>
            </div>
        </footer>
    </body>
</html>';
?>