<?php
    print '
    <div class="collapse navbar-collapse justify-content-center navbar-expand-lg" id="navbarNav">
        <ul class="navbar-nav justify-content-center">
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
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=10">Games API</a>
            </li>';
            if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
                print '
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=6">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=7">Sign in</a>
                </li>';
            }

            else if ($_SESSION['user']['valid'] == 'true') {
                print '
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=8">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=9">Sign out</a>
                </li>';
            }
        print'  
        </ul>
    </div>
    ';

?>