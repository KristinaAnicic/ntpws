<?php
    $sql = 'SELECT news_images.*, IFNULL(news.archive, 0) AS dontShowImage 
        FROM news_images
        LEFT JOIN news ON news.id = news_images.news_id';
    $result = mysqli_query($conn, $sql);

    print '
    <div class="container gallery">
        <!--<h2>List of Popular Games</h2><br>-->
        <div class="row">';
        while($row = mysqli_fetch_assoc($result)) {
            if($row['dontShowImage'] == 0){
                print "
                <div class='col-md-6 col-lg-4'>
                    <figure>
                        <img src='{$row["image_url"]}' alt='{$row["title"]}' data-bs-toggle='modal' data-bs-target='#imageModal{$row['id']}'/>
                        <figcaption><b>{$row["title"]}</b><br><br>{$row["caption"]}</figcaption>
                    </figure>
                </div>
                
                
                <!-- Modal -->
                <div class='modal fade' id='imageModal{$row['id']}' tabindex='-1' role='dialog'>
                    <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                            <img src='{$row['image_url']}' class='img-fluid' alt='Image'>
                        </div>
                    </div>
                </div>";
            }
        }
        print 
        '</div>
    </div>';
?>
