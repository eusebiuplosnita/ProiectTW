<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/5/14
 * Time: 2:03 AM
 */

class Location extends AppModel{
    var $name = "Location";


    var $validate = array(
        "name" => array(
            "nameNotEmpty" => array(
                'rule'    => 'notEmpty',
                'message' => "Please Enter a name for this location"
            )
        ),
        "city" => array(
            "usernameNotEmpty" => array(
                "rule" => "notEmpty",
                "message" => "City required"
            ),
        )
    );

} 