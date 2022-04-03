<?php
// session_start();

$data = [];
$errors = [];

require '../a999/database.php';
$db = Database::connect();


// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=world', 'root', '');
//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     print "Erreur !: " . $e->getMessage() . "<br/>";
//     die();
// }
if (!empty($_SESSION)) {
    $errors['connexion'] = "Vous êtes déjà connecté";
    header('location: ../index.php');
    exit;
}
if (!empty($_POST)) {
    if (!empty($_POST['firstname']) && strlen($_POST['firstname']) >= 3) {
        $data['firstname'] = htmlspecialchars(strip_tags($_POST['firstname']));
    } else {
        header('location: ../erreur.php');
        exit;
    }

    if (!empty($_POST['lastname']) && strlen($_POST['lastname']) >= 3) {
        $data['lastname'] = htmlspecialchars(strip_tags($_POST['lastname']));
    } else {
        $errors['lastname'] = "Votre nom n\'est pas valide";
        header('location: ../erreur.php');

        exit;
    }
    if (!empty($_POST['pseudo']) && strlen($_POST['pseudo']) >= 3) {
        $data['pseudo'] = htmlspecialchars(strip_tags($_POST['pseudo']));
    } else {
        $errors['pseudo'] = "Votre nom n\'est pas valide";
        header('location: ../erreur.php');

        exit;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $data['email'] = htmlspecialchars(strip_tags($_POST['email']));
    } else {
        $errors['email'] = "Votre pseudo n\'est pas valide";
        header('location: ../erreur.php');
        exit;
    }
    if (!empty($_POST['mdp']) && strlen($_POST['mdp']) >= 6 && $_POST['mdp'] === $_POST['mdpvalid']) {
        // echo htmlspecialchars(($_POST['password']));
        $data['mdp'] = password_hash(htmlspecialchars(strip_tags($_POST['mdp'])), PASSWORD_DEFAULT);
    } else {
        $errors['mdp'] = "Vos mots de passe ne correspondent pas";
        header('location: ../erreur.php');
        exit;
    }
}
var_dump($data);
// die;
$req = $db->prepare('INSERT INTO users(firstname, lastname, pseudo, email, mdp) VALUES(:firstname, :lastname, :pseudo, :email, :mdp)');
$req->execute($data);
header('Location: ../index.php');
exit();
