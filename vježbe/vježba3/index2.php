<!-- DRUGI NACIN-->

<?php
    $title = "Da Vincijev kod";
    $link = "https://hr.wikipedia.org/wiki/Da_Vincijev_kod";

    print '
    <!DOCTYPE HTML>
    <html lang="hr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna.">
            <meta name="keywords" content="Da Vincijev kod, Dan Brown, triler, krimi">';
            echo '<title>'. $title . '</title>';
        print '
        </head>
        <body>';
            echo '<h1>'. $title . '</h1>';
            echo '<p>Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna</p>';
            echo '<a href="' . $link . '" target="_blank">'. $link .'</a>';
        print 
        '</body>
    </html>'
?>