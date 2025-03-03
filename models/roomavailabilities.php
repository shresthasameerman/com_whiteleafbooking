<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class WhiteleafBookingModelRoomavailabilities extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('a.*')
            ->from($db->quoteName('dwiwb_whiteleaf_room_availability', 'a'));
            
        // Add the list ordering clause
        $orderCol = $this->state->get('list.ordering', 'a.id');
        $orderDirn = $this->state->get('list.direction', 'ASC');
        $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }
    
    public function delete($ids)
    {
        $db = $this->getDbo();
        if (empty($ids)) {
            return false;
        }

        $ids = array_map('intval', $ids); // Ensure IDs are integers
        $query = $db->getQuery(true)
            ->delete($db->quoteName('dwiwb_whiteleaf_room_availability'))
            ->where($db->quoteName('id') . ' IN (' . implode(',', $ids) . ')');

        $db->setQuery($query);

        return $db->execute();
    }
}