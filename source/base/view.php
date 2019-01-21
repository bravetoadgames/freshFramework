<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace Base;

class View
{

    protected $configuration = null;

    protected $controller = null;

    protected $output = null;

    protected $data = array();

    public $action = '';

    public $title = '';

    private $layout = '';

    /**
     * Class constructor
     */
    function __construct($configuration = null)
    {
        $this->configuration = $configuration;
    }

    /**
     * Setup the output
     * @param string $route
     */
    public function prepareView()
    {
        $this->output = ROOT . DS . $this->configuration->get('app.name') . DS . 'layout' . DS . $this->layout . '.phtml';
    }

    /**
     * Set template data
     * @param string $key
     * @param array/object/string/int/etc $value
     */
    public function setData($key = '', $value = '')
    {
        $this->data[$key] = $value;
    }

    /**
     * Set template data
     * @param string $key
     * @param array/object/string/int/etc $value
     */
    public function setLayout($layout = '')
    {
        $this->layout = $layout;
        $this->prepareView();
    }

    /**
     * Set the action value
     * @param string $action
     */
    public function setTitle($title = '')
    {
        $this->title = $title;
    }

    /**
     * Set the action value
     * @param string $action
     */
    public function setAction($action = '')
    {
        $this->action = $action;
    }

    /**
     * Set full template path
     * @param string $template
     */
    public function setTemplate($template = '')
    {
        $this->template = ROOT . DS . $this->configuration->get('app.name') . DS . 'view' . DS . $this->action . DS . $template . '.phtml';
    }

    /**
     * Get template string value
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Show output
     */
    public function run()
    {
        $content = $this->getTemplate();
        foreach ($this->data as $key => $value) {
            $this->$key = $value;
        }
        require ($this->output);
    }

    /**
     * Create a basic FreshFramework url
     */
    public function createUrl($url = '', $values = array())
    {
        $params = "";
        if (sizeof($values) > 0) {
            foreach ($values as $key => $value) {
                $params .= "/" . $value;
            }
        }
        $url = $this->configuration->get('url.root') . '/' . $url . $params;
        return $url;
    }

}
