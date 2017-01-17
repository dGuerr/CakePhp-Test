<!-- Fichier : /app/View/Etudiants/add_note.ctp -->

<h1>Ajouter une note</h1>
<?php
	echo $this->Form->create('Note');
	echo $this->Form->input('nomMatiere');
	echo $this->Form->input('note');
	echo $this->Form->end('Ajouter');
?>