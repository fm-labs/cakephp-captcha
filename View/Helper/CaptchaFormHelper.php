<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Class CaptchaFormHelper
 *
 * @property HtmlHelper $Html
 * @property FormHelper $Form
 */
class CaptchaFormHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	public $settings = array(
		'captchaUrl' => array('plugin' => 'captcha', 'controller' => 'captcha', 'action' => 'image')
	);

	protected $_captchaId;

	protected function _getCaptchaId($reset = false) {
		if (!$this->_captchaId || $reset) {
			$this->_captchaId = uniqid('captcha');
		}
		return $this->_captchaId;
	}

	public function image() {
		return $this->Html->image($this->settings['captchaUrl'], array(
			'id' => $this->_getCaptchaId(),
			'class' => 'captcha-image'
		));
	}

	public function reload() {
		$url = $this->Html->url($this->settings['captchaUrl']);
		$script = sprintf("javascript:document.getElementById('%s').src='%s/' + Math.round(Math.random(0)*1000)+1; return false;", $this->_getCaptchaId(), $url);
		return $this->Html->link(__('Try another image'), $this->settings['captchaUrl'], array(
			'onclick' => $script,
			'href' => "javascript:void(0);"
		));
	}

	public function input($field, $options = array()) {
		$options = am(array(
			'type' => 'text',
			'label' => __('Captcha code')
			//'reload' => true,
		), $options);

		$this->_getCaptchaId(true);

		$html = $this->Html->div('captcha', $this->image() . $this->reload());
		//unset($options['reload']);

		$html .= $this->Form->input($field, $options);
		return $html;
	}
} 