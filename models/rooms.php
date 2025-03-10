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
    
    /**
     * Delete rooms
     *
     * @param   array  $ids  An array of record IDs.
     *
     * @return  boolean  True on success
     */
    public function delete($ids)
    {
        $db = $this->getDbo();
        if (empty($ids)) {
            return false;
        }

        $ids = array_map('intval', $ids); // Ensure IDs are integers
        $query = $db->getQuery(true)
            ->delete($db->quoteName('dwiwb_whiteleaf_rooms'))
            ->where($db->quoteName('id') . ' IN (' . implode(',', $ids) . ')');

        $db->setQuery($query);

        return $db->execute();
    }
}