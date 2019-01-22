<?php

/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace app\action\contact;

use \app\controller\contactcontroller;
use \app\model\contact\contact;
use \app\model\user\user;

use base;

/**
 * Class constructor
 */
class ContactAction extends base\common {

    protected $appData = null;
    protected $template = 'default';
    protected $contact = null;

    /**
     * Class constructor
     * @param object \Base\Application
     */
    function __construct($data = null) {
        $this->appData = $data;
        $this->appData->view->setTemplate($this->template);
    }

    /**
     * Main function
     */
    public function run() {
        $this->processPost();

        $this->createContact();
        $this->createView();
    }

    /**
     * Create the view
     */
    private function createView() {
        $this->appData->view->setData('contact', $this->contact);
        $this->appData->view->run();
    }

    /**
     * Create an empty user object
     */
    private function createContact() {
        $this->contact = new Contact();
    }

    /**
     * Process posted contactform
     */
    protected function processPost() {
        if (!$this->appData->postParameters->hasParameters()) {
            return false;
        }

        $contactController = new ContactController($this->appData->database);

        $firstname = $this->appData->postParameters->get('firstname');
        $insertion = $this->appData->postParameters->get('insertion');
        $surname = $this->appData->postParameters->get('surname');
        $email = $this->appData->postParameters->get('email');
        $message = $this->appData->postParameters->get('message');

        $contact = new Contact();

        $contact->set('firstname', $firstname);
        $contact->set('insertion', $insertion);
        $contact->set('surname', $surname);
        $contact->set('email', $email);
        $contact->set('message', $message);
        $contact->set('dateSent', date("Y-m-d H:i:s"));
        $contact->set('ipAddress', $this->appData->configuration->get('ip.address.visitor'));

        $contactId = $contactController->save($contact);

        $this->appData->sessionParameters->set('message', 'Successfully added a contact');
        return true;
    }

}
