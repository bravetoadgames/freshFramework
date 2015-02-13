<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace Base;

use App;

class Application extends Common
{

    protected $config = null;

    public $database = null;

    public $postParameters = null;

    public $getParameters = null;

    public $sessionParameters = null;

    /**
     * Initialize configuration
     */
    private function prepareConfiguration()
    {
        require_once (ROOT . DS . 'config/config.php');
        $this->configuration = $config;
    }

    /**
     * Class constructor
     * @param object $configuration
     */
    function __construct()
    {
        $this->prepareConfiguration();
        $this->prepareLanguage();
        $this->prepareDatabase();
        $this->prepareParameters();
        $this->prepareRoute();
        $this->prepareTemplate();
        $this->prepareMessage();
        $this->runPage();
        $this->runTime();
    }

    /**
     * Prepare all available routes and current route
     */
    private function prepareRoute()
    {
        $this->route = new Router($this->configuration);
    }

    /**
     * Prepare template engine
     */
    private function prepareTemplate()
    {

        $this->view = new View($this->configuration);
        $this->view->setAction($this->route->getRoute());
        $this->view->prepareView($this->route->getRoute());
    }

    /**
     * Prepare POST and GET parameters
     */
    protected function prepareParameters()
    {
        $this->postParameters = new Parameter($_POST);
        $this->getParameters = new Parameter($_GET);
        $this->sessionParameters = new Session();
    }

    /**
     * Prepare template engine
     */
    private function prepareMessage()
    {
        $this->message = new Message();
    }

    /**
     * Prepare language
     */
    protected function prepareLanguage()
    {
        $file = fopen($this->configuration->get('url.path') . DS . 'assets' . DS . 'lang' . DS . $this->configuration->get('app.language') . '.csv', 'r');
        while ($row = fgetcsv($file)) {
            if (count($row) == 2) {
                define($row[0], $row[1]);
            }
        }
        fclose($file);
    }

    /**
     * Run action, set template data en run template
     */
    private function runPage()
    {
        $action = $this->configuration->get('app.name') . BDS . 'action' . BDS . str_replace("/", BDS, $this->route->getRoute()) . BDS . $this->route->getAction() . 'action';
        $this->output = new $action($this);
        $this->output->run();
    }

    /**
     * Prepare database connection
     */
    private function prepareDatabase()
    {
        $this->database = new Database($this->configuration);
    }

    public function runTime()
    {
        $endtime = microtime();
        if ($this->configuration->get('dev.debug') === true) {
            echo "<div class='fresh-debug'>";
            echo "<span class='fresh-debug-title'>Refreshing debugger</span>";
            echo "<p>Turn off debugging in APPROOT/config/<strong>config.php</strong> by setting dev.debug to <strong>FALSE</strong></p>";
            d($this->database->showQueries());
            d($this->getParameters);
            d($this->postParameters);
            d($this->sessionParameters);
            d($this);
            var_dump("runtime: " . number_format(microtime() - $this->configuration->get('dev.starttime'), 5, ",", ".") . " seconds");
            echo "</div>";
        }
    }

}
