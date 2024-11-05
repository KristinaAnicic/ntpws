<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>vježba 18</title>

        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 100%;
                padding: 20px;
            }
            .list, .user_edit{
                width: 50%;
                display: inline-block;
            }
            input[type="submit"]{
                padding: 15px;
                background-color: seagreen;
                color: white;
                border: none;
                border-radius: 10px;
                width: 70%;
            }    
            input[type="text"]{
                width: 70%;
                padding: 10px;
                outline: none;
                border: none;
                border-bottom: solid 1px gray;
                font-size: 16px;
                margin:5px;
            }
            #country{
                padding: 10px;
                margin-top:5px;
                width: 70%;
                background-color: lightgray;
                border: 1px solid gray;
                border-radius: 7px;
            }
            .icon{
                width:2%;
                display: inline-block;
            }
        </style>

    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost","root","","ntpws_db2");
        $query = "SELECT u.id, u.firstname, u.lastname, c.name as country 
                    FROM users u
                    JOIN countries c ON c.id = u.country_id";
        $result = mysqli_query($con,$query);
        
        $query = "SELECT id, name FROM countries";
        $countries_result = mysqli_query($con,$query);

        $countries = [];
        while ($country = mysqli_fetch_array($countries_result)) {
            $countries[$country['id']] = $country['name'];
        }

        print'
        <div class="list">
        <h1>Users list</h1>';
        while($row = mysqli_fetch_array($result)){
            echo '<p><i class="fa fa-user" style="color: gray"></i> '. $row['firstname'] . ' ' . $row['lastname'] .' (' . $row['country'] . ') ';
            echo '<a href="index.php?user=' . $row['id'] . '">edit</a>';
        } 
        echo '</div>';

        if(isset($_GET['user'])) { 
            $user_id   = (int)$_GET['user']; 
            $query = "SELECT * FROM users WHERE id = $user_id";
            $user_result = mysqli_query($con,$query);
            $user_data = mysqli_fetch_assoc($user_result);
            print '<div class = "user_edit">
            <h1>Edit User</h1>
            <form method="post" action="">
                <input type="text" name="firstname" required placeholder="First name" value="' . $user_data['firstname'] . '"/>
                <input type="text" name="lastname" required placeholder="Last name" value="' . $user_data['lastname'] . '"/>
                <select name="country" id="country" required>';
                foreach ($countries as $id => $name) {
                    $selected = ($id == $user_data['country_id']) ? 'selected' : '';
                    echo "<option value='$id' $selected>$name</option>";
                }
                print'
                </select>
                </br></br><input type="submit" value="Save"/>
            </form>
            </div>';

            if (isset($_POST['firstname'], $_POST['lastname'], $_POST['country'])){
                $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
                $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
                $country = (int)$_POST['country'];

                $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', country_id = $country WHERE id = $user_id";
                mysqli_query($con, $query);
                header("Location: index.php?user=$user_id");
                exit();
            }
        }

        mysqli_close($con);
        ?>
    </body>
</html>