<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>vježba 17</title>

        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 40%;
            }
        </style>

    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost","root","","ntpws_db2");
        $query = "SELECT u.firstname, u.lastname, c.name as country 
                    FROM users u
                    JOIN countries c ON c.id = u.country_id";
        $result = mysqli_query($con,$query);

        print'
        <h1>Users list</h1>
        ';
        while($row = mysqli_fetch_array($result)){
            echo '<p><i class="fa fa-user" style="color: gray"></i> '. $row['firstname'] . ' ' . $row['lastname'] .' (' . $row['country'] . ')';
        }    
        mysqli_close($con);
        ?>
    </body>
</html>