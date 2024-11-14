<?php
    $sql_article = "SELECT * FROM news WHERE id = " . $action . " LIMIT 1";
    $article_result = mysqli_query($conn, $sql_article);
    $article = mysqli_fetch_assoc($article_result);

    $sql_article_images = "SELECT * FROM news_images WHERE news_id = " . $action;
    $article_images_result = mysqli_query($conn, $sql_article_images);

    print '
    <div class="container article">
        <h2>' . $article['title'] . '</h2>
        <h4>' . $article['subheading'] . '</h4>
        <br>
        <div class="row">';
            while ($image = mysqli_fetch_assoc($article_images_result)) {
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
        <br>
        <div style="clear:both;"></div>
        <div style="white-space: pre-wrap;">'; echo htmlspecialchars($article['content']); print'</div>
        <br>
        <time datetime="' . $article['date'] . '">' . date("d F Y", strtotime($article['date'])) . '</time>
        <hr>
        <a href="index.php?menu='.$menu.'">Back</a>
    
    </div>';
?>