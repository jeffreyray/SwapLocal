<?php
defined('_JEXEC') or die('Restricted access');
?>

<table width="100%">
    <tr>
        <td width="50%" style="padding: 10px">
            <div style="width: 100%; text-align: center;">
                <a href="<?php echo JRoute::_('index.php?option=com_swaplocal&task=swap.find'); ?>">
                    I found a SwapLocal bill.<br>Show me where it's been.
                </a>
                
            </div>
        </td>

        <td width="50%" style="padding: 10px">
            <div style="width: 100%; text-align: center;">
                <a href="<?php echo JRoute::_('index.php?option=com_swaplocal&task=bill.add'); ?>">
                    I want to create and track a SwapLocal bill.
                </a>
            </div>
        </td>
    </tr>
</table>
    