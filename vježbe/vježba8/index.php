<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 8</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 80%;
            }
            input[type="submit"]{
                padding: 15px;
                background-color: steelblue;
                color: white;
                border: none;
                border-radius: 10px;
            }    
        </style>
    </head>

    <body>
        <?php
            echo '<p>Označi vozilo</p>
            <form method="POST" action="">
            <ul>';

            $cars = array("Audi","BMW","Ranult","Citroen");
            foreach($cars as $car){
                echo '<input type="radio" name="car" value=' . $car . '>' . $car . '</br>';
            }

            print '</ul></br><input type="submit" value="POŠALJI"/>';
            echo '</form></br>';

            if(isset($_POST['car'])){
                echo $_POST['car'];
            }
        ?>
    </body>
</html>
