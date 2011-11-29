<?php
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');

// Create shortcut to parameters.
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'form.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			
			Joomla.submitform(task);
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

 
<form action="<?php echo JRoute::_('index.php?option=com_swaplocal'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">   
    <fieldset>
        <div class="formelm-buttons">
            <button type="button" onclick="Joomla.submitbutton('form.save')">
                    <?php echo JText::_('JSAVE') ?>
            </button>
            <button type="button" onclick="Joomla.submitbutton('form.cancel')">
                    <?php echo JText::_('JCANCEL') ?>
            </button>
        </div>
    </fieldset>
    
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="denom">
                    <?php echo JText::_( 'Currency' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="currency" id="currency" size="32" maxlength="32" value="<?php echo $this->bill->currency;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="denom">
                    <?php echo JText::_( 'Denomination' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="denom" id="denom" size="3" maxlength="3" value="<?php echo $this->bill->denom;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Series' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="series" id="series" size="3" maxlength="3" value="<?php echo $this->bill->series;?>" />
            </td>
        </tr>        
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Zip Code' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="zipcode" id="zipcode" size="5" maxlength="5" value="<?php echo $this->bill->zipcode;?>" />
            </td>
        </tr>  

        <tr>
            <td width="100" align="right" class="key">
                <label for="summary">
                    <?php echo JText::_( 'Note' ); ?>:
                </label>
            </td>
            <td>
                <textarea class="text_area" type="text" name="note" id="note" cols="80" rows="8"><?php echo $this->bill->note;?></textarea>
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_swaplocal" />
<input type="hidden" name="id" value="<?php echo $this->bill->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="bill" />-->
</form>