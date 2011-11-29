<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class SwapLocalControllerSwap extends JControllerForm
{
	protected $view_item = 'swap';


	public function add()
	{
		if (!parent::add()) {
			// Redirect to the return page.
			$this->setRedirect($this->getReturnPage());
		}
	}
    
	protected function allowAdd($data = array())
	{
		// Initialise variables.
		$user		= JFactory::getUser();
        return 1;
	}

	public function cancel($key = 'id')
	{
		parent::cancel($key);
		$this->setRedirect($this->getReturnPage());
	}

	public function edit($key = null, $urlVar = 'id')
	{
		$result = parent::edit($key, $urlVar);

		return $result;
	}
    
	public function find()
	{
        $this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=swap&layout=find', false));
        
        return true;
	}
    
	public function lookup()
	{
        $data = JRequest::getVar('jform', array(), 'post', 'array');
        
        if ( ! $data[currency] ) {
            $this->setError(JText::_('COM_SWAPLOCAL_FIND_ERROR_NO_CURRENCY'));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=swap&layout=find', false));
            return false;
        }
        if ( ! $data[serial] ) {
            $this->setError(JText::_('COM_SWAPLOCAL_FIND_ERROR_NO_SERIAL'));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=swap&layout=find', false));
            return false;
        }
        
        // fetch the key from the database
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);;
		$query->select('id, serial');
		$query->from('#__swaplocal_bills');
        $query->where('serial = \''. $data[serial].'\'' );
        $query->where('currency = '. $data[currency] );
		$db->setQuery((string)$query);
		
        
        $result = $db->loadObject();
        
        if ( ! $result ) {
            $this->setError(JText::_('COM_SWAPLOCAL_FIND_ERROR_NO_BILL') . ' ('.$data[serial].')' );
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=swap&layout=find', false));
            return false;
        }
        
        $this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=swap&layout=edit&id=0', false));
        
        return true;
	}

	public function getModel($name = 'swap', $prefix = '', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}


	protected function getRedirectToItemAppend($recordId = null, $urlVar = null)
	{
		$append = parent::getRedirectToItemAppend($recordId, $urlVar);
		$itemId	= JRequest::getInt('Itemid');
		$return	= $this->getReturnPage();

		if ($itemId) {
			$append .= '&Itemid='.$itemId;
		}

		if ($return) {
			$append .= '&return='.base64_encode($return);
		}

		return $append;
	}

	protected function getReturnPage()
	{
		$return = JRequest::getVar('return', null, 'default', 'base64');

		if (empty($return) || !JUri::isInternal(base64_decode($return))) {
			return JURI::base();
		}
		else {
			return base64_decode($return);
		}
	}

	protected function postSaveHook(JModel &$model, $validData = array())
	{
		$task = $this->getTask();
        $item = $model->getItem();

		if ($task == 'save') {
			$this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=bill&id='.$item->bill->id, false));
		}
	}

	public function save($key = null, $urlVar = 'id')
	{
		$result = parent::save($key, $urlVar);

		// If ok, redirect to the return page.
		//if ($result) {
		//	$this->setRedirect($this->getReturnPage());
		//}

		return $result;
	}

	public function go()
	{
		// Get the ID from the request
		$id = JRequest::getInt('id');

		// Get the model, requiring published items
		$modelLink	= $this->getModel('Bill', '', array('ignore_request' => true));
		//$modelLink->setState('filter.published', 1);

		// Get the item
		$link	= $modelLink->getItem($id);

		// Make sure the item was found.
		if (empty($link)) {
			return JError::raiseWarning(404, JText::_('COM_WEBLINKS_ERROR_WEBLINK_NOT_FOUND'));
		}

		// Redirect to the URL
		// TODO: Probably should check for a valid http link
		if ($link->url) {
			$modelLink->hit($id);
			JFactory::getApplication()->redirect($link->url);
		}
		else {
			return JError::raiseWarning(404, JText::_('COM_WEBLINKS_ERROR_WEBLINK_URL_INVALID'));
		}
	}
}
