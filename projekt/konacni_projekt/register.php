<script>
    // Funkcija za zatvaranje modala
    function closeModal() {
        document.getElementById("successModal").style.display = "none";
        window.location.href = "index.php?menu=7";
    }

    function closeEmailModal() {
        document.getElementById("emailModal").style.display = "none";
        window.location.href = "index.php?menu=6";
    }

    setTimeout(function() {
        const emailModal = document.getElementById("emailModal");
        if (emailModal) {
            emailModal.style.display = "none"; 
        }
        const sucecssModal = document.getElementById("successModal");
        if (sucecssModal) {
            sucecssModal.style.display = "none"; 
            window.location.href = "index.php?menu=7";
        }
    }, 3000); 
</script>

<?php
$query = "SELECT id, name FROM countries";
$countries_result = mysqli_query($conn,$query);

function generateUsername($firstName, $lastName, $conn) {
    $baseUsername = strtolower(substr($firstName, 0, 1) . $lastName);
    $username = $baseUsername;
    $i = 1;
    
    while (true) {
        $query = "SELECT id FROM users WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 0) {
            break;
        }
        
        $username = $baseUsername . $i;
        $i++;
    }
    return $username;
}

function isEmailRegistered($email, $conn) {
    $query = "SELECT email FROM users WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        return false; 
    } else {
        return true;
    }
}

print'
<div class="d-flex justify-content-center">
<form method="post" action="" class="contact-form col-lg-8">
    <label for="firstName">First Name *</label><br>
    <input type="text" name="firstName" id="firstName" class="form-control-plaintext contact-input" required/><br><br>
    
    <label for="lastName">Last Name *</label><br>
    <input type="text" name="lastName" id="lastName" class="form-control-plaintext contact-input" required/><br><br>
    
    <label for="email">E-mail *</label><br>
    <input type="email" name="email" id="email" class="form-control-plaintext contact-input" required/><br><br>
    
    <label for="password">Password  - (If left blank, it will be generated automatically)</label><br>
    <!--<label>
        <input type="checkbox" name="generateUsername">
        Generate Password Automatically
    </label><br><br>-->
    <input type="password" name="password" id="password" class="form-control-plaintext contact-input" minlength="8"/><br><br>
    
    <label for="country">Country *</label><br>
    <select name="country" id="country" class="form-control-plaintext contact-input" required>
        <option value="" disabled selected>Please select</option>';
    while($row = mysqli_fetch_array($countries_result)) {
        echo "<option value='".$row['id']."' class='contact-option'>" . $row['name'] ."</option>";
    }
    print'
    </select>
    <br><br><label for="city">City *</label><br>
    <input type="text" name="city" id="city" class="form-control-plaintext contact-input" required/><br><br>
    <label for="address">Address *</label><br>
    <input type="text" name="address" id="address" class="form-control-plaintext contact-input" required/><br><br>
    <label for="birth_date">Date of birth *</label><br>
    <input type="date" name="birth_date" id="birth_date" class="form-control-plaintext contact-input" required/><br><br>
    <input type="submit" value="Submit" class="btn btn-outline-primary"/>
</form>
</div>';


    if(isset($_POST['firstName']) && isset($_POST['lastName']) &&
    isset($_POST['email']) && isset($_POST['country']) && isset($_POST['city']) && 
    isset($_POST['address']) && isset($_POST['birth_date'])){

        if(isEmailRegistered($_POST['email'], $conn)){
            echo '
            <!-- Modal for already registered email -->
            <div class="modal" id="emailModal" tabindex="-1" role="dialog" style="display:block; color:black">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>Email is already registered!</p>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="closeEmailModal()"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title" style="color:red">Error: Email already exists!</h5>
                        </div>
                    </div>
                </div>
            </div>';    
            exit;
        }

        $username = generateUsername($_POST['firstName'], $_POST['lastName'], $conn);

        if(empty($_POST['password'])){
            $password = bin2hex(random_bytes(8));
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        }
        else{
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        }

        $query = "INSERT INTO users (firstname, lastname, username, email, password, country_id, city, address, date_of_birth) 
        VALUES ('" . mysqli_real_escape_string($conn, $_POST['firstName']) . "', 
                '" . mysqli_real_escape_string($conn, $_POST['lastName']) . "', 
                '" . mysqli_real_escape_string($conn, $username) . "',
                '" . mysqli_real_escape_string($conn, $_POST['email']) . "', 
                '" . $hashed_password . "', 
                '" . mysqli_real_escape_string($conn, $_POST['country']) . "',
                '" . mysqli_real_escape_string($conn, $_POST['city']) . "', 
                '" . mysqli_real_escape_string($conn, $_POST['address']) . "', 
                '" . mysqli_real_escape_string($conn, $_POST['birth_date']) . "' 
                )";
        if (mysqli_query($conn, $query)) {
            $registrationSuccess = true;
        } else {
            $registrationSuccess = false;
        }
    }

    if (isset($registrationSuccess) && $registrationSuccess) {
        $_POST = array();
        echo '
        <!-- Modal -->
        <div class="modal" id="successModal" tabindex="-1" role="dialog" style="display:block; color:black">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>You have successfully registered!</p>';
                        echo '
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" style="color:green">Registration Successful!</h5><br>
                        <p><strong>Your Username:</strong> ' . $username . '</p>';
                        if (empty($_POST['password'])) {
                            echo '<p><strong>Your Password:</strong> ' . $password . '</p>';
                        } else {
                            echo '<p><strong>Your Password:</strong> **** (you have set your own password)</p>';
                        }
                    echo'
                    </div>
                </div>
            </div>
        </div>';
    }
?>