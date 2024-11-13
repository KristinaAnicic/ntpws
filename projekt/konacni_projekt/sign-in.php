<script>
    const redirectMenu = ' . json_encode($redirectMenu) . ';
    
    function closeModalSuccess() {
        document.getElementById("loginModalSuccess").style.display = "none";
        window.location.href = "index.php?menu=1";
    }
    function closeModalFailed() {
        document.getElementById("loginModalFailed").style.display = "none";
        window.location.href = "index.php?menu=7";
    }

    setTimeout(function() {
        const loginModalSuccess = document.getElementById("loginModalSuccess");
        if (loginModalSuccess) {
            loginModalSuccess.style.display = "none"; 
            window.location.href = "index.php?menu=1";
        }
        const loginModalFailed = document.getElementById("loginModalFailed");
        if (loginModalFailed) {
            loginModalFailed.style.display = "none"; 
            window.location.href = "index.php?menu=7";
        }
    }, 2000); 
</script>

<?php
print'
<div class="d-flex justify-content-center">
    <form method="post" action="" class="contact-form col-lg-4" style="padding: 30px 50px;">
    </br>
        <label for="email">E-mail</label></br>
        <input type="email" name="email" id="email" class="form-control-plaintext contact-input" required/></br>
        <label for="password">Password</label></br>
        <input type="password" name="password" id="password" class="form-control-plaintext contact-input" required/></br></br>
        <div class="d-grid gap-2">
            <input type="submit" value="Submit" class="btn btn-outline-primary"/></br>
        </div>
    </form>
</div>';
    if (isset($_POST['email']) && isset($_POST['password'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT users.*, roles.name role FROM users 
            JOIN roles ON roles.id = users.role_id 
            WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    
        if ($user['active'] == 0){
            $text = 'Login failed.'; 
            $login = "Failed";
            unset($_SESSION['user']);
        }
        else if (password_verify($password, $user['password'])) {
            $text = 'Login successful! Welcome, ' . htmlspecialchars($user["firstname"]);
            $login = "Success";

            $_SESSION['user']['valid'] = 'true';
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['lastname'] = $user['lastname'];
            $_SESSION['user']['role'] = $user['role'];
        
        } else {
            $text = 'Login failed.'; 
            $login = "Failed";
            unset($_SESSION['user']);
        }

        echo '
        <!-- Modal for already registered email -->
        <div class="modal" id="loginModal' . $login . '" tabindex="-1" role="dialog" style="display:block; color:black">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <button type="button" style="position: absolute; top: 10px; right: 10px;" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="closeModal'. $login .'()"></button>
                    </br></br>
                    <div class="modal-body">
                        <h5 class="modal-title">' . $text . '</h5></br>
                    </div>
                </div>
            </div>
        </div>';   
    }
?>