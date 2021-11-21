<?php

session_start();

require_once "../database/db_controller.php";

$name = $name_err = "";
$phone_no = $phone_no_err = "";
$email = $email_err = "";
$password = "";
$password_cnfrm = $password_cnfrm_err = "";

if(isset($_POST['sign-up'])){
    $name = trim($_POST['name']);
    if(empty($name)){
        $name_err = "Please Enter Name";
    }
    $phone_no = trim($_POST['phone_no']);
    if(empty($phone_no) || strlen($phone_no) != 11){
        $phone_no_err = "Please Enter a Valid Contact Number";
    }
    $email = trim($_POST['email']);
    if(empty($email)){
        $email_err = "Please Enter a Valid Email";
    }
    $sql = "SELECT id FROM `sign-up` WHERE email = ?";
    $stmt = mysqli_prepare($con,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"s",$param_email);
        $param_email = trim($_POST['email']);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                $email_err = "Email Taken";
            }
            else{
                $email = trim($_POST['email']);
            }
        }
    }
    mysqli_stmt_close($stmt);
    $password = trim($_POST['password']);
    $password_cnfrm = trim($_POST['confirm_password']);
    if($password != $password_cnfrm){
        $password_cnfrm_err = "Password not Matching";
    }
    if(empty($name_err) && empty($phone_no_err) && empty($email_err) && empty($password_cnfrm_err)){
        $sql = "INSERT INTO `sign-up` (name,email,password,phone_no) VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($con,$sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"ssss",$param_name,$param_email,$param_password,$param_phone);
            $param_name = $name;
            $param_phone = $phone_no;
            $param_email = $email;
            $param_password = password_hash($password,PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['status'] = "Inserted";
                header("location: ../index.php");
            }
            else{
                $_SESSION['status'] = "Not";
                header("location: ../index.php");
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($con);
}