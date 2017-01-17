<!-- Fichier : /app/View/Etudiants/notes_etudiant.ctp -->

	<h1> FICHE ETUDIANT :</h1>
	<table>
	    <tr>
	        <th>Matière</th>
	        <th>Note</th>
	        <th>Action</th>
	    </tr> 
		
		<?php foreach ($notes as $note): ?>
    
        <tr>
            <td>
            	<?php echo  $note['Note']['nomMatiere'];?>
        	</td>
            <td>
            	<?php echo  $note['Note']['note'];?>
        	</td>       
    	  	<td>
    	  		<?php 
            		echo $this->Html->link(
                	'Editer',
                	array('action' => 'editNote', $note['Note']['id'])
            	);   
            	?>  -
           		<?php 
            		echo $this->Form->postLink(
                	'Supprimer',
                	array('action' => 'deleteNote', $note['Note']['id']),
                	array('confirm' => 'Etes-vous sûr ?'));
            	?>
        	</td>
    	</tr>
        <?php endforeach; ?>
	</table>
    <center>
	    <?php echo $this->Html->link(
	    'Ajouter une note',
	    array( 'action' => 'addNote',$idEtu)
	    ); ?>
	</center>