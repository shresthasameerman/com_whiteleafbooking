
<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Factory;

class WhiteleafBookingControllerRoomavailability extends FormController
{
    protected $view_list = 'roomavailability';
    
    public function getModel($name = 'Roomavailability', $prefix = 'WhiteleafBookingModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}