<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Image</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <style>
            body{
                padding: 50px;
            }
        </style>
    </head>
    <body>
        <?php
        print'
            <div class="container">
                <h2>Upload Image</h2>
                <form method="post" action="upload.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>';
            
            include('db.php');

            $limit = 10;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $limit;

            $sql = "SELECT * FROM images LIMIT $start, $limit";
            $result = mysqli_query($con, $sql);

            $sqlTotal = "SELECT COUNT(*) AS count FROM images";
            $totalResult = mysqli_query($con, $sqlTotal);

            if ($totalResult) {
                $total = mysqli_fetch_assoc($totalResult)['count'];
                $pages = ceil($total / $limit);
            }

            print '
            <div class="container mt-5">
                <h2>Images</h2>
                <div class="row">';
                while ($row = mysqli_fetch_array($result)) {
                    print "
                        <div class='col-md-4 col-lg-3'>
                            <div class='card mb-3'>
                                <img src='{$row['filepath']}' alt='Image' id='openModal' 
                                data-bs-toggle='modal' data-bs-target='#imageModal{$row['id']}'/>
                                <div class='card-body text-center'>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </div>
                            </div>
                        </div>
                
                        <!-- Modal -->
                        <div class='modal fade' id='imageModal{$row['id']}' tabindex='-1' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-body'>
                                        <img src='{$row['filepath']}' class='img-fluid' alt='Image'>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
                print '
                </div>

                <ul class="pagination justify-content-center">';
                    for ($i = 1; $i <= $pages; $i++){
                        print "<li class='page-item" . ($i == $page ? ' active' : '') . "'>
                                    <a class='page-link' href='index.php?page=$i'>$i</a>
                                </li>";
                    }
                print '
                </ul>
        
            </div>
            ';
            mysqli_close($con);
        ?>
    </body>
</html>
