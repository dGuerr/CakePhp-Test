<!-- Fichier: /app/View/Etudiants/editStudent.ctp -->

<h1>Editer</h1>
<?php
echo $this->Form->create('Etudiant');
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('dateNaissance');
echo $this->Form->end('Sauvegarder');
?>