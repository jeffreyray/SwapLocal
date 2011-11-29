<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');


class SwapLocalControllerBill extends JControllerForm
{
	protected $view_item = 'bill';

	public function add()
	{
		JRequest::setVar( 'view', 'bill' );
		JRequest::setVar( 'layout', 'form'  );
		parent::display();
	}

	public function cancel($key = null, $urlVar = 'cid')
	{
		parent::cancel($key);
		$this->setRedirect($this->getReturnPage());
	}

	public function edit($key = null, $urlVar = 'cid')
	{
		JRequest::setVar( 'view', 'bill' );
		JRequest::setVar( 'layout', 'form'  );
		parent::display();
	}

	public function &getModel($name = 'bill', $prefix = '', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	/**
	 * Gets the URL arguments to append to an item redirect.
	 *
	 * @param	int		$recordId	The primary key id for the item.
	 * @param	string	$urlVar		The name of the URL variable for the id.
	 *
	 * @return	string	The arguments to append to the redirect URL.
	 * @since	1.6
	 */
	protected function getRedirectToItemAppend($recordId = null, $urlVar = 'cid')
	{
		// Need to override the parent method completely.
		$tmpl		= JRequest::getCmd('tmpl');
		$layout		= JRequest::getCmd('layout', 'edit');
		$append		= '';

		// Setup redirect info.
		if ($tmpl) {
			$append .= '&tmpl='.$tmpl;
		}

		// TODO This is a bandaid, not a long term solution.
//		if ($layout) {
//			$append .= '&layout='.$layout;
//		}
		$append .= '&layout=edit';

		if ($recordId) {
			$append .= '&'.$urlVar.'='.$recordId;
		}

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

	protected function postSaveHook(JModel &$model, $validData)
	{
		$task = $this->getTask();

		if ($task == 'save') {
			$this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=bill&cid='.$validData['id'], false));
		}
	}

	public function save($key = null, $urlVar = 'cid')
	{
		$model = $this->getModel('bill');
	 
		if ($model->store()) {
			$msg = JText::_( 'Bill Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Bill' ) . ": " . $model->getError();
		}
	 
		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_swaplocal&controller=bill&cid='.$model->getData->id;
		$this->setRedirect($link, $msg);
	}
}























