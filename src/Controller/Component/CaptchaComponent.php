<?php

namespace Captcha\Controller\Component;

use Cake\Controller\Component;
use Captcha\Lib\CakeSecurimage;

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
class CaptchaComponent extends Component {

	/**
	 * @var CakeSecurimage
	 */
	protected $_engine;

 	/**
	 * Create engine instance
	 *
	 * @param array $config
 	 */
	public function create($config = array()) {
		$this->_engine = new CakeSecurimage($config);
	}

	/**
	 * Output the captcha image to the browser
	 */
	public function render() {
		return $this->_engine->show();
	}

	/**
	 * Validate captcha code
	 *
	 * @param $code
	 * @return bool
	 */
	public function validate($code) {
		return CakeSecurimage::staticValidate($code);
	}

}
