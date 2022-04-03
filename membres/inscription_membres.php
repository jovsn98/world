<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/forms.css">

</head>

<body>
    <div class="left-box">
        <nav class="navbarCustom">
            <h1>World of Creators</h1>
            <p><a href="../index.php">Home</a></p>
            <p><a href="./page_connexion.php">Vous avez déjà un compte ? Par ici !</a></p>
            <p id="copy">&copy;Don Jo, 2021, all rights reserved</p>
        </nav>
    </div>
    <div class="right-box">
        <form action="../php/traitement_membres.php" method="POST" class="box" enctype="multipart/form-data">
            <h1>S'inscrire</h1>
            <input type="text" name="firstname" placeholder="Prénom" required>
            <input type="text" name="lastname" placeholder="Nom" required>
            <input type="text" name="pseudo" placeholder="Pseudo" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <input type="password" name="mdpvalid" placeholder="Confirmez le mot de passe" required>
            <input type="submit" name="submit" value="C'est parti !">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/assets/js/verif.js"></script>
</body>

</html>