<?php
/**
 * @package    SwapLocal
 * @subpackage Components
 * @license    GNU/GPL
*/
 
// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
 
class SwapLocalViewBusiness extends JView
{
    function display($tpl = null)
    {
        $document =& JFactory::getDocument();
        
        $url = JURI::base().'components/com_swaplocal/assets/default.css';
        $document->addStyleSheet($url);
        
        $model = &$this->getModel();
        $items = $model->getData();
        $this->assignRef( 'group', $items );
        
        parent::display($tpl);
    }
}