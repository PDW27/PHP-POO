<?php 
if(isset($_GET["page"]) && is_numeric($_GET["page"])){
    $connexion = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root" , "") ;
    $sth = $connexion->prepare("SELECT * FROM articles WHERE id = :id");
    $sth->execute(["id" => $_GET["page"]]);
    $article = current($sth->fetchAll(PDO::FETCH_ASSOC));
}else {
    echo  "erreur dans la requête";
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-warning">
        <nav class="navbar navbar-expand navbar-dark container">
            <a href="" class="navbar-brand">Exo3</a>
        </nav>
    </header>
    <main class="container mt-3">
        <div class="row">
        <!-- <?php for($i = 0 ; $i < 3; $i++) : ?>
            <i class="bi bi-star-fill"></i>
        <?php endfor ?> -->
    
        <?php foreach($articles as $article) : ?>
                <article class="col-4 mb-3">
                    <div class="card">
                        <h2 class="card-header"><?= $article["titre"]  ?></h2>
                        <img src="https://via.placeholder.com/300x200" alt="">
                        <div class="card-body">
                            <?= substr($article["contenu"], 0 , 200) ?>
                        </div>
                        <footer class="card-footer">
                            <a href="02-article.php?page=<?= $article["id"] ?>" class="btn btn-primary">lire la suite</a>
                        </footer>
                    </div>
                </article>
            <?php endforeach ?>
        </div>
    </main>
</body>
</html> 