<?php echo $this->Form->create("User",array("url" => array("controller" => "users", "action" => "edit"), "type" => "post")); ?>
<?php echo $this->Form->hidden('id', array()); ?>
<?php echo $this->Form->input('nume', array()); ?>
<?php echo $this->Form->input('prenume', array()); ?>
<?php echo $this->Form->input('varsta', array()); ?>
<?php echo $this->Form->input('username', array()); ?>
<?php echo $this->Form->input('password', array("value" => "")); ?>
<?php echo $this->Form->input('email', array()); ?>
<?php echo $this->Form->end(array(
    "label" => "Save",
    "class" => "loginBtn"
)); ?>