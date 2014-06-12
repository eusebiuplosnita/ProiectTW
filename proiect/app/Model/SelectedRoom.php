<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/10/14
 * Time: 3:22 PM
 */


class SelectedRoom{
    public $room;
    public $sosire;
    public $plecare;

    public function __construct($room, $sosire, $plecare)
    {
        $this->room = $room;
        $this->sosire = $sosire;
        $this->plecare = $plecare;
    }
} 