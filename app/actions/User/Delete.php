<?php 
/*
 * 	Action Delete utilisateur
 *  On traite l'action supprimer un utilisateur ici
 */

if($action === 'delete_user') {
    if(isset($_GET['id'])){
        try{
            deleteUser($_GET['id'], $_SESSION['user']['id']); // à modifier
            header('Location: index.php');
        }
        catch(PDOException $error){ 
            echo $error->getMessage();
        }
    }
}
