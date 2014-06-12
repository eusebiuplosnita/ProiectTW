<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/4/14
 * Time: 2:57 AM
 */

class UsersController extends AppController{
    var $uses = array( "User" );

    public function index(){

    }

    public function login() {

        if( $this->request->is("post") ) {
            if( $this->Auth->login() ) {
                $this->Session->write("user",$this->Auth->user());

                if($this->Auth->user()['is_admin'] == 1)
                {
                    $this->redirect(array("controller"=>"Admin", "action"=>"index"));
                }
                else
                {
                    $this->redirect(array("controller"=>"index", "action"=>"index"));
                }
            }
            else {
                $this->Session->setFlash("Username/password combination is wrong");
                $this->redirect(array("controller"=>"users", "action"=>'index'));
            }
        }
    }

    public function signup() {
        if( $this->request->is("post") ) {
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if( $this->User->save($this->request->data) ) {
                $this->Auth->login();
                    $this->redirect(array("controller"=>"index", "action"=>"index"));
            }
            else {
                $this->Session->setFlash("Something went wrong. Please try again");
            }
        }
    }

    public function edit( $id = null ) {
        if( $this->data == null ) {
            $this-> data =$this->User->find( "first", array("conditions" => array("id" => $id)) );
        }
        if( $this->request->is("post") ) {
            $doNotUpdate = array();
           if( '' == $this->request->data['User']['password'] ) {
                $doNotUpdate[] = "password";
                $this->User->validator()
                    ->remove( "password" );
            }
            else
            {
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            }
            if( $this->User->save( $this->request->data, true, array_diff( array_keys( $this->User->schema() ), $doNotUpdate ) ) ) {
                $this->Session->setFlash( "User successfully updated");
            }
            else {
                $this->Session->setFlash( "User could not be updated");
            }
        }
    }
} 