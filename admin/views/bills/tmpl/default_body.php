<?php
/**
 * default body template file for SwapLocals view of SwapLocal component
 *
 * @version		$Id: default_body.php 74 2010-12-01 22:04:52Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->currency; ?>
		</td>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_swaplocal&task=bill.edit&id=' . $item->id); ?>">
				<?php echo $item->serial; ?>
			</a>
		</td>
		<td>
			<?php echo $item->denom; ?>
		</td>
		<td>
			<?php echo $item->series; ?>
		</td>
		<td>
			<?php echo $item->zipcode; ?>
		</td>
		<td>
			<?php echo $item->note; ?>
		</td>
	</tr>
<?php endforeach; ?>

