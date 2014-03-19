<?php
App::uses('CaptchaAppController', 'Captcha.Controller');

/**
 * CaptchaController
 *
 * @property CaptchaComponent $Captcha
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
 * Renders a captcha image to browser
 */
	public function image() {
		$this->Captcha->create();
		$this->Captcha->render();
	}

}