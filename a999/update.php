<?php

include('../include/header.php');

if (isset($_SESSION['admin']) && ($_SESSION['admin']) == true) {

    require 'database.php';

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!empty($_GET['id'])) {
        $id = htmlspecialchars(checkInput($_GET['id']));
    }

    $nameError = $yearError = $authorsError = $countryError = $regionError = $descriptionError = $pictureError = $name = $year = $authors = $country = $region = $description = $picture = "";


    if (!empty($_POST)) {
        $name               = htmlspecialchars(checkInput($_POST['name']));
        $year               = htmlspecialchars(checkInput($_POST['year']));
        $authors             = htmlspecialchars(checkInput($_POST['authors']));
        $country            = htmlspecialchars(checkInput($_POST['country']));
        $region             = htmlspecialchars(checkInput($_POST['region']));
        $description        = htmlspecialchars(checkInput($_POST['description']));
        $picture            = htmlspecialchars(checkInput($_FILES["picture"]["name"]));
        $picturePath        = '../' . basename($picture);
        $pictureExtension   = htmlspecialchars(pathinfo($picturePath, PATHINFO_EXTENSION));
        $isPictureUpdated   = false;
        $isUploadSucces     = true;
        $isSuccess          = true;

        if (empty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($year)) {
            $yearError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($authors)) {
            $grapesError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($country)) {
            $countryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($region)) {
            $regionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($description)) {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($picture)) {
            $isImageUpdated = false;
        } else {
            $isPictureUpdated = true;
            $isUploadSuccess = true;
            if ($pictureExtension != "jpg" && $pictureExtension != "png" && $pictureExtension != "jpeg" && $pictureExtension != "gif") {
                $pictureError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if (file_exists($picturePath)) {
                $pictureError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if ($_FILES["picture"]["size"] > 500000) {
                $pictureError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if ($isUploadSuccess) {
                if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $picturePath)) {
                    $pictureError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                }
            }
        }

        if (($isSuccess && $isPictureUpdated && $isUploadSuccess) || ($isSuccess && !$isPictureUpdated)) {
            $db = Database::connect();
            if ($isPictureUpdated) {
                $statement = $db->prepare("UPDATE articles set name = ?, year = ?, authors = ?, country = ?, region = ?, description = ?, picture =? WHERE id = ?");
                $statement->execute(array($name, $year, $authors, $country, $region, $description, $picture, $id));
            } else {
                $statement = $db->prepare("UPDATE articles set name = ?, year = ?, authors = ?, country = ?, region = ?, description = ? WHERE id = ?");
                $statement->execute(array($name, $year, $authors, $country, $region, $description, $id));
            }
            Database::disconnect();
            header("Location: index.php");
        } else if ($isPictureUpdated && !$isUploadSucces) {
            $db = Database::connect();
            $statement = $db->prepare("SELECT picture FROM articles WHERE id = ?");
            $statement->execute(array($id));
            $articles = $statement->fetch();
            $picture = $articles['picture'];
            Database::disconnect();
        }
    } else {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM articles WHERE id = ?");
        $statement->execute(array($id));
        $articles = $statement->fetch();
        $name = $articles['name'];
        $year = $articles['year'];
        $authors = $articles['authors'];
        $country = $articles['country'];
        $region = $articles['region'];
        $description = $articles['description'];
        $picture = $articles['picture'];
    }
    Database::disconnect();


?>

    <div class="container-fluid admin">
        <div class="row">
            <div class="col-12">
                <h1><strong>Modifier un article</strong></h1>
                <br>
                <form class="form" role="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?> ">
                        <span class="help-inline"><?php echo $nameError; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="Year">Year:</label>
                        <input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo $year; ?> ">
                        <span class="help-inline"><?php echo $yearError; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="authors">Auteurs:</label>
                        <input type="text" class="form-control" id="authors" name="authors" placeholder="Authors" value="<?php echo $authors; ?> ">
                        <span class="help-inline"><?php echo $authorsError; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $country; ?> ">
                        <span class="help-inline"><?php echo $countryError; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="region">Region:</label>
                        <input type="text" class="form-control" id="region" name="region" placeholder="Region" value="<?php echo $region; ?> ">
                        <span class="help-inline"><?php echo $regionError; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?> ">
                        <span class="help-inline"><?php echo $descriptionError; ?></span>

                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <p><?php echo $picture; ?></p>
                        <label for="picture">Selectioner une image:</label>
                        <input type="file" class="form-control" id="picture" name="picture" placeholder="Picture" value="<?php echo $picture; ?> ">
                        <span class="help-inline"><?php echo $pictureError; ?></span>
                    </div>

                    <br>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <a class="btn btn-danger" href="index.php"> Retour </a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6 site">
                <div class="thumbnail">
                    <br>
                    <img src="<?php echo '/assets/img/' . $picture; ?>" class="img-thumbnail" alt="...">
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

            </body>

            </html>
        <?php
    } else {
        header("Location: ../erreur.php");
        exit;
    }

        ?>