<?php
if ($_SESSION['user']['role'] == 'admin') {
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $sql = 'SELECT users.*, roles.name role, countries.name country
                FROM users
                JOIN roles ON users.role_id = roles.id
                JOIN countries ON users.country_id = countries.id
                WHERE users.id = ' . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        print'
        <br>
        <h2>User Info</h2>
        <p><b>First Name: </b>' . $user['firstname'] . '</p>
        <p><b>Last Name: </b>' . $user['lastname'] . '</p>
        <p><b>Username: </b>' . $user['username'] . '</p>
        <p><b>E-mail: </b>' . $user['email'] . '</p>
        <p><b>Country: </b>' . $user['country'] . '</p>
        <p><b>City: </b>' . $user['city'] . '</p>
        <p><b>Address: </b>' . $user['address'] . '</p>
        <p><b>Birth Date: </b>' . $user['date_of_birth'] . '</p>
        <p><b>Role: </b>' . $user['role'] . '</p>

        <br><p><a href="index.php?menu='.$menu.'&amp;action='.$action.'" class="btn btn-outline-light">Back</a></p>';
    }

    else if(isset($_GET['delete']) && $_GET['delete'] != ''){
        $sql = 'DELETE FROM users WHERE id = ' . (int)$_GET['delete'] . ' LIMIT 1';
        $result = mysqli_query($conn, $sql);
        header("Location: index.php?menu=8&action=1");
    }

    else if(isset($_GET['edit'])){
        $sql = 'SELECT users.*, roles.name role, countries.name country
                FROM users
                JOIN roles ON users.role_id = roles.id
                JOIN countries ON users.country_id = countries.id
                WHERE users.id = ' . $_GET['edit'];
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        $sqlRoles = 'SELECT id, name FROM roles';
        $resultRoles = mysqli_query($conn, $sqlRoles);

        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && 
        isset($_POST['username']) && isset($_POST['role'])){
            $active = isset($_POST['active']) ? 1 : 0;
            $sqlUpdate = "UPDATE users SET 
                        firstName = '{$_POST['firstName']}',
                        lastName = '{$_POST['lastName']}',
                        email = '{$_POST['email']}',
                        username = '{$_POST['username']}',
                        role_id = '{$_POST['role']}',
                        active = '$active'
                        WHERE id = {$user['id']}";
            if (mysqli_query($conn, $sqlUpdate)){
                header('Location: index.php?menu=8&action=1&edit=' . $user['id']);
            }
        }

        print' 
        <div class="d-flex">
            <form method="post" action="" class="edit-form col-lg-5">
                <h2><b>Edit User</b></h2><br><br>
                <label for="firstName">First Name</label><br>
                <input type="text" name="firstName" id="firstName" class="form-control-plaintext edit-input" value="' . $user['firstname'] . '" required/><br><br>
                
                <label for="lastName">Last Name</label><br>
                <input type="text" name="lastName" id="lastName" class="form-control-plaintext edit-input" value="' . $user['lastname'] . '" required/><br><br>
                
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control-plaintext edit-input" value="' . $user['email'] . '" required/><br><br>
                
                <label for="username">Username</label><br>
                <input type="username" name="username" id="username" class="form-control-plaintext edit-input" value="' . $user['username'] . '" required/><br><br>
                
                <label for="role">Role</label><br>
                <select name="role" id="role" class="form-control-plaintext edit-input" required>';
                while($row = mysqli_fetch_array($resultRoles)) {
                    echo "<option value='" . $row['id']."' class='edit-option' " . ($row['id'] == $user['role_id'] ? 'selected' : '') . ">" . $row['name'] . "</option>";
                }
                print'
                </select>
                <br><br><label for="active">Active</label><br>
                <input type="checkbox" name="active" id="active" class="edit-input" ' . ($user['active'] == 1 ? 'checked' : '') . '/><br><br>
                <input type="submit" value="Submit" class="btn btn-outline-dark"/>
            </form>
        </div>
        
        <br>
        <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'" class="btn btn-outline-light">Back</a></p>';
    }



    else{
        $sql = 'SELECT users.*, roles.name role
        FROM users
        JOIN roles ON users.role_id = roles.id';

        $result = mysqli_query($conn, $sql);

        print'
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Role</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                print '
                <tr>
                    <td><a class="mx-2 icon view" href="index.php?menu=8&action=' . $action .'&id=' . $row['id'] . '"><i class="fa fa-user"></i></a></td>
                    <td><a class="mx-2 icon edit" href="index.php?menu=8&action=' . $action .'&edit=' . $row['id'] . '"><i class="fa fa-edit"></i></a></td>
                    <td><a class="mx-2 icon trash" href="index.php?menu=8&action=' . $action .'&delete=' . $row['id'] . '"><i class="fa fa-trash"></i></a></td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['role'] . '</td>
                    <td style="color:' . ($row['active'] == 1 ?  'green' : 'red') . '"><i class="fa fa-circle"></i></td>
                </tr>
            ';
            }
            print'
            </tbody>
        </table>
        ';
    }
}
else{
    print'
    <br>
    <p>You cannot view this page because you do not have administrative privileges.</p>';
}

?>