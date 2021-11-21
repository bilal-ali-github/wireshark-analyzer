<?php
session_start();

if (!$_SESSION['user_logged_in'] == true) {
    header("location: index.php");
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
                <div class="row">
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
                <table class="table table-striped">
                    <thead>
                        <th>
                            Filename
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </thead>
                    <tbody>
                        <td>
                            File1.pncap
                        </td>
                        <td>
                            21-11-2021
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">View Analysis</button>
                        </td>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>