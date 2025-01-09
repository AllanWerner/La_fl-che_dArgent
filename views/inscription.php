<?php

$stylesheetv = "/sources/css/inscription.css?v=";
$stylesheet = "/sources/css/inscription.css";

$scriptv = "/sources/js/inscription.js?v=";
$script = "/sources/js/inscription.js";
 



ob_start();
?>


<div class="wrapper">
 
    <nav class="nav">
 
        <div class="nav-logo">
 
            <img class='logo' src='./images/logo.png'>
 
        </div>
 
       
 
        <div class="nav-button">
 
            <button class="btn white-btn" id="loginBtn" onclick="login()">Connexion</button>
 
            <button class="btn" id="registerBtn" onclick="register()">Inscription</button>
 
        </div>
 
        <div class="nav-menu-btn">
 
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
 
        </div>
 
    </nav>
       
 
    <div class="form-box">
 
       
 
        <!------------------- Formulaire de connexion -------------------------->
 
 
 
        <form method="post" action="/connexion" class="login-container" id="login">
 
            <div class="top">
 
                <header>Connexion</header>
 
            </div>
 
            <div class="input-box">
 
                <input type="email" class="input-field" id="email" name="email" placeholder="Email" required>
 
                <i class="bx bx-user"></i>
 
            </div>
 
            <div class="input-box">
 
                <input type="password" class="input-field"  id="passwd" name="passwd" placeholder="Mot de passe" required>
 
                <i class="bx bx-lock-alt"></i>
 
            </div>
 
            <div class="input-box">
 
                <select class="input-field" id="account-type" name="account-type">
 
                    <option value="User">Utilisateur</option>
 
                    <option value="Admin">Administrateur</option>
 
                </select>
 
            </div>
 
            <br>
 
            <div class="input-box">
 
                <input type="submit" class="submit" value="Valider">
 
            </div>
 
            <div class="two-col">
 
                <div class="one">
 
                    <input type="checkbox" id="login-check">
 
                    <label for="login-check"> Remember Me</label>
 
                </div>
 
                <div class="two">
 
                    <label><a href="reset_password.php">Mot de passe oublié ?</a></label>
 
                </div>
 
            </div>
 
            <?php
 
                if (isset($_GET['erreur'])) {
 
                    $err = $_GET['erreur'];
 
                    if ($err == 1) {
 
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
 
                    }elseif($err == 2){
 
                        echo "<p style='color:red'>Utilisateur déjà existant !</p>";
 
                    } elseif ($err ==  3) {
 
                        echo "Echec de récupération des informations de connexion ";
 
                    }
 
                    elseif ($err == 4 ) {
 
                        echo "Vous n'êtes pas autorisé à vous connecter en tant  que Administrateur";
 
                    }
 
                    elseif ($err == 5 ) {
 
                        echo "votre compte c'est fait BAN. Veuillez écrire au administrateur.";
 
                    }
 
                    elseif ($err == 6 ) {
 
                        echo "L'adresse email est invalide !";
 
                    }
 
                    elseif ($err == 7 ) {
 
                        echo "Votre mot de passe doit avoir une longueur minimale de 8 caractères et contenir au moins une lettre minuscule, une lettre majuscule, un chiffre, et un caractère spécial parmi @$!%*#?&";
 
                    }
 
                }
 
                ?>
 
        </form>
 
 
 
        <!------------------- Formulaire d'inscription -------------------------->
 
        <form method="post" action="/inscription" class="register-container" id = "register"  onsubmit="return validateCaptcha();">
 
            <div class="top">
 
                <header>Inscription</header>
 
            </div>
 
            <div class="two-forms">
 
                <div class="input-box">
 
                    <input type="text" class="input-field" id="name" name="name"  placeholder="Nom ou pseudo" required>
 
                    <i class="bx bx-user"></i>
 
                </div>
 
            </div>
 
            <div class="input-box">
 
                <input type="email" class="input-field"  id="email" name="email" placeholder="Email" required>
 
                <i class="bx bx-envelope"></i>
 
            </div>
 
            <div class="input-box">
 
                <input type="password" class="input-field" id="passwd" name="passwd" placeholder="Mot de passe" required>
 
                <i class="bx bx-lock-alt"></i>
 
            </div>
            <div class="input-box">
 
                <input type="address" class="input-field" id="address" name="address" placeholder="Adresse" required>
 
                <i class="bx bx-lock-alt"></i>
 
            </div>
 
            <div class="input-box">
 
                <input type="number" class="input-field" id="phone_num" name="phone_num" placeholder="Numéro de téléphone" required>
 
                <i class="bx bx-lock-alt"></i>
 
            </div>
 
            <!-- Dropdown menu for account type -->
 
            <div class="input-box">
 
                <select class="input-field" id="account-type" name="account-type">
 
                    <option value="User">Utilisateur</option>
 
                </select>
 
            </div>
 
            <div class="g-recaptcha" data-sitekey="6LfOg5gpAAAAAOuyBgzvJw4SxxEtwqOK0jhF0DJ5"></div>
 
            <div id =  "captchaError"></div>
 
            <script>
 
                function  validateCaptcha() {
 
                    var response = grecaptcha.getResponse();
 
                    while(response.length == 0) {
 
                        document.getElementById("captchaError") .innerHTML ="Veillez compléter le captcha.";
 
                        return false;
 
                    }
 
                }
 
            </script>
 
            <!-- End of dropdown menu -->
 
            <div class="input-box">
 
                <input type="submit" class="submit" value="S'inscrire">
 
            </div>
 
            <div class="two-col">
 
                <div class="one">
 
                    <input type="checkbox" id="register-check">
 
                    <label for="register-check"> Remember Me</label>
 
                </div>
 
                <div class="two">
 
                    <label><a href="#">Termes & conditions</a></label>
 
                </div>
 
            </div>
 
            <?php
 
                if (isset($_GET['erreur'])) {
 
                    $err = $_GET['erreur'];
 
                    if ($err == 1) {
 
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
 
                    }elseif($err == 2){
 
                        echo "<p style='color:red'>Utilisateur déjà existant !</p>";
 
                    } elseif ($err ==  3) {
 
                        echo "Echec de récupération des informations de connexion ";
 
                    }
 
                    elseif ($err == 4 ) {
 
                        echo "Vous n'êtes pas autorisé à vous connecter en tant  que Administrateur";
 
                    }
 
                    elseif ($err == 5 ) {
 
                        echo "votre compte c'est fait BAN. Veuillez écrirt au administrateur.";
 
                    }
 
                }
 
                ?>
 
        </form>
 
    </div>
 
</div>  



<?php
$mainContent = ob_get_clean();