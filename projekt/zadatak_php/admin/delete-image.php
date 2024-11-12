<?php
    include('../db.php');

    $id = $_GET['id'];
    $sqlNews = 'SELECT news_id FROM news_images WHERE id = ' . $id . ' LIMIT 1';
    $result = mysqli_query($conn, $sqlNews);
    $newsId = mysqli_fetch_assoc($result)['news_id'];

    $sqlDelete = "DELETE FROM news_images WHERE id = " . $id;
    mysqli_query($conn, $sqlDelete);

    header('Location: ../index.php?menu=8&action=2&edit=' . $newsId);
?>