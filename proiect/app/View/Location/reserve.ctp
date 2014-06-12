

<?php
    echo $this->Form->create("SelectieCamere", array("url"=>array("controller"=>"location", "action"=>"selectie_camere"), "type"=>"post"));
?> <p style="margin-left:40%">Camere disponibile in perioada selectata</p> <?php
foreach($availablerooms as $room)
    {
        ?>
        <div id="check">
        <?php
        $variabila = "<p>".$this->Html->link($room['Room']['NumeCamera'], array("controller"=>"room", "action"=>"index", $room['Room']['id']))." ".$this->Html->image("loc".$room['Room']['Location']."/".$room['Room']['NumeCamera'].'.jpg',array("id"=>"roomsize")).'</p>';
        echo $this->Form->input( $room['Room']['NumeCamera'].'_'.$room['Room']['id'],array("type"=>"checkbox", "label"=>$variabila));
    ?>
        </div>
    <?php
        }
?>
    <p style="margin-left:40%;margin-top: 5%;">Solutii sumplimentare in locatia curenta!</p>
<?php
    foreach($aditionalrooms as $aroom)
    {
?>
    <div id="check1">
    <?php
        $variabila = "<div><p>".$this->Html->link($aroom['startroom']['room']['Room']['NumeCamera'], array("controller"=>"room", "action"=>"index", $aroom['startroom']['room']['Room']['id']))." ".$this->Html->image("loc".$aroom['startroom']['room']['Room']['Location']."/".$aroom['startroom']['room']['Room']['NumeCamera'].'.jpg',array("id"=>"roomsize")).'</p><p>'.$this->Html->link($aroom['endroom']['room']['Room']['NumeCamera'], array("controller"=>"room", "action"=>"index", $aroom['endroom']['room']['Room']['id']))." ".$this->Html->image("loc".$aroom['startroom']['room']['Room']['Location']."/".$aroom['startroom']['room']['Room']['NumeCamera'].'.jpg',array("id"=>"roomsize"))."</p><p>Data schimbarii camerei va fi:".$aroom['dataschimbarii']."</p></div>";
        echo $this->Form->input( $aroom["startroom"]['room']['Room']['NumeCamera'].'_'.$aroom["startroom"]['room']['Room']['id'].'-'.$aroom["endroom"]['room']['Room']['NumeCamera'].'_'.$aroom["endroom"]['room']['Room']['id'],array("type"=>"checkbox", "label"=>$variabila,"id"=>"roomsize"));
    ?>
    </div>
    <?php
    }
?>
    <p style="margin-left:37%">Solutii sumplimentare intr-o locatie din acelasi oras!</p>
<?php
    for($i=0; $i< count($NearbyRooms); $i++)
    {
        for($j=0; $j < count($NearbyRooms[$i]); $j++)
        {
            ?>
            <div id="check2">
        <?php
            $variabila = "<p>".$this->Html->link($NearbyRooms[$i][$j]['Room']['NumeCamera'], array("controller"=>"room", "action"=>"index", $NearbyRooms[$i][$j]['Room']['id']))." ".$this->Html->image("loc". $NearbyRooms[$i][$j]['Room']['Location']."/". $NearbyRooms[$i][$j]['Room']['NumeCamera'].'.jpg',array("id"=>"roomsize")).'</p>';
            echo $this->Form->input( $NearbyRooms[$i][$j]['Room']['NumeCamera'],array("type"=>"checkbox", "label"=>$variabila,"id"=>"roomsize2"));
        ?>
            </div>
        <?php
        }
    }

    echo $this->Form->end(array("label"=>"Next", "id"=>"submit2"));

?>