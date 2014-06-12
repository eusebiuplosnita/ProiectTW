<?php
    if(isset($confirmation))
            echo "Comanda dumneavoastra a fost inregistrata cu succes!";
    echo $this->Html->link("Back to reservations", array("controller"=>"FindAndReserve", "action"=>"index"));
?>