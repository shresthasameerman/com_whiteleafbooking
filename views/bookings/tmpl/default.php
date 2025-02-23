<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('stylesheet', 'administrator/components/com_whiteleafbooking/assets/css/style.css');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$saveOrder = $listOrder == 'a.ordering';
?>

<form action="<?php echo Route::_('index.php?option=com_whiteleafbooking&view=bookings'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <?php echo HTMLHelper::_('grid.checkall'); ?>
                    </th>
                    <th class="title">
                        <?php echo HTMLHelper::_('grid.sort', 'BOOKING_NUMBER', 'a.booking_number', $listDirn, $listOrder); ?>
                    </th>
                    <th width="20%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'GUEST_NAME', 'a.guest_name', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'GUEST_PHONE', 'a.guest_phone', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'BOOKING_CHECK_IN', 'a.check_in', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'BOOKING_CHECK_OUT', 'a.check_out', $listDirn, $listOrder); ?>
                    </th>
                    <th width="15%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'COM_WHITELEAFBOOKING_PAYMENT_STATUS', 'a.payment_status', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'BOOKING_ID', 'a.id', $listDirn, $listOrder); ?>
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
                            <a href="<?php echo Route::_('index.php?option=com_whiteleafbooking&task=booking.edit&id=' . (int) $item->id); ?>">
                                <?php echo $this->escape($item->booking_number); ?>
                            </a>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->guest_name); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->guest_phone); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo HTMLHelper::_('date', $item->check_in, Text::_('DATE_FORMAT_LC4')); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo HTMLHelper::_('date', $item->check_out, Text::_('DATE_FORMAT_LC4')); ?>
                        </td>
                        <td class="hidden-phone">
                            <span class="payment-status <?php echo strtolower($item->payment_status); ?>">
                                <?php echo $this->escape($item->payment_status ?: 'Not Set'); ?>
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
                <div class="input-group">
                    <select name="payment_status" id="payment_status" class="form-control input-medium">
                        <option value=""><?php echo Text::_('COM_WHITELEAFBOOKING_SELECT_PAYMENT_STATUS'); ?></option>
                        <option value="Pending"><?php echo Text::_('COM_WHITELEAFBOOKING_PAYMENT_PENDING'); ?></option>
                        <option value="Paid"><?php echo Text::_('COM_WHITELEAFBOOKING_PAYMENT_PAID'); ?></option>
                        <option value="Refunded"><?php echo Text::_('COM_WHITELEAFBOOKING_PAYMENT_REFUNDED'); ?></option>
                    </select>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('bookings.updatePaymentStatus')">
                            <?php echo Text::_('COM_WHITELEAFBOOKING_UPDATE_PAYMENT_STATUS'); ?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="span6 text-right">
                <button type="button" class="btn btn-danger" onclick="if(confirm('<?php echo Text::_('COM_WHITELEAFBOOKING_CONFIRM_DELETE'); ?>')){ document.adminForm.task.value='bookings.delete'; document.adminForm.submit(); }">
                    <?php echo Text::_('JACTION_DELETE'); ?>
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