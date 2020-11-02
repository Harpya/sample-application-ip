<?php

namespace Harpya\demo\Controllers;

use \Harpya\demo\App;

/**
 * Undocumented class
 *
 * @author Eduardo Luz <eduardo@eduardo-luz.com>
 */
class Index
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function welcome()
    {
        App::getInstance()->startSession();

        if (App::getInstance()->isAuthenticated()) {
            $msg = 'Welcome user ' . $_SESSION['auth']['email'];
        } else {
            $msg = 'You are not authenticated.';
        }

        App::getInstance()->assign('msg', $msg);

        App::getInstance()->renderView('welcome.phtml');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function logout()
    {
        App::getInstance()->startSession();
        if (App::getInstance()->isAuthenticated()) {
            unset($_SESSION['auth']);
        }
        $this->welcome();
    }

    /**
     * Undocumented function
     *
     * @param [type] $email
     * @return void
     */
    public function fakeLogin($email)
    {
        App::getInstance()->startSession();

        $_SESSION['auth'] = [
            'email' => $email,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'loginAt' => date('Y-m-d H:i:s')
        ];
        $this->welcome();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showProfile()
    {
        App::getInstance()->startSession();

        if (!App::getInstance()->isAuthenticated()) {
            App::getInstance()->assign('msg', 'Error. You are not authorized to do it');

            App::getInstance()->renderView('welcome.phtml');
            return;
        }

        foreach ($_SESSION['auth'] as $k => $v) {
            App::getInstance()->assign($k, $v);
        }

        App::getInstance()->renderView('profile.phtml');
    }
}
