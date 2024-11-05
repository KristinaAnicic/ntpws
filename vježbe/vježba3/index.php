<?php
    $title = "Da Vincijev kod";
    $link = "https://hr.wikipedia.org/wiki/Da_Vincijev_kod";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna.">
        <meta name="keywords" content="Da Vincijev kod, Dan Brown, triler, krimi">
        <?php echo '<title>' . $title . '</title>'; ?>
    </head>
    <body>
        <?php echo '<h1>' . $title . '</h1>'; ?>
        <p>Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna</br>
        <?php echo '<a href="' . $link . '" target="_blank">' . $link . '</a></p>'; ?>
    </body>
</html>