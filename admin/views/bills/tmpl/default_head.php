<?php
/**
 * default head template file for SwapLocals view of SwapLocal component
 *
 * @version		$Id: default_head.php 74 2010-12-01 22:04:52Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?><tr>
	<th width="5">
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_CURRENCY'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_SERIAL'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_DENOM'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_SERIES'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_ZIPCODE'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_SWAPLOCAL_BILL_HEADING_NOTE'); ?>
	</th>
</tr>

