// Create a new file: views/roomavailability/tmpl/default.php
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
?>

<form action="<?php echo Route::_('index.php?option=com_whiteleafbooking&view=roomavailability'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <?php echo HTMLHelper::_('grid.checkall'); ?>
                    </th>
                    <th class="title">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ROOM_NUMBER', 'a.room_number', $listDirn, $listOrder); ?>
                    </th>
                    <th width="20%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ROOM_TYPE', 'a.room_type', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_FROM_DATE', 'a.from_date', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_TO_DATE', 'a.to_date', $listDirn, $listOrder); ?>
                    </th>
                    <th width="10%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_AVAILABILITY', 'a.availability', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($this->items)): ?>
                    <?php foreach ($this->items as $i => $item): ?>
                        <tr class="row<?php echo $i % 2; ?>">
                            <td class="center hidden-phone">
                                <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td>
                                <a href="<?php echo Route::_('index.php?option=com_whiteleafbooking&task=roomavailability.edit&id=' . (int) $item->id); ?>">
                                    <?php echo $this->escape($item->room_number); ?>
                                </a>
                            </td>
                            <td class="hidden-phone">
                                <?php echo $this->escape($item->room_type); ?>
                            </td>
                            <td class="hidden-phone">
                                <?php echo HTMLHelper::_('date', $item->from_date, Text::_('DATE_FORMAT_LC4')); ?>
                            </td>
                            <td class="hidden-phone">
                                <?php echo HTMLHelper::_('date', $item->to_date, Text::_('DATE_FORMAT_LC4')); ?>
                            </td>
                            <td class="hidden-phone">
                                <?php 
                                $availabilityClass = ($item->availability == 1) ? 'payment-status paid' : 'payment-status pending';
                                $availabilityText = ($item->availability == 1) ? Text::_('COM_WHITELEAFBOOKING_AVAILABLE') : Text::_('COM_WHITELEAFBOOKING_UNAVAILABLE');
                                ?>
                                <span class="<?php echo $availabilityClass; ?>">
                                    <?php echo $availabilityText; ?>
                                </span>
                            </td>
                            <td class="hidden-phone">
                                <?php echo (int) $item->id; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            <?php echo Text::_('COM_WHITELEAFBOOKING_NO_ROOM_AVAILABILITY_RECORDS'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="task" value="">
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>">
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>