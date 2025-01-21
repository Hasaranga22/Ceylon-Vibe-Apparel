<?php
require_once '../dbConfig.php'; // Database connection file
require_once 'function.inc.php'; // Include necessary functions

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordAgain = $_POST["passwordAgain"];

    $emptyInput = emptyInpuSignup($email, $password, $passwordAgain);
    $invalidEmail = invallidEmail($email);
    $passwordMatch = passwordMatch($password, $passwordAgain);
    $uEmailExists = uEmailExists($conn, $email);

    // Check for empty input fields
    if ($emptyInput !== false) {
        echo "<script>
            alert('Empty input fields detected');
            window.location.href = '../loginSignup.php?error=emptyinput';
        </script>";
        exit();
    }

    if ($invalidEmail !== false) {
        echo "<script>
            alert('Invalid email address');
            window.location.href = '../loginSignup.php?error=invalidEmail';
        </script>";
        exit();
    }

    if ($passwordMatch !== false) {
        echo "<script>
            alert('Passwords do not match');
            window.location.href = '../loginSignup.php?error=passwordsdontMatch';
        </script>";
        exit();
    }

    if ($uEmailExists !== false) {
        echo "<script>
            alert('Email address is already taken');
            window.location.href = '../loginSignup.php?error=usernameTaken';
        </script>";
        exit();
    }


    createUser($conn, $email, $password);


} else {
    header("Location: ../loginSignUp.php");
    exit();
}


