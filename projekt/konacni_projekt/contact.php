<?php
    $query = "SELECT id, name FROM countries";
    $countries_result = mysqli_query($conn,$query);

    print'
    <!--<h1>Contact Form</h1>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.017721822781!2d16.038958512220315!3d45.81090347096107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4766790020667469%3A0xa9a20d6e234405b1!2sTehni%C4%8Dko%20veleu%C4%8Dili%C5%A1te%20u%20Zagrebu%20(TVZ)%20-%20INRO!5e0!3m2!1shr!2shr!4v1731029495647!5m2!1shr!2shr" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <br><br>
    <div class="container">
        <form method="post" action="" class="contact-form col-lg-8">
            <label for="firstName">First Name *</label><br>
            <input type="text" name="firstName" id="firstName" class="form-control-plaintext contact-input" required/><br>
            <label for="lastName">Last Name *</label><br>
            <input type="text" name="lastName" id="lastName" class="form-control-plaintext contact-input" required/><br>
            <label for="email">Your E-mail *</label><br>
            <input type="email" name="email" id="email" class="form-control-plaintext contact-input" required/><br>
            <label for="country">Countries *</label><br>
            <select name="country" id="country" class="form-control-plaintext contact-input" required>
                <option value="" disabled selected>Please select</option>';
                while($row = mysqli_fetch_array($countries_result)) {
                    echo "<option value='".$row['id']."' class='contact-option'>" . $row['name'] ."</option>";
                }
                print'
            </select>
            <br>
            <label for="subject">Subject *</label><br>
            <textarea name="subject" id="subject" style="height: 200px" class="form-control-plaintext contact-input"></textarea>
            <br><input type="submit" value="Submit" class="btn btn-outline-primary"/>
        </form>
    </div>';
?>