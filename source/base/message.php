<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace base;

use base\Session;

class Message
{

    protected $messages = array();

    /**
     * Class constructor
     */
    function __construct()
    {
        $this->session = new Session();
        $this->messages = $this->session->get('message');
    }

    /**
     * Set a new flash message
     * @param string $message
     */
    public function set($message = '', $type = '')
    {
        $this->messages[] = array('message' => $message, 'type' => $type);
        $this->session->set('message', $this->messages);
    }

    /**
     * Return all flash messages
     * @return array
     */
    public function get()
    {
        $messages = $this->session->get('message');
        $this->session->delete('message');
        $this->messages = array();
        return $messages;
    }

}
