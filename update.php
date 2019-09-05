<?php

session_start();

require_once "db.php";
require_once "backend.php";

if (isset($_GET["id"])) {

    $getId = $_GET["id"];
    $market = new Market();
    $result = $market->select($getId); 
}

if (isset($_POST["submit"])) {

    $id=$_POST['id'];
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
    $market->update($id, $fields);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Értékesítések módosítása</title>
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
            <h1 class="display-6">Adatok szerkesztése</h1>
            <form action="update.php" method="POST">
            <input hidden type="text" name="id" value="<?php echo $result['id']; ?>">
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
                    <input type="text" class="form-control col-lg-10 form-control-sm" id="darab1" name="darab" value="<?php echo $result['darab']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="termeknev1">Termék neve</label>
                    <input type="text" class="form-control col-lg-10 form-control-sm" id="termeknev1" name="termeknev" value="<?php echo $result['termeknev']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ar1">Ár</label>
                    <input type="text" class="form-control col-lg-10 form-control-sm" id="ar1" name="ar" value="<?php echo $result['ar']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="vasarlo1">Vásárló neve</label>
                    <input type="text" class="form-control col-lg-10 form-control-sm" id="vasarlo1" name="vasarlo" value="<?php echo $result['vasarlo']; ?>" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Felvitel</button>
            </form>
        </div>
    </div>
    
</div>
    
</body>
</html>