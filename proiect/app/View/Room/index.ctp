
<?php
foreach ($camera as $room){ ?>
<ul style=" list-style-type:none;">
    <?php
    if( strcmp ($room['Room']['NumeCamera'],'camera1' ) ==0) ?>
    <li>
        <?php
        { echo $this->Html->image("loc".$room['Room']['Location']."/".$room['Room']['NumeCamera'].'.jpg',array("id"=>"camera1"));
            ?>
            <div id="textcamera1">
                <?php echo $room['Room']['Dotari'];
                break;
         }?>
            </div>
        </li>
    <?php if( strcmp ($room['Room']['NumeCamera'],'camera2' ) ==0) ?>
    <li>
        <?php
    {
        echo $this->Html->image("loc".$room['Room']['Location']."/".$room['Room']['NumeCamera'].'.jpg',array("id"=>"camera2"));
        ?>
        <div id="textcamera2">
            <?php echo $room['Room']['Dotari'];
            break;
    }?>
        </div>
    </li>
    <?php if( strcmp ($room['Room']['NumeCamera'],'camera3' ) ==0) ?>
    <li>
        <?php
    {
        echo $this->Html->image("loc".$room['Room']['Location']."/".$room['Room']['NumeCamera'].'.jpg',array("id"=>"camera3"));
        ?>
        <div id="textcamera3">
            <?php echo $room['Room']['Dotari'];
            break;
    }?>
        </div>
    </li>
    <?php if( strcmp ($room['Room']['NumeCamera'],'camera4' ) ==0) ?>
    <li>
        <?php
        {
            echo $this->Html->image("loc".$room['Room']['Location']."/".$room['Room']['NumeCamera'].'.jpg',array("id"=>"camera4"));
            ?>
        <div id="textcamera4">
            <?php echo $room['Room']['Dotari'];
            break;
        }?>
        </div>
    </li>
</ul>
<?php }?>