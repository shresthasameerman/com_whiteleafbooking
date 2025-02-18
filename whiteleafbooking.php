<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$controller = JControllerLegacy::getInstance('WhiteleafBooking');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();