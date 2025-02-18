<?php
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\CMS\Factory;

class WhiteleafBookingTableRoom extends Table
{
    public function __construct(&$db)
    {
        parent::__construct('dwiwb_whiteleaf_rooms', 'id', $db);
    }

    public function bind($array, $ignore = '')
    {
        if (isset($array['params']) && is_array($array['params'])) {
            $array['params'] = json_encode($array['params']);
        }
        return parent::bind($array, $ignore);
    }

    public function load($keys = null, $reset = true)
    {
        if (parent::load($keys, $reset)) {
            $params = json_decode($this->params, true);
            $this->params = (array) $params;
            return true;
        } else {
            return false;
        }
    }

    public function store($updateNulls = false)
    {
        $date = Factory::getDate();
        if ($this->id) {
            $this->modified = $date->toSql();
        } else {
            $this->created = $date->toSql();
        }
        return parent::store($updateNulls);
    }
}