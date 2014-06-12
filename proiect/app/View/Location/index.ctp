<?php
    foreach($location as $locatie)
    { ?>
        <p id="idloc"> <?php echo $locatie['Location']['name']; ?> </p><br>
        <ul style=" list-style-type:none;">
            <li>
                <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc1.jpg",array("id"=>"loc12")); ?>
            </li>
            <li>
                <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc11.jpg",array("id"=>"loc112")); ?>
            </li>
            <li>
                <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc111.jpg",array("id"=>"loc1112")); ?>
            </li>
        </ul>
        <p id="idloc1"> <?php echo $locatie['Location']['description'];?></p>

<?php } ?>

<div id="statistica">
<p id="management"> Rooms in this location : </p>
    <table>
        <tr>
            <th>Rooms</th>
            <th>Type of rooms</th>
            <th>Cost</th>
        </tr>
        <tr>
            <?php
            for($i=0; $i < count($tipuricamere); $i++)
            {
                if( $tipuricamere[$i] >0)
                {
                    ?>
                    <td>
                        <?php
                            foreach($rooms as $room)
                            {
                                if($room['Room']['NumarPersoane']==($i+1))
                                {
                                echo $this->Html->link($room['Room']['NumeCamera'],
                                    array('id'=>'myText','controller' => 'room', $room['Room']['id']));
                                }
                            }?>
                    </td>
                    <td><?php
                        if($tipuricamere[$i]==1)
                        {
                            echo $tipuricamere[$i].' room for '.($i+1).' persons';
                            echo '<br/>';
                        }
                        else if ($tipuricamere[$i]>1)
                        {
                            echo $tipuricamere[$i].' rooms for '.($i+1).' persons';
                            echo '<br/>';
                        }
                    ?>
                    </td>
                    <td><?php echo '$'.$room['Room']['Cost'] ?></td>
        </tr>
                <?php }
            }
            ?>

    </table>

</div>
<h4 style="margin-left: 63%;"> Reserve: </h4>
<div id="locatie">
    <?php echo $this->Form->create("SelectareCamere",array("url" => array("controller" => "location", "action" => "reserve"), "type" => "post")); ?>
    <?php echo $this->Form->input("CamereSimple",array("label"=>"Rooms for 1 person","type"=>"number","min"=>"0", "max"=>$tipuricamere[0])); ?>
    <?php echo $this->Form->input("CamereDuble",array("label" => "Rooms for 2 persons","type"=>"number","min"=>"0", "max"=>$tipuricamere[1])); ?>
    <?php echo $this->Form->input("CamereTriple",array("label"=>"Rooms for 3 persons","type"=>"number","min"=>"0", "max"=>$tipuricamere[2])); ?>
    <?php echo $this->Form->input("Camere4locuri",array("label"=> "Rooms for 4 persons","type"=>"number","min"=>"0", "max"=>$tipuricamere[3])); ?>
    <?php echo $this->Form->input("datasosirii",array("type"=>"date", "label"=>"Join Date")); ?>
    <?php echo $this->Form->input("dataplecarii",array("type"=>"date", "label"=>"Left Date")); ?>
    <?php echo $this->Form->end(array(
    "label" => "Reserve",
    "id" => "rezerva"
)); ?>
</div>

