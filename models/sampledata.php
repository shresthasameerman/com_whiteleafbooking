<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;

class WhiteleafBookingModelSampledata extends BaseDatabaseModel
{
    public function loadSampleData()
    {
        $db = Factory::getDbo();
        $sqlFile = JPATH_COMPONENT_ADMINISTRATOR . '/sample_data.sql';

        if (File::exists($sqlFile)) {
            $queries = file_get_contents($sqlFile);
            $queries = explode(';', $queries);

            foreach ($queries as $query) {
                $query = trim($query);
                if ($query) {
                    $db->setQuery($query);
                    $db->execute();
                }
            }

            return true;
        }

        return false;
    }
}