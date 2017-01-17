<!-- File: /app/View/Etudiants/index.ctp -->

<h1>Liste Etudiants</h1>
<p>Vous trouverez ci-dessous la liste de tous les étudiants : </p>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de Naissance</th>
        <th>Action</th>
    </tr>


    <?php foreach ($etudiants as $etudiant): ?>
    <tr>
        <td>
            <?php echo $etudiant['Etudiant']['id']; ?>
        </td>
        <td>
            <?php echo $this->Html->link($etudiant['Etudiant']['nom'],
            array('controller' => 'etudiants', 'action' => 'notesEtudiant', $etudiant['Etudiant']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($etudiant['Etudiant']['prenom'],
            array('controller' => 'etudiants', 'action' => 'notesEtudiant', $etudiant['Etudiant']['id'])); ?>
        </td>
        <td>
            <?php echo $etudiant['Etudiant']['dateNaissance']; ?>
        </td>
        <td><?php 
            echo $this->Html->link(
                'Editer',
                array('action' => 'editStudent', $etudiant['Etudiant']['id'])
            );   ?>  -
            <?php 
            echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'deleteStudent', $etudiant['Etudiant']['id']),
                array('confirm' => 'Etes-vous sûr ?'));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($etudiant); ?>

    <center>
        <?php echo $this->Html->link(
        'Ajouter un Etudiant',
        array('controller' => 'etudiants', 'action' => 'addStudent')
        ); ?>
    </center>
</table>

