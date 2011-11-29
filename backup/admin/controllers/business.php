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
	JRequest::setVar( 'view', JRequest::getCmd( 'view', 'business' ) );
        parent::display($tpl);
    }
}
