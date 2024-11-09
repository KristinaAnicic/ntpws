<?php
    $games = [
        ["Astrobot", "astrobot.jpg", "Astro Bot's story is a simple one. A UFO crashes into a PS5 carrying more than 300 bots, and our protagonist Astro Bot is the only one left unscathed."],
        ["Baldurs Gate 3", "baldurs-gate-3.jpg", "Baldur’s Gate 3 is a story-rich, party-based RPG set in the universe of Dungeons & Dragons, where your choices shape a tale of fellowship and betrayal, survival and sacrifice, and the lure of absolute power."],
        ["Black Myth: Wukong", "black-myth-wukong.png", "Black Myth: Wukong is an action RPG rooted in Chinese mythology. You shall set out as the Destined One to venture into the challenges and marvels ahead, to uncover the obscured truth beneath the veil of a glorious legend from the past."],
        ["Destiny 2", "destiny-2.jpg", "Destiny 2 is an action MMO with a single evolving world that you and your friends can join anytime, anywhere."],
        ["Elden Ring", "elden-ring.jpg", "THE CRITICALLY ACCLAIMED FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between."],
        ["The Legend of Zelda: Tears of the Kingdom", "Tears-of-the-Kingdom.jpg", "Explore the vast land—and skies—of Hyrule. An epic adventure awaits in the Legend of Zelda: Tears of the Kingdom game, only on the Nintendo Switch system."],
        ["Minecraft", "minecraft.jpg", "Dive into an open world of building, crafting, and survival. Gather resources, survive the night, and build whatever you can imagine one block at a time."],
        ["Party Animals", "party-animals.jpg", "Fight your friends as puppies, kittens, and other fuzzy creatures in PARTY ANIMALS! Paw it out with your friends remotely, or huddle together for chaotic fun on the same screen."],
        ["Valorant", "valorant.jpg", "Riot Games presents VALORANT: a 5v5 character-based tactical FPS where precise gunplay meets unique agent abilities."],
        ["Marvel's Spider-Man 2", "spider-man-2.jpg", "Be Greater. Together. The incredible power of the symbiote forces Peter Parker and Miles Morales into a desperate fight as they balance their lives, friendships, and their duty to protect."],
        ["Neva", "neva.jpg", "Neva is an emotionally-charged action adventure from the visionary team behind the critically acclaimed GRIS."]
    ];

    print '
    <div class="container gallery">
        <h2>Games</h2></br>
        <div class="row">';
        foreach ($games as $game) {
            print "
                <div class='col-md-6 col-lg-4'>
                    <figure>
                        <a href='img/games/{$game[1]}' target='_blank'><img src='img/games/{$game[1]}' alt='{$game[0]}'/></a>
                        <figcaption><b>{$game[0]}</b></br></br>{$game[2]}</figcaption>
                    </figure>
                </div>";
        }
        print 
        '</div>
    </div>';
?>
