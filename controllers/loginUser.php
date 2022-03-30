
<?php

include_once('./utils/myDbConfig.php');
include_once('./models/class/users.php');

$errors = [];

if (
    !empty($_POST['nom'])
    && !empty($_POST['mail'])
    && !empty($_POST['mdp'])
) {
    $nom = trim($_POST['nom']);
    $mail = trim($_POST['mail']);
    $mdp = trim($_POST['mdp']);
    $verifMdp = htmlspecialchars(strip_tags($mdp));
    $verifMail = htmlspecialchars(strip_tags($mail));
    $verifNom = htmlspecialchars(strip_tags($nom));

    $nUser = new Users();
    $nUser->setMdp(password_hash($verifMdp, PASSWORD_BCRYPT));
    $nUser->setMail($verifMail);
    $nUser->setNom($verifNom);
    //var_dump($nUser);
    //echo $nbrLignes;
    //echo (var_dump($nbrLine));
    $stUser = $nUser->getSingleUser();
    $nbrLine = $stUser->rowCount();
    if ($nbrLine == 0) {
        $errors['mail'] = "Nom inconnue";
        echo "<script>alert(\"Le nom indiquait n'existe pas, peut-être une erreurs de saisie.\")</script>";
        header("Location: /Sirven_JosianeVerDeb-master/views/loginForm.php");  
    } else {
        $userArray = array(
            "user0" => array(
                "nom" => "$nom"
            )
        );
        $pathOfFile = "/home/riozacki/www/Sirven_JosianeVerDeb-master/js";
        $info = "";
        $jsonArray = json_encode($userArray, JSON_UNESCAPED_UNICODE);
        $data = file_put_contents("connectUser.json", $jsonArray);
        file_get_contents($pathOfFile, $info, $customContext, $mode);
        echo "<script>alert(\"Cette adresse e-mail n'est pas valide!\")</script>";

        header("Location: /Sirven_JosianeVerDeb-master/indexUser.php");
    }
}
?>
