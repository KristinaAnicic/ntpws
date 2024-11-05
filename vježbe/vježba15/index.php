<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>vježba 15</title>

        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 70%;
            }
            input[type="submit"]{
                padding: 15px;
                background-color: steelblue;
                color: white;
                border: none;
                border-radius: 10px;
            }    
            .unos{
                width: 80%;
                padding: 10px;
                outline: none;
                border: none;
                border-bottom: solid 1px gray;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <?php
            print'
            <h1>Vježba 15</h1><br/>
            <form method="post" action="">
                <label for="name">Input first name or last name: </label><br/>
                <input type="text" name="name" id="name" class="unos"/><br/><br/>
                <input type="submit" value="search"/>
            </form>
            ';

            $con=mysqli_connect("localhost", "root","","ntpws_db");

            if(isset($_POST['name']) && !empty($_POST['name'])){
                $query = "SELECT firstname, lastname FROM users WHERE firstname LIKE '%{$_POST['name']}%' OR lastname LIKE '%{$_POST['name']}%'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)) {
                    echo "<p>".$row['firstname']." ".$row['lastname']."</p>";}
            }
            mysqli_close($con);
        ?>
    </body>
</html>