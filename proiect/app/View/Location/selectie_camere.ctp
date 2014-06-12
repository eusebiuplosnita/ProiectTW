 <p style="margin-left:37%;">Please enter your personal numeric code </p>
<?php echo $this->Form->create("ConfirmReservation",array("url"=>array("controller"=>"location", "action"=>"selectie_camere"), "type"=>"post", "action"=>"#"));
?><div style="margin-left:43%;"><?php
    echo $this->Form->input("CNP",array());
    echo $this->Js->submit('Check confirmation', array(
        'before'=>$this->Js->get('#inprogress')->effect('fadeIn'),
        'succes'=>$this->Js->get('#inprogress')->effect('fadeOut'),
        'update'=>'#post','id'=>"central"));
?>

<div id="post">

</div>
</div>