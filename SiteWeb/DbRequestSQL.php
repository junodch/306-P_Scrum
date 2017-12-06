<?php
/**
 * ETML
 * User: Junod Christophe
 * Date: 22.11.2017
 * Description: list de fonctions SQL.
 */

include_once ("dbConfig.php");

class DbRequestSQL {
	private $link;

	public function __construct() {
        try {
            $this->link = new PDO(
				'mysql:host='.$GLOBALS['dbConfig']['dbHost'].';
                dbname='.$GLOBALS['dbConfig']['dbName'].';
                charset='.$GLOBALS['dbConfig']['dbCharset'],
                $GLOBALS['dbConfig']['dbUser'],
                $GLOBALS['dbConfig']['dbUserPw']);
        }
        catch (Exception $e) {
            die('SQL failure : ' . $e->getMessage());
        }
    }

	public function __destruct() {
        $this->link = null;
    }


    /**
     *  TODO: query for admin page
     */
	public function getAllCommandsByCloserDelivery (){
	    $query = "SELECT * FROM t_commande JOIN ";
    }

	// selectionner tout les champs d'une entrée.

	public function selectTable ($table ,$id) {
		$query = "SELECT * FROM  ".$table." WHERE ".$this->searchIdAttribute($table)." = ".$id.";";
		return $this->executeAndReturnRequest($query);
	}

	// Recherche une entrée (retourne l'id) selon les infos d'une autre entrée.

	public function searchCommandFromClient ($idClient) {
		$query = "SELECT idCommande FROM t_commande WHERE fkClient = ".$idClient.";";
		return $this->executeAndReturnRequest($query);
	}


    /**
     * @param $idClient
     * @param $date (ex: '20061223 23:59:59.99') guillemets importants
     * @return array
     */
	public function searchPastCommandFromClient ($idClient, $date) {
		$query = "SELECT idCommande FROM t_commande WHERE fkClient = ".$idClient." AND comDateLivraison < '%".$date."%';";
		return $this->executeAndReturnRequest($query);
	}

	public function searchFutureCommandFromClient ($idClient, $date) {
		$query = "SELECT idCommande FROM t_commande WHERE fkClient = ".$idClient." AND comDateLivraison >= '%".$date."%';";
		return $this->executeAndReturnRequest($query);
	}

	
	// Recherche une entrée (retourne l'id) selon des mots-clés.

	public function searchClientFromName ($nom, $prenom) {
		$query = "SELECT idClient FROM t_client WHERE cliNom LIKE '%".$nom."%' AND cliPrenom LIKE '%".$prenom."%';";
		return $this->executeAndReturnRequest($query);
	}

	public function searchClientFromMail($mail) {
		$query = "SELECT idclient FROM t_client WHERE cliMail LIKE '%".$mail."%';";
		return $this->executeAndReturnRequest($query);
	}
	
	public function searchClientFromLocalite($localite) {
		$query = "SELECT idclient FROM t_client WHERE cliLocalite = '".$localite."';";
		return $this->executeAndReturnRequest($query);
	}

	public function searchCommandFromBeforeDateDemande($dateDemande) {
		$query = "SELECT idCommande FROM t_commande WHERE comDateDemande < '%".$dateDemande."%';"; 
		return $this->executeAndReturnRequest($query);
	}
	
	public function searchCommandFromAfterDateDemande($dateDemande) {
		$query = "SELECT idCommande FROM t_commande WHERE comDateDemande > '%".$dateDemande."%';"; 
		return $this->executeAndReturnRequest($query);
	}
	
	public function searchCommandFromBeforeDateLivraison($dateLivraison) {
		$query = "SELECT idCommande FROM t_commande WHERE comDateLivraison < '%".$dateLivraison."%';"; 
		return $this->executeAndReturnRequest($query);
	}
	
	public function searchCommandFromAfterDateLivraison($dateLivraison) {
		$query = "SELECT idCommande FROM t_commande WHERE comDateLivraison > '%".$dateLivraison."%';"; 
		return $this->executeAndReturnRequest($query);
	}
	
	// Change l'entrée ($id) de la table ($table) selon les informations du tableau associative ($data).

	public function editTable ($table, $id, $data) {
		$dataToEdit = $this->formatDataForEditQuery($data);
		$query = "UPDATE ".$table." SET ".$dataToEdit." WHERE ".$this->searchIdAttribute($table)." = ".$id.";";
        $this->executeRequest($query);
	}

    // Ajoute l'entrée ($id) de la table ($table) selon les informations du tableau associative ($data).

	public function addTable ($table, $data) {
		$dataToAdd = $this->formatDataForAddQuery($data);
		$query = "INSERT INTO ".$table." ".$dataToAdd.";";
        $this->executeRequest($query);
	}

    // Efface l'entrée ($id) de la table ($table).

	public function deleteTable ($table, $id) {
        $query = "DELETE FROM ".$table." WHERE ".$this->searchIdAttribute($table)." = ".$id.");";
        $this->executeRequest($query);
	}
	
	// private

    /**
     * Ordre le contenu d'un tableau associative sous un format de string pouvant être inséré dans une requête SQL d'update.
     * @param $data : Tableau associative
     * @return bool|string : Retourne un string contenant les clé et les valeurs ordrées pour une requête SQL.
     */
	private function formatDataForEditQuery ($data) {
		$setChange = '';

		foreach($data as $key => $value) {
			$setChange = $setChange . $key .'='. "\"" .$value. "\"" .',';
		}
		$setChange = substr($setChange,0,-1); // Efface le dernier ','
		
		return $setChange;
	}

    /**
     * Ordre le contenu d'un tableau associative sous un format de string pouvant être inséré dans une requête SQL de rajout.
     * @param $data : Tableau associative
     * @return string : Retourne un string contenant les clé et les valeurs ordrées pour une requête SQL.
     */
	private function formatDataForAddQuery($data) {
		$colOrder = '';
        $valOrder = '';

        foreach($data as $key => $value) {
            $colOrder = $colOrder . $key .',';
            $valOrder = $valOrder . "\"" .$value. "\"" .',';
        }

        $colOrder = substr($colOrder,0,-1); // Efface le dernier ','
        $valOrder = substr($valOrder,0,-1); // Efface le dernier ','
		
		return "(".$colOrder." ) VALUES ( ".$valOrder.")";
	}

    /**
     * Retourne le nom de l'attribut correspondant à l'id de la table entrée en paramètre.
     * @param $table : nom de la table
     * @return null|string : Retourne le nom de l'attribut correspondant à l'id de la table entrée en paramètre.
     */
	private function searchIdAttribute ($table) {
		switch ($table) {
			case "t_article": return "idArticle"; break;
			case "t_client": return "idClient"; break;
			case "t_commande": return "idCommande"; break;
			default : break;
		}
		return NULL;
	}

    /**
     * Execute une requête SQL dans la base de donnée puis la renvoye sous forme d'un tableau associative.
     * @param $query : Requête SQl
     * @return array : Retourne un tableau associative contenant le résultat de la requête.
     */
	private function executeAndReturnRequest($query) {
        $req = $this->link->prepare($query);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }

    /**
     * Execute une requête SQL dans la base de donnée.
     * @param $query : Requête SQL
     */
	private function executeRequest($query) {
        $req = $this->link->prepare($query);
        $req->execute();
        $req->closeCursor();
    }

}
