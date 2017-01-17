<!-- Fichier : /app/View/Etudiants/addStudent.ctp -->

<h1>Ajouter un étudiant</h1>
<?php
	echo $this->Form->create('Etudiant');
	echo $this->Form->input('nom');
	echo $this->Form->input('prenom');
	echo $this->Form->input('dateNaissance');
	echo $this->Form->end('Ajouter');
?>
