<?php
print'
    <div class="news container">
    <!--<h1>NEWS</h1></br>-->';
    if (!isset($action)) {
        $sql = 'SELECT * FROM news';
        $result = mysqli_query($conn, $sql);

        while ($news = mysqli_fetch_assoc($result)){
            if($news['archive'] == 0){
                $image_sql = "SELECT * FROM news_images WHERE news_id = " . $news['id'] . " LIMIT 1";
                $image_result = mysqli_query($conn, $image_sql);
                $image = mysqli_fetch_assoc($image_result);

                print '
                <a href="index.php?menu=' . $menu . '&action=' . $news['id'] . '">
                    <div class="row news-row">
                        <div class="col-lg-4 image">
                            <img src="' . $image['image_url'] . '" alt="' . $image['title'] . '"/>
                        </div>
                        <div class="col-lg-8 text">
                            <h2>' . $news['title'] . '</h2>
                            <p>' . $news['description'] . '</p>
                            <time datetime="' . $news['date'] . '">' . date("d F Y", strtotime($news['date'])) . '</time>
                        </div>
                    </div>
                </a>';
            }
        }
    }
    else{
        include("articles.php");
    }

    print '</div>';
?>