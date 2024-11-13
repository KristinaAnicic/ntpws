<?php
    include('../db.php');

    $id = $_GET['id'];
    $sqlNews = 'SELECT news_id FROM news_images WHERE id = ' . $id . ' LIMIT 1';
    $resultNewsId = mysqli_query($conn, $sqlNews);
    $newsId = mysqli_fetch_assoc($resultNewsId)['news_id'];

    $sql = "SELECT image_url FROM news_images WHERE id=$id";
    $result = mysqli_query($conn,$sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $filePath = '../' . $row['image_url'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        $sqlDelete = "DELETE FROM news_images WHERE id = " . $id;
        if(mysqli_query($conn, $sqlDelete)){
            $sqlCheckNumOfImages = 'SELECT COUNT(*) AS imageCount FROM news_images WHERE news_id = ' . $newsId;
            $resultNumOfImages = mysqli_query($conn, $sqlCheckNumOfImages);

            if ($resultNumOfImages) {
                $row = mysqli_fetch_assoc($resultNumOfImages); 
                $numOfImages = $row['imageCount'];               

                if ($numOfImages == 0) {
                    $sqlUpdateArticle = 'UPDATE news SET archive = 1 WHERE id = ' . $newsId;
                    mysqli_query($conn, $sqlUpdateArticle);
                }
            }
        }
    }

    header('Location: ../index.php?menu=8&action=2&edit=' . $newsId);
?>