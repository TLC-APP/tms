<?php

/*test master */



/*kaka*/

/*sua cai coi*/

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP ContactsController
 * @author NguyenThai
 */
class ContactsController extends AppController {

    public function contact() {
        $this->layout='default_1';
        if ($this->request->is('ajax')) {
            // Use data from serialized form
            $this->set('data', $this->request->data['Contacts']); // name, email, message
            $this->render('contact-ajax-response', 'ajax'); // Render the contact-ajax-response view in the ajax layout
        }
    }

}
