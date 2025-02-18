<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class WhiteleafBookingModelRooms extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('dwiwb_whiteleaf_rooms'));

        return $query;
    }
}