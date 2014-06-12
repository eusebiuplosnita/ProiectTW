<?php
if(isset($reject))
    echo "Comanda dumneavoastra nu a putut fi inregistrata deoarece o alta comanda comanda a fost efectuata in urma cu putin timp! Accesati link-ul de mai jos pentru introduce o alta data a comenzii sau a vedea alte posibilitati pe care le pune la dispozitie compania noastra!";
    debug($location);
echo $this->Html->link($location['Location']['name'], array("controller"=>"location", "action"=>"index",$location['Location']['id']));
?>