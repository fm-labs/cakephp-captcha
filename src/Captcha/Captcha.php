<?php

namespace Captcha\Captcha;

use Cake\Core\App;
use Cake\Core\StaticConfigTrait;

/**
 * Captcha class
 */
class Captcha
{
    use StaticConfigTrait;

    /**
     * @var CaptchaEngineInterface
     */
    protected $_engine;

    /**
     * @param array|string $config
     */
    public function __construct($config = 'default')
    {
        if (is_string($config)) {
            $config = (array)self::getConfig($config);
        }

        $config += ['className' => null];
        if (!$config['className']) {
            throw new \InvalidArgumentException("Captcha engine class name missing");
        }

        $class = $config['className'];
        unset($config['className']);

        $engine = null;
        if (is_object($class)) {
            $engine = $class;
        } else {
            $className = App::className($class, 'Captcha/Engine', 'Captcha');
            if (!$className) {
                throw new \RuntimeException("Captcha engine missing");
            }
            $engine = new $className($config);
        }

        //@TODO Check if engine implements CaptchaEngineInterface
        $this->_engine = $engine;
    }

    /**
     * Get captcha code value
     */
    public function getCode()
    {
        return $this->_engine->getCode();
    }

    /**
     * Validate given code value
     * @param $code
     * @return
     */
    public function validateCode($code)
    {
        return $this->_engine->validateCode($code);
    }

    /**
     * Render captcha image
     * @param null $code Optionally pass the code value that should be rendered
     * @return mixed Renders image to browser
     */
    public function renderCode($code = null)
    {
        return $this->_engine->renderCode($code);
    }

    /**
     * Captcha engine accessor
     */
    public function getEngine()
    {
        return $this->_engine;
    }
}
