<?php
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<th width="5">
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_SERIAL'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_TIMESTAMP'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_BUSINESS'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_TRAVELTIME'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_TRAVELDIST'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_SWAP_HEADING_USER'); ?>
	</th>
</tr>

