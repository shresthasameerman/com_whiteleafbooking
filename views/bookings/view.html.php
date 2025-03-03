<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class WhiteleafBookingViewBookings extends BaseHtmlView
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
        ToolbarHelper::title(JText::_('COM_WHITELEAFBOOKING_BOOKINGS_VIEW_TITLE'), 'calendar');
        
        // Add standard buttons
        ToolbarHelper::addNew('booking.add');
        ToolbarHelper::editList('booking.edit');
        ToolbarHelper::deleteList('COM_WHITELEAFBOOKING_CONFIRM_DELETE', 'bookings.delete');
        
        // Add Room Availability button
        ToolbarHelper::custom('bookings.roomAvailability', 'calendar', 'calendar', 'COM_WHITELEAFBOOKING_ROOM_AVAILABILITY', false);
    }
}