<?php

namespace Captcha\Captcha\Engine;

use Captcha\Captcha\CaptchaEngineInterface;
use Captcha\Captcha\Engine\Securimage\CakeSecurimage;

/**
 * Securimage Captcha engine
 */
class SecurimageCaptcha implements CaptchaEngineInterface
{
    /**
     * @var CakeSecurimage
     */
    protected $_securimage;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (!class_exists('\\Securimage')) {
            throw new \RuntimeException("Vendor library 'Securimage' missing");
        }

        $this->_securimage = new CakeSecurimage($config);
    }

    /**
     * @{inherit}
     */
    public function getCode()
    {
        return $this->_securimage->getCode();
    }

    /**
     * @{inherit}
     */
    public function validateCode($code)
    {
        return $this->_securimage->check($code);
    }

    /**
     * @{inherit}
     */
    public function renderCode($code = null)
    {
        if ($code) {
            $this->_securimage->display_value = $code;
        }
        $this->_securimage->show();
    }
}
