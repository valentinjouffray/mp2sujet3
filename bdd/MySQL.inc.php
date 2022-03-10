<?php 
require 'Formation.inc.php';

class MySQL
{
	private static $instance = null; //mémorisation de l'instance de DB pour appliquer le pattern Singleton
	private $connect=null;           //connexion PDO à la base

	/************************************************************************/
	/*        Constructeur gerant  la connexion à la base via PDO           */
	/************************************************************************/
	private function __construct()
	{
		// Connexion à la base de données
		$connStr = 'mysql:host=localhost;dbname=mp2_sujet3_1;';
		try
		{
			// Connexion à la base
			$this->connect = new PDO($connStr, 'root','');
			// Configuration facultative de la connexion
			$this->connect->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
			echo "probleme de connexion :".$e->getMessage();
			return null;
		}
	}

	/************************************************************************/
	/*          Methode permettant d'obtenir un objet instance de DB        */
	/************************************************************************/
	public static function getInstance()
	{
		if (is_null(self::$instance))
		{
			try { self::$instance = new MySQL(); }
			catch (PDOException $e) { echo $e; }
		}

		$obj = self::$instance;

		if (($obj->connect) == null) { self::$instance=null; }
		return self::$instance;
	}

	/************************************************************************/
	/*    Methode permettant de fermer la connexion a la base de données    */
	/************************************************************************/
	public function close() { $this->connect = null; }

	/************************************************************************/
	/*    Methode uniquement utilisable dans les méthodes de la class DB.   */
	/*     Permet d'exécuter n'importe quelle requête SQL et renvoit les    */
	/*    tuples renvoyés par la requête sous forme d'un tableau d'objets   */ 
	/************************************************************************/
	/* param1 : texte de la requête à exécuter (éventuellement paramétrée)  */
	/* param2 : tableau des valeurs permettant d'instancier les paramètres  */
	/* param3 : nom de la classe devant être utilisée pour créer les objets */
	/* qui vont représenter les différents tuples.                          */
	/************************************************************************/
	private function execQuery($requete,$tparam,$nomClasse)
	{
		//on prépare la requête
		$stmt = $this->connect->prepare($requete);
		//on indique que l'on va récupére les tuples sous forme d'objets instance de Client
		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $nomClasse); 
		//on exécute la requête

		if ($tparam != null)
        {
            $stmt->execute($tparam);
        }
		else 
        {
            $stmt->execute();
        }

		//récupération du résultat de la requête sous forme d'un tableau d'objets
		$tab = array();
		$tuple = $stmt->fetch(); //on récupère le premier tuple sous forme d'objet
		if ($tuple)
		{
			//au moins un tuple a été renvoyé
			while ($tuple != false)
			{
				$tab[]=$tuple;           //on ajoute l'objet en fin de tableau
				$tuple = $stmt->fetch(); //on récupère un tuple sous la forme
				                         //d'un objet instance de la classe $nomClasse
			}
		}
		return $tab;
	}

	/************************************************************************/
	/*   Methode utilisable uniquement dans les méthodes de la classe DB.   */
	/*   permet d'exécuter n'importe quel ordre SQL autre qu'une requête.   */
	/*  Résultat : nombre de tuples affectés par l'exécution de l'ordre SQL */
	/************************************************************************/
	/*  param1 : texte de l'ordre SQL à exécuter (éventuellement paramétré) */
	/*  param2 : tableau des valeurs permettant d'instancier les paramètres */
	/************************************************************************/
	private function execMaj($ordreSQL,$tparam)
	{		
		$stmt = $this->connect->prepare($ordreSQL);
		$res = $stmt->execute($tparam); //execution de l'ordre SQL 
		echo $stmt->rowCount();
		return $stmt->rowCount();
	}

	/************************************************************************/
	/*      Fonctions qui peuvent être utilisées dans les scripts PHP       */
	/************************************************************************/

    public function getFormations()
	{
		$requete = 'SELECT * FROM `formation`';
		return $this->execQuery($requete,null,'Formation');
	}

    public function getFormation($url)
    {
        $requete = 'SELECT * FROM formation WHERE titre_url = ?';
        return $this->execQuery($requete, array($url), 'Formation');
    }

    public function getUtilisateurs()
    {
        $requete = 'SELECT * FROM utilisateurs';
        return $this->execQuery($requete, null, 'Utilisateurs');
    }

    public function insertUtilisateur($mdp,$nom,$pnom,$email,$type)
    {
        $requete = 'INSERT INTO utilisateurs VALUES(?,?,?,?,?,?)';
        $tparam = array(0,$mdp, $nom, $pnom, $email, $type);
        return $this->execMaj($requete, $tparam);
    }


    public function insertFormation($tlt,$tmp,$acc,$pres,$deb,$type,$nomEtab,$des,$url)
        {
            $requete = 'INSERT INTO `formation` (`id_formation`, `titre`, `duree`, `acces`, `presentation`, `debouches`, `type_formation`, `nom_etablissement`, `description`, `titre_url`) VALUES(?,?,?,?,?,?,?,?,?,?)';
            $tparam = array(0,$tlt,$tmp,$acc,$pres,$deb,$type,$nomEtab,$des,$url);
            return $this->execMaj($requete,$tparam);
        }

    public function updateFormation($idF,$tlt,$tmp,$acc,$pres,$deb,$type,$nomEtab,$des,$url)
    {
        $requete= 'UPDATE `formation` SET `titre` =?,`duree`=?,`acces`=?,`presentation`=?,`debouches`=?,`type_formation`=?,`nom_etablissement`=?,`description`=?,`titre_url`=? WHERE `formation`.`id_formation` = ?';
        $tparam = array($tlt, $tmp, $acc, $pres, $deb, $type, $nomEtab, $des, $url, $idF);
        return $this->execMaj($requete, $tparam);
    }

    public function deleteFormation($idF)
    {
        $requete= 'DELETE FROM formation WHERE id_formation=?';
        return $this->execMaj($requete, array($idF));
    }
    
}    
?>