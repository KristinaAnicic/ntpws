<?php
    $baseUri = "https://api.rawg.io/api/games";
    $apiKey = "a6fd8a3febcc48a6b150b2e6f44f8a4d";

    $reqPrefs['http']['method'] = 'GET';
    $stream_context = stream_context_create($reqPrefs);

    if(isset($_GET['slug']) == false){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        if(isset($_POST['search']) || isset($_GET['search'])){
            $search = isset($_POST['search']) ? $_POST['search'] : $_GET['search'];
            $page = 1;
            $uri = $baseUri . "?search={$search}&page=". $page ."&key=" . $apiKey;
        }
        else{
            $uri = $baseUri . "?ordering=-added&page=". $page ."&key=" . $apiKey;
        }
        $response = file_get_contents($uri, false, $stream_context);
        $data = json_decode($response);
        $totalPages = ceil($data->count/20);

        print'
        <div class="d-flex justify-content-center align-items-center">
            <form action="" method="post" class="form-inline d-flex">
                <input class="form-control me-2 col-lg-8" type="search" placeholder="Search" value="' . (isset($search) ? $search : "") .'" aria-label="Search" name="search">
                <input type="submit" class="btn btn-outline-info" value="Search"/>
                <a href="index.php?menu=10" class="btn btn-outline-warning" style="margin-left:2px">Reset</a>
            </form>
        </div>
        ';

        /*SHOW LIST OF GAMES*/
        print '
        <div class="container mt-5 games-list">
            <div class="row">';
            if (isset($data->results)) {
                foreach ($data->results as $game){
                    print "
                    <div class='col-md-4 col-lg-3'>
                        <a href='index.php?menu=10&page={$page}&slug=" . $game->slug . (isset($_POST['search']) ? '&search='.$_POST['search'] : '') ."'>
                        <div class='card text-white mb-3 games-list-card'>
                            <img src='{$game->background_image}' alt='Image' id='openModal' 
                            data-bs-toggle='modal' data-bs-target='#imageModal{$game->id}'/>
                            <div class='card-body text-center'>
                                <p> $game->name <br>Rating: $game->rating</p>
                                <time datetime='$game->released'>Released: " . date('d F Y', strtotime($game->released)) . "</time>
                            </div>
                        </div>
                        </a>
                    </div>";
                }
            }

            print'
            <ul class="pagination justify-content-center">';
                if($page > 1)
                    print '<li class="page-item"><a class="page-link" href="index.php?menu=10&page=' . ($page - 1) . '">Previous</a></li>';
                
                $start = max(1, $page - 3);
                $end = min($totalPages, $page + 3);
                for ($i = $start; $i <= $end; $i++) {
                    echo '<li class="page-item ' . (($i == $page) ? 'active' : '') . '">
                            <a class="page-link" href="index.php?menu=10&page=' . $i . '">' . $i . '</a>
                        </li>';
                }
                if ($page < $totalPages) {
                    print '<li class="page-item"><a class="page-link" href="index.php?menu=10&page=' . ($page + 1) . '">Next</a></li>';
                }
            print'
            </ul>
        </div>';
    }
    else{
        $slug = $_GET['slug'];
        $uri = $baseUri . "/" . $slug ."?key=" . $apiKey;
        $response = file_get_contents($uri, false, $stream_context);
        $game = json_decode($response);

        $uriScreenshots = $baseUri . "/" . $slug ."/screenshots?key=" . $apiKey;
        $responseScreenshots = file_get_contents($uriScreenshots, false, $stream_context);
        $gameScreenshots = json_decode($responseScreenshots);
        print"
        <h2><b>{$game->name}</b></h2>
        <div class='col-md-12 col-lg-7 col-xl-5'>
            <figure style='margin: 0 2em 1em 0em; padding-bottom:0'>
                <img src='$game->background_image' alt='' class='gameImg' />
            </figure>
        </div>
        <div class='col-md-12 game-info'>   
            <p><b>Rating:</b> $game->rating</p>
            <p><b>Released:</b> " . date('d F Y', strtotime($game->released)) . "</p>
            
            <p><b>Genres:</b> ";
            $genres = array_map(function($genre) {return $genre->name;}, $game->genres); 
            echo implode(", ", $genres);
            echo "
            </p>
            
            <p><b>Platforms:</b> ";
            $platforms = array_map(function($platform) {return $platform->platform->name;}, $game->platforms); 
            echo implode(", ", $platforms);
            echo "
            </p>
            
            <p><b>Stores:</b> ";
            $stores = array_map(function($store) {return $store->store->name;}, $game->stores);
            echo implode(", ", $stores);
            echo"
            </p>

            <p><b>Developers:</b> ";
            $developers = array_map(function($developer) {return $developer->name;}, $game->developers);
            echo implode(", ", $developers);
            echo"
            </p>
            
            <p><b>Tags:</b> ";
            $tags = array_map(function($tag) {return $tag->name;}, $game->tags);
            echo implode(", ", $tags);
            echo "
            </p>
            
            <div style='clear: both;'></div>
            
            <p><b>Description: </b> $game->description</p>
            
            <br><p><b>Screenshots:</b></p>
            <div class='row'>";
            if (isset($gameScreenshots->results)) {
                foreach ($gameScreenshots->results as $screenshot){
                    print"
                    <div class='col-md-6 col-lg-4'>
                    <figure style='padding-bottom:0'>
                        <img src='{$screenshot->image}' alt=''/>
                    </figure>
                    </div>";
                }
            }

            echo "
            </div>
            <br><p><a href='index.php?menu={$menu}&page={$_GET['page']}" . (isset($_GET['search']) ? '&search='.$_GET['search'] :''). "' class='btn btn-outline-light'>Back</a></p>
        </div>
        ";

    }

?>