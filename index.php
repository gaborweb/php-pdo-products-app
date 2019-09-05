<?php

session_start();

require_once "db.php";
require_once "backend.php";

if (isset($_GET["del"])) {

    $id = $_GET["del"];
    $market = new Market();
    $market->delete($id);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Termék vásárlások</title>
</head>
<body>

<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:10px;">
        <a class="navbar-brand" href="login.php">Kilépés</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Adatrögzítés</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php
                    if(isset($_SESSION['username'])){
                            
                        echo "<span>Belépve. Légy üdvözölve <strong>".$_SESSION['username']."</strong>!</span>";
                    }
                ?>
            </form>
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron" style="padding-top:25px; padding-bottom:25px;">
            <h1 class="display-5">Vásárolt termékek</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Terméktípus</th>
                            <th scope="col">Darabszám</th>
                            <th scope="col">Terméknév</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Vásárló</th>
                            <th scope="col">Szerkesztés</th>
                            <th scope="col">Törlés</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        
                    $market = new Market();
                    $rows = $market->display();

                    foreach ($rows as $row) {

                    ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php 
                                    $product = $row["termekId"];
                                    switch ($product) {
                                        case "1": echo "Élelmiszer";
                                            break;
                                        case "2": echo "Elektronika";
                                            break;
                                        case "3": echo "Háztartás";
                                            break;
                                        case "4": echo "Élvezeti cikk";
                                            break;
                                        default: echo "Ismeretlen...";
                                    }
                            ?></td>
                            <td><?php echo $row["darab"]; ?></td>
                            <td><?php echo $row["termeknev"]; ?></td>
                            <td><?php echo $row["ar"]; ?></td>
                            <td><?php echo $row["vasarlo"]; ?></td>
                            <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Szerk.</a></td>
                            <td><a href="index.php?del=<?php echo $row['id']?>" class="btn btn-danger btn-sm">Töröl</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</body>
</html>