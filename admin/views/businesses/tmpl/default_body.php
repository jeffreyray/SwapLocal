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
			<a href="<?php echo JRoute::_('index.php?option=com_swaplocal&task=business.edit&id=' . $item->id); ?>">
				<?php echo $item->name; ?>
			</a>
		</td>
		<td>
			<?php echo $item->city; ?>
		</td>
		<td>
			<?php echo $item->state; ?>
		</td>
		<td>
			<?php echo $item->zipcode; ?>
		</td>
	</tr>
<?php endforeach; ?>

