# UbiTransProject

Consignes :

Il s'agirait de faire une mini application web avec le framework CakePhp 2 pour :
- Gérer des élèves (Créer / modifier / supprimer), nom / prénom / date de naissance
- Pouvoir leur ajouter des notes (ajouter uniquement), une "note" étant : matière (champ texte, ex : Français, Math) + un chiffre compris entre 0 et 20.


-- --------------------------------------------------------
Route : localhost/cakephp/etudiants/

-- --------------------------------------------------------

DATABASE :



--
-- Base de données :  `test_cake`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL UNIQUE,
  `prenom` varchar(55) NOT NULL,
  `dateNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nomMatiere` varchar(55) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


------------------------------------------------------------
TODO : 

Voici une liste de suggestions et d'ajouts éventuels :

Ajouts :
Créer fonction validate : Check unique
	> Vérifie que le nom de la matiere et de l'étudiant n'existe pas
Créer un trigger pour vérifier coté serveur, l'ajout des notes et des noms
Vérifier que l'étudiant ne possède pas de notes

Améliorations:
Ajouter un menu de navigation
Améliorer la DB, rajouter des triggers, et des verroux.
Améliorer les routes.



------------------------------------------------------------
Répertoires de travail :


Model

-Note.php
-Etudiant.php


View

-Etudiants
--add_note.ctp
--edit_note.ctp
--edit_student.ctp
--add_student.ctp
--index.ctp
--notes_etudiant.ctp

Controller

-EtudiantsController.php
