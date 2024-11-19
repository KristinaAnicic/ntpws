<?php
if (isset($_POST['editArticleForm'])) {
    if(isset($_POST['title']) && isset($_POST['subheading']) && isset($_POST['description']) && 
    isset($_POST['content'])){
        $archive = isset($_POST['archive']) ? 1 : 0;
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        $sqlUpdate = "UPDATE news SET 
                    title = '$title',
                    subheading = '$subheading',
                    description = '$description',
                    content = '$content',
                    archive = '$archive'
                    WHERE id = {$news['id']}";
        if (mysqli_query($conn, $sqlUpdate)){
            header('Location: index.php?menu=8&action=2&edit=' . $news['id']);
        }
    }
}

if (isset($_POST['addImageForm'])) {
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
        $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : NULL;
        $caption = isset($_POST['caption']) ? mysqli_real_escape_string($conn, $_POST['caption']) : NULL;
        
        $fileName = basename($_FILES["image"]["name"]);
        $filePath = 'img/news/' . $fileName;
        
        $sql = "SELECT * FROM news_images WHERE image_url = '$filePath'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) != 0){
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        }
        
        $path = 'img/news/' . $fileName;
    
        $fileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $types = array('jpg', 'jpeg', 'png', 'gif','avif','webp');
    
        if (in_array($fileType, $types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                $sql = "INSERT INTO news_images (news_id, title, caption, image_url, main) VALUES ({$news['id']},'$title', '$caption','$path',0)";
                mysqli_query($conn, $sql);
                header('Location: index.php?menu=8&action=2&edit=' . $news['id']);
            } 
        }
    }
}
if (isset($_POST['editImageForm'])) {
    if (isset($_POST['title']) && isset($_POST['caption'])){
        $id = $_POST['id'];
        $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : NULL;
        $caption = isset($_POST['caption']) ? mysqli_real_escape_string($conn, $_POST['caption']) : NULL;

        $sql = "UPDATE news_images SET title = '" . $title . "', caption = '" . $caption . "' WHERE id = " . $id;
        mysqli_query($conn, $sql);
        header('Location: index.php?menu=8&action=2&edit=' . $news['id']);
    }
}
?>