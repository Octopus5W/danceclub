<?php
/*
 * 	Action Edit utilisateur
 *  On traite l'action editer un utilisateur ici
 */

if ($action === 'edit_user') {

	// on vérifie que le formulaire a été soumis et qu'il n'est pas vide
	if (isset($_POST) && !empty($_POST)) {

		// on vérifie que les règes sont respectées
		$errors = Form($_POST, [
			'name' => ['required', 'max:255'],
			'surname' => ['required', 'max:255'],
			'username' => ['required', 'max:255'],
			'email' => ['required', 'max:255'],
			'role' => ['required', 'max:255'],
			'password' => ['required', 'max:255'],
			'password_check' => ['required', 'max:255']
		]);

		// si il n'y a pas d'erreurs
		if (empty($errors)) {
			// on récupère les données du formulaire
			$data = formValidation($_POST);
			if (filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
				if ($data["password"] === $data["password_check"]) {
					$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					updateUser($data, $_GET['id']);
					header('Location: index.php');
				}
				else{
					$errors['password'][] = "les mots de passe doivent être identique";
				}
			}
			else{
				$errors['email'][] = "Email non valide";
			}
		}
	}
}
