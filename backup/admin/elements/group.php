<?php
defined('_JEXEC') or die();

class JElementGroup extends JElement
{
   var   $_name = 'SwapLocal';

   function fetchElement($name, $value, &$node, $control_name)
   {
      $db = &JFactory::getDBO();
        
      $query = "SELECT `name` AS text, `id` AS value FROM #__swaplocal_groups ORDER BY `name`";
      $db->setQuery($query);
      $options = $db->loadObjectList();
      
      // header text
      array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Group').' -', 'value', 'text') );
        
      return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'value', 'text', $value, $control_name.$name );   
   }
}
?>