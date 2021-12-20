<?php
session_start();

if (!$_SESSION['user_logged_in'] == true) {
    header("location: index.php");
}

require "../database/db_controller.php";

if (!$_SESSION['user_id']) {
    $user_id_err = "Something Went Wrong";
    exit;
} else {
    $user_id = $_SESSION['user_id'];
}
if (isset($_POST['submit-file'])) {
    if (!is_dir('../files')) {
        mkdir('../files');
    }
    $filename = $_FILES['user_file']['name'];
    $tempname = $_FILES['user_file']['tmp_name'];
    $folder = "./files/" . $filename;
    move_uploaded_file($tempname, "../files/" . $filename);
    $sql = "INSERT INTO `user-file`(user_id,user_file_path,file_name) VALUES($user_id,'$folder','$filename')";
    $stmt = mysqli_query($con, $sql);
    var_dump($stmt);
    mysqli_close($con);
    if($stmt){
        header("location: ../user-interface.php");
    }
}

?>