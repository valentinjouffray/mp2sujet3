<?php
/*Classe permettant de representer les tuples de la table formation */
class Formation
{
	private $id_formation;
	private $titre;
	private $duree;
	private $acces;
	private $presentation;
	private $debouches;
	private $type_formation;
	private $nom_etablissement;
	private $description;
	private $titre_url;
	

	public function __construct($idF="",$tlt="",$tmp="",$acc="",$pres="",$deb="",$type="",
								$nomEtab="",$des="",$url="")
	{
		$this->id_formation      = $idF;
		$this->titre             = $tlt;
		$this->duree             = $tmp;
		$this->acces             = $acc;
		$this->presentation      = $pres;
		$this->debouches         = $deb;
		$this->type_formation    = $type;
		$this->nom_etablissement = $nomEtab;
		$this->description   	 = $des;
		$this->titre_url		 = $url;
	}

	public function getIdFormation 		() { return $this->id_formation;      }
	public function getTitre 	   		() { return $this->titre;      		  }
	public function getDuree 			() { return $this->duree;       	  }
	public function getAcces 			() { return $this->acces;        	  }
	public function getPresentation 	() { return $this->presentation;      }
	public function getDebouches 		() { return $this->debouches; 		  }
	public function getTypeFormation 	() { return $this->type_formation;    }
	public function getNomEtablissement () { return $this->nom_etablissement; }
	public function getDescriptif		() { return $this->description;        }
	public function getTitre_url		() { return $this->titre_url;        }
}
?>