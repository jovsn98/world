<?php


include('../include/header.php');

if (isset($_SESSION['admin']) && ($_SESSION['admin']) == true) {

    require 'database.php';

    $nameError = $yearError = $authorsError = $countryError = $regionError = $descriptionError = $pictureError = $name = $year = $authors = $country = $region = $description = $picture = "";

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!empty($_POST)) {
        $name               = htmlspecialchars(checkInput($_POST['name']));
        $year               = htmlspecialchars(checkInput($_POST['year']));
        $authors             = htmlspecialchars(checkInput($_POST['authors']));
        $country            = htmlspecialchars(checkInput($_POST['country']));
        $region             = htmlspecialchars(checkInput($_POST['region']));
        $description        = htmlspecialchars(checkInput($_POST['description']));
        $picture            = htmlspecialchars(checkInput($_FILES["picture"]["name"]));
        $picturePath        = '../assets/img/' . basename($picture);
        $pictureExtension   = htmlspecialchars(pathinfo($picturePath, PATHINFO_EXTENSION));
        $isPictureUpdated   = false;
        $isSuccess          = true;
        $isUploadSuccess    = false;

        if (empty($name)) {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($year)) {
            $yearError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if (empty($authors)) {
            $authorsError = 'Ce champ ne peut pas être vide';
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
            $pictureError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } else {
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
                $checkUpload = move_uploaded_file($_FILES["picture"]["tmp_name"], $picturePath);
                if (!$checkUpload) {
                    $pictureError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                }
            }
        }

        if ($isSuccess && $isUploadSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO articles (name,year,authors,country,region,description,picture) VALUES(?, ?, ?, ?, ? ,? ,?)");
            $statement->execute(array($name, $year, $authors, $country, $region, $description, $picture));
            Database::disconnect();
            header("Location: index.php");
        }
    }


?>

    <div class="container-fluid admin">
        <div class="row">
            <div class="col-12">
                <h1><strong>Ajouter un article</strong></h1>
                <br>
                <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="button" for="name">Nom : </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?> ">
                        <span class="help-inline"><?php echo $nameError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="Year">Year : </label>
                        <input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo $year; ?> ">
                        <span class="help-inline"><?php echo $yearError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="grapes">Auteurs : </label>
                        <input type="text" class="form-control" id="authors" name="authors" placeholder="Authors" value="<?php echo $authors; ?> ">
                        <span class="help-inline"><?php echo $authorsError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="country">Country : </label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $country; ?> ">
                        <span class="help-inline"><?php echo $countryError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="region">Region : </label>
                        <input type="text" class="form-control" id="region" name="region" placeholder="Region" value="<?php echo $region; ?> ">
                        <span class="help-inline"><?php echo $regionError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="description">Description : </label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?> ">
                        <span class="help-inline"><?php echo $descriptionError; ?></span>

                    </div>
                    <div class="form-group">
                        <label class="button" for="picture">Selectioner une image : </label>
                        <input type="file" class="form-control" id="picture" name="picture" placeholder="Picture" value="<?php echo $picture; ?> ">
                        <span class="help-inline"><?php echo $pictureError; ?></span>
                    </div>

                    <br>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a class="btn btn-danger" href="index.php"> Retour </a>
                    </div>
                </form>
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