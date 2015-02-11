<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace app\action\contact;

use \app\controller\usercontroller;
use \app\controller\contactcontroller;
use \app\model\user\user;
use \app\model\contact\contact;
use base;

/**
 * Class constructor
 */
class ContactAction extends base\common
{

    protected $appData = null;

    protected $template = 'default';

    protected $contact = null;

    protected $user = null;

    /**
     * Class constructor
     * @param object \Base\Application
     */
    function __construct($data = null)
    {
        $this->appData = $data;
        $this->appData->view->setTemplate($this->template);
    }

    /**
     * Main function
     */
    public function run()
    {
        $this->processPost();

        $this->createUser();
        $this->createContact();
        $this->createView();
    }

    /**
     * Create the view
     */
    private function createView()
    {
        $this->appData->view->setData('user', $this->user);
        $this->appData->view->setData('contact', $this->contact);
        $this->appData->view->run();
    }

    /**
     * Create an empty user object
     */
    private function createUser()
    {
        $this->user = new User();
    }

    /**
     * Create an empty user object
     */
    private function createContact()
    {
        $this->contact = new Contact();
    }

    /**
     * Process posted contactform
     */
    protected function processPost()
    {
        if (!$this->appData->postParameters->hasParameters()) {
            return false;
        }

        $userController = new UserController($this->appData->database);
        $contactController = new ContactController($this->appData->database);

        $firstname = $this->appData->postParameters->getParameter('firstname');
        $insertion = $this->appData->postParameters->getParameter('insertion');
        $surname = $this->appData->postParameters->getParameter('surname');
        $email = $this->appData->postParameters->getParameter('email');
        $message = $this->appData->postParameters->getParameter('message');

        $user = new User();

        $user->setValue('firstname', $firstname);
        $user->setValue('insertion', $insertion);
        $user->setValue('surname', $surname);
        $user->setValue('email', $email);

        $userId = $userController->save($user);

        $contact = new Contact();

        $contact->setValue('user_id', $userId);
        $contact->setValue('message', $message);
        $contact->setValue('date_sent', date("Y-m-d H:i:s"));
        $contact->setValue('ip_address', $this->appData->configuration->get('ip.address.visitor'));

        $contactController->save($contact);

        $this->appData->sessionParameters->setSession('message', 'Successfully added a contact');
        return true;
    }

}
