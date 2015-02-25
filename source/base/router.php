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

class Router
{

    private $configuration = null;

    private $route = '';

    /**
     * Class constructor
     * @param object $configuration
     */
    function __construct($configuration = null)
    {
        $this->configuration = $configuration;
        $this->prepareRoute();
    }

    /**
     * Prepare current chosen route
     * @return boolean
     */
    private function prepareRoute()
    {
        require_once(ROOT . DS . 'config/routes.php');
        $this->routes = $routes;
        $this->route = rtrim($_SERVER['REQUEST_URI'], '/');
        $this->route = str_replace($this->configuration->get('url.root'), "", $this->route);

        if (!$this->isRoute()) {
            die($this->configuration->get('error.pageNotFound'));
        }

        return true;
    }

    /**
     * Get route
     * @return string
     */
    public function getRoute()
    {
        return $this->routes[$this->route]['route'];
    }

    /**
     * Get route
     * @return string
     */
    public function getAction()
    {
        return $this->routes[$this->route]['action'];
    }

    /**
     * Get route
     * @return string
     */
    public function getTitle()
    {
        return $this->routes[$this->route]['title'];
    }

    /**
     * Check validity of route
     * @return boolean
     */
    public function isRoute()
    {
        $route = '';
        $elements = explode('/', $this->route);
        if (end($elements) == intval(end($elements)) && end($elements) > 0) {
            for ($i = 0; $i < sizeof($elements) - 1; $i++) {
                if ($elements[$i] != "") {
                    $route .= "/" . $elements[$i];
                }
            }
            $this->route = $route;
        }
        if (isset($this->routes[$this->route])) {
            return true;
        }
        return false;
    }

}
