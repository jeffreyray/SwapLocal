<?php

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
			<a href="<?php echo JRoute::_('index.php?option=com_swaplocal&task=swap.edit&id=' . $item->id); ?>">
				<?php echo $item->bill; ?>
			</a>
		</td>
		<td>
			<?php echo $item->timestamp; ?>
		</td>
		<td>
			<?php echo $item->business; ?>
		</td>
		<td>
			<?php echo $item->traveltime; ?>
		</td>
		<td>
			<?php echo $item->traveldist; ?>
		</td>
		<td>
			<?php echo $item->created_by; ?>
		</td>
	</tr>
<?php endforeach; ?>

