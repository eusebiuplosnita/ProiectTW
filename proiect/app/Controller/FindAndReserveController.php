<?php
/**
 * Created by PhpStorm.
 * User: sebi
 * Date: 6/5/14
 * Time: 1:23 AM
 */

class FindAndReserveController extends AppController{
    var $uses = array( "User", "Location");

    public $helpers = array('Html', 'Form');

    public function index(){
        $this->set("locatii", $this->Location->find('all'));
    }

	public function reserve(){
        if( $this->request->is("post") ) {
            //verifica daca numarul de camere e diferit de 0, daca e 0 redirectare catre index, daca e diferit
            //verifica daca exista camere disponibile in acea perioada
            //daca da afiseaza formular in care se vor specifica camerele disponibile cu optiunea de a le selecta pe cele dorite
                    //si introducere date de contact
            //daca nu cauta solutii a.i. sa i se ofere camere fie in locatia curenta fie in alta locatie din acelasi "city", camp din baza de date
        }
    }

} 