<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;

class WhiteleafBookingControllerSampledata extends BaseController
{
    public function load()
    {
        $model = $this->getModel('Sampledata');
        if ($model->loadSampleData()) {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_SAMPLE_DATA_LOADED_SUCCESSFULLY'));
        } else {
            $this->setMessage(JText::_('COM_WHITELEAFBOOKING_SAMPLE_DATA_LOADING_FAILED'));
        }

        $this->setRedirect(JRoute::_('index.php?option=com_whiteleafbooking', false));
    }
}