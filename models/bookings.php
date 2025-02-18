<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class WhiteleafBookingModelBookings extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('dwiwb_whiteleaf_bookings'));

        return $query;
    }
}