<?php
require_once 'app/app.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos articles</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="/danceclub/assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="js/register.js"></script>
</head>

<body>
    <?php require_once 'partials/header.php'; ?>
    <style>
        label {
            display: block
        }
    </style>
    <form class="error-form register-form" action="?action=inscription" method="POST">

        <!-- début du formulaire d'inscription -->

        <h3>Inscription</h3>
        <label>Nom</label>
        <input class="form-label" type="text" name="name" id="name">
        <?php if (isset($errors['name'])) displayErrors($errors['name']); ?>
        <label>Prénom</label>
        <input type="text" name="surname" id="surname">
        <?php if (isset($errors['surname'])) displayErrors($errors['surname']); ?>
        <label>Date de naissance</label>
        <input class="form-label" type="date" name="birthday" id="birthday">
        <?php if (isset($errors['birthday'])) displayErrors($errors['birthday']); ?>
        <label for="">Adresse mail</label>
        <input class="form-label" type="email" name="email" id="email">
        <?php if (isset($errors['email'])) displayErrors($errors['email']); ?>
        <label>Nom d'utilisateur</label>
        <input class="form-label" type="text" name="username" id="username">
        <?php if (isset($errors['username'])) displayErrors($errors['username']); ?>
        <label>Mot de passe</label>
        <input class="form-label" type="password" name="password" id="password">
        <?php if (isset($errors['password'])) displayErrors($errors['password']); ?>
        <label>Confirmer votre mot de passe</label>
        <input class="form-label" type="password" name="password_check" id="password_check">
        <?php if (isset($errors['password_check'])) displayErrors($errors['password_check']); ?>
        <div>
            <button class="btn_register-login" type="submit">Je m'inscris</button>
            <div>
                <a href="login.php">Vous avez déjà un compte?</a>
            </div>
    </form>
    </div>