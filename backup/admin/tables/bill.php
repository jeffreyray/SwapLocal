<?php
/**
 * Hello World table class
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license        GNU/GPL
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
 
class TableBill extends JTable
{
    var $id = null;
    var $currency = null;
    var $denom = null;
    var $series = null;
    var $serial = null;
    var $zipcode = null;
    var $note = null;
    
    var $published = null;
    var $created = null;
    var $created_by = null;
    var $checked_out = null;
    var $checked_out_time = null;
    var $params = null;  
    
    function __construct( &$db ) {
        parent::__construct('#__swaplocal_bills', 'id', $db);
    }
}