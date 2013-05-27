<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

     /*
     * Components
     * 
     * @var array
     */
    public $components = array('Session', 'Auth', 'Email');
    
    /*
     * before Filter method 
     * 
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout', 'signup');
    }
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
	$this->set('users', $this->paginate());
        $this->set('title_for_layout', 'Список користувачів');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Користувача не знайдено'));
	}
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
        $this->set('title_for_layout', 'Перегляд даних користувача');    
    }

    /**
     * signup method
     *
     * @return void
     */
    public function signup() {
        //if ($this->request->is('post')) {
        if (!empty($this->data)) {
            if ($this->data['User']['password'] == $this->data['User']['password2']) {
                $this->request->data['User']['confirm_code'] = String::uuid();
                $this->User->create();
                if ($this->User->saveAll($this->request->data)) {
                    $Email = new CakeEmail();
                    $Email->from(array('Guestbook - Гостьова книга'));
                    $Email->to($this->data['User']['email']);
                    $Email->subject('Signup confirmed');
                    $Email->send('My message');
                    $Email->replyTo('noreply@'.$_SERVER['SERVER_NAME']);
                    $Email->emailFormat('html');
                    $Email->template('confirm');
                    //$this->Email->to = $this->data['User']['email'];
                    //$this->Email->subject = 'Signup confirmed';
                    //$this->Email->replyTo = 'noreply@'.$_SERVER['SERVER_NAME'];
                    //$this->Email->from = 'Guestbook - Гостьова книга';
                    //$this->Email->sendAs = 'html';
                    //$this->Email->template = 'confirm';
                    $this->set('name',$this->data['User']['name']);
                    $this->set('surname', $this->data['User']['surname']);
                    $this->set('server_name', $_SERVER['SERVER_NAME']);
                    $userID = $this->User->getLastInsertID();
                    $this->set('code', $this->data['User']['confirm_code']);
                    $this->set('id', $this->User->getLastInsertID());
                    if ($this->Email->send()) {
                    //if ($Email->send()) {
                        $this->Session->setFlash(__('Користувача успішно cтворено. Будь ласка, перейдіть
                            на пошту'.$this->data['User']['email'].', щоб підтвердити реєстрацію'));
                        $this->redirect(array('action' => 'signup'));
                    } else {
                        $this->User->del($this->User->getLastInsertID());
                        $this->Session->setFlash(__('1111Користувач не може бути створений. 
                                                Будь ласка, спробуйте знову'));
                         $this->redirect(array('action' => 'signup'));
                    }
                } else {
                    $this->Session->setFlash(__('Користувач не може бути створений. 
                                                Будь ласка, спробуйте знову'));
                    $this->redirect(array('action' => 'signup'));
                }
            }
            $this->Session->setFlash(__('Паролі не співпадають.'));
        }
        $groups = $this->User->Group->find('list', array('conditions'=>array('name'=>'User')));
	$this->set(compact('groups'));
        $this->set('title_for_layout', 'Реєстрація користувача');
    }

    public function confirm($id=NULL, $confCode=NULL) {
        if ($id AND $confCode) {
            $user = $this->User->read(array('confirm_code','active'),$id) ;
            if ($user['User']['active'] == 1) {
		$this->redirect(array('controller' => 'users','action'=>'signup'), null, true) ;
            } elseif ($user['User']['confirm_code'] == $confCode) {
		$this->User->saveField('active',1) ;
		$this->Session->setFlash(__('Ваша реєстрація пройшла успішно'));
                $this->redirect(array('action'=>'signup')) ;
            }
	} else {
            $this->Session->setFlash(__('Ви щось не довводили'));
            $this->redirect(array('action'=>'signup'),'error') ;
	}
	return true ;
    }
    
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Користувача не знайдено'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
		$this->Session->setFlash(__('Користувача успішно збережено'));
		$this->redirect(array('action' => 'index'));
            } else {
		$this->Session->setFlash(__('Користувач не може бути збережений. 
                                            Будь ласка, спробуйте знову'));
            }
	} else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
	}
	$groups = $this->User->Group->find('list');
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Користувача не знайдено'));
	}
        $this->request->onlyAllow('post', 'delete');
	if ($this->User->delete()) {
            $this->Session->setFlash(__('Користувача успішно видалено'));
            $this->redirect(array('action' => 'index'));
	}
        $this->Session->setFlash(__('Користувача не видалено'));
	$this->redirect(array('action' => 'index'));
    }
    
    /*
     * login method
     * 
     * @return void
     */
    public function login() {
    	if($this->request->is('post')){
	    if($this->Auth->login()){
                $this->redirect(array("controller" => "posts", "action" => "index"));
	    } else {
	    	if($this->request->is('post')){
                    $this->Session->setFlash(__('Невірний email або пароль, спробуйте знову'));
	    	}
	    }
    	}
        $this->set('title_for_layout', 'Вхід');
    }

    /*
     * logout method
     * 
     * @return void
     */
    public function logout() {
        $this->Session->setFlash('До зустрічі');
        $this->redirect($this->Auth->logout());
    }    
    
}