<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/5/14
 * Time: 11:52 PM
 */

class RoomModel extends AppModel {

    var $name = "Room";

    var $validate = array(
        "NumeCamera" => array(
            "numeNotEmpty" => array(
                'rule'    => 'notEmpty',
                'message' => "Please Enter a name for this room"
            )
        ),
        "Location" => array(
            "usernameNotEmpty" => array(
                "rule" => "notEmpty",
                "message" => "Location required"
            ),
        )
    );
} 