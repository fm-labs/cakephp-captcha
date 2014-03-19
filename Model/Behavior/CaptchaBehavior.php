<?php
App::uses('ModelBehavior', 'Model');
App::uses('CakeSecurimage', 'Captcha.Lib');

class CaptchaBehavior extends ModelBehavior {

	public function setup(Model $model, $config = array()) {
		if (!isset($this->settings[$model->alias])) {
			if (empty($config)) {
				$config = array('captcha');
			}

			$this->settings[$model->alias] = $config;
		}
	}

	public function beforeValidate(Model $model) {
		foreach ($this->settings[$model->alias] as $field => $_config) {
			if (is_numeric($field)) {
				$field = $_config;
				$_config = array();
			}
			$this->setupField($model, $field, $_config);
		}
	}

	public function setupField(Model $model, $field, $config) {
		$model->validator()
			->add($field, 'captchaNotEmpty', array(
				'rule' => 'notEmpty',
				'message' => __('Please enter the captcha code')
			))
			->add($field, 'captchaValidate', array(
				'rule' => array('validateCaptcha'),
				'message' => __('Captcha code not valid')
			));
	}

	public function validateCaptcha(Model $model, $check) {
		$value = array_values($check);
		$value = $value[0];

		return CakeSecurimage::staticValidate($value);
	}

} 