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
		if (task == 'business.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			
			Joomla.submitform(task);
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>
<div>

<form action="<?php echo JRoute::_('index.php?option=com_swaplocal&view=business'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">

	<legend><?php echo JText::_('COM_SWAPLOCAL_BUSINESS'); ?></legend>
		
	<fieldset>
			<div class="swaplocal-form-section">
				<span class="swaplocal-form-label">Business Name</span>
				<div class="formelm">
				<?php echo $this->form->getLabel('name'); ?>
				<?php echo $this->form->getInput('name'); ?>
				</div>
				
			</div>	
			
			
			<div class="swaplocal-form-section">
				<span class="swaplocal-form-label">Address</span>
				
				<div class="formelm">
				<?php echo $this->form->getLabel('street'); ?>
				<?php echo $this->form->getInput('street'); ?>
				</div>
				
				<div class="formelm">
				<?php echo $this->form->getLabel('city'); ?>
				<?php echo $this->form->getInput('city'); ?>
				<?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?>
				<?php echo $this->form->getLabel('zipcode'); ?>
				<?php echo $this->form->getInput('zipcode'); ?>
				</div>
				
			</div>
			
			
			<div class="swaplocal-form-section">
				<span class="swaplocal-form-label">Contact</span>
				
				<div class="formelm">
				<?php echo $this->form->getLabel('phone'); ?>
				<?php echo $this->form->getInput('phone'); ?>
				</div>
				
				<div class="formelm">
				<?php echo $this->form->getLabel('email'); ?>
				<?php echo $this->form->getInput('email'); ?>
				</div>
				
				<div class="formelm">
				<?php echo $this->form->getLabel('url'); ?>
				<?php echo $this->form->getInput('url'); ?>
				</div>
				
			</div>
			
			<div class="swaplocal-form-section">
				<span class="swaplocal-form-label"><?php echo $this->form->getLabel('description'); ?></span>
				
				<div class="formelm">
				<?php echo $this->form->getInput('description'); ?>
				</div>
				
			</div>
	

			<div class="formelm-buttons">
			<button type="button" onclick="Joomla.submitbutton('business.save')">
				<?php echo JText::_('JSAVE') ?>
			</button>
			<button type="button" onclick="Joomla.submitbutton('business.cancel')">
				<?php echo JText::_('JCANCEL') ?>
			</button>
			</div>
	</fieldset>

		<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_( 'form.token' ); ?>
	</form>
</div>
