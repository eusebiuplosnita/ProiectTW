<div id="statistica">
    <p id="management"> Rooms in this location : </p>
    <table>
        <tr>
            <th>Rooms</th>
            <th>Cost</th>
        </tr>
        <tr>
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

            <td><?php echo '$'.$room['Room']['Cost'] ?></td>
        </tr>

    </table>

</div>