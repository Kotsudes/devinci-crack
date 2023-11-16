<?php
require_once("config/Connexion.php");
// I've commented this line because it would call everytime I refreshed the page
// making it very slow to work
// Connexion::connect();
class Person
{

    private $id;
    private $first_name;
    private $last_name;
    private $profession;

    public function __construct($id = NULL, $first_name = NULL, $last_name = NULL, $profession = NULL)
    {
        if (!is_null($first_name)) {
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->profession = $profession;
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function getProfession()
    {
        return $this->profession;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    public static function getAllUsers()
    {
        $requete = "SELECT * FROM person;";
        $reponse = Connexion::pdo()->query($requete);
        $reponse->setFetchMode(PDO::FETCH_CLASS, 'person');
        $tab = $reponse->fetchAll();
        return $tab;
    }

    public static function getUserById($id)
    {
        $requetePreparee = "SELECT * FROM person WHERE id= :tag_id;";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
        $valeurs = array("tag_id" => $id);
        try {
            $req_prep->execute($valeurs);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'person');
            $v = $req_prep->fetch();
            if (!$v)
                return false;
            return $v;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
        }
        return false;
    }

    public static function getUserByIdUnsecure($id)
    {
        $requete = "SELECT * FROM person WHERE id= $id;";
        try {
            $reponse = Connexion::pdo()->query($requete);
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'Person');
            $v = $reponse->fetch();
            if (!$v)
                return false;
            return $v;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
        }
        return false;
    }

    public static function insertUser($prenom, $nom, $profession)
    {
        $requetePreparee = "INSERT INTO Person VALUES (NULL,:tag_prenom,:tag_nom,:tag_profession)";
        $req_prep = Connexion::pdo()->prepare($requetePreparee);
        $valeurs = array("tag_prenom" => $prenom, "tag_nom" => $nom, "tag_profession" => $profession);
        try {
            $req_prep->execute($valeurs);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public static function insertUserUnsecure($prenom, $nom, $profession)
    {
        $requete = "INSERT INTO Person VALUES (NULL,$prenom,$nom,$profession);";
        try {
            Connexion::pdo()->query($requete);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }

}
?>