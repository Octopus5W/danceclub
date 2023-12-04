<?php 
require_once "../../app/app.php";

require_once "../layouts/template.php";
?>
<header class="bg-white shadow">
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
      	<h1 class="text-3xl font-bold tracking-tight text-gray-900">
			Ajouter un article
		</h1>
		<a href="/danceclub/admin/articles/" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
			Annuler 
		</a>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<form action="?action=add_article" method="POST">

			<!-- PROPOSITION A : CHARGER UN IMAGE VIA UN UPLOAD -->
			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image de l'article</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="image" type="file" name="image">
			</div>

			<!-- PROPOSITION B : CHARGER UN IMAGE VIA L'URL -->
			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image de l'article</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="image" type="text" name="image" placeholder="URL de l'image">
				<?php if(isset($errors['image'])) { displayErrors($errors['image']); } ?>
			</div>

			<!-- Titre de l'article -->
			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="titre">Titre de l'article</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="titre" type="text" placeholder="Titre de l'article" name="titre">
				<?php if(isset($errors['titre'])) { displayErrors($errors['titre']); } ?>
			</div>

			<!-- Description -->
			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
				<textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="description" placeholder="Description de l'article" name="description"></textarea>
				<?php if(isset($errors['description'])) { displayErrors($errors['description']); } ?>
			</div>

			<!-- Content -->
			<div class="mb-6">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="content">Contenu</label>
				<textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="content" placeholder="Contenu de l'article" name="content"></textarea>
				<?php if(isset($errors['content'])) { displayErrors($errors['content']); } ?>
			</div>

			<!-- Boutons créer & annuler -->
			<button class="bg-indigo-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" type="submit">Créer</button>

		</form>

	</div>
</main>

<?php require_once "../layouts/footer.php"; ?>
