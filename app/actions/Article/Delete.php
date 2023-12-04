<?php 
/*
 * 	Action Delete Article
 *  On traite l'action supprimer un article ici
 */

if($action === 'delete_article') {
    if(isset($_GET['id'])){
        try{
            deleteArticle($_GET['id'], $_SESSION['user']['id']); 
            header('Location: index.php');
        }
        catch(PDOException $error){ 
            echo $error->getMessage();
        }
    }
}
