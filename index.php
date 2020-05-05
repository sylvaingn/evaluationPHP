<?php

$bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8;port=8889', 'root', 'root');
$request = "SELECT * FROM logement";
$response = $bdd->query($request);
$logements = $response->fetchAll(PDO::FETCH_ASSOC);

//var_dump($logements);

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

  <?php foreach ($logements as $logement) : ?>

    <div class="ml-6 mt-5 col-md-3">

      <div class="card" style="width: 20rem;">

        <div class="card-body">

          <a href="show.php"><img src="uploads/<?= $logement["photo"] ?>" alt="" height="100px" style="display: block; 
                margin-left: auto; margin-right: auto"></a>

          <br>

          <h5 class="card-title" style="text-align: center"><?= $logement["titre"] ?></h5>
          <p class="card-text"><?= $logement["description"] ?></p>
          <ul>
            <li><strong>Adresse :</strong> <?= $logement["adresse"] ?></li>
            <li><strong>Code postal</strong> : <?= $logement["cp"] ?></li>
            <li><strong>Ville :</strong> <?= $logement["ville"] ?></li>
            <li><strong>Surface :</strong> <?= $logement["surface"] ?></li>
            <li><strong>Prix :</strong> <?= $logement["prix"] ?> €</li>
            <li><strong>Type :</strong> <?= $logement["type"] ?></li>
          </ul>



          <div class="btn-group" role="group" aria-label="Basic example" style="width: 20px">
            <button type="button" class="btn btn-secondary"><a href="show.php?id=<?= $logement["id_logement"] ?>" class="text-warning stretched-link">Afficher</a></button>
            <button type="button" class="btn btn-secondary"><a href="modifProduit.php?id=<?= $logement["id_logement"] ?>" class="text-warning stretched-link">Modifier</a></button>
            <button type="button" class="btn btn-secondary"><a href="suppProduit.php?id=<?= $logement["id_logement"] ?>" class="text-warning stretched-link">Supprimer</a></button>
          </div>

        </div>

      </div>

    </div>

  <?php endforeach; ?>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>