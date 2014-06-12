
    <?php foreach ($locatii as $locatie){ ?>
    <ul style=" list-style-type:none;">
        <li>
            <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc1.jpg",array("id"=>"loc1")); ?>
        </li>
        <li>
            <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc11.jpg",array("id"=>"loc11")); ?>
        </li>
        <li>
            <?php echo $this->Html->image("loc".$locatie['Location']['id']."/loc111.jpg",array("id"=>"loc111")); ?>
        </li>
    </ul>

       <div style="
       margin-left:70%;
       margin-top:-10%;
       font-size:16px;
       font-family:Britannic;
       color: #4a7b97;">

        <?php echo $this->Html->link($locatie['Location']['name'],
            array('controller' => 'location', 'action' => 'index', $locatie['Location']['id'])); ?>
        <br>

            <?php echo $locatie['Location']['city']; ?>
        <br>

           <?php echo $locatie['Location']['address']; ?>
        <br>

           <?php echo $locatie['Location']['phone']; ?>
        <br>
           <?php echo $locatie['Location']['email']; ?>
        <br>
       </div>
    <?php } ?>


    <script>
        var $img = $('#loc1');
        $img.click(function resize(e) { // bind click event to all images
            ('#locN1').slideToggle('slow');
        });
    </script>


