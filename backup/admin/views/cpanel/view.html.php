<?php
/*
 * @component SwapLocal
 * @copyright Copyright (C) 2011 Jeffrey Ray, Chronosoft
 * @license : GNU/GPL
 * @Website : http://www.chronosoft.info
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

Jimport( 'joomla.application.component.view');

class SwapLocalViewCpanel extends JView {
	
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'SwapLocal :: Control Panel' ), 'generic.png' );
        //JToolBarHelper::deleteList();
        //JToolBarHelper::editListX();
        //JToolBarHelper::addNewX();
 
        // Get data from the model
        //$items =& $this->get( 'Data');
        //
        //$this->assignRef( 'items', $items );
 
        parent::display($tpl);
    }
}
?>
