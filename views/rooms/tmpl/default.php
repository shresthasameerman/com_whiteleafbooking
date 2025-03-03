<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('stylesheet', 'administrator/components/com_whiteleafbooking/assets/css/style.css', array('version' => 'auto', 'relative' => true));

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$saveOrder = $listOrder == 'a.ordering';
?>

<form action="<?php echo Route::_('index.php?option=com_whiteleafbooking&view=rooms'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <?php echo HTMLHelper::_('grid.checkall'); ?>
                    </th>
                    <th class="title">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ROOM_TITLE', 'a.title', $listDirn, $listOrder); ?>
                    </th>
                    <th width="20%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ROOM_TYPE', 'a.room_type', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_CAPACITY', 'a.capacity', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_PRICE', 'a.price', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_AVAILABILITY', 'a.available', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $i => $item): ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td class="center hidden-phone">
                            <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td>
                            <a href="<?php echo Route::_('index.php?option=com_whiteleafbooking&task=room.edit&id=' . (int) $item->id); ?>">
                                <?php echo $this->escape($item->title); ?>
                            </a>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->room_type); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->capacity); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->price); ?>
                        </td>
                        <td class="hidden-phone">
                            <span class="payment-status <?php echo (!empty($item->available) && $item->available == 1) ? 'c' : 'p'; ?>">
                                <?php echo (!empty($item->available) && $item->available == 1) ? 'Available' : 'Unavailable'; ?>
                            </span>
                        </td>
                        <td class="hidden-phone">
                            <?php echo (int) $item->id; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="form-actions">
        <div class="row-fluid">
            <div class="span6">
                <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('room.add')">
                    <span class="icon-new icon-white"></span>
                    <?php echo Text::_('JTOOLBAR_NEW'); ?>
                </button>
            </div>
            <div class="span6 text-right">
                <button type="button" class="btn btn-danger" onclick="if(confirm('<?php echo Text::_('COM_WHITELEAFBOOKING_CONFIRM_DELETE_ROOMS'); ?>')){ Joomla.submitbutton('rooms.delete'); }">
                    <span class="icon-delete"></span>
                    <?php echo Text::_('JTOOLBAR_DELETE'); ?>
                </button>
            </div>
        </div>
    </div>
    <input type="hidden" name="task" value="">
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>