<?php 
require_once "../../app/app.php";
require_once "../layouts/template.php";
$articles = getAllArticles();
?>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
      	<h1 class="text-3xl font-bold tracking-tight text-gray-900">
			Liste des articles
		</h1>

		<a href="/danceclub/admin/articles/create.php" class="inline-flex items-center px-3 py-1.5 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
			Créer un article
		</a>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach($articles as $article): ?>
        <div class="flex border-b py-4 items-center">
            <!-- Image -->
            <div class="w-[200px] shrink-0 grow-0 mb-4 sm:mb-0">
                <img src="<?=$article['image']?>" alt="ff15 l'image" class="w-full h-auto rounded">
            </div>

            <!-- Date, Titre, Description -->
            <div class="w-full px-4">
                <div class="text-gray-600"><?= $article['created_at']?></div>
                <div class="text-xl sm:text-2xl font-bold my-4"><?= $article['title'] ?></div>
                <div class="text-gray-500">
                <?= $article['description'] ?>
                </div>
            </div>
            <!-- CRUD Buttons -->
            <div class="w-full mt-4 flex flex-col items-end lg:flex-row lg:justify-center gap-4 lg:items-center">
                <a href="/danceclub/article.php?id=<?= $article['id']?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Lire</a>
                <a href="edit.php?id=<?= $article['id'] ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">&Eacute;diter</a>
                <a href="?action=delete_article&id=<?= $article['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require_once "../layouts/footer.php"; ?>
