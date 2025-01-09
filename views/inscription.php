<?php

$headTitle = "Inscription";

ob_start();
?>

<section class="main-sections">
    <h1 class="main-form-title">
        <?= $headTitle ?>
    </h1>

    <form action="/user/inscription" method="POST">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" required />
        <label for="address">Adresse</label>
        <input type="address" id="address" name="address" required />
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
        <label for="passwd">Mot de passe</label>
        <input type="password" id="passwd" name="passwd" required />
        <label for="phone_num">Numéro de téléphone</label>
        <input type="number" id="phone_num" name="phone_num" required />

        <button type="submit" class="cta-btns">Envoyer</button>
        
    </form>
</section>

<?php
$mainContent = ob_get_clean();