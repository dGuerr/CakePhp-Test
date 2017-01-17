<?php
	class EtudiantsController extends AppController {
	    public $helpers = array('Html', 'Form');
	    public function index() {
	        $this->set('etudiants', $this->Etudiant->find('all'));
	    }	
	    
		/*
		 *	Affiche les notes de l'étudiant selectionné
		*/   
	    public function notesEtudiant($id) {

			$this->set('idEtu', $id);
	    	$this->set('notes', $this->Etudiant->find('all', array(
				'fields' => '*',
				'joins' => array(
					array(
						'table' 	 => 'notes',
						'alias' 	 => 'Note',
						'type'  	 => 'LEFT',
						'conditions' => array('Note.etudiant_id = '. $id .'')
					)
				),
				'group' => array('Note.etudiant_id')
			)));
	    }

	    /*
		 * Ajoute un étudiant dans la table Etudiants
		*/
	    public function addStudent() {
	        if ($this->request->is('post')) 
	        {
	            $this->Etudiant->create();
	            if ($this->Etudiant->save($this->request->data)) {
	                $this->Flash->success(__('Le nouvel étudiant est ajouté avec succès.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Flash->error(__('Ajout impossible.'));
	        }
    	}

    	/*
		 * Permet d'éditer un étudiant
		*/
    	public function editStudent($id = null) {

		    if (!$id) {
		        throw new NotFoundException(__('Invalid id'));
		    }

		    $etudiant = $this->Etudiant->findById($id);
		    if (!$etudiant) {
		        throw new NotFoundException(__('Invalid student'));
		    }

		    if ($this->request->is(array('etudiant', 'put'))) {
		        $this->Etudiant->id = $id;
		        if ($this->Etudiant->save($this->request->data)) {
		            $this->Flash->success(__('Edition terminée'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Flash->error(__('Edition impossible'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $etudiant;
		    }
		}

		/*
		 * Permet de supprimer un étudiant
		*/
		public function deleteStudent($id) {
		    if (!$this->request->is('post')) { 
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Etudiant->delete($id)) {
		        $this->Flash->success(
		            __('Suppression effetctuée.', h($id))
		        );
		    } else {
		        $this->Flash->error(
		            __('Suppression impossible.', h($id))
		        );
		    }
		    return $this->redirect(array('action' => 'index'));
		}

		/*
		 * Permet d'ajouter une note dans la table Note
		*/
	    public function addNote($id = null) {
	    	$this->loadModel('Note');
			$this->set('idEtu', $id);

	        if ($this->request->is('post')) 
	        {
				$this->request->data('Note.etudiant_id', $id);
				$this->request->data['Note']['id'] = $id;	
	            $this->Note->create();
	            if ($this->Note->save($this->request->data)) {
	                $this->Flash->success(__('La note a été ajoutée avec succès.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Flash->error(__('Ajout impossible.'));
	        }
    	}

    	/*
		 * permet d'éditer une note
		*/
    	public function editNote($id = null){
		    $this->loadModel('Note');
			$this->set('idEtu', $id);

		    if (!$id) {
		        throw new NotFoundException(__('Invalid note'));
		    }

		    $Note = $this->Note->findById($id);
		    if (!$Note) {
		        throw new NotFoundException(__('Invalid note'));
		    }

		    if ($this->request->is(array('note', 'put'))) {
		        $this->Note->id = $id;
		        if ($this->Note->save($this->request->data)) {
		            $this->Flash->success(__('Edition terminée'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Flash->error(__('Edition impossible'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $Note;
		    }
    	}

    	/*
		 * Permet de supprimer une note
		*/
		public function deleteNote($id = null) {
			$this->loadModel('Note');
			$this->set('idEtu', $id);
	
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Note->delete($id)) {
		        $this->Flash->success(
		            __('Suppression effetctuée.', h($id))
		        );
		    } else {
		        $this->Flash->error(
		            __('Suppression impossible.', h($id))
		        );
		    }
		    return $this->redirect(array('action' => 'index'));
		}
	}

?>