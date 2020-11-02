<?php

namespace Harpya\demo;

/**
 * Undocumented class
 *
 * @author Neil Brayfield <neil@test.com>
 */
class App
{
    /**
     * @var App
     */
    protected static $instance;

    /**
     * Configurations
     *
     * @var array
     */
    protected $config = [];

    protected $viewVars = [];

    /**
     * Returns an instance of this App
     *
     * @return App
     */
    public static function getInstance() : App
    {
        if (!static::$instance) {
            static::$instance = new App();
        }
        return static::$instance;
    }

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @param [type] $value
     * @return App
     */
    public function setConfig($key, $value) : App
    {
        $this->config[$key] = $value;
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param mixed $default
     * @return scalar
     */
    public function getConfig($key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    /**
     * Undocumented function
     *
     * @param string $filename
     * @return void
     */
    public function renderView(string $filename)
    {
        $viewPath = $this->getConfig('view_dir', __DIR__ . '/../views/');
        if (file_exists($viewPath . $filename)) {
            foreach ($this->viewVars as $k => $v) {
                $$k = $v;
            }
            include_once $viewPath . $filename;
        } else {
            throw new \Exception("Template $viewPath$filename not found");
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @param [type] $value
     * @return void
     */
    public function assign($key, $value)
    {
        $this->viewVars[$key] = $value;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function startSession()
    {
        \session_start();
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isAuthenticated()
    {
        if (isset($_SESSION['auth'])) {
            $isAuthenticated = true;
        } else {
            $isAuthenticated = false;
        }
        return $isAuthenticated;
    }
}
