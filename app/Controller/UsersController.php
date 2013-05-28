<?php

App::uses('AppController', 'Controller');
//App::uses('CakeEmail', 'Network/Email');

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
        if ($this->request->is('post')) {
            if ($this->data['User']['password'] == $this->data['User']['password2']) {
                if(!$this->User->findByEmail($this->data['User']['email'])) {
                    $this->request->data['User']['token'] = String::uuid();
                    $this->User->create();
                    if ($this->User->save($this->request->data)) {
                        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
                        $time = time();
                        mail($this->data['User']['email'], "Реєстрація", 'Ви зареєструвалися на guestbook!'.
                            'для підтвердження реєстрації перейдіть по ссилці'.
                            "<a href='guestbook/users/confirm/'.<?php echo data['User']['token']; ?>.'</a>'", $headers);
                        $this->Session->setFlash(__('Ви зареєструвалися. 
                            Для підтвердження реєстрації перейдіть на свою пошту!'));
                        $this->redirect(array('action' => 'signup'));
                  /*$this->__sendEmailConfirm($this->User->id); //--> U have to add this line.
                  /*$Email = new CakeEmail(); 
                    $Email->from('Guestbook - Гостьова книга');
                    $Email->to($this->data['User']['email']);
                    $Email->subject('Signup confirmed');
                    $Email->send('My message');
                    $Email->replyTo('noreply@'.$_SERVER['SERVER_NAME']);
                    $Email->emailFormat('html');
                    $Email->template('confirm'); 
                     
                    $this->Email->to = $this->data['User']['email'];
                    $this->Email->subject = 'Signup confirmed';
                    $this->Email->replyTo = 'noreply@'.$_SERVER['SERVER_NAME'];
                    $this->Email->from = 'Guestbook - Гостьова книга';
                    $this->Email->sendAs = 'html';
                    $this->Email->template = 'confirm'; */
                        //$this->set('token_timing', $time);
                        $this->request->data['User']['confirm_time']=$time;
                        $this->set('token', $this->data['User']['token']);
                        $this->set('name',$this->data['User']['name']);
                        $this->set('surname', $this->data['User']['surname']);
                        $this->set('server_name', $_SERVER['SERVER_NAME']);
                    //$userID = $this->User->getLastInsertID();
                    $this->set('code', $this->data['User']['confirm_code']);
                    $this->set('id', $this->User->getLastInsertID());
                    /*if ($this->Email->send()) {
                        if ($Email->send()) {
                        $this->Session->setFlash(__('Користувача успішно cтворено. Будь ласка, перейдіть
                            на пошту'.$this->data['User']['email'].', щоб підтвердити реєстрацію'));
                        $this->redirect(array('action' => 'signup'));
                    } else {
                        $this->User->del($this->User->getLastInsertID());
                        $this->Session->setFlash(__('1111Користувач не може бути створений. 
                                                Будь ласка, спробуйте знову'));
                         $this->redirect(array('action' => 'signup'));
                    }*/
                    } else {
                        $this->Session->setFlash(__('Користувач не може бути створений. 
                                                Будь ласка, спробуйте знову'));
                        $this->redirect(array('action' => 'signup'));
                    }
                }
                $this->Session->setFlash(__('Користувач з таким email вже існує'));
                $this->redirect(array('action' => 'signup'));
            }
            $this->Session->setFlash(__('Паролі не співпадають.'));
        }
        $groups = $this->User->Group->find('list', array('conditions'=>array('name'=>'User')));
	$this->set(compact('groups'));
        $this->set('title_for_layout', 'Реєстрація користувача');
    }
    
    public function confirm($id=NULL, $confCode=NULL) {
        if ($id AND $confCode) {
            $user = $this->User->read(array('token','active'),$id) ;
            if ($user['User']['active'] == 1) {
		$this->redirect(array('controller' => 'users','action'=>'signup'), null, true) ;
            } elseif ($user['User']['token'] == $confCode) {
		$this->User->saveField('active',1) ;
		$this->Session->setFlash(__('Ваша реєстрація пройшла успішно'));
                $this->redirect(array('action'=>'signup')) ;
            }
	} else {
            $this->Session->setFlash(__('Ви щось не довводили'));
            $this->redirect(array('action'=>'signup')) ;
	}
	return true ;
    }
    
    /*
    public function confirm($token=NULL) {
        if (!$this->request->is('get'))
            if ($this->User->findByToken($token)) {
		$time=time();
		if (($time-$this->data['User']['confirm_time'])<3600) {
                    //$this->set('user', $user);
                } else {
                    $this->Session->setFlash(__('Ваша ссилка вичерпала свій час життя. Зареєструйтеся знову'));
                }
            } else {
		$this->Session->setFlash(__('Ваша ссилка вичерпала свій час життя. Зареєструйтеся знову'));
                $this->redirect(array('action'=>'login'));
            }
    }
    /*
    public function __sendEmailConfirm($user_id)
    {
        App::uses('CakeEmail', 'Network/Email');
        $user = $this->User->find('first',array('conditions'=>array('User.id' => $user_id),'fields'=>array('User.id','User.email','User.surname'),'recursive'=>0));
		
        if ($user === false)
        {
            debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
            return false;
        }        
        $name = $user['User']['surname'];
		$emailname = $user['User']['email'];
        $email = new CakeEmail();
        $email->from(array('noreply@'.env('SERVER_NAME') =>  'MY Site'));
        $email->to($user['User']['email']);
        $email->subject(env('SERVER_NAME') . ' Please confirm your email address');
        $email->template('user_confirm');		
		$email->viewVars(array('surname' => $name,'emailname' =>$emailname));
        $email->emailFormat('html');
		
		
        return $email->send();
    }
/*
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
    }*/
    
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