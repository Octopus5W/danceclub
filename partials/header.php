<!-- Header -->
<header>
    <?php 

    if (isset($_SESSION['user'])) : ?>
        <div>
            <a href="/danceclub/admin">Bienvenue <?= $_SESSION['user']['username'] ?></a>
            <?php if ($_SESSION['user']['role'] === 'admin') : ?>
                <a href="/danceclub/admin" style="display:block">Administration</a>
            <?php endif; ?>
        <?php else : ?>
            <a href="./login.php">Connexion</a>
        <?php endif; ?>
        </div>


        <div class="logo">
            <a href="/danceclub"> <img src="assets/images/logo.jpg" alt="Logo The Dance Club" /></a>
        </div>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="./logout.php">Se déconnecter</a>
        <?php else : ?>
            <a href="./register.php">Inscription</a>
        <?php endif; ?>
</header>
<hr>