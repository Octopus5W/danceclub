<?php 

// Définit la variable $action 
// Si l'action n'est pas définie, on la définit à null
// Ca évite des problèmes de variable non définie
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Actions liés aux articles
require_once("Article/Add.php");
require_once("Article/Delete.php");
require_once("Article/Update.php");

// Actions liés aux commentaires
require_once("Comment/Add.php");
require_once("Comment/Delete.php");
// Actions liés aux utilisateurs
require_once("User/Login.php");
require_once("User/Inscription.php");
require_once("User/Update.php");
require_once("User/Delete.php");
require_once("User/Add.php");



