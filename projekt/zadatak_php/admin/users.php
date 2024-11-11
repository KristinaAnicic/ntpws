<?php
if(isset($_GET['id']) && $_GET['id'] != ''){
    $sql = 'SELECT users.*, roles.name role, countries.name country
            FROM users
            JOIN roles ON users.role_id = roles.id
            JOIN countries ON users.country_id = countries.id
            WHERE users.id = ' . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result);

    print'
    </br>
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
    ';
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

    print'
    <h2>Edit User</h2>
    <form action="" method="post"/>
        
    </form>
    ';


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

?>