<?php
print'
    <div class="news container">
    <!--<h1>NEWS</h1></br>-->';
    if (!isset($article)) {
		print '
        <a href="index.php?menu=' . $menu . '&article=1">
            <div class="row news-row">
                <div class="col-lg-4 image">
                    <img src="img/news/news-article-1.jpg" alt="RPG-game" title="RPG-game"/>
                </div>
                <div class="col-lg-8 text">
                    <h2>The Evolution of RPGs: From Classic Adventures to Open Worlds</h2>
                    <p>RPGs have evolved from simple text-based adventures to sprawling, immersive worlds. Let’s explore the journey and see where this beloved genre is headed.</p>
                    <time datetime="2024-11-01">01 September 2024</time>
                </div>
            </div>
        </a>
        <a href="index.php?menu=' . $menu . '&article=2">
            <div class="row news-row">
                <div class="col-lg-4 image">
                    <img src="img/news/news-article-3.jpg" alt="Indie games" title="Indie games"/>
                </div>
                <div class="col-lg-8 text">
                    <h2>Top Indie Games of 2024: Hidden Gems Worth Playing</h2>
                    <p>Indie games are thriving, offering unique stories and gameplay experiences. Check out some of the best indie titles of the year that you may have missed.</p>
                    <time datetime="2024-10-15">15 October 2024</time>
                </div>
            </div>
        </a>

        <a href="index.php?menu=' . $menu . '&article=3">
            <div class="row news-row">
                <div class="col-lg-4 image">
                    <img src="img/news/news-article-2.jpg" alt="Esports" title="Esports"/>
                </div>
                <div class="col-lg-8 text">
                    <h2>Esports in 2024: The Rise of New Contenders</h2>
                    <p>Esports continues to grow, with new games, tournaments, and talent emerging each year. Here’s what’s changing in the world of competitive gaming.</p>
                    <time datetime="2024-10-28">28 October 2024</time>
                </div>
            </div>
        </a>
        
        <a href="index.php?menu=' . $menu . '&article=4">
            <div class="row news-row">
                <div class="col-lg-4 image">
                    <img src="img/news/news-article-4.jpg" alt="Ray tracing" title="Ray tracing"/>
                </div>
                <div class="col-lg-8 text">
                    <h2>The Future of Gaming Graphics: Ray Tracing and Beyond</h2>
                    <p>With the advancement of graphics technology, modern games look more realistic than ever. Here’s how ray tracing and other technologies are shaping the future of gaming visuals.</p>
                    <time datetime="2024-11-03">03 September 2024</time>
                </div>
            </div>
        </a>
        
        <a href="index.php?menu=' . $menu . '&article=5">
            <div class="row news-row">
                <div class="col-lg-4 image">
                    <img src="img/news/news-article-5.jpg" alt="Mobile Gaming" title="Mobile Gaming"/>
                </div>
                <div class="col-lg-8 text">
                    <h2>Mobile Gaming Revolution: How Smartphones Became Gaming Consoles</h2>
                    <p>Mobile gaming has come a long way from casual games to full-fledged experiences. Here’s how smartphones are reshaping the gaming landscape.</p>
                    <time datetime="2024-10-22">22 October 2024</time>
                </div>
            </div>
        </a>';
    }
    else{
        include("articles.php");
    }

    print '</div>';
?>