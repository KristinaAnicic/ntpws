<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>vježba 16</title>

        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0 auto;
                margin-top: 40px;
                width: 40%;
            }
            input[type="submit"]{
                padding: 15px;
                background-color: seagreen;
                color: white;
                border: none;
                border-radius: 10px;
                width: 100%;
            }    
            input[type="text"], input[type="password"]{
                width: 100%;
                padding: 10px;
                outline: none;
                border: none;
                border-bottom: solid 1px gray;
                font-size: 16px;
            }
            #country{
                padding: 10px;
                margin-top:5px;
                width: 100%;
                background-color: lightgray;
                border: 1px solid gray;
                border-radius: 7px;
            }
        </style>

    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost","root","","ntpws_db2");
        $query = "SELECT id, name FROM countries";
        $countries_result = mysqli_query($con,$query);

        print'
        <h1>Registration Form</h1>
        <form method="post" action="">
            <label for="firstName">First Name *</label></br>
            <input type="text" name="firstName" id="firstName" required/></br></br>
            <label for="lastName">Last Name *</label></br>
            <input type="text" name="lastName" id="lastName" required/></br></br>
            <label for="email">Your E-mail *</label></br>
            <input type="text" name="email" id="email" required/></br></br>
            <label for="username">Username *</label></br>
            <input type="text" name="username" id="username" required minlength="5" maxlength="10"/></br></br>
            <label for="password">Password *</label></br>
            <input type="password" name="password" id="password" required minlength="4"/></br></br>
            <label for="country">Country *</label></br>
            <select name="country" id="country" required>
                <option value="" disabled selected>molimo odaberite</option>';
            while($row = mysqli_fetch_array($countries_result)) {
                echo "<option value='".$row['id']."'>" . $row['name'] ."</option>";
            }
            print'
            </select>
            </br></br><input type="submit" value="Submit"/>
        </form>';

            if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && 
            isset($_POST['username']) && isset($_POST['password']) && isset($_POST['country'])){
                $query = "INSERT INTO users (firstname, lastname, email, username, password, country_id) 
                VALUES ('" . mysqli_real_escape_string($con, $_POST['firstName']) . "', 
                        '" . mysqli_real_escape_string($con, $_POST['lastName']) . "', 
                        '" . mysqli_real_escape_string($con, $_POST['email']) . "', 
                        '" . mysqli_real_escape_string($con, $_POST['username']) . "', 
                        '" . mysqli_real_escape_string($con, $_POST['password']) . "', 
                        '" . mysqli_real_escape_string($con, $_POST['country']) . "')";
                mysqli_query($con, $query);
            }
            mysqli_close($con);
        ?>
    </body>
</html>