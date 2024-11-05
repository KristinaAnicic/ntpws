<?php

    session_start();

    unset($_SESSION['news_title_1']);
    unset($_SESSION['news_title_2']);
    unset($_SESSION['news_title_3']);

    unset($_SESSION['link_1']);
    unset($_SESSION['link_2']);
    unset($_SESSION['link_3']);

    header("Location: index.php");
    exit;