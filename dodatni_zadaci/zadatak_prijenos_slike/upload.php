<?php
    $con = mysqli_connect("localhost","root","","ntpws_db3");

    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
        $fileName = basename($_FILES["image"]["name"]);
        
        $sql = "SELECT * FROM images WHERE filename = '$fileName'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) != 0){
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        }
        
        $path = 'img/' . $fileName;
    
        $fileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $types = array('jpg', 'jpeg', 'png', 'gif');
    
        if (in_array($fileType, $types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                $sql = "INSERT INTO images (filename, filepath) VALUES ('$fileName', '$path')";
                mysqli_query($con, $sql);
            } 
        }
    }

    mysqli_close($con);
    header("Location: index.php");
?>