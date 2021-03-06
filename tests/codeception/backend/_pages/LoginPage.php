<?php

namespace tests\codeception\backend\_pages;

use yii\codeception\BasePage;

/**
 * Represents login page
 * @property \tests\codeception\frontend\AcceptanceTester|\tests\codeception\frontend\FunctionalTester|\tests\codeception\backend\AcceptanceTester|\tests\codeception\backend\FunctionalTester $actor
 */
class LoginPage extends BasePage
{
    public $route = 'core/default/login';

    static $username = 'webmaster@2ezweb.com.au';
    static $password = 'admin';

    /**
     * @param string $username
     * @param string $password
     */
    public function login($username, $password)
    {
        $this->actor->fillField('input[name="LoginForm[email]"]', $username);
        $this->actor->fillField('input[name="LoginForm[password]"]', $password);
        $this->actor->click('Login');
    }

    public function logMeIn()
    {
        $this->login(self::$username, self::$password);
    }       
}
