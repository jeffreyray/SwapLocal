<?php
/**
 * @version		$Id: view.html.php 22338 2011-11-04 17:24:53Z github_bot $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit an currency.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_swaplocal
 * @since		1.6
 */
class SwapLocalViewCurrency extends JView
{
	protected $form;
	protected $item;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		if ($this->getLayout() == 'pagebreak') {
			// TODO: This is really dogy - should change this one day.
			$eName		= JRequest::getVar('e_name');
			$eName		= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );
			$document	= JFactory::getDocument();
			$document->setTitle(JText::_('COM_SWAPLOCAL_PAGEBREAK_DOC_TITLE'));
			$this->assignRef('eName', $eName);
			parent::display($tpl);
			return;
		}

		// Initialiase variables.
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		$this->canDo	= SwapLocalHelper::getActions($this->state->get('filter.category_id'));

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);
		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$isNew		= ($this->item->id == 0);
		$checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $userId);
		$canDo		= SwapLocalHelper::getActions($this->state->get('filter.category_id'), $this->item->id);
		JToolBarHelper::title(JText::_('COM_SWAPLOCAL_PAGE_'.($checkedOut ? 'VIEW_CURRENCY' : ($isNew ? 'ADD_CURRENCY' : 'EDIT_CURRENCY'))), 'currency-add.png');

		// Built the actions for new and existing records.

		// For new records, check the create permission.
		if ($isNew && (count($user->getAuthorisedCategories('com_swaplocal', 'core.create')) > 0)) {
			JToolBarHelper::apply('currency.apply');
			JToolBarHelper::save('currency.save');
			JToolBarHelper::save2new('currency.save2new');
			JToolBarHelper::cancel('currency.cancel');
		}
		else {
			// Can't save the record if it's checked out.
			if (!$checkedOut) {
				// Since it's an existing record, check the edit permission, or fall back to edit own if the owner.
				if ($canDo->get('core.edit') || ($canDo->get('core.edit.own') && $this->item->created_by == $userId)) {
					JToolBarHelper::apply('currency.apply');
					JToolBarHelper::save('currency.save');

					// We can save this record, but check the create permission to see if we can return to make a new one.
					if ($canDo->get('core.create')) {
						JToolBarHelper::save2new('currency.save2new');
					}
				}
			}

			// If checked out, we can still save
			if ($canDo->get('core.create')) {
				JToolBarHelper::save2copy('currency.save2copy');
			}

			JToolBarHelper::cancel('currency.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolBarHelper::divider();
		JToolBarHelper::help('JHELP_swaplocal_ARTICLE_MANAGER_EDIT');
	}
}
