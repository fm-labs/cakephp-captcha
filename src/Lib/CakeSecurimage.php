<?php

namespace Captcha\Lib;

use Securimage;

class CakeSecurimage extends Securimage {

	public function __construct($options = array()) {

		$colorKeys = array('signature_color', 'image_bg_color', 'text_color', 'line_color', 'noise_color');
		$options = array_map(function($val, $key) use ($colorKeys) {
			if (in_array($key, $colorKeys) && is_string($val)) {
				$val = new \Securimage_Color($val);
			}

		}, $options);
		debug($options);

		parent::__construct($options);
	}

	protected function checkTablesExist() {
		//TODO do this the cakephp way
		return parent::checkTablesExist();
	}

	protected function createDatabaseTables() {
		//TODO do this the cakephp way
		return parent::createDatabaseTables();
	}

	protected function openDatabase() {
		//TODO do this the cakephp way
		return parent::openDatabase();
	}

	protected function saveCodeToDatabase() {
		//TODO do this the cakephp way
		return parent::saveCodeToDatabase();
	}

	protected function getCodeFromDatabase() {
		//TODO do this the cakephp way
		return parent::getCodeFromDatabase();
	}

	/**
	 * @return void
	 */
	protected function clearCodeFromDatabase() {
		//TODO do this the cakephp way
		parent::clearCodeFromDatabase();
	}

	/**
	 * @return void
	 */
	protected function purgeOldCodesFromDatabase() {
		//TODO do this the cakephp way
		parent::purgeOldCodesFromDatabase();
	}

/**
 * Static validator
 *
 * @param string $code
 * @return boolean
 */
	public static function staticValidate($code) {
		$Captcha = new self();
		return $Captcha->check($code);
	}

}