<?php
/**
 * @package    SwapLocal
 * @subpackage Components
 * @license    GNU/GPL
 */
 
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
 
class SwapLocalController extends JController
{
    function display($tpl = null)
    {
        // set default view if not set
        JRequest::setVar( 'view', JRequest::getCmd( 'view', 'frontpage' ) );
        parent::display($tpl);
    }
    

}