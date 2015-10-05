<?php
require "Connection.php";

Class queryAgent extends Connection{
    

    public function save($matricule,$nom,$prenoms,$telephone,$cellulaire,$ville,$quatier,$responsable,$statut){
    	$db = parent::getConnection();
        

        $query = $db->prepare("INSERT INTO agent(matricule,nom,prenoms,telephone,cellulaire,ville,quatier,responsable,statut) VALUES (:matricule,:nom,:prenoms,:telephone,:cellulaire,:ville,:quatier,:responsable,:statut)");
        $query->execute(array(
              'matricule'    =>  $matricule,
              'nom'          =>  $nom,
              'prenoms'      =>  $prenoms,
              'telephone'    =>  $telephone,
              'cellulaire'   =>  $cellulaire,
              'ville'        =>  $ville,
              'quatier'      =>  $quatier,
              'responsable'  =>  $responsable,
              'statut'       =>  $statut
        ));

        if ($query) {
        	echo "ok";
        }else{
        	echo "ko";
        }
    	 
    }

	public function findAll($table){
	   $db = parent::getConnection();

       return $query = $db->query('SELECT * FROM '.$table);

	}

	public function find($table,$id){
		$db = parent::getConnection();

		$sql = 'SELECT * FROM '.$table.' WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute(array('id' => $id));

		return $query ;

	}

	public function delete($table,$id){
		$db = parent::getConnection();

		$query = $db->prepare('DELETE FROM '.$table.' WHERE id = :id');
        $query->execute(array('id' => $id));

        if ($query) {
        	echo "ok";
        }else{
        	echo "ko";
        }
	}

	public function update($id,$matricule,$nom,$prenoms,$telephone,$cellulaire,$ville,$quatier,$responsable,$statut){
		$db = parent::getConnection();
		$sql = 'UPDATE agent 
		          SET matricule = :matricule,nom = :nom,prenoms = :prenoms,telephone = :telephone,cellulaire = :cellulaire,ville = :ville,quatier = :quatier,responsable = :responsable,statut = :statut 
		          WHERE id = :id';
		
		$query = $db->prepare($sql);
        
        $query->execute(array(
              'matricule'    =>  $matricule,
              'nom'          =>  $nom,
              'prenoms'      =>  $prenoms,
              'telephone'    =>  $telephone,
              'cellulaire'   =>  $cellulaire,
              'ville'        =>  $ville,
              'quatier'      =>  $quatier,
              'responsable'  =>  $responsable,
              'statut'       =>  $statut,
              'id'           =>  $id
        ));

        if ($query) {
        	echo "ok";
        }else{
        	echo "ko";
        }

	}
        
}