<?php
/**
 * Kunena Component
 * @package Kunena.Administrator
 *
 * @copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

// Access check.
if (version_compare(JVERSION, '1.6', '>')) {
	if (!JFactory::getUser()->authorise('core.manage', 'com_kunena')) {
		return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	}
}

// Initialize Kunena (if Kunena System Plugin isn't enabled)
require_once JPATH_ADMINISTRATOR . '/components/com_kunena/api.php';

// Get view and task
$view = JRequest::getCmd ( 'view', 'cpanel' );
$task = JRequest::getCmd ( 'task' );
JRequest::setVar( 'view', $view );

// Start by checking if Kunena has been installed -- if not, redirect to our installer
require_once(KPATH_ADMIN.'/install/version.php');
$kversion = new KunenaVersion();
if ($view != 'install' && !$kversion->checkVersion()) {
	$app = JFactory::getApplication ();
	$app->redirect(JURI::root(true).'/administrator/index.php?option=com_kunena&view=install&task=prepare&'.JUtility::getToken().'=1');

} elseif ($view == 'install') {
	// Load our installer (special case)
	require_once (KPATH_ADMIN . '/install/controller.php');
	$controller = new KunenaControllerInstall();

} else {
	// Load language files
	KunenaFactory::loadLanguage('com_kunena', 'site');
	KunenaFactory::loadLanguage('com_kunena.install', 'admin');

	// Initialize error handlers
	KunenaError::initialize ();

	// Kunena has been successfully installed: Load our main controller
	$controller = KunenaController::getInstance();
}
$controller->execute( $task );
$controller->redirect();

KunenaError::cleanup ();