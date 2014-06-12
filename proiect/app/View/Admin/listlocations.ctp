<div id="post1">
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