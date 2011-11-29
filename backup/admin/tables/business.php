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
 
class TableBusiness extends JTable
{
    var $id = null;
    var $name = null;
    var $street = null;
    var $city = null;
    var $state = null;
    var $zipcode = null;
    var $phone = null;
    
    var $image = null;
    var $description = null;

    var $published = null;
    var $created = null;
    var $created_by = null;
    var $checked_out = null;
    var $checked_out_time = null;
    var $params = null;   
 
    function __construct( &$db ) {
        parent::__construct('#__swaplocal_businesses', 'id', $db);
    }
}