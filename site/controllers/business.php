<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class SwapLocalControllerBusiness extends JControllerForm
{
	protected $view_item = 'business';


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
    
	public function getModel($name = 'business', $prefix = '', $config = array('ignore_request' => true))
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
			$this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=business&id='.$item->id, false));
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
}
