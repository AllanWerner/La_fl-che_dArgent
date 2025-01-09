<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" c ontent="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="<?= $stylesheetv . filemtime(ROOT . $stylesheet) ?>">
    <title> Login & Registration</title>
</head>
<body>
 
    <main class="main-content">
        <?= $mainContent ?? "Erreur 404" ?>
    </main>
    <script src="<?= $scriptv . filemtime(ROOT . $script) ?>" defer ></script>
</body>
</html>