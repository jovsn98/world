<?php
if (!isset($_SESSION) && empty($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Of Creators</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>

<body>


    <div class="container-lg">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                
                <div class="col-4 pt-1">
                    <?php
                if (isset($_SESSION['connected'])) {
                        echo  '<a class="text" href="../index.php">Bienvenue a toi ' . $_SESSION['pseudo'] . '</a>';
                    } else {
                        echo  '<a class="text" href="../index.php">Bienvenue</a>';
                    }
                        ?>

                </div>
                <div class="col-4 text-center">
                    <h1 class="titre">World Of Creators</h1>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#" aria-label="Search">
                    </a>

                    <?php
                    if (isset($_SESSION['connected'])) {
                        echo  '<a class="btn btn-sm btn-outline-secondary" href="/php/traitementConnexion.php?action=delete">Déconnexion</a>';
                    } else {
                        echo '<a class="btn btn-sm btn-outline-secondary" href="../membres/page_connexion.php">Connexion</a>';

                        if (!isset($_SESSION['connected'])) {
                            echo  '<a class="btn btn-sm btn-outline-secondary" href="../membres/inscription_membres.php">Inscription</a>';
                        }
                    }
                    if (isset($_SESSION['admin']) && ($_SESSION['admin']) == true) {
                        echo  '<a class="btn btn-sm btn-outline-secondary" href="../a999/index.php">admin</a>';
                    }
                    ?>
                </div>
            </div>
        </header>