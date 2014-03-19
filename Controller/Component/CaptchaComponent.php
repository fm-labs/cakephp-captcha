<?php
App::uses('Component', 'Controller');
App::uses('CakeSecurimage', 'Captcha.Lib');

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
 * Magic engine param setter
 *
 * @param $key
 * @param $val
 * @throws Exception
 */
	public function __set($key, $val) {
		if (!$this->_engine) {
			throw new Exception(__('Captcha engine has not been initialized'));
		}

		// auto-convert colors to Securimage_Color
		$colors = array('signature_color', 'image_bg_color', 'text_color', 'line_color', 'noise_color');
		if (in_array($key, $colors) && is_string($val)) {
			$val = new Securimage_Color($val);
		}

		$this->_engine->{$key} = $val;
	}

/**
 * Create engine instance
 *
 * @param array $config
 * @throws Exception
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