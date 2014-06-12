
<?php echo $this->Form->create("User",array("url" => array("controller" => "users", "action" => "signup"),"type"=>"POST")); ?>

<div id="signup">
    <?php echo $this->Form->input('nume', array("id"=>"firstName","label"=>"First Name: ","placeholder"=>"First Name","pattern"=>"[A-Za-z]{2,50}")); ?>

    <?php echo $this->Form->input('prenume', array("id"=>"secondName","label"=>"Second Name: ","placeholder"=>"Second Name","pattern"=>"[A-Za-z]{2,50}")); ?>

    <?php echo $this->Form->input('email', array("id"=>"email","label"=>"Email:" ,"placeholder"=>"Email address","pattern"=>"[a-zA-Z0-9.]+@{1}((gmail)|(hotmail)|(yahoo)|(infoiasi)|(info\.uaic))\.{1}((ro)|(com))")); ?>

    <?php echo $this->Form->input('varsta', array("label"=>"Age: ","placeholder"=>"Your Age","min"=>"18", "max"=>"110")); ?>

    <?php echo $this->Form->input('nrtel',array('label'=>"Phone: ","placeholder"=>"Phone","pattern"=>"^((0040)|([+]40))\d{9}$"));?>

    <?php echo $this->Form->input('username', array("label"=>"Username: ","placeholder"=>"Username","pattern"=>"[A-Za-z]{6,30}")); ?>

    <?php echo $this->Form->input('password', array("label"=>"Password: ","placeholder"=>"Password","pattern"=>"[A-Za-z0-9.]{8,30}")); ?>

    <?php echo $this->Form->end(array(
        "label" => "Sign up",
        "id" => "submit1",
    )); ?>
</div>