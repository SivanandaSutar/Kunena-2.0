<?php
/**
* Kunena Component
* @package Kunena.Template.Default
*
* @copyright (C) 2011 Kunena Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.kunena.org
**/
defined( '_JEXEC' ) or die();

class KunenaTemplateBlue_Eagle extends KunenaTemplate {
	protected $default = array('blue_eagle');
	protected $css_compile = false;
	protected $userClasses = array(
		'kwho-',
		'admin'=>'kwho-admin',
		'globalmod'=>'kwho-globalmoderator',
		'moderator'=>'kwho-moderator',
		'user'=>'kwho-user',
		'guest'=>'kwho-guest',
		'banned'=>'kwho-banned',
		'blocked'=>'kwho-blocked'
	);
	public $categoryIcons = array('kreadforum', 'kunreadforum');

	public function initialize() {
		// Enable legacy mode
		KunenaTemplateLegacy::load();

		require_once JPATH_SITE. '/' . $this->getFile('initialize.php');
	}

	public function getButton($link, $name, $scope, $type, $id = null) {
		return parent::getButton($link, $name, $scope, $type, $id);
	}

	public function getIcon($name, $title='') {
		return '<span class="kicon '.$name.'" title="'.$title.'"></span>';
	}

	public function getImage($image, $alt='') {
		return '<img src="'.$this->getImagePath($image).'" alt="'.$alt.'" />';
	}
}