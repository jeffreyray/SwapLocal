<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

// Create shortcut to parameters.
$params = $this->state->get('params');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'bill.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			
			Joomla.submitform(task);
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>
<div>

<form action="<?php echo JRoute::_('index.php?option=com_swaplocal&view=bill&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<fieldset>
		<legend><?php echo JText::_('COM_SWAPLOCAL_NEW_SWAP'); ?></legend>

			<div class="formelm">
			Currency: 
			...
			</div>

			<div class="formelm">
			Denomination:
			... 
			Series:
			... 
			</div>
			
			<div class="formelm">
			Serial:
			...
			</div>
			
			<div class="formelm">
			<?php echo $this->form->getLabel('business'); ?>
			<?php echo $this->form->getInput('business'); ?>
			</div>
			
			

	

			<div class="formelm-buttons">
			<button type="button" onclick="Joomla.submitbutton('swap.save')">
				<?php echo JText::_('JSAVE') ?>
			</button>
			<button type="button" onclick="Joomla.submitbutton('swap.cancel')">
				<?php echo JText::_('JCANCEL') ?>
			</button>
			</div>
			<div>
			<?php echo $this->form->getLabel('description'); ?>
			<?php echo $this->form->getInput('description'); ?>
			</div>
	</fieldset>

		<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_( 'form.token' ); ?>
	</form>
</div>
