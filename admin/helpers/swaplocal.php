<?php

/**
 * @version		$Id: helloworld.php 74 2010-12-01 22:04:52Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * SwapLocal component helper.
 */
abstract class SwapLocalHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_CURRENCIES'), 'index.php?option=com_swaplocal&view=currencies', $submenu == 'currencies');
		JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_BILLS'), 'index.php?option=com_swaplocal&view=bills', $submenu == 'bills');
		JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_BUSINESSES'), 'index.php?option=com_swaplocal&view=businesses', $submenu == 'businesses');
		JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_SWAPS'), 'index.php?option=com_swaplocal&view=swaps', $submenu == 'swaps');
		//JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_MESSAGES'), 'index.php?option=com_swaplocal&view=messages', $submenu == 'messages');
		//JSubMenuHelper::addEntry(JText::_('COM_SWAPLOCAL_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_swaplocal', $submenu == 'categories');
		//
		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-helloworld {background-image: url(../media/com_swaplocal/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_SWAPLOCAL_ADMINISTRATION_CATEGORIES'));
		}
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_swaplocal';
		}
		else {
			$assetName = 'com_swaplocal.message.'.(int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
