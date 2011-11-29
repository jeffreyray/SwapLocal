<?php

defined('_JEXEC') or die('Restricted Access');
?>

<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<img src="<?php echo JRoute::_('media/com_swaplocal/images/business-default-64.png');?> "/>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_swaplocal&view=business&id=' . $item->id); ?>">
				<?php echo $item->name; ?>
			</a><br/>
			<?php echo $item->street; ?>
		</td>
		<td>
			<?php echo $item->city; ?>, <?php echo $item->state; ?>
		</td>
		<td>
			<?php echo $item->zipcode; ?>
		</td>
	</tr>
<?php endforeach; ?>

