<?php
require_once '../dbConfig.php'; // Database connection file
require_once 'function.inc.php'; // Include necessary functions

// Function to check if admin email exists
function adminEmailExists($conn, $email)
{
    $sql = "SELECT * FROM admins WHERE adminEmail = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../loginSignup.php?error=stmtfailed");
        exit(); // Ensure the script stops here
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

// Function to log in the admin
function loginAdmin($conn, $email, $password)
{
    $adminEmailExists = adminEmailExists($conn, $email);

    if ($adminEmailExists == false) {
        loginUser($conn, $email, $password);
        exit(); 
    }

    $pwdHashed = $adminEmailExists["adminPassword"];

    // Verify the password
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd == false) {
        header("Location:../loginSignup.php?error=wrongloginpassword");
        exit();
    } else {
        session_start();
        $_SESSION["adminEmail"] = $adminEmailExists["adminEmail"];
        echo "<script>alert('Account login successful :)');</script>";
        header("Location:../adminPannel.php");
        exit();
    }
}

// Main logic when the form is submitted
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for empty input fields
    if (emptyInputLogin($email, $password) !== false) {
        header("Location: ../loginSignup.php?error=emptyinput");
        exit();
    }

    // Call the login function
    loginAdmin($conn, $email, $password);
} else {
    header("Location: ../myAccount.php");
    exit();
}
?>