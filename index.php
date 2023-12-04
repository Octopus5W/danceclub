<?php 
    require_once 'app/app.php';
    $articles = getAllArticles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos articles</title>
    <link rel="icon"  type="image/x-icon" href="logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="/danceclub/assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    
</head>
<body>
<?php require_once 'partials/header.php'; ?>
<div class="container">

        <?php require_once 'partials/header.php'; ?>
        <!--Bienvenue-->
        <main>
            <section class="section">
                <div class="row">
                    <h1 class="title">Bienvenue chez The Dance Club Studio</h1>
                </div>
                <div class="container">
                    <div class="row justify-content-evenly">
                        <div class="col-sm-12 col-md-6">
                            <p>Bienvenue chez The Dance Club Studio, la nouvelle école de danse, d'expression et de
                                créativité à Tournai. Gérée par Bouli Lejus, diplômé et danseur expérimenté, il est le
                                grand gagnant de l'émission "Dancing 2015" de la RTBF. </p>

                            <p>Chez The Dance Club Studio, on met de l'importance sur le non jugement, le respect de soi
                                et des autres. Chaque individu à sa place. Nous nous consacrons à la formation intégrale
                                des danseurs dès l'âge de 5 ans.</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p> Notre studio est un lieu dédié à l'art, au sport et à l'expression de soi. Vous y serez
                                encadrés par une équipe de professionnels passionnés qui axeront leur pédagogie sur le
                                dépassement de soi tout en s'amusant.</p>

                            <p>Venez nous rejoindre - vivez votre passion et exprimez-vous à travers l'art de la danse
                                chez Studio Dance Club!</p>
                        </div>
                    </div>
                </div>


            </section>

            <hr>
            <!--En 4 mots-->
            <section class="section1">
                <h2 class="title title1">The Dance Club en 4 mots</h2>

                <div>
                    <img src="assets/images/passion.png" alt="Passion">
                    <span>Passion</span>
                </div>
                <div>
                    <img src="assets/images/experience.png" alt="Expérience">
                    <span>Expérience</span>
                </div>
                <div>
                    <img src="assets/images/partage.png" alt="Partage">
                    <span>Partage</span>
                </div>
                <div>
                    <img src="assets/images/amusement.png" alt="Amusement">
                    <span>Connexion</span>
                </div>
            </section>
            <hr>

            <!-- Nos articles-->
            <article>
                <div class="row">
                    <h2 class="title title1">Nos articles</h2>
                </div>
                <div class="row">
                    <?php 
                        if(count($articles) > 0) { 
                            foreach($articles as $article): ?>
                    <div class="col-md-6">
                        <div class="card">
                            <img src="<?= $article['image'] ?>" alt="FF 15 l'image" />
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $article['title'] ?>
                                </h5>
                                <p class="card-text"><?= $article['description'] ?></p>
                                    <a href="./article.php?id=<?= $article['id'] ?>" class="btn">Lire la suite </a>
                                <p class="date"> <span><?= $article['created_at'] ?></span></p>
                                <h5>Note des lecteurs: <span><?= isset($article['moyenne_notes']) ? $article['moyenne_notes'] : '0' ?>/5</span></h5>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach; } else echo "Pas d'articles..."; ?>
                </div>
            </article>
        </main>
        <hr>
        <footer>
            <div class="footer">
                <p>Copyright Just Dance Studio</p>
            </div>
        </footer>
    </div>
</body>