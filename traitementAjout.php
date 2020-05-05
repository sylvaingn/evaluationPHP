<?php

var_dump($_POST);
var_dump($_FILES);
var_dump($_FILES["photo"]);

var_dump(pathinfo($_FILES["photo"]["name"]));

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

    $nouveauNom = $fileName . uniqid() . "." . $fileExtension;

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

<?php if (
    empty($_POST["titre"])
    or empty($_POST["adresse"])
    or empty($_POST["ville"])
    or empty($_POST["cp"])
    or empty($_FILES["photo"]["name"])
    or empty($_POST["surface"])
    or empty($_POST["prix"])
    or empty($_POST["type"])
    or empty($_POST["description"])

) : ?>

    <h2>Un des champs est manquant.</h2>
    <a href="#">Retour en arrière</a>

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