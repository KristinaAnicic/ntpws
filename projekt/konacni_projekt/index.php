<?php
    include ("db.php");
    session_start();

print'
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Discover the latest in video games, news, reviews, guides, and trends in the gaming world. Follow updates on console, PC, and mobile games here.">
        <meta name="author" content="Kristina Aničić">
        <meta name="keywords" content="video games, gaming news, game reviews, game guides, latest games, PC games, console games, mobile games, indie games, gamers, gaming trends, gaming industry">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon> 
        <title>GameSphere</title>
    </head>
    <body>';
        
        if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
        if(isset($_GET['action'])) { $action   = (int)$_GET['action'] ; }

        print'
        <nav class="navbar navbar-expand-lg">
            <div class="container navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-navicon" style="color:#fff; font-size:28px; padding: 10px"></i>
                </button>';
                include("menu.php");
        print '
            </div>
        </nav>
        '; 

        echo '
        <div class="banner-wrapper ' . ((!isset($menu) || $menu == 1) ? 'banner-home' : 'banner-other') . '">
            <div class="banner"></div>
                <div class="banner-content col-md-3 col-sm-5">';

                if (!isset($menu) || $menu == 1) { 
                    echo '
                        <h1>The Best Games Out There</h1>
                        <p>Explore the latest news, reviews, and guides to stay ahead in the gaming world.</p>';

                } else { 
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
                        case 6:
                            echo '<h1>Register</h1>';
                            break;
                        case 7:
                            echo '<h1>Sign in</h1>';
                            break;
                        case 8:
                            echo '<h1>Admin</h1>';
                            break;
                        case 9:
                            echo '<h1>Sign out</h1>';
                            break;
                        case 10:
                            echo '<h1>Games API</h1>';
                    }  
                }
                echo '
                </div>
            </div>';
        
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

        #Register
        else if ($menu == 6) { include("register.php"); }

        #Sign in
        else if ($menu == 7) { include("sign-in.php"); }

        #Admin
        else if ($menu == 8) { include("admin.php"); }

        #Sign out
        else if ($menu == 9) { include("sign-out.php"); }

        #Games API
        else if ($menu == 10) { include("games-api.php"); }

        echo '</main>';

    print'    
        <div style="clear: both;"></div>
        <footer>
        <div class="social">
            <p>Social media:<br>
                <a href="https://www.linkedin.com/in/kanicic/" target="_blank"><img src="img/linkedin.svg" alt="Linkedin" title="Linkedin" style="width:24px; margin:0"></a>
                <a href="https://x.com/IGN" target="_blank"><img src="img/twitter.svg" alt="Twitter" title="Twitter" style="width:24px; margin-top:0"></a>
                <a href="https://www.youtube.com/@IGN" target="_blank"><img src="img/youtube.svg" alt="Youtube" title="Youtube" style="width:24px; margin-top:0"></a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>';
?>