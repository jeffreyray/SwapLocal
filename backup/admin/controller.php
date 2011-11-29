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
        JRequest::setVar( 'view', JRequest::getCmd( 'view', 'bill' ) );
        parent::display($tpl);
    }
    
    function view_bill($tpl = null)
    {
        JRequest::setVar( 'view', 'bill' );
        parent::display($tpl);
    }
    //
    //function submit_bug($tpl = null)
    //{
    //    JRequest::setVar( 'view', 'bug' );
    //    JRequest::setVar( 'layout', 'form' );
    //    parent::display($tpl);
    //}
    //
    //function save_bug($tpl = bull)
    //{
    //    JRequest::setVar( 'view', 'bugs' );
    //    parent::display($tpl);
    //}
}