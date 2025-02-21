<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;

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
    
    public function updatePaymentStatus()
    {
        // Check for request forgeries
        JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));
        
        // Get input
        $input = Factory::getApplication()->input;
        $cid = $input->get('cid', array(), 'array');
        $paymentStatus = $input->getString('payment_status', '');
        
        if (empty($cid)) {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_NO_BOOKINGS_SELECTED'), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking&view=bookings', false));
            return false;
        }
        
        // Get the model
        $model = $this->getModel('Bookings');
        
        // Update the payment status
        if ($model->updatePaymentStatus($cid, $paymentStatus)) {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_PAYMENT_STATUS_UPDATED'));
        } else {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_PAYMENT_STATUS_UPDATE_FAILED'), 'error');
        }
        
        // Redirect back to the bookings view
        $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking&view=bookings', false));
    }
}