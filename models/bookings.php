<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Language\Text;

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

    public function delete($ids)
    {
        $db = $this->getDbo();
        
        // Validate input
        if (empty($ids) || !is_array($ids)) {
            $this->setError(Text::_('COM_WHITELEAFBOOKING_NO_ITEMS_SELECTED'));
            return false;
        }

        try {
            // Filter out any non-numeric values
            $ids = array_filter($ids, 'is_numeric');
            
            if (empty($ids)) {
                $this->setError(Text::_('COM_WHITELEAFBOOKING_INVALID_IDS'));
                return false;
            }

            // Quote and sanitize IDs
            $ids = array_map([$db, 'quote'], $ids);
            
            $query = $db->getQuery(true)
                ->delete($db->quoteName('dwiwb_whiteleaf_bookings'))
                ->where($db->quoteName('id') . ' IN (' . implode(',', $ids) . ')');

            $db->setQuery($query);
            $result = $db->execute();

            if (!$result) {
                $this->setError($db->getErrorMsg());
                return false;
            }

            return true;

        } catch (Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }
    }
}