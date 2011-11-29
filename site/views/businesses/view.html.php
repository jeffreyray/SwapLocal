<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class SwapLocalViewBusinesses extends JView
{

	function display($tpl = null) 
	{
                $document =& JFactory::getDocument();
                $url = JURI::base().'components/com_swaplocal/assets/style.css';
                $document->addStyleSheet($url);
                
                $this->user = JFactory::getUser();
                
        
            
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		//$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	//protected function addToolBar() 
	//{
	//	$canDo = SwapLocalHelper::getActions();
	//	JToolBarHelper::title(JText::_('COM_SWAPLOCAL_MANAGER_BUSINESSES'), 'swaplocal');
	//	if ($canDo->get('core.create')) 
	//	{
	//		JToolBarHelper::addNew('business.add', 'JTOOLBAR_NEW');
	//	}
	//	if ($canDo->get('core.edit')) 
	//	{
	//		JToolBarHelper::editList('business.edit', 'JTOOLBAR_EDIT');
	//	}
	//	if ($canDo->get('core.delete')) 
	//	{
	//		JToolBarHelper::deleteList('', 'business.delete', 'JTOOLBAR_DELETE');
	//	}
	//	if ($canDo->get('core.admin')) 
	//	{
	//		JToolBarHelper::divider();
	//		JToolBarHelper::preferences('com_swaplocal');
	//	}
	//}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_SWAPLOCAL_BUSINESESS'));
	}
}
