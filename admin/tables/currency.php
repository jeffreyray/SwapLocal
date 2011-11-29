<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.database.table');

class SwapLocalTableCurrency extends JTable
{
    function __construct(&$db) 
    {
        parent::__construct('#__swaplocal_currencies', 'id', $db);
    }

    public function bind($array, $ignore = '') 
    {
        if (isset($array['params']) && is_array($array['params'])) 
        {
            // Convert the params field to a registry.
            $parameter = new JRegistry;
            $parameter->loadArray($array['params']);
            $array['params'] = (string)$parameter;
        }
        //if (isset($array['denoms']) && is_array($array['denoms'])) 
        //{
        //    // Convert the denoms field to a registry.
        //    $parameter = new JRegistry;
        //    $parameter->loadArray($array['denoms']);
        //    $array['denoms'] = (string)$parameter;
        //}
        //if (isset($array['series']) && is_array($array['series'])) 
        //{
        //    // Convert the series field to a registry.
        //    $parameter = new JRegistry;
        //    $parameter->loadArray($array['series']);
        //    $array['series'] = (string)$parameter;
        //}
        return parent::bind($array, $ignore);
    }

    public function load($pk = null, $reset = true) 
    {
        if (parent::load($pk, $reset)) 
        {
            // Convert the params field to a registry.
            $params = new JRegistry;
            $params->loadJSON($this->params);
            $this->params = $params;
            
            //// Convert the denoms field to a registry.
            //$denoms = new JRegistry;
            //$denoms->loadINI($this->denoms);
            //$this->denoms = $denoms;
            //
            //// Convert the series field to a registry.
            //$series = new JRegistry;
            //$series->loadINI($this->series);
            //$this->series = $series;
            
            return true;
        }
        else
        {
         false;
        }
    }
    

    public function save($oder_filer = '', $ignore = '') 
    {
        if (isset($array['params']) && is_array($array['params'])) 
        {
            // Convert the params field to a registry.
            $parameter = new JRegistry;
            $parameter->loadArray($array['params']);
            $array['params'] = (string)$parameter;
        }
        if (isset($array['denoms']) && is_array($array['denoms'])) 
        {
            // Convert the denoms field to a registry.
            $parameter = new JRegistry;
            $parameter->loadArray($array['denoms']);
            $array['denoms'] = (string)$parameter;
        }
        if (isset($array['series']) && is_array($array['series'])) 
        {
            // Convert the series field to a registry.
            $parameter = new JRegistry;
            $parameter->loadArray($array['series']);
            $array['series'] = (string)$parameter;
        }
        return parent::bind($array, $ignore);
    }


    protected function _getAssetName()
    {
        $k = $this->_tbl_key;
        return 'com_swaplocal.currency.'.(int) $this->$k;
    }


    protected function _getAssetTitle()
    {
        return $this->name;
    }


    protected function _getAssetParentId()
    {
        $asset = JTable::getInstance('Asset');
        $asset->loadByName('com_swaplocal');
        return $asset->id;
    }
}
