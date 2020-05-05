<?php

//var_dump($_POST);
//var_dump($_FILES);
//var_dump($_FILES["photo"]);

//var_dump(pathinfo($_FILES["photo"]["name"]));

/* Si l'extension n'est pas bonne  */
/* Si le format n'est pas bon */

function checkFile($file)
{
    $pathInfoData = pathinfo($file["name"]);
    $fileExtension = $pathInfoData["extension"];
    $fileType = $file["type"];

    if ($fileExtension != "jpg" && $fileType != "image/jpeg") {
        return "La photo n'est pas en format jpeg";
    } elseif ($file["size"] > 3145728) {
        return "La fichier est trop lourd";
    } else {
        return false;
    }
}

function saveFile($file)
{
    $pathInfoData = pathinfo($file["name"]);
    $fileExtension = $pathInfoData["extension"];
    $fileName = $pathInfoData["filename"];
    $date = new DateTime();
    $currentDate = $date->getTimestamp();

    $nouveauNom = $fileName ."-". $currentDate . "." . $fileExtension;

    move_uploaded_file($file["tmp_name"], __DIR__ . "/uploads/" . $nouveauNom);

    return $nouveauNom;
}

function sentFile($nomFichier)
{

    $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8;port=8889', 'root', 'root');
    $request = "INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description)
                VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type, :description)";

    $response = $bdd->prepare($request);
    $response->execute([

        "titre"         => $_POST["titre"],
        "adresse"       => $_POST["adresse"],
        "ville"         => $_POST["ville"],
        "cp"            => $_POST["cp"],
        "surface"       => $_POST["surface"],
        "prix"          => $_POST["prix"],
        "photo"         => $nomFichier,
        "type"          => $_POST["type"],
        "description"   => $_POST["description"]
    ]);
}

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

    <?php if (
        empty($_POST["titre"])
        or empty($_POST["adresse"])
        or empty($_POST["ville"])
        or empty($_POST["cp"])
        or empty($_FILES["photo"]["name"])
        or empty($_POST["surface"])
        or empty($_POST["prix"])
        or empty($_POST["type"])
        

    ) : ?>

        <h2>Un des champs est manquant.</h2>
        <a href="addLogement.php">Retour en arrière</a>

    <?php endif; ?>

    <?php if (checkfile($_FILES["photo"]) == false) : ?>

        <?php $nom = saveFile($_FILES["photo"]);
        sentFile($nom)
        ?>


        <h2>Bravo, votre annonce est publiée !</h2>
        <br>


        <a href="index.php" class="btn btn-secondary">Retour à la page d'accueil !</a>

    <?php else : ?>
        <h2>Le format de la photo n'est pas au format jpeg</h2>


    <?php endif; ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>