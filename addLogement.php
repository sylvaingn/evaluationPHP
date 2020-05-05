<?php

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

    <form action="traitementAjout.php" method="POST" enctype="multipart/form-data">

        <!--  titre, adresse, ville, code postal maxlength="5", surface, prix, type -->

        <div class="form-group">
            <label for="formTitre">Titre de l'annonce :</label>
            <input name="titre" type="text" class="form-control" id="formTitre" required>
        </div>

        <div class="form-group">
            <label for="formAdresse">Adresse :</label>
            <input name="adresse" type="text" class="form-control" id="formAdresse" required>
        </div>

        <div class="form-group">
            <label for="formVille">Ville :</label>
            <input name="ville" type="text" class="form-control" id="formVille" required>
        </div>

        <div class="form-group">
            <label for="formCode">Code postal :</label>
            <input name="cp" type="number" value="0" min="01100" max="99000" class="form-control" id="formCode" required>
        </div>

        <div class="form-group">
            <label for="formSurface">Surface (m²) :</label>
            <input name="surface" type="number" class="form-control" id="formSurface" required>
        </div>

        <div class="form-group">
            <label for="formPrix">Prix (€) :</label>
            <input name="prix" type="number" class="form-control" id="formPrix" required>
        </div>

        <div class="form-group">
            <label for="formPhoto">Photo :</label>
            <input name="photo" type="file" class="form-control" id="formPhoto" required>
        </div>


        <div class="form-group">
            <label for="formType">Sélectionnez le type :</label>
            <select name="type" class="form-control" id="formType" required>
                <option>Location</option>
                <option>Vente</option>
            </select>
        </div>

        <div class="form-group">
            <label for="formDescription">Description :</label>
            <input name="description" type="text" class="form-control" id="formDescription" >
        </div>


        <button type="submit" class="btn btn-primary">Ajouter cette annonce !</button>

    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>