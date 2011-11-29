<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class SwapLocalModelBusiness extends JModelAdmin
{
	protected $item;

	protected function populateState() 
	{
		$app = JFactory::getApplication();
		// Get the message id
		$id = JRequest::getInt('id');
		$this->setState('business.id', $id);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
		parent::populateState();
	}

	public function getTable($type = 'Business', $prefix = 'SwapLocalTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	
	public function &getItem($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;
			
			if (empty($id)) {
				$id = $this->getState('business.id');
			}
				
			// Get a level row instance.
			$table = JTable::getInstance('Business', 'SwapLocalTable');
			
			// Attempt to load the row.
			if ($table->load($id))
			{
				// Check published state.
				if ($published = $this->getState('filter.published'))
				{
					if ($table->state != $published) {
						return $this->_item;
					}
				}
				
				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
				$this->_item = JArrayHelper::toObject($properties, 'JObject');
			}
			elseif ($error = $table->getError()) {
				$this->setError($error);
			}
		}
        if (!$this->_item) {
            $this->_item = new stdClass();
            $this->_data->id = 0;
        }

		return $this->_item;
	}

	
    public function getForm($data = array(), $loadData = true) 
    {
            // Get the form.
            $form = $this->loadForm('com_swaplocal.business', 'business', array('control' => 'jform', 'load_data' => $loadData));
            if (empty($form)) 
            {
                    return false;
            }
            return $form;
    }

    public function getScript() 
    {
            return 'administrator/components/com_swaplocal/models/forms/business.js';
    }
    
    protected function loadFormData() 
    {
            // Check the session for previously entered form data.
            $data = JFactory::getApplication()->getUserState('com_swaplocal.edit.business.data', array());
            if (empty($data)) 
            {
                    $data = $this->getItem();
            }
            return $data;
    }
	
	protected function prepareTable(&$table)
	{
		// Derived class will provide its own implentation if required.
	}
	
	
	public function save($data)
	{
		// Initialise variables;
		$table		= $this->getTable();
		$key		= $table->getKeyName();
		$pk			= (!empty($data[$key])) ? $data[$key] : (int)$this->getState($this->getName().'.id');
		$isNew		= true;


		// Allow an exception to be thrown.
		try
		{
			// Load the row if saving an existing record.
			if ($pk > 0) {
				$table->load($pk);
				$isNew = false;
			}
			
			// Bind the data.
			if (!$table->bind($data)) {
				$this->setError($table->getError());
				return false;
			}
			
			// Prepare the row for saving
			$this->prepareTable($table);
			
			// Check the data.
			if (!$table->check()) {
				$this->setError($table->getError());
				return false;
			}
			
			// Store the data.
			if (!$table->store()) {
				$this->setError($table->getError());
				return false;
			}
			
			// Clean the cache.
			$this->cleanCache();
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());

			return false;
		}

		$pkName = $table->getKeyName();

		if (isset($table->$pkName)) {
			$this->setState($this->getName().'.id', $table->$pkName);
		}
		$this->setState($this->getName().'.new', $isNew);

		return true;
	}
}
