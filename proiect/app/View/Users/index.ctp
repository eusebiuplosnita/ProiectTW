<?php echo $this->Html->image("pen.gif", array("id"=>"penInHand"));?>
<?php echo $this->Form->create("User",array("url" => array("controller" => "users", "action" => "login"))); ?>
<div class="user">
    <?php echo $this->Form->input('username'); ?>
    <?php echo $this->Form->input('password'); ?>
    <?php echo $this->Form->end(array("label" => "Login","id" => "submit")); ?>
</div>
<h3 id="dont"> Don't have an account ?</h3>
<button id="su">
    <?php echo $this->Html->link("Sign Up", array("controller" => "Users","action"=> "signup","id"=>"JoinNow")); ?></button>
</button>



