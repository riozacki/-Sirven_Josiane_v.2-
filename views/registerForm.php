
<?php
    include_once"./controllers/registerUser.php";
    include_once"./models/class/users.php";
?>
<body>
    
<form name="form_first" id="form_first"  class="displayAll" onsubmit="return registerForm()" method="POST" action="#" enctype="multipart/form-data">
        <h2>Formulaire d'inscription</h2><br/>
        <div id="separator">
            
        </div><br/>
        <label for="nom">Nom:</label><br/>
        <input type="text" id="nom" name="nom" maxlength="20" value="riozacki" required><br/>
        <label for="prenom">Prènom:</label><br/>
        <input type="text" id="prenom" name="prenom" maxlength="20" value="rio" required><br/>
        <label for="mail">E-mail:</label><br/>
        <input type="mail" id="mail" name="mail" maxlength="25" value="riozacki@gmx.com" required><br/>
        <label for="mailc">Confirmez votre E-mail:</label><br/>
        <input type="mail" id="mailc" name="mailc" maxlength="25" value="riozacki@gmx.com" required><br/>
        <label for="tel">Téléphone mobile:</label><br/>
        <input type="tel" id="tel" name="tel" maxlength="14" value="0677523809" required><br/>
        <label for="adresse">Adresse:</label><br/>
        <input type="text" id="adresse" name="adresse" maxlength="50" value="2,rue de la côte" required><br/>
        <label for="cp">Code postal:</label><br/>
        <input type="text" id="cp" name="cp" maxlength="5" value="09700" required><br/>
        <label for="ville">Ville:</label><br/>
        <input type="text" id="ville" name="ville" maxlength="25" value="SAVERDUN" required><br/>
        <label for="mdp">Mot de passe:</label><br/>
        <input type="password" id="mdp" name="mdp" maxlength="150" value="123456" required><br/>
        <label for="mdpc">Confirmer mot de passe:</label><br/>
        <input type="password" id="mdpc" name="mdpc" maxlength="150" required><br/>
        <input type="submit" name="submit" id="inscription" value="S'inscrire"><br/>
    </form>
  <script src="js/registerUser.js"></script>
</body>
