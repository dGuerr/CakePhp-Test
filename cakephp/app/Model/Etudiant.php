<?php 

class Etudiant extends AppModel {

	 public $validate = array(
      	'nom' => array(
			'rule' => '/^[a-zA-Z]/',        	
            'required' => true,
			'message' => 'Les données pour ce champ ne doivent contenir que lettres.'
    	),
    	'prenom' => array(
			'rule' => '/^[a-zA-Z]/',     	
            'required' => true,
			'message' => 'Les données pour ce champ ne doivent contenir que lettres.'
    	),
        'dateNaissance' => array(
            'rule' => 'date',
            'required' => true,
            'message' => 'Entrez une date valide'
        )
    ); 
}

?>