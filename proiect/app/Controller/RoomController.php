<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/6/14
 * Time: 2:26 AM
 */

class RoomController extends AppController{

    var $uses= array("Room", "User");

    public function index($id = null){
        if($id != null)
            $this->set("camera", $this->Room->find('all', array('conditions'=>array('Room.id'=>$id))));
    }
} 