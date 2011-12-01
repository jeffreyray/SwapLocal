<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class SwapLocalControllerCurrency extends JControllerForm
{
	function __construct($config = array())
	{
		parent::__construct($config);
	}

	//protected function allowAdd($data = array())
	//{
	//	// Initialise variables.
	//	$user		= JFactory::getUser();
	//	$categoryId	= JArrayHelper::getValue($data, 'catid', JRequest::getInt('filter_category_id'), 'int');
	//	$allow		= null;
	//
	//	if ($categoryId) {
	//		// If the category has been passed in the data or URL check it.
	//		$allow	= $user->authorise('core.create', 'com_swaplocal.category.'.$categoryId);
	//	}
	//
	//	if ($allow === null) {
	//		// In the absense of better information, revert to the component permissions.
	//		return parent::allowAdd();
	//	}
	//	else {
	//		return $allow;
	//	}
	//}

	/**
	 * Method override to check if you can edit an existing record.
	 *
	 * @param	array	$data	An array of input data.
	 * @param	string	$key	The name of the key for the primary key.
	 *
	 * @return	boolean
	 * @since	1.6
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Initialise variables.
		$recordId	= (int) isset($data[$key]) ? $data[$key] : 0;
		$user		= JFactory::getUser();
		$userId		= $user->get('id');

		// Check general edit permission first.
		if ($user->authorise('core.edit', 'com_swaplocal.currency.'.$recordId)) {
			return true;
		}

		// Fallback on edit.own.
		// First test if the permission is available.
		if ($user->authorise('core.edit.own', 'com_swaplocal.currency.'.$recordId)) {
			// Now test the owner is the user.
			$ownerId	= (int) isset($data['created_by']) ? $data['created_by'] : 0;
			if (empty($ownerId) && $recordId) {
				// Need to do a lookup from the model.
				$record		= $this->getModel()->getItem($recordId);

				if (empty($record)) {
					return false;
				}

				$ownerId = $record->created_by;
			}

			// If the owner matches 'me' then do the test.
			if ($ownerId == $userId) {
				return true;
			}
		}

		// Since there is no asset tracking, revert to the component permissions.
		return parent::allowEdit($data, $key);
	}

	/**
	 * Method to run batch operations.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function batch($model)
	{
		JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Set the model
		$model	= $this->getModel('Currency', '', array());

		// Preset the redirect
		$this->setRedirect(JRoute::_('index.php?option=com_swaplocal&view=currencies'.$this->getRedirectToListAppend(), false));

		return parent::batch($model);
	}
}
