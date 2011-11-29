<?php
defined('_JEXEC') or die('Restricted access');

// current user
$user = & JFactory::getUser();
$params = &JComponentHelper::getParams( 'com_swaplocal' );

?>


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
                <?php echo $this->item->currency;?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="denom">
                    <?php echo JText::_( 'Denomination' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->item->denom;?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Series' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->item->series;?>
            </td>
        </tr>        
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Zip Code' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->item->zipcode;?>
            </td>
        </tr>  

        <tr>
            <td width="100" align="right" class="key">
                <label for="note">
                    <?php echo JText::_( 'Note' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->item->note;?>
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
