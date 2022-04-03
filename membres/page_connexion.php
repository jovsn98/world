<!-- <?php

include('../include/header.php');
?>

<body>

    <main>
        <div class="form-group">
            <div class="connexion-cont">
                <form action="../php/traitementConnexion.php" method="POST">
                    <input type="email" id="email" name="email" placeholder="Email"><br>
                    <input type="password" id="password" name="password" placeholder="Mot de passe">
                    <br>
                    <input type="submit" id="submit" value="Connexion">
            </div>
        </div>
    </main>

    <div>
        <a class="btn btn-primary" href="../index.php">Retour</a>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </html> -->

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/forms.css">
</head>

<body>
    <div class="left-box">
        <nav class="navbarCustom">
            <h1>World of Creators</h1>
            <p><a href="../index.php">Home</a></p>
            <p><a href="../membres/inscription_membres.php">Vous n'avez pas encore de compte ? Par ici !</a></p>
            <p id="copy">&copy;Don Jo, 2021, all rights reserved</p>
        </nav>
    </div>
    <div class="right-box">
        <form action="../php/traitementConnexion.php" method="POST" class="box" enctype="multipart/form-data">
            <h1>Sign In</h1>
            <input type="text" name="mailconnect" placeholder="Email" required>
            <input type="password" name="mdpconnect" placeholder="Mot de passe" required>
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
</body>
</html>
