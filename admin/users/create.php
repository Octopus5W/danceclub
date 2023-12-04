<?php
require_once "../../app/app.php";
require_once "../layouts/template.php";
?>
<header class="bg-white shadow">
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
		<h1 class="text-3xl font-bold tracking-tight text-gray-900">
			Ajouter un utilisateur
		</h1>
		<a href="/danceclub/admin/users/" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
			Annuler
		</a>
	</div>
</header>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<form action="?action=add_user" method="POST">
			<label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role</label>
			<select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" name="role" id="role">
				<option value="user" selected>Utilisateur</option>
				<option value="admin">Administrateur</option>
			</select>
			<?php if (isset($errors['role'])) {
				displayErrors($errors['role']);
			} ?>

			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nom</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="name" type="text" name="name" placeholder="Nom">
				<?php if (isset($errors['name'])) {
					displayErrors($errors['name']);
				} ?>
			</div>

			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="surname">Prénom</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="surname" type="text" name="surname" placeholder="Prénom">
				<?php if (isset($errors['surname'])) {
					displayErrors($errors['surname']);
				} ?>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="username">Nom d'utilisateur</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="username" type="text" placeholder="Nom d'utilisateur" name="username">
				<?php if (isset($errors['username'])) {
					displayErrors($errors['username']);
				} ?>
			</div>

			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email" type="email" placeholder="unexemple@email.com" name="email">
				<?php if (isset($errors['email'])) {
					displayErrors($errors['email']);
				} ?>
			</div>


			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mot de passe</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="password" type="password" placeholder="********" name="password">
				<?php if (isset($errors['password'])) {
					displayErrors($errors['password']);
				} ?>
			</div>

			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="password_check">Confirmation du mot de passe</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="password_check" type="password" placeholder="********" name="password_check">
				<?php if (isset($errors['password_check'])) {
					displayErrors($errors['password_check']);
				} ?>
			</div>

			<button class="bg-indigo-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" type="submit">Ajouter</button>

		</form>

	</div>
</main>

<?php require_once "../layouts/footer.php"; ?>