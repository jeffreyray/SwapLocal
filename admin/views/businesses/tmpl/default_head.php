<?php
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<th width="5">
		<?php echo JText::_('COM_SWAPLOCAL_BUSINESS_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BUSINESS_HEADING_NAME'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BUSINESS_HEADING_CITY'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BUSINESS_HEADING_STATE'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BUSINESS_HEADING_ZIPCODE'); ?>
	</th>
</tr>

