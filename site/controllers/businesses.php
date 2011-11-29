<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class SwapLocalControllerBusinesses extends JControllerAdmin
{
	public function getModel($name = 'Businesses', $prefix = 'SwapLocalModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
