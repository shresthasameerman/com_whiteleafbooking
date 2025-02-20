<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;

class WhiteleafBookingControllerBookings extends BaseController
{
    public function delete()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $cid = $input->get('cid', array(), 'array');

        // Get the model
        $model = $this->getModel('Bookings');

        // Delete the items
        if ($model->delete($cid)) {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_BOOKINGS_DELETED_SUCCESSFULLY'));
        } else {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_BOOKINGS_DELETION_FAILED'));
        }

        // Redirect to the bookings view
        $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking&view=bookings', false));
    }
}