<?php

//var_dump($_GET);

$bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8;port=8889', 'root', 'root');
$request = "SELECT * FROM logement where id_logement =" . $_GET["id"];
$response = $bdd->query($request);
$logement = $response->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include("fix/navbar.php") ?>


    <img src="uploads/<?= $logement["photo"] ?>" alt="" height="300px">

    <br>

    <h1 class="card-title"><?= $logement["titre"] ?></h1>
    <br>
    <br>
    <br>
    <p class="card-text"><?= $logement["description"] ?></p>
    <ul>
        <li><strong>Adresse :</strong> <?= $logement["adresse"] ?></li>
        <li><strong>Code postal</strong> : <?= $logement["cp"] ?></li>
        <li><strong>Ville :</strong> <?= $logement["ville"] ?></li>
        <li><strong>Surface :</strong> <?= $logement["surface"] ?></li>
        <li><strong>Prix :</strong> <?= $logement["prix"] ?> €</li>
        <li><strong>Type :</strong> <?= $logement["type"] ?></li>
    </ul>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>