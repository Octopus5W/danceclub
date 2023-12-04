<?php
require_once "../../app/app.php";
require_once "../layouts/template.php";
$users = getAllUsers();
?>
<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
      Liste des utilisateurs
    </h1>

    <a href="/danceclub/admin/users/create.php" class="inline-flex items-center px-3 py-1.5 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
			Créer un utilisateur
		</a>
  </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach($users as $user): ?>
        <div class="flex border-b py-4 items-center ">

            <div class="w-full px-4 min-w-max">
                <div class="text-xl sm:text-2xl font-bold my-4"><?= $user['username']?></div>
                <div class="flex justify-between">
                  <div class="ml-4">
                    <div class="text-gray-700 font-bold">Nom</div>
                    <div class="text-gray-500"><?= $user['name'] ?></div>
                  </div>
                  <div class="ml-4">
                    <div class="text-gray-700 font-bold">Prénom</div>
                    <div class="text-gray-500"><?= $user['surname'] ?></div>
                  </div>
                  <div class="ml-4">
                    <div class="text-gray-700 font-bold">Email</div>
                    <div class="text-gray-500"><?= $user['email'] ?></div>
                  </div>
                  <div class="ml-4">
                    <div class="text-gray-700 font-bold ">Fonction</div>
                    <div class="text-gray-500"><?= $user['role'] ?></div>
                  </div>
                  <div class="ml-4">
                    <div class="text-gray-700 font-bold">Dernière connexion</div>
                    <div class="text-gray-500"><?= $user['last_activity'] ?></div>
                  </div>
                </div>
            </div>
            <!-- CRUD Buttons -->
            <div class="w-2/5 mt-4 flex flex-col items-end lg:flex-row lg:justify-end gap-4 lg:items-center">
                <a href="edit.php?id=<?= $user['id'] ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">&Eacute;diter</a>
                <a href="?action=delete_user&id=<?= $user['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
            </div>
        </div>  
        <?php endforeach; ?>
    </div>
</main>

<?php require_once "../layouts/footer.php"; ?>