<?php
/**
 * @package    SwapLocal
 * @subpackage Components
 * @license    GNU/GPL
 */
 
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
 
class SwapLocalControllerGroups extends JController
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
		JRequest::setVar( 'view', JRequest::getCmd( 'view', 'bills' ) );
		JToolBarHelper::title( JText::_( 'Bills' ), 'generic.png' );
		parent::display($tpl);
	}



	function edit()
	{
		JRequest::setVar( 'view', 'bill' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
	function save()
	{
		$model = $this->getModel('bill');
	 
		if ($model->store()) {
			$msg = JText::_( 'Bill Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Bill' ) . ": " . $model->getError();
		}
	 
		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_swaplocal&controller=bills';
		$this->setRedirect($link, $msg);
	}


	function remove()
	{
		$model = $this->getModel('group');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Bills Could not be Deleted' );
		} else {
			$msg = JText::_( 'Bill(s) Deleted' );
		}
	 
		$this->setRedirect( 'index.php?option=com_swaplocal&controller=bills', $msg );
	}
	
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_swaplocal&controller=bills', $msg );
	}
}
