<?php 
if($action === 'add_comment' && isset($_POST) && !empty($_POST)) {
	$errors = Form($_POST, [
		'content' => ['required', 'min:10'],
		'stars' => ['required', 'max:5']
	]);

	$validated = formValidation($_POST);
	if(empty($errors)) {
		try {
			addComment($_SESSION['user']['id'], $_GET['id'], $_POST['content'], $_POST['stars']);
			// header("Location: /danceclub/article.php?id=" . $_GET['id']);
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	} else{
		$errors['comment'][] = 'Une erreur est survenue lors de l\'ajout du commentaire';
	}
}