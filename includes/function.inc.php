<?php

function emptyInpuSignup($email, $password, $passwordAgain)
{
    $result = false; // Initialize as false
    if (empty($email) || empty($password) || empty($passwordAgain)) {
        $result = true; // Set to true if any input is empty
    }
    return $result; // Return the result
}

function invallidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function passwordMatch($password, $passwordAgain)
{
    $result = false;
    if ($password !== $passwordAgain) {
        $result = true;
    }
    return $result;
}

function uEmailExists($conn, $email)
{
    $sql = "SELECT * FROM users where userEmail = ? ;";
    $stmt = mysqli_stmt_init($conn);

    //statemnt eka harida balanwa
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../loginSignup.php?error=stmtfailed");
        exit(); // Ensure the script stops here
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    //check result row
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}




function createUser($conn, $email, $password)
{
    // Correct SQL query to specify columns
    $sql = "INSERT INTO users (userEmail, userPassword) VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);

    // Check if the prepared statement is successful
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>alert('Unsuccessful');</script>";
        header("Location: ../loginSignup.php?error=stmtfailed");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Bind parameters (use 's' for string types)
    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);

    // Execute the statement
    if (!mysqli_stmt_execute($stmt)) {
        header("Location: ../loginSignup.php?error=executefailed");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Display success alert and redirect
    echo "<script>
            alert('Account created successfully');
            window.location.href = '../loginSignup.php?error=none';
          </script>";
    exit();
}



//login validation part eka
function emptyInputLogin($email, $password)
{
    $result = false; // Initialize as false
    if (empty($email) || empty($password)) {
        $result = true; // Set to true if any input is empty
    }
    return $result; // Return the result
}



function loginUser($conn, $email, $password)
{
    $uEmailExists = uEmailExists($conn, $email);
    if ($uEmailExists == false) {
        header("Location:../loginSignup.php?error=wrongloginUemail error");
        echo "<script>alert('User Email has already taken by another');</script>)";
        exit();
    }

    $pwdHashed = $uEmailExists["userPassword"];

    // Verify the password
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd == false) {
        header("Location:../loginSignup.php?error=wronglogin password");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userEmail"] = $uEmailExists["userEmail"];
        echo "<script> alert('Account login succesfull :) ');</script>)";
        header("Location:../myAccount.php");
        exit();
    }
}






// function adminEmailExists($conn, $email)
// {
//     $sql = "SELECT * FROM admins where adminEmail = ? ;";
//     $stmt = mysqli_stmt_init($conn);

//     //statemnt eka harida balanwa
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         header("Location: ../loginSignup.php?error=stmtfailed");
//         exit(); // Ensure the script stops here
//     }

//     mysqli_stmt_bind_param($stmt, "s", $email);
//     mysqli_stmt_execute($stmt);
//     $resultData = mysqli_stmt_get_result($stmt);

//     //check result row
//     if ($row = mysqli_fetch_assoc($resultData)) {
//         mysqli_stmt_close($stmt);
//         return $row;
//     } else {
//         mysqli_stmt_close($stmt);
//         return false;
//     }
// }


// function loginAdmin($conn, $email, $password)
// {
//     $adminEmailExists = adminEmailExists($conn, $email);
//     if ($adminEmailExists == false) {
//         header("Location:../loginSignup.php?error=wrongloginUemail error");
//         echo "<script>alert('User Email has already taken by another');</script>)";
//         exit();
//     }

//     $pwdHashed = $adminEmailExists["adminPassword"];

//     // Verify the password
//     $checkPwd = password_verify($password, $pwdHashed);

//     if ($checkPwd == false) {
//         header("Location:../loginSignup.php?error=wronglogin password");
//         exit();
//     } else if ($checkPwd === true) {
//         session_start();
//         $_SESSION["adminEmail"] = $adminEmailExists["adminEmail"];
//         echo "<script> alert('Account login succesfull :) ');</script>)";
//         header("Location:../adminPannel.php");
//         exit();
//     }
// }