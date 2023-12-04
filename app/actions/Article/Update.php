<?php
/*
 * 	Action Edit Article
 *  On traite l'action editer un article ici
 */

if ($action === 'edit_article') {

	// on vérifie que le formulaire a été soumis et qu'il n'est pas vide
	if (isset($_POST) && !empty($_POST)) {

		// on vérifie que les règes sont respectées
		$errors = Form($_POST, [
			'titre' => ['required', 'max:255'],
			'description' => ['required', 'max:255'],
			'content' => ['required'],
			'image' => ['required', 'max:255']
		]);
		
		// si il n'y a pas d'erreurs
		if (empty($errors)) {
			try {
				// on récupère les données du formulaire
				$data = formValidation($_POST);
				updateArticle($_GET['id'], $data['titre'], $data['description'], $data['content'], $data['image'], $_SESSION['user']['id']); 
				header('Location: index.php');
			} catch (PDOException $error) {
				echo $error->getMessage();
			}
		}
	}
}
