<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\AdminModel;

class WhiteleafBookingModelRoomavailability extends AdminModel
{
    protected $text_prefix = 'COM_WHITELEAFBOOKING';

    public function getTable($type = 'Roomavailability', $prefix = 'WhiteleafBookingTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_whiteleafbooking.roomavailability', 'roomavailability', array('control' => 'jform', 'load_data' => $loadData));
        return $form;
    }

    protected function loadFormData()
    {
        $data = $this->getItem();
        return $data;
    }
}