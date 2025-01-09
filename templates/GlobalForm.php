<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $headTitle ?? "Blog Voyage" ?></title>
    <!--<link rel="stylesheet" href="<?= "/sources/css/style.css?v=" . filemtime(ROOT."/sources/css/style.css") ?>"-->
</head>
<body>
   <h1><?= $headTitle ?? "Blog Voyage" ?></h1>
   
    <main class="main-content">
        <?= $mainContent ?? "Erreur 404" ?>
    </main>

    <footer class="main-foot">
        <p>Emara -2024 </p>
    </footer>

    <!--<script src="<?= "/sources/js/burger.js?v=" . filemtime(ROOT."/sources/js/burger.js") ?>"></script>-->
</body>
</html>