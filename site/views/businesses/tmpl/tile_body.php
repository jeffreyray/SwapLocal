<?php

defined('_JEXEC') or die('Restricted Access');
?>

<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
<!--		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>-->
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_swaplocal&view=business&id=' . $item->id); ?>">
				<?php echo $item->name; ?>
			</a><br/>
			<?php echo $item->street; ?><br/>
			<?php echo $item->city; ?>, <?php echo $item->state; ?> <?php echo $item->zipcode; ?>
		</td>
	</tr>
<?php endforeach; ?>

