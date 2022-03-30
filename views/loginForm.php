<?php
    include_once"./controllers/loginUser.php";
    include_once"./models/class/users.php";
?>

<body>
    <form id="formLogin" onsubmit="return loginForm()"class="displayAll" action="#" method="post">
        <h2>Formulaire de connexion</h2><br />
        <div id="separator"></div><br />
        <label for="nom">Entrez votre Nom:</label><br />
        <input type="text" value="riozacki" name="nom" maxlength="20" required><br />
        <label for="mail">E-mail:</label><br />
        <input type="mail" name="mail" maxlength="25" required><br />
        <label for="mdp">Mot de passe:</label><br />
        <input type="password" name="mdp" maxlength="150" required><br />
        <input type="submit" name="connexion" id="connexion" value="Se connecter">
    </form>
    <script src="js/loginUser.js"></script>
</body>