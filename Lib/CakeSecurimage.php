<?php
App::import('Vendor', 'Captcha.securimage' . DS . 'securimage');

class CakeSecurimage extends Securimage {

	public function __construct($options = array()) {
		parent::__construct($options);
	}

	protected function checkTablesExist() {
		//TODO do this the cakephp way
		return parent::checkTablesExist();
	}

	protected function clearCodeFromDatabase() {
		//TODO do this the cakephp way
		return parent::clearCodeFromDatabase();
	}

	protected function createDatabaseTables() {
		//TODO do this the cakephp way
		return parent::createDatabaseTables();
	}

	protected function purgeOldCodesFromDatabase() {
		//TODO do this the cakephp way
		return parent::purgeOldCodesFromDatabase();
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

}