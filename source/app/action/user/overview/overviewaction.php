<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace app\action\user\overview;

use app\controller\usercontroller;
use base\common;

/**
 * Class constructor
 */
class OverviewAction extends common
{

    protected $action = null;

    protected $app = null;

    protected $template = 'overview';

    /**
     * Class constructor
     * @param object \Base\Application
     */
    function __construct($data = null)
    {
        $this->app = $data;
    }

    /**
     * Main function
     */
    public function run()
    {
        $this->getAllUsers();

        $this->app->view->setTemplate($this->template);
        $this->app->view->run();
    }

    /**
     * Get all user records
     */
    private function getAllUsers()
    {
        $this->action = new UserController($this->app->database);
        $this->app->view->setData('users', $this->action->getAll());
    }

}
