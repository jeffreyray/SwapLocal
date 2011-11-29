<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controlleradmin');

class SwapLocalControllerBusinesses extends JControllerAdmin
{
	public function getModel($name = 'Businesses', $prefix = 'SwapLocalModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
