<?php
/**
 * @package    SwapLocal
 * @subpackage Components
 * @license    GNU/GPL
 */
 
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
 
class SwapLocalControllerGroup extends JController
{
	function __construct()
	{
		parent::__construct();
		// Register Extra tasks
		//$this->registerTask( 'add'  , 	'edit' );
	}
	
    function display($tpl = null)
    {
	// set default view if not set
	JRequest::setVar( 'view', JRequest::getCmd( 'view', 'bill' ) );
        parent::display($tpl);
    }
    
	function edit()
	{
		JRequest::setVar( 'view', 'bill' );
		JRequest::setVar( 'layout', 'form'  );
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
}
