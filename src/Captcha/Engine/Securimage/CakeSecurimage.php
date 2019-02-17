<?php

namespace Captcha\Captcha\Engine\Securimage;

use Securimage;
use Securimage_Color;

/**
 * CakePHP wrapper for Securimage class
 *
 * @link https://www.phpcaptcha.org/Securimage_Docs/classes/Securimage.html
 */
class CakeSecurimage extends Securimage
{

    public function __construct($options = [])
    {

        array_walk($options, function ($val, $key) {
            if (preg_match('/\_color$/', $key) && is_string($val)) {
                $val = new Securimage_Color($val);
            } elseif (preg_match('/_file$/', $key) && is_string($val)) {
                //@TODO build file path
            } elseif (preg_match('/_path$/', $key) && is_string($val)) {
                //@TODO build path
            }

            return $val;
        });

        parent::__construct($options);
    }

    protected function checkTablesExist()
    {
        //TODO do this the cakephp way
        return parent::checkTablesExist();
    }

    protected function createDatabaseTables()
    {
        //TODO do this the cakephp way
        return parent::createDatabaseTables();
    }

    protected function openDatabase()
    {
        //TODO do this the cakephp way
        return parent::openDatabase();
    }

    protected function saveCodeToDatabase()
    {
        //TODO do this the cakephp way
        return parent::saveCodeToDatabase();
    }

    protected function getCodeFromDatabase()
    {
        //TODO do this the cakephp way
        return parent::getCodeFromDatabase();
    }

    /**
     * @return void
     */
    protected function clearCodeFromDatabase()
    {
        //TODO do this the cakephp way
        parent::clearCodeFromDatabase();
    }

    /**
     * @return void
     */
    protected function purgeOldCodesFromDatabase()
    {
        //TODO do this the cakephp way
        parent::purgeOldCodesFromDatabase();
    }

    /**
     * Static validator
     *
     * @param string $code
     * @return boolean
     */
    public static function staticValidate($code)
    {
        $Captcha = new self();

        return $Captcha->check($code);
    }
}
