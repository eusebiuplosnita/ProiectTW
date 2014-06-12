<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/4/14
 * Time: 8:19 PM
 */

class UserModel extends AppModel {

   var $name = "User";

    var $validate = array(
        "nume" => array(
            "numeNotEmpty" => array(
                'rule'    => 'notEmpty',
                'message' => "Please Enter Your First Name"
            )
        ),
        "username" => array(
            "usernameNotEmpty" => array(
                "rule" => "notEmpty",
                "message" => "Username must not be empty"
            ),
            "usernameUnique" => array(
                "rule" => "isUnique",
                "message" => "Username already chosen. Please pick another one"
            )
        ),
        "password" => array(
            "passwordNotEmpty" => array(
                "rule" => "notEmpty",
                "message" => "Password must not be empty"
            )
        ),
        "email" => array(
            "emailNotEmpty" => array(
                "rule" => "notEmpty",
                "message" => "Email must not be empty"
            ),
            "typeEmail" => array(
                "rule" => "email",
                "message" => "Please enter a valid email address"
            )
        )
    );

    public function beforeSave() {
        if( isset( $this->data['User']['password'] ) ) {
           $this->data['User']['password'] = AuthComponent::password( $this->data['User']['password'] );
        }
        return true;
    }
}