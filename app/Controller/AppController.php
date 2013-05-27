<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    /*
     * my Allowed Actions
     *
     * @var array
     */
    private $myAllowedActions = array();
    
    /**
     * Components
     *
     * @var array
     */
    public $components = array(
            'Session', 
            'Auth' => array(
                'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
                'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
    		'authorize' => array('controller'),
                'authenticate' => array(
                    'Form' => array(
                        'fields' => array('username' => 'email')
                    )
                )
            )
    );
    
    public function beforeFilter() {
		$this->Auth->authError = "Будь ласка, ввійдіть, щоб побачити цю сторінку..";
    }
    
    /*
     * isAuthirized method
     * 
     * @param string $user
     * @return void
     */
    public function isAuthorized($user) {
	$myController = strtolower($this->name);
        $myAction = strtolower($this->action);
        if (!$this->myAllowedActions) {
            App::import('Model', 'User');
            $userObj = new User();
            $groupsObj = $userObj->find('first',array('conditions'=>array('User.id' => $user['id'])));
            $groupsObj = $groupsObj['Group']; 
            foreach ($groupsObj as $groupObj) {
                $permissionsObj = $userObj->Group->find('first', 
                        array('conditions'=>array('Group.id' => $groupObj['id'])));
                $permissionsObj = $permissionsObj['Permission'];
                foreach ($permissionsObj as $permissionObj) {
                    $this->myAllowedActions[] = $permissionObj['name'];
                }
            }
        }
        
        if(!$this->myAllowedActions || !is_array($this->myAllowedActions)) {
            return false;
        }
        
        foreach ($this->myAllowedActions as $myAllowedAction) {
            //Admins: Access to any controller and any action
            if ($myAllowedAction == '*:*') {
                return true; 
            }
            //Allow all actions for any controller.
            if ($myAllowedAction == $myController . ':*') {
                return true;
            }
            //Allow few actions.
            if ($myAllowedAction == $myController. ':' . $myAction) {
                return true; 
            }
        }
        
        return false;
	}
    
}