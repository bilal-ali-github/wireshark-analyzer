<?php
session_start();

require_once "../database/db_controller.php";

$email = $email_err = "";
$password = $password_err = "";

if (isset($_POST['sign-in'])) {
    $email = trim($_POST['email']);
    if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please Enter Email";
    }
    $password = trim($_POST['password']);
    if (empty($password)) {
        $password_err = "Please Enter Password";
    }
    $sql = "SELECT id,email,password FROM `sign-up` WHERE email =?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        echo "test1";
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        if (mysqli_stmt_execute($stmt)) {
            echo "test2";
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                echo "test3";
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    echo "test4";
                    if (password_verify($password, $hashed_password)) {
                        echo "test5";
                        $_SESSION['user_id'] = $id;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_logged_in'] = true;
                        header("location: ../user-interface.php");
                    }
                    // else{
                    //     header("location: ../index.php");
                    // }
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
}
mysqli_close($con);
