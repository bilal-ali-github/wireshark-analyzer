<?php
session_start();

if (!$_SESSION['user_logged_in'] == true) {
    header("location: index.php");
}
require "./database/db_controller.php";
$user_id = $_SESSION['user_id'];

$sql  = "SELECT user_file_path,file_name FROM `user-file` WHERE user_id = $user_id";
$execute = mysqli_query($con,$sql);
if(!$execute){
    $execute = "NULL";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <title>Wireshark Analyzer</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container-fluid ps-5 pe-5 pt-2 pb-2">
            <a class="navbar-brand" href="#">
                <h4>Wireshark Analyzer</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="./functions/logout.php" method="post">
                            <button type="submit" class="btn text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Upload File Here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="mt-5">
                            <form action="./functions/user-file.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3 col-sm-6 m-auto">
                                    <label for="upload" class="form-label ">Upload Picture</label>
                                    <input type="file" class="form-control" name="user_file">
                                </div>
                                <div class="col-sm-6 m-auto">
                                    <div class="text-center">
                                        <button  type="submit" class="btn btn-primary btn-md mt-5" name="submit-file">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <main>
        <section>
            <div class="container">
                <div class="row mt-5">
                    <h1 class="display-1">Upload pcap or pcapng file</h1>
                    <h2 class="display-6">to analyze network structure, HTTP headers and data, FTP, Telnet, WiFi, ARP, SSDP and other</h2>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="text-center mt-5 mb-5">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Upload File</button>
                </div>
            </div>
        </section>

        <div class="container">
            <hr>
        </div>

        <section>
            <div class="container mt-5">
                <table class="table table-hover">
                    <thead>
                        <th>
                            File Directory
                        </th>
                        <th>
                            Filename
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </thead>
                    <?php if(!$execute){
                            echo '<tbody>'; 
                            echo '<td>Nill</td>';
                            echo '<td>Nill</td>';
                            echo '<td>Nill</td>';
                            echo '</tbody>';
                        } ?>
                        <?php if($execute){ foreach($execute as $data){ ?>
                        <tbody>
                        <td>
                            <?php echo $data['user_file_path']; ?>
                        </td>
                        <td>
                            <?php echo $data['file_name']; ?>
                        </td>
                        <td>
                            <form method="post" action="./file-analysis.php">
                                <input type="hidden" value="<?php echo $data['user_file_path']; ?>" name="file_path">
                                <button type="submit" class="btn btn-primary" name="file_analysis">View Analysis</button>
                            </form>
                        </td>
                        </tbody>
                        <?php }} ?>
                </table>
            </div>
        </section>

    </main>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>