<?php

session_start();

require_once "db.php";
require_once "backend.php";

if (isset($_POST["submit"])){

    $termekId = $_POST["termekId"];
    $darab = $_POST["darab"];
    $termeknev = $_POST["termeknev"];
    $ar = $_POST["ar"];
    $vasarlo = $_POST["vasarlo"];

    $fields = [
        'termekId' => $termekId,
        'darab' => $darab,
        'termeknev' => $termeknev,
        'ar' => $ar,
        'vasarlo' => $vasarlo
    ];

    $market = new Market();
    $market->insert($fields);
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
    <title>Értékesítés rögzítése</title>
<style>
.horizont{
    position: relative;
    margin: 0 auto 0 auto;
    background: #e2e2e2;
    border-bottom: 2px solid #ccc;
    padding: 20px;
}
</style>
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
        <div class="horizont">
                <h1 class="display-6">Adatok felvitele</h1>
                <form action="create.php" method="POST">
                    <div class="form-group">
                        <label for="nev1">Terméktípus:</label>
                        <select id="nev1" name="termekId" class="form-control col-lg-10 form-control-sm" required>
                            <option value="1">élelmiszer</option>
                            <option value="2">elektronika</option>
                            <option value="3">háztartás</option>
                            <option value="4">élvezeti cikk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="darab1">Darabszám</label>
                        <input type="text" class="form-control col-lg-10 form-control-sm" id="darab1" name="darab" placeholder="Darabszám" required>
                    </div>
                    <div class="form-group">
                        <label for="termeknev1">Termék neve</label>
                        <input type="text" class="form-control col-lg-10 form-control-sm" id="termeknev1" name="termeknev" placeholder="Termék neve" required>
                    </div>
                    <div class="form-group">
                        <label for="ar1">Ár</label>
                        <input type="text" class="form-control col-lg-10 form-control-sm" id="ar1" name="ar" placeholder="Ár" required>
                    </div>
                    <div class="form-group">
                        <label for="vasarlo1">Vásárló neve</label>
                        <input type="text" class="form-control col-lg-10 form-control-sm" id="vasarlo1" name="vasarlo" placeholder="Vásárló neve" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Felvitel</button>
                </form>
        </div>
    </div>
    
</div>
    
</body>
</html>