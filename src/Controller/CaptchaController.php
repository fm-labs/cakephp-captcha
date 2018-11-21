<?php

namespace Captcha\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * CaptchaController
 *
 * @property \Captcha\Controller\Component\CaptchaComponent $Captcha
 */
class CaptchaController extends Controller {

	public $modelClass = false;

	public $components = ['Captcha.Captcha'];

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);

		if ($this->Auth) {
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

	/**
	 * Demo action
	 */
	public function demo()
	{
		if (!Configure::read('debug')) {
			throw new NotFoundException();
		}

		if ($this->request->is(['put', 'post'])) {
			debug($this->request->data());
		}
	}

}
