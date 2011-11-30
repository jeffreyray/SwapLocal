<?php
/**
 * @version		$Id: view.html.php 22355 2011-11-07 05:11:58Z github_bot $
 * @package		Joomla.Administrator
 * @subpackage	com_swaplocal
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of businesses.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_swaplocal
 * @since		1.6
 */
class SwapLocalViewBusinesses extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 *
	 * @return	void
	 */
	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->authors		= $this->get('Authors');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// We don't need toolbar in the modal window.
		if ($this->getLayout() !== 'modal') {
			$this->addToolbar();
		}

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		$canDo	= SwapLocalHelper::getActions($this->state->get('filter.category_id'));
		$user		= JFactory::getUser();
		JToolBarHelper::title(JText::_('COM_SWAPLOCAL_BUSINESSES_TITLE'), 'business.png');

		if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_swaplocal', 'core.create'))) > 0 ) {
			JToolBarHelper::addNew('business.add');
		}

		if (($canDo->get('core.edit')) || ($canDo->get('core.edit.own'))) {
			JToolBarHelper::editList('business.edit');
		}

		if ($canDo->get('core.edit.state')) {
			JToolBarHelper::divider();
			JToolBarHelper::publish('businesses.publish', 'JTOOLBAR_PUBLISH', true);
			JToolBarHelper::unpublish('businesses.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolBarHelper::custom('businesses.featured', 'featured.png', 'featured_f2.png', 'JFEATURED', true);
			JToolBarHelper::divider();
			JToolBarHelper::archiveList('businesses.archive');
			JToolBarHelper::checkin('businesses.checkin');
		}

		if ($this->state->get('filter.published') == -2 && $canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'businesses.delete','JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();
		}
		elseif ($canDo->get('core.edit.state')) {
			JToolBarHelper::trash('businesses.trash');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_swaplocal');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('JHELP_swaplocal_ARTICLE_MANAGER');
	}
}
