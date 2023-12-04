<?php
/*
 * 	Action Add Article
 *  On traite l'action ajouter un article ici
 */

if ($action === 'add_article' && isset($_POST) && !empty($_POST)) {
	// on vérifie que les règes sont respectées
	$errors = Form($_POST, [
		'titre' => ['required', 'max:255'],
		'description' => ['required', 'max:255'],
		'content' => ['required', 'min:5'],
		'image' => ['required', 'max:255']
	]);

	// si il n'y a pas d'erreurs
	if (empty($errors)) {
		try {
			$data = formValidation($_POST);
			addArticle($data['titre'], $data['description'], $data['image'], $data['content'], $_SESSION['user']['id']); 
			header('Location: index.php');
		} catch (PDOException $error) {
			echo $error->getMessage();
		}
	}
}
