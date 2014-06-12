<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/5/14
 * Time: 2:23 AM
 */
App::uses("SelectedRoom","Model");

class LocationController extends  AppController{

    var $uses = array("Location","Room","User","Reservation","SelectareCamere","SelectedRoom");
    public $components = array('RequestHandler');
    public $helpers = array('Js');
    public function index($id = null){
        $camere = $this->Room->find('all', array('conditions'=>array('Room.Location'=>$id)));
        $this->set("rooms", $camere );

        $numar_camere = array(0,0,0,0,0);
        foreach($camere as $camera)
        {
            $numar_camere[$camera['Room']['NumarPersoane']-1]++;
        }
        $location = $this->Location->find('all', array("conditions" => array('Location.id'=>$id)));

        $this->Session->write('Location',$location[0]);

        $this->set("tipuricamere",$numar_camere);
        $this->set("rooms", $camere);

        $this->set("location", $this->Location->find('all', array('conditions'=>array('Location.id'=>$id))));
    }

    public function reserve(){
        if( $this->request->is("post") ) {

            $rooms = $this->Room->find('all', array('conditions'=>array('Room.Location'=>$this->Session->read('Location')['Location']['id'])));
            $availablerooms = array();
            $this->Session->write('sosire',$this->request->data['SelectareCamere']['datasosirii']);
            $this->Session->write('plecare', $this->request->data['SelectareCamere']['dataplecarii']);
            $camere_simple=0;$camere_duble=0;
            $camere_triple=0;
            $camere4 = 0;
            foreach($rooms as $room)
            {

                if($this->request->data['SelectareCamere']['CamereSimple']>0 && $room['Room']['NumarPersoane'] == 1)
                {

                    $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));

                    $hasreservation = false;
                    foreach($reservations as $reservation)
                    {
                        $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                        $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                        if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                        {
                            $hasreservation = true;
                            break;
                        }
                    }
                    if(!$hasreservation)
                    {
                        array_push($availablerooms, $room);
                        $camere_simple++;
                    }
                }
                if($this->request->data['SelectareCamere']['CamereDuble'] > 0 && $room['Room']['NumarPersoane'] == 2)
                {
                    $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                    $hasreservation = false;
                    foreach($reservations as $reservation)
                    {
                        $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                        $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                        if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                        {
                            $hasreservation = true;
                            break;
                        }
                    }
                    if(!$hasreservation){
                        array_push($availablerooms, $room);
                        $camere_duble++;
                    }
                }
                if($this->request->data['SelectareCamere']['CamereTriple']>0 && $room['Room']['NumarPersoane'] == 3)
                {
                    $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                    $hasreservation = false;
                    foreach($reservations as $reservation)
                    {

                        if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                        {
                            $hasreservation = true;
                            break;
                        }
                    }
                    if(!$hasreservation){
                        array_push($availablerooms, $room);
                        $camere_triple++;
                    }
                }
                if($this->request->data['SelectareCamere']['Camere4locuri'] >0 && $room['Room']['NumarPersoane'] == 4)
                {
                    $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                    $hasreservation = false;
                    foreach($reservations as $reservation)
                    {
                        $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                        $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                        if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                        {
                            $hasreservation = true;
                            break;
                        }
                    }
                    if(!$hasreservation){
                        array_push($availablerooms, $room);
                        $camere4++;
                    }
                }
            }

            $this->set("availablerooms", $availablerooms);
            $numarcamere = $this->request->data['SelectareCamere']['Camere4locuri'] + $this->request->data['SelectareCamere']['CamereTriple'] + $this->request->data['SelectareCamere']['CamereDuble'] + $this->request->data['SelectareCamere']['CamereSimple'];
            $aditionalrooms = array();
            $startrooms = array();
            $endrooms = array();
                foreach($rooms as $room)
                {
                    $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));

                    foreach($reservations as $reservation)
                    {
                        $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                        $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                        $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                        if($variabila3 && !$variabila4 && !$this->SelectareCamere->itemexist($room, $startrooms))
                        {
                            $sroom = array("room"=>$room, "stopdate"=>$reservation['Reservation']['JoinDate']);
                            array_push($startrooms, $sroom);
                        }
                        if($variabila1 && !$variabila2 && !$this->SelectareCamere->itemexist($room, $startrooms) && !$this->SelectareCamere->hasReservation($this->Reservation,$room,date_parse($reservation['Reservation']['JoinDate']), $this->request->data['SelectareCamere']['dataplecarii']))
                        {
                            $eroom = array("room"=>$room,"startdate"=>$reservation['Reservation']['LeftDate']);
                            array_push($endrooms, $eroom);
                        }

                    }
                }
                $changedates = array();

                foreach($startrooms as $sroom)
                {
                    foreach($endrooms as $eroom)
                    {
                        if($sroom['stopdate'] >= $eroom['startdate'] && $sroom['room'] != $eroom['room'] )
                        {
                            $option = array("startroom"=>$sroom, "endroom"=>$eroom, "dataschimbarii"=>$eroom['startdate']);
                            $rooms_names = $sroom['room']['Room']['NumeCamera'].'_'.$sroom['room']['Room']['id'].'-'.$eroom['room']['Room']['NumeCamera'].'_'.$eroom['room']['Room']['id'];
                            $changedates[$rooms_names] = $eroom['startdate'];
                            array_push($aditionalrooms, $option);
                        }
                    }
                }

            $this->Session->write('changedates', $changedates);
            $this->set("aditionalrooms",$aditionalrooms);

            $locations= $this->Location->Find("all",array('conditions'=>array('Location.city'=>$this->Session->read('Location')['Location']['city'])));
            $NearbyRooms = array();
            foreach($locations as $location)
            {   $availablerooms = array();
                if($location['Location']['id'] != $this->Session->read('Location')['Location']['id'])
                {
                $rooms = $this->Room->find('all', array('conditions'=>array('Room.Location'=>$location['Location']['id'], )));

                $this->Session->write('sosire',$this->request->data['SelectareCamere']['datasosirii']);
                $this->Session->write('plecare', $this->request->data['SelectareCamere']['dataplecarii']);
                $camere_simple=0;$camere_duble=0;
                $camere_triple=0;
                $camere4 = 0;

                foreach($rooms as $room)
                {

                    if($this->request->data['SelectareCamere']['CamereSimple']>0 && $room['Room']['NumarPersoane'] == 1)
                    {

                        $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));

                        $hasreservation = false;
                        foreach($reservations as $reservation)
                        {
                            $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                            $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                            if( ($variabila1 && !$variabila3))
                            {
                                $hasreservation = true;
                                break;
                            }
                        }
                        if(!$hasreservation)
                        {
                            array_push($availablerooms, $room);
                            $camere_simple++;
                        }
                    }
                    if($this->request->data['SelectareCamere']['CamereDuble'] > 0 && $room['Room']['NumarPersoane'] == 2)
                    {
                        $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                        $hasreservation = false;
                        foreach($reservations as $reservation)
                        {
                            $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                            $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                            if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                            {
                                $hasreservation = true;
                                break;
                            }
                        }
                        if(!$hasreservation){
                            array_push($availablerooms, $room);
                            $camere_duble++;
                        }
                    }
                    if($this->request->data['SelectareCamere']['CamereTriple']>0 && $room['Room']['NumarPersoane'] == 3)
                    {
                        $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                        $hasreservation = false;
                        foreach($reservations as $reservation)
                        {

                            if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                            {
                                $hasreservation = true;
                                break;
                            }
                        }
                        if(!$hasreservation){
                            array_push($availablerooms, $room);
                            $camere_triple++;
                        }
                    }
                    if($this->request->data['SelectareCamere']['Camere4locuri'] >0 && $room['Room']['NumarPersoane'] == 4)
                    {
                        $reservations = $this->Reservation->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
                        $hasreservation = false;
                        foreach($reservations as $reservation)
                        {
                            $variabila1 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila2 = $this->SelectareCamere->compareDates($reservation['Reservation']['LeftDate'],$this->request->data['SelectareCamere']['dataplecarii']);
                            $variabila3 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['datasosirii']);
                            $variabila4 = $this->SelectareCamere->compareDates($reservation['Reservation']['JoinDate'],$this->request->data['SelectareCamere']['dataplecarii']);

                            if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
                            {
                                $hasreservation = true;
                                break;
                            }
                        }
                        if(!$hasreservation){
                            array_push($availablerooms, $room);
                            $camere4++;
                        }
                    }

                }
                    if(count($availablerooms)>0)
                    array_push($NearbyRooms, $availablerooms);
                }
            }
            $this->set("NearbyRooms", $NearbyRooms);

        }
    }

    public function selectie_camere()
    {
        if(!isset($this->request->data['ConfirmReservation']['CNP']))
        {
            $this->Session->delete('rooms_to_reserv');
        }
        $rooms = $this->Session->read('rooms_to_reserv');
        $hasreservation = false;
        for($i=0; $i < count($rooms); $i++)
        {
            if($this->SelectareCamere->hasReservation($this->Reservation, $rooms[$i]->room[0], $rooms[$i]->sosire, $rooms[$i]->plecare))
            {
                $hasreservation = true;
            }
        }
        debug($rooms);
        if(!$hasreservation)
        {
            for($i=0; $i < count($rooms); $i++)
            {

                $this->Reservation->create();
                $this->Reservation->save(array("RoomId"=>$rooms[$i]->room[0]['Room']['id'], "userId"=>$this->Session->read('user')['id'], "JoinDate"=>$rooms[$i]->sosire, "LeftDate"=>$rooms[$i]->plecare, "CNP"=>$this->request->data['ConfirmReservation']['CNP']));
            }
        }

        if($this->RequestHandler->isAjax())
        {
            if($hasreservation)
            {
                $this->set('reject',1);
                $this->set('location',$this->Session->read('Location'));
                $this->render('reject','ajax');
            }
            else
            {
                $this->set("confirmation",1);
                $this->render('confirm','ajax');
            }

        }

        $selectedrooms = array();
        $rooms_to_reserv = array();
        if($this->request->is("post"))
        {
            $changedates = $this->Session->read('changedates');
            if(isset($this->request->data['SelectieCamere']) )
            {
                $keyroom = key($this->request->data['SelectieCamere']);
                $rooms_selected = explode("-",key($this->request->data['SelectieCamere']));
                $data = null;
                if($keyroom != $rooms_selected[0])
                {
                    $data = $changedates[$keyroom];

                    $idcamera = explode('_', $rooms_selected[0])[1];
                    $room = $this->Room->Find("all", array("conditions"=>array("Room.id" => $idcamera)));

                    array_push($selectedrooms,$room);
                    $selectedroom = new SelectedRoom($room,$this->Session->Read('sosire'), $data);
                    array_push($rooms_to_reserv,$selectedroom);
                    $idcamera = explode('_', $rooms_selected[1])[1];
                    $room = $this->Room->Find("all", array("conditions"=>array("Room.id" => $idcamera)));
                    array_push($selectedrooms,$room);
                    $selectedroom = new SelectedRoom($room,$data,$this->Session->Read('plecare'));
                    array_push($rooms_to_reserv,$selectedroom);
                }
                else
                {
                    $idcamera = explode('_', $keyroom)[1];
                    $room = $this->Room->Find("all", array("conditions"=>array("Room.id" => $idcamera)));
                    array_push($selectedrooms,$room);
                    $selectedroom = new SelectedRoom($room,$this->Session->Read('sosire'), $this->Session->Read('plecare'));
                    array_push($rooms_to_reserv,$selectedroom);
                }

            }
            $this->Session->write('rooms_to_reserv',$rooms_to_reserv);

        }
        $this->Session->write('rooms',$selectedrooms);

    }

     public function confirm()
     {
         $rooms = $this->Session->read('rooms_to_reserv');
         for($i=0; $i < count($rooms); $i++)
         {
            $this->Reservation->create();
            $this->Reservation->save(array("RoomId"=>$rooms[$i]->room[0]['Room']['id'], "userId"=>$this->Session->read('user')['id'], "JoinDate"=>$rooms[$i]->sosire, "LeftDate"=>$rooms[$i]->plecare, "CNP"=>$this->request->data['ConfirmReservation']['CNP']));
         }
     }

    public function addLocation()
    {
        $user = $this->Session->read('user');
        if($this->request->data && $user['User']['isAdmin']==1)
        {

        }
    }
}