<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;

class WhiteleafBookingControllerRooms extends BaseController
{
    public function delete()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $cid = $input->get('cid', array(), 'array');

        // Get the model
        $model = $this->getModel('Rooms');

        // Delete the items
        if ($model->delete($cid)) {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_ROOMS_DELETED_SUCCESSFULLY'));
        } else {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_ROOMS_DELETION_FAILED'));
        }

        // Redirect to the rooms view
        $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking&view=rooms', false));
    }
    
    public function back()
    {
        // Redirect back to bookings view
        $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking&view=bookings', false));
    }
}