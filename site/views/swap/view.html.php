<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class SwapLocalViewSwap extends JView
{
    protected $form;
    protected $item;
    protected $return_page;
    protected $state;

    public function display($tpl = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication();
        $user = JFactory::getUser();

        // Get model data.
        $this->state = $this->get('State');
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        $this->return_page = $this->get('ReturnPage');
        

        if (! empty($this->item)) {
            $this->form->bind($this->item);
        }

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
                JError::raiseWarning(500, implode("\n", $errors));
                return false;
        }

        // Create a shortcut to the parameters.
        $params	= &$this->state->params;

        //Escape strings for HTML output
        //$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));

        $this->params = $params;
        $this->user = $user;

        $this->_prepareDocument();
        parent::display($tpl);
    }

    protected function _prepareDocument()
    {
        $app	= JFactory::getApplication();
        $menus	= $app->getMenu();
        $title	= null;

        // Because the application sets a default page title,
        // we need to get it from the menu item itself
        $menu = $menus->getActive();

        if (empty($this->item->id)) {
            $head = JText::_('COM_SWAPLOCAL_FORM_SUBMIT_BILL');
        }
        else {
            $head = JText::_('COM_SWAPLOCAL_FORM_EDIT_BILL');
        }

        if ($menu) {
                $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        } else {
                $this->params->def('page_heading', $head);
        }

        $title = $this->params->def('page_title', $head);
        if ($app->getCfg('sitename_pagetitles', 0) == 1) {
                $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        }
        elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
                $title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
        }
        $this->document->setTitle($title);

        if ($this->params->get('menu-meta_description'))
        {
                $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->params->get('menu-meta_keywords'))
        {
                $this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
        }

                if ($this->params->get('robots'))
        {
                $this->document->setMetadata('robots', $this->params->get('robots'));
        }
    }
}
