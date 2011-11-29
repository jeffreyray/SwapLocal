<?php
/*
 * @component SwapLocal
 * @copyright Copyright (C) 2011 Jeffrey Ray, Chronosoft
 * @license : GNU/GPL
 * @Website : http://chronosoft.info
 */

 // no direct access
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
                <?php echo $this->bill->currency;?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="denom">
                    <?php echo JText::_( 'Denomination' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->bill->denom;?>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Series' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->bill->series;?>
            </td>
        </tr>        
        <tr>
            <td width="100" align="right" class="key">
                <label for="series">
                    <?php echo JText::_( 'Zip Code' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->bill->zipcode;?>
            </td>
        </tr>  

        <tr>
            <td width="100" align="right" class="key">
                <label for="note">
                    <?php echo JText::_( 'Note' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->bill->note;?>
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
