<?php
    $id = $_GET['id'];
    include('db.php');
    $sql = "SELECT filepath FROM images WHERE id=$id";
    $result = mysqli_query($con,$sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $filePath = $row['filepath'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        $sqlDelete = "DELETE FROM images WHERE id = $id";
        mysqli_query($con,$sqlDelete);
    }
    
    mysqli_close($con);
    header("Location: index.php");
?>