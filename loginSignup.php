<?php

include_once 'header.php';
?>

<div class="formSection">
    <div class="loginSection">
        <h1>Log in Your Account</h1>
        <form action="includes/login.inc.php" method="post">
            <input type="email" name="email" id="email" placeholder="Enter email address"><br>
            <input type="password" name="password" id="password" placeholder="Enter Password"><br>
            <input type="submit" name="submit" id="logIn">
        </form>
    </div>

    <div class="registerSection">
        <h1>Register an Account</h1>
        <form action="includes/signUp.inc.php" method="post" onsubmit="return regJS();">
            <input type="email" name="email" id="email" placeholder="Email address"><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="password" name="passwordAgain" id="passwordAgain" placeholder="Enter Password again">
            <p>Your personal data will be used to support your experience throughout this website, to manage access to
                your account, and for other purposes described in our <a href="">privacy policy.</a></p><br>
            <input type="submit" name="submit" id="Register">

        </form>
    </div>
</div>

<?php
include_once 'reviews.php';
?>


<?php
include_once 'footer.php';
?>