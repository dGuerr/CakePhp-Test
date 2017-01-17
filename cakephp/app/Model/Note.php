<?php 

class Note extends AppModel {	 

	 public $validate = array(
 	      	'nomMatiere' => array(
			'rule' => '/^[a-zA-Z]/',        	
            'required' => true,
			'message' => 'Les données pour ce champ ne doivent contenir que lettres.'
    	),
        'note' => array(
            'alphaNumeric' => array(
            'rule' =>'/^[0-9]/',
                'required' => true,
                'message' => 'Chiffres uniquement !'
            ),
            'positif' => array(    
            	'rule' => array('comparison', '>=', 0, 'comparison'),
            	'message' => 'La note doit être positive'
            ),
            'inferieur' => array(    
            	'rule' => array('comparison', '<=', 20, 'comparison'),
            	'message' => 'La note doit être inférieure à 20'
            )
        )
    ); 
}

?>