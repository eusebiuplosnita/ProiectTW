<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/7/14
 * Time: 10:11 AM
 */
App::uses("Reservation","Model");
class SelectareCamere extends AppModel{
    var $useTable = false;
    var $uses = array('Room','Reservation');

    public function compareDates($date1, $date2)
    {
        $data1 = date_parse($date1);
        if($data1['year'] < $date2['year'])
            return false;
        if($data1['month'] < $date2['month'])
            return false;
        if($data1['day'] < $date2['day'])
            return false;

        return true;
    }

    public function itemexist($item, $collection)
    {
        foreach($collection as $item1)
        {
            if($item['Room']['id'] == $item1['room']['Room']['id'])
            {
                return true;
            }
        }
        return false;

    }

    public function hasReservation($rezervare,$room, $datasosirii, $dataplecarii)
    {
        $reservations = $rezervare->find('all', array('conditions'=>array('Reservation.RoomId'=>$room['Room']['id'])));
        $hasreservation = false;
        foreach($reservations as $reservation)
        {
            $variabila1 = $this->compareDates($reservation['Reservation']['LeftDate'],$datasosirii);
            $variabila2 = $this->compareDates($reservation['Reservation']['LeftDate'],$dataplecarii);
            $variabila3 = $this->compareDates($reservation['Reservation']['JoinDate'],$datasosirii);
            $variabila4 = $this->compareDates($reservation['Reservation']['JoinDate'],$dataplecarii);

            if( ($variabila1 && !$variabila3) || ($variabila2 && !$variabila4))
            {
                return true;
            }
        }
        return false;
    }
} 