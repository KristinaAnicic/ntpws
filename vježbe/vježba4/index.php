<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 4</title>
    </head>
    <body>
        <?php
            print '
            <form method="POST" action="">
                <label for="a">Vrijednost a: </label>
                <input type="number" name="vrijednost_a" id="a"></br></br>
                <label for="b">Vrijednost b: </label>
                <input type="number" name="vrijednost_b" id="b"></br></br>

                <input type="submit" value="Pošalji" />	
            </form>';

            if(isset($_POST['vrijednost_a']) && isset($_POST['vrijednost_b'])){
                echo '</br>Vrijednost a: ' . $_POST['vrijednost_a'] . '</br>';
                echo 'Vrijednost b: ' . $_POST['vrijednost_b'] . '</br>';
                echo 'Vrijednost c = (3*' . $_POST['vrijednost_a'] . '-' . $_POST['vrijednost_b'] . ')/2 = ' . 
                    (3*$_POST['vrijednost_a'] - $_POST['vrijednost_b'])/2;
            }
        ?>
    </body>
</html>
