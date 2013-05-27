<?php

App::uses('AppController', 'Controller');

/**
 * Permissions Controller
 *
 * @property Permission $Permission
 */
class PermissionsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
	$this->Permission->recursive = 0;
	$this->set('permissions', $this->paginate());
    }

    /**
    * view method
    *
    * @throws NotFoundException
    * @param int $id
    * @return void
    */
    public function view($id = null) {
        if (!$this->Permission->exists($id)) {
            throw new NotFoundException(__('Invalid permission'));
	}
            $options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
            $this->set('permission', $this->Permission->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
	if ($this->request->is('post')) {
            $this->Permission->create();
            if ($this->Permission->save($this->request->data)) {
		$this->Session->setFlash(__('The permission has been saved'));
		$this->redirect(array('action' => 'index'));
            } else {
		$this->Session->setFlash(__('The permission could not be saved. Please, try again.'));
            }
	}
	$groups = $this->Permission->Group->find('list');
	$this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Permission->exists($id)) {
            throw new NotFoundException(__('Invalid permission'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Permission->save($this->request->data)) {
		$this->Session->setFlash(__('The permission has been saved'));
		$this->redirect(array('action' => 'index'));
            } else {
		$this->Session->setFlash(__('The permission could not be saved. Please, try again.'));
            }
	} else {
            $options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
            $this->request->data = $this->Permission->find('first', $options);
	}
	$groups = $this->Permission->Group->find('list');
	$this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function delete($id = null) {
        $this->Permission->id = $id;
	if (!$this->Permission->exists()) {
            throw new NotFoundException(__('Invalid permission'));
	}
	$this->request->onlyAllow('post', 'delete');
	if ($this->Permission->delete()) {
            $this->Session->setFlash(__('Permission deleted'));
            $this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('Permission was not deleted'));
	$this->redirect(array('action' => 'index'));
    }
    
}