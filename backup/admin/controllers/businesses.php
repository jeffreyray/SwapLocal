<?php
/**
 * @package    SwapLocal
 * @subpackage Components
 * @license    GNU/GPL
 */
 
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
 
class SwapLocalControllerBusiness extends JController
{
	function __construct()
	{
		parent::__construct();
		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}
	
	function display($tpl = null)
	{
		// set default view if not set
		JRequest::setVar( 'view', JRequest::getCmd( 'view', 'businesses' ) );
		JToolBarHelper::title( JText::_( 'Busnesses' ), 'generic.png' );
		parent::display($tpl);
	}



	function edit()
	{
		JRequest::setVar( 'view', 'business' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
	function save()
	{
		$model = $this->getModel('business');
	 
		if ($model->store()) {
			$msg = JText::_( 'Business Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Business' ) . ": " . $model->getError();
		}
	 
		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_swaplocal&controller=businesses';
		$this->setRedirect($link, $msg);
	}


	function remove()
	{
		$model = $this->getModel('business');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Business Could not be Deleted' );
		} else {
			$msg = JText::_( 'Business(es) Deleted' );
		}
	 
		$this->setRedirect( 'index.php?option=com_swaplocal&controller=businesses', $msg );
	}
	
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_swaplocal&controller=businesses', $msg );
	}
}
