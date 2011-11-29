<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
class SwapLocalModelBill extends JModelItem
{
    function __construct()
    {
        parent::__construct();
     
        $array = JRequest::getVar('cid',  0, '', 'array');
        $this->setId((int)$array[0]);
    }
    
    function setId($id)
    {
        // Set id and wipe data
        $this->_id  = $id;
        $this->_data  = null;
    }
    
    function &getData()
    {
        if (empty( $this->_data )) {
            $query = ' SELECT * FROM #__swaplocal_bills WHERE id = ' . $this->_id;
            $this->_db->setQuery( $query );
            $this->_data = $this->_db->loadObject();
        }
        if (!$this->_data) {
            $this->_data = new stdClass();
            $this->_data->id = 0;
            $this->_data->greeting = null;
        }
        return $this->_data;
    }

    function store()
    {
        $row =& $this->getTable();
     
        $data = JRequest::get( 'post' );
        
        
        // Bind the form fields to the table
        if (!$row->bind($data)) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
     
        // Make sure the record is valid
        if (!$row->check()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
     
        // Store the the record to the database
        if (!$row->store()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
     
        return true;
    }
    
    function delete()
    {
        $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
        $row =& $this->getTable();
     
        foreach($cids as $cid) {
            if (!$row->delete( $cid )) {
                $this->setError( $row->getErrorMsg() );
                return false;
            }
        }
     
        return true;
    }
}


