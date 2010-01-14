<?php
/** 
 * Cupcake - Core Configuration
 *
 * @author 		Miles Johnson - www.milesj.me
 * @copyright	Copyright 2006-2009, Miles Johnson, Inc.
 * @license 	http://www.opensource.org/licenses/mit-license.php - Licensed under The MIT License
 * @link		www.milesj.me/resources/script/forum-plugin
 */
 
class ForumConfig {

	/**
	 * Current version: www.milesj.me/resources/logs/forum-plugin
	 *
	 * @access public
	 * @var string
	 */
	public $version = '1.6.1';

	/**
	 * Settings.
	 *
	 * @access public
	 * @var array
	 */
	public $settings = array();

	/**
	 * Singleton Instance.
	 *
	 * @access private
	 * @var array
	 * @static
	 */
	private static $__instance;
	
	/**
	 * Load the settings from the ini file.
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		if (empty($this->settings)) {
			$path = dirname(__FILE__) . DS;
			
			if (file_exists($path .'settings.ini')) {
				$path .= 'settings.ini';
			} else {
				$path .= 'defaults.ini';
			}
			
			$this->settings = parse_ini_file($path);

			if (empty($this->settings['supported_locales'])) {
				$this->settings['supported_locales'] = 'eng=English';
			}
		}
	}

	/**
	 * Grab the current object instance.
	 * 
	 * @access public
	 * @return object
	 * @static
	 */
	public static function getInstance() {
		if (empty(self::$__instance)) {
			self::$__instance = new ForumConfig();
		}
		
		return self::$__instance;
	}

}
