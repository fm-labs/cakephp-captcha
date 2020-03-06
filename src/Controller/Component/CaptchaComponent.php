<?php

namespace Captcha\Controller\Component;

use Cake\Controller\Component;
use Captcha\Captcha\Captcha;

/**
 * CaptchaComponent
 *
 * @see http://www.phpcaptcha.org (Offical PHP Captcha Securimage website)
 *
 * # Securimage is the only supported engine atm #
 *
 * @todo Dependency Injection
 * @todo Support more captcha engines
 */
class CaptchaComponent extends Component
{

    protected $_defaultConfig = [
        'engine' => 'securimage'
    ];

    /**
     * @var Captcha object instance
     */
    protected $_captcha;

    /**
     * Create engine instance
     *
     * @return $this
     */
    public function init()
    {
        $this->_captcha = new Captcha($this->getConfig('engine'));

        return $this;
    }

    /**
     * Output the captcha image to the browser
     *
     * @return void
     */
    public function render()
    {
        $this->_captcha->renderCode();
    }

    /**
     * Validate captcha code
     *
     * @param $code
     * @return bool
     */
    public function validate($code)
    {
        return $this->_captcha->validateCode($code);
    }
}
