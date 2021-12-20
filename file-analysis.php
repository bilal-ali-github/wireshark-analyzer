<?php
session_start();

if (!$_SESSION['user_logged_in'] == true) {
    header("location: index.php");
}
require "./database/db_controller.php";
$user_id = $_SESSION['user_id'];
if (isset($_POST['file_analysis'])) {
    $filepath = $_POST['file_path'];
}
if (($open = fopen($filepath, "r")) !== FALSE)
  {
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {        
      $array[] = implode("",$data); 
    }
  
    fclose($open);
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


    <main>
        <section>
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./user-interface.php">User Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">File Analysis</li>
                    </ol>
                </nav>
                <div class="row mt-5">
                    <h2 class="display-6">File Analysis : </h2>
                </div>
            </div>
        </section>

        <div class="container">
            <hr>
        </div>

        <section>
            <div class="container mt-5 mb-5">
                <table class="table table-hover">
                    <thead>
                        <th>
                            &nbsp;
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach($array as $item){ ?>
                        <tr>
                        <td>
                            <?php   echo $item;  ?>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
    <footer>
        <div class="bg-primary text-center p-2">
            <a href="#" class="text-decoration-none text-white">Wireshark &copy; 2021</a>
        </div>
      </footer>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>