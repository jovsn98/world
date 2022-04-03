<?php

// Connection a la base de données
require '../a999/database.php';
$db = Database::connect();

$errors = [];
$user = [];


if (!empty($_POST)) { //Si le formulaire n'est pas vide
    if (!empty($_POST['mdpconnect']) && !empty($_POST['mailconnect'] && filter_var($_POST['mailconnect'], FILTER_VALIDATE_EMAIL))) {
        $req = $db->prepare('SELECT * FROM users WHERE email = :mailconnect');
        $req->execute(array(
            'mailconnect' => $_POST['mailconnect'],
        ));
        $user = $req->fetch(PDO::FETCH_ASSOC);

        //Si l'utilisateur n'est pas déjà connecté
        if (empty($_SESSION)) {
            if (!empty($user)) { //Si le tableau contenant des informations pour se logger n'est pas vide
                if (password_verify($_POST['mdpconnect'], $user['mdp'])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['mailconnect'] = $user['email'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['admin'] = $user['admin']; //On récupère la valeur de admin dans le tableau $user pour la vérification
                    $errors['user'] = 'bsartek';

                    // header('location: ../index.php');
                } else {
                    $errors['user'] = 'invalid mail or password';
                    // header('location: ../erreur-co.html');
                }
            } else {
                $errors['user'] = 'user inexistant';
                // header('location: ../erreur-co.html');
            }
        }
    }

}
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . " ";
            echo '<a href="form_add_bottle.php">Get back</a>' . "<br>";
        }
        die;
    }