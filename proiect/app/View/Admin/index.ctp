<div id="post">
    <?php echo '<table><tr><td>Nume Locatie</td><td>Oras</td></tr>';
    foreach($locations as $location)
    {

        echo '<tr><td>';
        //echo $this->Js->link($location['Location']['name'],array('Admin'=>"editLocation"),array( "update"=>"#room"));
        echo $this->Form->create("locatieselectata",array("url"=>array("controller"=>"Admin", "action"=>"editLocation", $location['Location']['id']),"type"=>"post"));
        echo $this->Js->submit($location['Location']['name'], array(
            'before'=>$this->Js->get('#inprogress')->effect('fadeIn'),
            'succes'=>$this->Js->get('#inprogress')->effect('fadeOut'),
            'update'=>'#room'));
        echo '</td>';

        echo '<td>';
        echo $location['Location']['city'];
        echo   '</td> </tr>';
    }
    echo '</table>';
    ?>
</div>

<div id="room">

    </div>

<div id="admin">
    <p id="changes">Admin changes</p>
<?php
    echo $this->Form->create("addLocation", array("url"=>array("controller"=>"Admin", "action"=>"index"), "type"=>"post"));
    echo $this->Form->input("name", array("label"=>"Introduceti numele locatiei: "));
    echo $this->Form->input("city", array("label"=>"Introduceti orasul locatiei: "));
    echo $this->Form->input("address",array("label"=>"Introduceti adresa: "));
echo $this->Form->input("phone",array("label"=>"Introduceti numarul de telefon: "));
echo $this->Form->input("email",array("label"=>"Introduceti adresa de email: "));
echo $this->Form->input("description",array("label"=>"Introduceti o descriere a locatiei: "));
echo $this->Js->submit('addLocation', array(
    'before'=>$this->Js->get('#inprogress')->effect('fadeIn'),
    'succes'=>$this->Js->get('#inprogress')->effect('fadeOut'),
    'update'=>'#post',
    'id'=>"submit1"));

?>



    <h3 style="float:left;"> Choose photos for your new location </h3>
    <div>
        <input type="file" id="fileInput" name="fileInput" />
    </div>
    <button type="button" id="btn" onclick="chooseFile();">Choose a  photo </button>

    <script>
        function chooseFile() {
            $("#fileInput").click();
        }
    </script>

    <script>
        function chooseFile() {
            document.getElementById("fileInput").click();
        }
    </script>

