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
		if (task == 'swap.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			
			Joomla.submitform(task);
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>
<div>

<form action="<?php echo JRoute::_('index.php?option=com_swaplocal&view=bill&layout=find'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<fieldset>
		<legend><?php echo JText::_('COM_SWAPLOCAL_BILL'); ?></legend>

			<div class="formelm">
			<?php echo $this->form->getLabel('currency'); ?>
			<?php echo $this->form->getInput('currency'); ?>
			</div>

			<div class="formelm">
			<?php echo $this->form->getLabel('serial'); ?>
			<?php echo $this->form->getInput('serial'); ?>
			</div>
			
			<div class="formelm-buttons">
			<button type="button" onclick="Joomla.submitbutton('swap.lookup')">
				<?php echo JText::_('COM_SWAPLOCAL_SEARCH') ?>
			</button>
			</div>
	</fieldset>

		<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_( 'form.token' ); ?>
	</form>
</div>
