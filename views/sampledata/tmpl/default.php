<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1><?php echo Text::_('COM_WHITELEAFBOOKING_SAMPLE_DATA'); ?></h1>
            <form action="<?php echo Route::_('index.php?option=com_whiteleafbooking&task=sampledata.load'); ?>" method="post">
                <button type="submit" class="btn btn-primary"><?php echo Text::_('COM_WHITELEAFBOOKING_LOAD_SAMPLE_DATA'); ?></button>
            </form>
        </div>
    </div>
</div>