<?php
App::uses('CaptchaAppController', 'Captcha.Controller');

/**
 * CaptchaController
 *
 * @property CaptchaComponent $this->
 */
class CaptchaController extends CaptchaAppController {

	public $uses = array();

	public $components = array('Session', 'Captcha.Captcha');

	public function beforeFilter() {
		parent::beforeFilter();

		if ($this->Components->loaded('Auth')) {
			$this->Auth->allow('image');
		}
	}

/**
 * Renders a captcha image
 */
	public function image() {
		//$this->Captcha->ttf_file = WWW_ROOT . 'fonts' . DS . 'AHGBold.ttf';
		//$this->Captcha->ttf_file = App::pluginPath('Captcha').'Vendor'.DS.'securimage'.DS.'AHGBold.ttf';
		$this->Captcha->render();
	}

}