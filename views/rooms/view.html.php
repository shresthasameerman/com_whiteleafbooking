<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class WhiteleafBookingViewRooms extends BaseHtmlView
{
    protected $items;
    protected $pagination;
    protected $state;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');

        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors), 500);
        }
        
        // Add toolbar buttons
        $this->addToolbar();

        parent::display($tpl);
    }
    
    /**
     * Add the page title and toolbar.
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function addToolbar()
    {
        // Set the title
        ToolbarHelper::title(JText::_('COM_WHITELEAFBOOKING_MANAGE_ROOM_AVAILABILITY'), 'calendar');
        
        // Add buttons for room management
        ToolbarHelper::addNew('room.add', 'JTOOLBAR_NEW');
        ToolbarHelper::editList('room.edit', 'JTOOLBAR_EDIT');
        ToolbarHelper::deleteList('', 'rooms.delete', 'JTOOLBAR_DELETE');
        
        // Add a back button to return to bookings
        ToolbarHelper::custom('rooms.back', 'arrow-left', 'arrow-left', 'JTOOLBAR_BACK', false);
    }
}