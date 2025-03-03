<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class WhiteleafBookingViewRoomavailability extends BaseHtmlView
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

    protected function addToolbar()
    {
        JToolbarHelper::title(JText::_('COM_WHITELEAFBOOKING_ROOM_AVAILABILITY_TITLE'), 'calendar');
        JToolbarHelper::addNew('roomavailability.add');
        JToolbarHelper::editList('roomavailability.edit');
        JToolbarHelper::deleteList('COM_WHITELEAFBOOKING_CONFIRM_DELETE_AVAILABILITY', 'roomavailability.delete');
        
        // Add back to bookings button
        JToolbarHelper::back('JTOOLBAR_BACK', 'index.php?option=com_whiteleafbooking&view=bookings');
    }
}