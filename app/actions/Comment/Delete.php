<?php 

if($action === 'delete__comment') {
	// ici on gere la suppression d'un commentaire
		$comment = getComment($_GET['comment_id']);
		if(isset($_GET) & !empty($_GET)){
			try {
				deleteComment($_GET['comment_id'], $_SESSION['user']['id']);
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}			
	}
