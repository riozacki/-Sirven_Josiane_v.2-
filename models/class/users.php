<?php
include_once('./utils/myDbConfig.php');
include_once('./models/class/users.php');
class Users
{
    public $connect;
    private $tableUser = 'utilisateurs';
    private $nom;
    private $prenom;
    private $mail;
    private $mailc;
    private $tel;
    private $adresse;
    private $cp;
    private $ville;
    private $mdp;
    private $mdpc;


    /*
        public function __construct($nom, $prenom, $mail, $tel ,$adresse, $cp, $ville, $mdp, $mdpc){
            $this->setNom=($nom);
            $this->setPrenom($prenom);
            $this->setMail($mail);
            $this->setTel($tel);
            $this->setAdresse($adresse);
            $this->setCp($cp);
            $this->setVille($ville);
            $this->setMdp($mdp);
            $this->setMdpc($mdpc);
        }
*/
    public function __construct()
    {
        $this->connect = new MyDbConfig();
        $this->connect = $this->connect->getConnection();
    }

    public function getIdUtilisateurs()
    {
        return $this->idUtilisateurs;
    }

    public function getTableUser()
    {
        return $this->tableUser;
    }


    public function setMdpc($mdpc)
    {
        $this->mdpc = $mdpc;
    }


    public function setMailc($mailc)
    {
        $this->mailc = $mailc;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }


    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }



    //création des méthodes de base  CRUD

    // Read pour récupérer la liste de tous les utilisateurs
    public function getUsers()
    {
        // stokage de la requête dans une variable
        $myQuery = 'SELECT 
                            * 
                        FROM 
                            ' . $this->tableUser . '';

        // stockage dans variable de la préparation de la requête
        $stmt = $this->connect->prepare($myQuery);

        //exécution de la requête
        $stmt->execute();

        // je retourne le résultat
        return $stmt;
    }

    //Read d'un seul utilisateur selon son pseudo
    //(peut-être modifié avec recherche par id ou mail, etc)

    public function getSingleUser()
    {
        // stokage de la requête dans une variable
        $myQuery = 'SELECT 
                            * 
                        FROM 
                            ' . $this->tableUser . '
                        WHERE
                            nom = :nom';

        $stmt = $this->connect->prepare($myQuery);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->execute();
        return $stmt;
    }

    public function createUser() {
        $myQuery = 'INSERT INTO
                            ' . $this->tableUser . '
                        SET
                        nom = :nom,
                        prenom = :prenom,
                        mail = :mail,
                        tel = :tel,
                        adresse = :adresse,
                        cp = :cp,
                        ville = :ville,
                        mdp = :mdp';
        $stmt = $this->connect->prepare($myQuery);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':mail', $this->mail);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':adresse', $this->adresse);
        $stmt->bindParam(':cp', $this->cp);
        $stmt->bindParam(':ville', $this->ville);
        $stmt->bindParam(':mdp', $this->mdp);
        return $stmt->execute();
    }

    // UPDATE mise à jour de l'utilisateur selon son pseudo
    public function updateUser()
    {
        $myQuery = 'UPDATE
                            ' . $this->tableUser . '
                        SET
                    
                        nom = :nom,
                        prenom = :prenom,
                        mail = :mail,
                        mailc = :mailc,
                        tel = :tel,
                        adresse = :adresse,
                        cp = :cp,
                        ville = :ville,
                        mdp = :mdp,
                        mdpc = :mdpc
                        WHERE
                            nom = :nom2';
        $stmt = $this->connect->prepare($myQuery);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':mail', $this->mail);
        $stmt->bindParam(':mailc', $this->mailc);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':adresse', $this->adresse);
        $stmt->bindParam(':cp', $this->cp);
        $stmt->bindParam(':ville', $this->ville);
        $stmt->bindParam(':mdp', $this->mdp);
        $stmt->bindParam(':mdpc', $this->mdpc);
        if ($stmt->execute) {
            // je retourne true si mise à jour réussie
            return true;
        } else {
            return false;
        }
        // ci-dessus je peux simplifier en écrivant return $stmt->execute();
    }

    // DELETE suppression d'un utilisateur selon pseudo 
    // (on peut aussi avec un autre attribut selon son besoin)
    public function deleteUser()
    {
        $myQuery = 'DELETE FROM ' . $this->tableUser . ' WHERE nom = ' . $this->nom . '';

        $stmt = $this->connect->prepare($myQuery);

        $stmt->bindParam(':nom', $this->nom);

        if ($stmt->execute) {
            // je retourne true si mise à jour réussie
            return true;
        } else {
            return false;
        }
    }

    // vérification si un pseudo ou un mail est déjà existant
    public function verifyMail()
    {
        $myQuery = 'SELECT * FROM utilisateurs WHERE mail :mail';

        $stmt = $this->connect->prepare($myQuery);

        //$stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':mail', $this->mail);

        $stmt->execute();
        return $stmt;
    }
    public function verifyPseudoAndMail() {
        $myQuery = 'SELECT
                        *
                    FROM
                        '.$this->table.'
                    WHERE
                        nom = :nom
                    OR 
                        mail = :mail';

        $stmt = $this->connect->prepare($myQuery);

        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':mail', $this->mail);

        $stmt->execute();
        return $stmt;
    }
}
