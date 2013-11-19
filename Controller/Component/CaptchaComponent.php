<?php
App::uses('CakeSecurimage', 'Captcha.Lib');

/**
 * CaptchaComponent
 * 
 * @see http://www.phpcaptcha.org (Offical PHP Captcha Securimage website)
 * 
 * # Securimage is the only supported engine atm #
 */
class CaptchaComponent extends Component {

	/**
	 * @var CakeSecurimage
	 */
    protected $_engine;
    
    /**
     * Get instance of CakeSecurimage
     * 
     * @return CakeSecurimage
     */
    public function &engine() {
    	if (!$this->_engine) {
    		//TODO Dependency injection
    		//TODO Create an engine interface
			$this->_engine = new CakeSecurimage();
    	}
		return $this->_engine;
    }
    
    /*
    public function __call($method, $params) {
    	return call_user_func_array(array($this->engine(), $method), $params);
    }
    */
    
    public function __set($key, $val) {
    	
    	// auto-convert colors to Securimage_Color
    	$colors = array('signature_color','image_bg_color','text_color','line_color','noise_color');
    	if (in_array($key,$colors) && is_string($val)) {
    		$val = new Securimage_Color($val);
    	}
    	
    	$this->engine()->{$key} = $val;
    }
    
    /**
     * Output the captcha image to the browser
     */
    public function render() {
    	return $this->engine()->show();
    }
    
    public function reset() {
    	$this->_engine = null;
    }


    ###################### STATIC METHODS ###################
    
    /**
     * Verify
     *
     * @param string $code
     * @return boolean
     */
    static function validateCode($code) {
    	//CakeSession::start();
    	//TODO Dependency injection
    	$Captcha = new CakeSecurimage();
    	return $Captcha->check($code);
    }  
    
}
?>