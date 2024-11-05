<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 5</title>
    </head>
    <body>
        <?php
        $random_num = rand(1,10);
        $number = "";
        if(isset($_POST['num'])){
            $number = $_POST['num'];
        }

        print '
        <p>Igra (pogodi broj)</p>
        <form method="post" action="">
            <label for="number"><b>Upiši jedan broj od 1 do 10*</b></label>
            <input type="number" name="num" id="number" min="1" max="10" value="' . $number . '"></br></br>
        </form>';
        
        if(isset($_POST['num'])){
            echo '<div style="display: inline-block; margin:0">';
            if($number == $random_num){
                echo '<p style="background-color: green; padding: 10px 20px; color:white; margin:0"">Pogodak';
            }
            else if($number != $random_num){
                echo '<p style="background-color: red; padding: 10px 20px; color:white; margin:0"">Krivo';
            }
            echo ', probaj ponovno!</p></div>';

            echo '<p>Zamišljeni broj je ' . $random_num;
        }
        ?>
    </body>
</html>