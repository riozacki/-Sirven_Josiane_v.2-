<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include_once('./utils/myDbConfig.php');
include_once('./models/class/users.php');

$success = 0;
$msg = "Une erreur est survenue dans le php";
$data = [];
$errors = [];

if (
        !empty($_POST['nom'])
        && !empty($_POST['prenom'])
        && !empty($_POST['mail'])
        && !empty($_POST['mailc'])
        && !empty($_POST['tel'])
        && !empty($_POST['adresse'])
        && !empty($_POST['cp'])
        && !empty($_POST['ville'])
        && !empty($_POST['mdp'])
        && !empty($_POST['mdpc'])) {

                $nom = trim($_POST['nom']);
                $prenom = trim($_POST['prenom']);
                $mail = trim($_POST['mail']);
                $mailc = trim($_POST['mailc']);
                $tel = trim($_POST['tel']);
                $adresse = trim($_POST['adresse']);
                $cp = trim($_POST['cp']);
                $ville = trim($_POST['ville']);
                $mdp = trim($_POST['mdp']);
                $mdpc = trim($_POST['mdpc']);
        
                $verifMdp = htmlspecialchars(strip_tags($mdp));
                $verifNom = htmlspecialchars(strip_tags($nom));
                $verifMail = htmlspecialchars(strip_tags($mail));
                $verifAdresse = htmlspecialchars(strip_tags($adresse));
                $verifVille = htmlspecialchars(strip_tags($ville));
                $verifCp = htmlspecialchars(strip_tags($cp));
                $verifPrenom = htmlspecialchars(strip_tags($prenom));
                $verifTel = htmlspecialchars(strip_tags($tel));
                
                
                if($mdp !== $mdpc){
                        $errors['mdp'] = 'Les mots de passe ne correspondent pas !';
                        echo "<script>alert(\"JS dans PHP: Les mots de passe ne correspondent pas !\")</script>";
                        print('PHP: Les mots de passe ne correspondent pas !');
                }else{
               
                        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                                $errors['mail'] = "Cette adresse e-mail n'est pas valide!";
                                echo "<script>alert(\"Cette adresse e-mail n'est pas valide!\")</script>";
                                echo ($errors);
                        }
                        if(!filter_var($mailc, FILTER_VALIDATE_EMAIL)){
                                $errors['mail'] = "Cette confirmation d'adresse e-mail n'est pas valide!";
                                echo "<script>alert(\"Cette confirmation d'dresse e-mail n'est pas valide!\")</script>";
                                echo ($errors);
                        }
                        if($mail !== $mailc){
                                $errors['mailCompare'] = "Vos emails ne sont pas identiques!";
                                echo "<script>alert(\"Vos emails ne sont pas identiques!\")</script>";
                                echo ($errors);
                        }
                
                }
                if (empty($errors)){
                    
                        $newUser = new Users();
                        // pour l'affectation du mot de passe je vais également utiliser la fonction de hash de BCRIPT
                        // pour crypter le mot de passe.
                        $newUser->setMdp(password_hash($verifMdp, PASSWORD_BCRYPT));
                        $newUser->setMail($verifMail);
                        $newUser->setNom($verifNom);
                        $newUser->setPrenom($verifPrenom);
                        $newUser->setTel($verifTel);
                        $newUser->setAdresse($verifAdresse);
                        $newUser->setCp($verifCp);
                        $newUser->setVille($verifVille);

                        $newUser->createUser();
                        
                        //JSON data user
                        $userArray = array (
                                "user0" => array (
                                        "nom" => "$nom",
                                        "prenom" => "$prenom",
                                        "mail" => "$mail",
                                        "tel" => "$tel",
                                        "adresse" => "$adresse",
                                        "cp" => "$cp",
                                        "ville" => "$ville",
                                        "mdp" => "$mdp"
                                        )
                                );
                        $pathOfFile = "/home/riozacki/www/Sirven_JosianeVerDeb-master/js";
                        $info = "";
                        $jsonArray = json_encode($userArray, JSON_UNESCAPED_UNICODE);
                        $data = file_put_contents("newUser.json", $jsonArray);
                        file_get_contents($pathOfFile, $info, $customContext, $mode);
                        
                        header("Location: /Sirven_JosianeVerDeb-master/indexUser.php");  
                }
        }
?>
  

