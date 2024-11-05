<?php
    $title = "Da Vincijev kod";
    $link = "https://hr.wikipedia.org/wiki/Da_Vincijev_kod";
?>

<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna.">
        <meta name="keywords" content="Da Vincijev kod, Dan Brown, triler, krimi">
        <title><?php print $title; ?></title>
    </head>
    <body>
        <h1>
            <?php print $title; ?>
        </h1>
        <p>Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna</br>
        <a href="<?php print $link; ?>" target="_blank">
            <?php print $link; ?>
        </a></p>
    </body>
</html>