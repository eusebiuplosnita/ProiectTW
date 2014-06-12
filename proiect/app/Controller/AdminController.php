<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/11/14
 * Time: 3:37 AM
 */

class AdminController extends AppController{
    var $uses = array('User','Location','Room');
    public $components = array('RequestHandler');
    public $helpers = array('Js');

    /* \mainpage Admin Page
     * \section index
     *  This is the index function of the AdminController. Displays the locations from the database and adds the posibility
     */
    public function index()
    {
        if($this->Session->read('user')['is_admin']==1)
        {
            if($this->request->is("post") && isset($this->request->data['addLocation']['name']))
            {
                $this->Location->create();
                if($this->Location->save(array("name"=>$this->request->data['addLocation']['name'], "city"=>$this->request->data['addLocation']['city'],"address"=>$this->request->data['addLocation']['address'], "phone"=>$this->request->data['addLocation']['phone'], "email"=>$this->request->data['addLocation']['email'], "description"=>$this->request->data['addLocation']['description'])))
                {
                    if($this->RequestHandler->isAjax())
                    {
                        $locations = $this->Location->find("all", array("conditions"=>array()));
                        $this->set("locations",$locations);
                        $this->render('listlocations','ajax');
                    }
                }
            }
            else
            {
                $locations = $this->Location->find("all", array("conditions"=>array()));
                $this->set("locations",$locations);
            }
        }
    }

    public function listlocations()
    {
        $locations = $this->Location->find("all", array("conditions"=>array()));
        $this->set("locations",$locations);
    }

    public function editlocation($id = null)
    {
        debug($id);
        if($this->Session->read('user')['is_admin']==1)
        {
            if($id != null){
                if($this->RequestHandler->isAjax())
                {
                    if($this->Session->read('user')['is_admin']==1)
                    {
                        $this->Session->write('Location', $id);
                        $rooms = $this->Room->find("all", array("conditions"=>array("Room.Location"=>$id)));
                        $this->set('rooms', $rooms);
                        $this->render('listrooms','ajax');
                    }
                }
            }
        }
    }

    public function listrooms()
    {
        $rooms = $this->Room->find("all", array("conditions"=>array("Room.Location"=>$this->Session->read('Location'))));
        $this->set('rooms',$rooms);
    }

} 