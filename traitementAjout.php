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

    $nouveauNom = $fileName. uniqid() .".".$fileExtension;

    move_uploaded_file($file["tmp_name"], __DIR__. "/uploads/" . $nouveauNom);

    return $nouveauNom;
}

function sentFile($nom) {

    

}