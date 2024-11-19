<?php
if(isset($_GET['id']) && $_GET['id'] != ''){
    $sql = 'SELECT * FROM news WHERE id = ' . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_array($result);

    $sqlImages = 'SELECT * FROM news_images WHERE news_id = ' . $_GET['id'];
    $resultImages = mysqli_query($conn, $sqlImages);

    print'
    <br>
    <h2>Article</h2>
    <p><b>Title: </b>' . $news['title'] . '</p>
    <p><b>Description: </b>' . $news['description'] . '</p>
    <p><b>Subheading: </b>' . $news['subheading'] . '</p>
    <p><b>Content: </b>' . $news['content'] . '</p>
    <p><b>Publish Date: </b>' . $news['date'] . '</p>
    <p><b>Archive: </b>' . ($news['archive'] == 0 ? 'false' : 'true') . '</p>
    <p><b>Images: </b></p>

    <div class="row">';
        while ($image = mysqli_fetch_assoc($resultImages)) {
            print '
            <div class="img_news col-md-4 col-lg-3 mb-2">
                <figure>
                    <img src="' . $image['image_url'] . '" alt="' . $image['title'] . '"/>
                    <figcaption>' . $image['caption'] . '</figcaption>
                </figure>
            </div>
            ';
        }
    print'
    </div>

    <br><p><a href="index.php?menu='.$menu.'&amp;action='.$action.'" class="btn btn-outline-light">Back</a></p>';
}

else if(isset($_GET['delete']) && $_GET['delete'] != '' && $_SESSION['user']['role'] == 'admin'){
    $sql = 'DELETE FROM news WHERE id = ' . (int)$_GET['delete'] . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
    header("Location: index.php?menu=8&action=2");
}

else if((isset($_GET['edit']) && $_GET['edit'] != '') || isset($_GET['add'])){
    if (isset($_GET['edit'])){
        $sql = 'SELECT news.*, COUNT(images.id) AS numOfImages 
                FROM news 
                LEFT JOIN news_images AS images ON images.news_id = news.id 
                WHERE news.id = ' . (int)($_GET['edit']) . '
                GROUP BY news.id';
        $result = mysqli_query($conn, $sql);
        $news = mysqli_fetch_array($result);

        $userRole = $_SESSION['user']['role'];
        if ($news['user_id'] == $_SESSION['user']['id'] || $userRole == 'editor' || $userRole == 'admin') {
            $sqlImages = 'SELECT * FROM news_images WHERE news_id = ' . $_GET['edit'];
            $resultImages = mysqli_query($conn, $sqlImages);
            include('news-edit.php');
        } else {
            echo "<br><p>You do not have permission to edit this article.</p>";
            exit();
        }
    }
    else if(isset($_GET['add'])){
        $news['title'] = "";
        $news['subheading'] = "";
        $news['description'] = "";
        $news['content'] = "";

        if(isset($_POST['title']) && isset($_POST['subheading']) && isset($_POST['description']) && 
        isset($_POST['content']) && isset($_FILES['image']['name']) /*&& isset($_POST['image-title']) && isset($_POST['image-caption'])*/){
            $date = date('Y-m-d');
            $archive = 1;
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);

            $sql = "INSERT INTO news(title, subheading, description, content, date, archive, user_id)
            VALUES('{$title}', '{$subheading}', '{$description}', '{$content}', '{$date}', '{$archive}', '{$_SESSION['user']['id']}')";

            if (mysqli_query($conn, $sql)) {
                $newArticleId = mysqli_insert_id($conn);

                $fileCount = count($_FILES['image']['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = basename($_FILES["image"]["name"][$i]);
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
                        if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path)) {

                            //$imageTitle = mysqli_real_escape_string($conn, $_POST['image-title']);
                            //$imageCaption = mysqli_real_escape_string($conn, $_POST['image-caption']);
                            //$sql = "INSERT INTO news_images(news_id, image_url, title, caption, main) VALUES ({$newArticleId},'{$path}','{$imageTitle}','{$imageCaption}',1)";
                            $sql = "INSERT INTO news_images(news_id, image_url, main) VALUES ({$newArticleId},'{$path}', ". (($i == 0) ? '1' : '0'). ")";
                            mysqli_query($conn, $sql);
                        } 
                    }
                }
                header('Location: index.php?menu=8&action=2&edit=' . $newArticleId);
                exit();
            } 
        }
    }

    /*Edit news content*/
    print' 
    <div class="d-flex">
        <form method="post" action="" class="edit-form col-lg-12" enctype="multipart/form-data">
        <input type="hidden" name="editArticleForm" value="editArticleForm">
            <h2><b>Edit Article</b></h2><br><br>
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" class="form-control-plaintext edit-input" value="' . $news['title'] . '" required/><br><br>
            
            <label for="subheading">Subheading</label><br>
            <input type="text" name="subheading" id="subheading" class="form-control-plaintext edit-input" value="' . $news['subheading'] . '" required/><br><br>
            
            <label for="description">Description</label><br>
            <input type="description" name="description" id="description" class="form-control-plaintext edit-input" value="' . $news['description'] . '" required/><br><br>
            
            <label for="content">Content</label><br>
            <textarea name="content" id="content" style="height: 200px" class="form-control-plaintext edit-input">' . $news['content'] . '</textarea><br><br>';
        
            if(isset($_GET['add'])){
                print '
                    <label for="image">Select images:</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple required/><br><br>

                    <!--<label for="title">Image title</label><br>
                    <input type="text" name="image-title" id="image-title" class="form-control-plaintext edit-input" required/><br><br>
        
                    <label for="image-caption">Image caption</label><br>
                    <input type="text" name="image-caption" id="image-caption" class="form-control-plaintext edit-input" required/><br><br>-->
        
                ';
            }
            if (isset($_GET['edit']) && ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor')){
            print'
                <label for="archive">Archive ' . ($news['numOfImages'] == 0 ? '(Cannot be set to visible if the article does not have any images)' : '') . '</label><br>
                <input type="checkbox" name="archive" id="archive" class="edit-input" ' . ($news['archive'] == 1 ? 'checked' : '') . ($news['numOfImages'] == 0 ? ' disabled' : ''). '/><br><br>';
            }
            print'
            <input type="submit" value="Submit" class="btn btn-outline-dark"/>
        </form>
    </div>

    <br>';

    /*Add new images*/
    if (isset($_GET['edit'])){
    print'
    <form method="post" action="" class="edit-form" enctype="multipart/form-data">
        <input type="hidden" name="addImageForm" value="addImageForm">
        <h3><b>Add Image</b></h3><br>
        <div class="form-group">
            <input type="file" name="image" class="form-control" required>
        </div>
        <br>
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" class="form-control-plaintext edit-input"/><br><br>
        
        <label for="caption">Caption</label><br>
        <input type="text" name="caption" id="caption" class="form-control-plaintext edit-input"/><br><br>
        
        <button type="submit" class="btn btn-primary">Upload</button>
    </form><br>';
    }

    /*Edit content of images*/
    if (isset($_GET['edit'])){
    print'
    <div class="row gallery">';
        while ($image = mysqli_fetch_assoc($resultImages)) {
            print '
            <div class="img_news col-md-4 col-lg-3 mb-2">
                <form method="post" action="" class="d-flex flex-column align-items-center">
                <input type="hidden" name="editImageForm" value="editImageForm">
                <input type="hidden" name="id" value="'. $image['id'] .'">
                    <figure>
                        <img src="' . $image['image_url'] . '" alt="' . $image['title'] . '"/>
                        
                        <input type="text" name="title" class="form-control" value="' . $image['title'] . '" placeholder="Enter title"/>
                        <textarea name="caption" class="form-control edit-input" placeholder="Enter caption" rows="3">' . $image['caption'] . '</textarea>
                        
                        <div class="d-flex justify-content-center mt-2">
                            <input type="submit" class="btn btn-primary btn-sm ml-2 image-button" value="Update Caption"/>
                            <a href="admin/delete-image.php?id=' . $image["id"] . '" class="btn btn-danger btn-sm">Delete Image</a>
                        </div>
                    </figure>
                </form>
            </div>
            ';
        }
    print'
    </div>';
    }
    print'
    <br>
    <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'" class="btn btn-outline-light">Back</a></p>';
}

else{
    $sql = 'SELECT * FROM news';
    $result = mysqli_query($conn, $sql);

    print'
    <table class="table">
        <thead>
            <tr>';
                if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor'){
                    print'
                    <th scope="col"></th>
                    <th scope="col"></th>';
                }
                if($_SESSION['user']['role'] == 'admin'){
                    print '<th scope="col"></th>';
                }
                
                print'<th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Publish Date</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_assoc($result)){
            if($row['archive'] == 0 || ($row['archive'] == 1 && ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor'))){
                print '
                <tr>';
                    if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor'){
                        print'
                        <td><a class="mx-2 icon view" href="index.php?menu=8&action=' . $action .'&id=' . $row['id'] . '"><i class="fa fa-search"></i></a></td>
                        <td><a class="mx-2 icon edit" href="index.php?menu=8&action=' . $action .'&edit=' . $row['id'] . '"><i class="fa fa-edit"></i></a></td>';
                    }
                    if($_SESSION['user']['role'] == 'admin'){
                        print '<td><a class="mx-2 icon trash" href="index.php?menu=8&action=' . $action .'&delete=' . $row['id'] . '"><i class="fa fa-trash"></i></a></td>';
                    }
                    print'
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td style="color:' . ($row['archive'] == 0 ?  'green' : 'red') . '"><i class="fa fa-circle"></i></td>
                </tr>
            ';
            }
        }
        print'
        </tbody>
    </table>
    <a href="index.php?menu=8&action=' . $action . '&add=1" class="btn btn-primary btn-sm">Add news</a>
    ';
}
?>