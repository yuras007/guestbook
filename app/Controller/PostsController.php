<?php

App::uses('AppController', 'Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

    /*
     * Helpers
     * 
     * @var array
     */
    public $helpers = array( 'Html', 'Form', 'Session', 'Paginator' );
    
    /*
     * Components
     * 
     * @var array
     */
    public $components = array( 'Session' );
    
    /*
     * Paginate
     * 
     * @var array
     */ 
    public $paginate = array(
                'limit' => 5,
                'order' => array(
                    'Post.created' => 'desc'
                    )
                );
    
    /*
     * before Filter method
     * 
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'search');
       }
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Post->recursive = 0;
	$this->set('posts', $this->paginate('Post'));
        $this->set('title_for_layout', 'Список повідомлень');
    }

    /**
    * view method
    *
    * @throws NotFoundException
    * @param int $id
    * @return void
    */
    public function view($id = null) {
	if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Повідомлення не знайдено'));
	}
        $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
        $this->set('post', $this->Post->find('first', $options));
        $this->set('title_for_layout', 'Перегляд повідомлення');   
    }

    /**
    * add method
    *
    * @return void
    */
    public function add() {
	if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->User('id');
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
		$this->Session->setFlash(__('Повідомлення успішно збережено'));
		$this->redirect(array('action' => 'index'), NULL, TRUE);
            } else {
		$this->Session->setFlash(__('Повідомлення не збережено. Будь ласка, спробуйте знову'));
            }
	}
	$users = $this->Post->User->find('list');
	$tags = $this->Post->Tag->find('list');
	$this->set(compact('users', 'tags'));
        $this->set('title_for_layout', 'Додавання повідомлення');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Повідомлення не знайдено'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Post->save($this->request->data)) {
		$this->Session->setFlash(__('Повідомлення успішно збережено'));
		$this->redirect(array('action' => 'index'), NULL, TRUE);
            } else {
		$this->Session->setFlash(__('Повідомлення не збережено. Будь ласка, спробуйте знову'));
            }
	} else {
            $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
            $this->request->data = $this->Post->find('first', $options);
	}
	$users = $this->Post->User->find('list');
	$tags = $this->Post->Tag->find('list');
	$this->set(compact('users', 'tags'));
         $this->set('title_for_layout', 'Редагування повідомлення');
}

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param int $id
     * @return void
     */
    public function delete($id = null) {
        $this->Post->id = $id;
	if (!$this->Post->exists()) {
            throw new NotFoundException(__('Повідомлення не знайдено'));
	}
	$this->request->onlyAllow('post', 'delete');
	if ($this->Post->delete()) {
            $this->Session->setFlash(__('Повідомлення успішно видалено'));
            $this->redirect(array('action' => 'index'), NULL, TRUE);
	}
        $this->Session->setFlash(__('Повідомлення не видалено'));
	$this->redirect(array('action' => 'index'));
    }
   
    /**
     * search method
     * 
     * @return void
     */
    public function Search() {
        $condtitle=NULL;
	$this->set('posts', array());
	$condmessage=NULL;
	if ($this->request->is('post')) {
            $data=array();
            $this->set('error', NULL);
            $title=$this->data['title'];
            $message=$this->data['message'];
            if (!empty($title)) {
		$condtitle="Post.title LIKE '%$title%'";
            }
            if (!empty($message)) {
                $condmessage="Post.message LIKE '%$message%'";
            }
            $date=date("Y-m-d",mktime(NULL, NULL, NULL, 
                       $this->data['created']['month'],
                       $this->data['created']['day'], 
                       $this->data['created']['year']));
            $conditions=array('OR'=>array('date(Post.created)'=>$date,$condtitle, $condmessage));
            if ($data = $this->Post->find('all', array('order'=>array('Post.created'=>'DESC'), 
                'conditions'=>$conditions))) {
                $this->set('posts', $data);
            } else {           
                $this->set('error', 'За даним запитом нічого не знайдено<br />');
            }
    	}
        $this->set('title_for_layout', 'Пошук');
    }
    
}