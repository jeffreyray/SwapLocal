<?php
/**
 * @version		$Id: currencies.php 20228 2011-01-10 00:52:54Z eddieajau $
 * @package		Joomla.Administrator
 * @subpackage	com_swaplocal
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Currencies list controller class.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_swaplocal
 * @since	1.6
 */
class SwapLocalControllerCurrencies extends JControllerAdmin
{
	/**
	 * Constructor.
	 *
	 * @param	array	$config	An optional associative array of configuration settings.

	 * @return	SwapLocalControllerCurrencies
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	/**
	 * Proxy for getModel.
	 *
	 * @param	string	$name	The name of the model.
	 * @param	string	$prefix	The prefix for the PHP class name.
	 *
	 * @return	JModel
	 * @since	1.6
	 */
	public function getModel($name = 'Currency', $prefix = 'SwapLocalModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
