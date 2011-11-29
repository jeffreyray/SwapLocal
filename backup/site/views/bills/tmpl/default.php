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
$columns = $params->get('columns',1);
?>

<table class="swaplocal-sumblock" width="100%">

<?php

    // iterate through groups
    $k = 0; $c = 1;
    for ($i=0, $n=count( $this->items ); $i < $n; $i++)
    {
        
        if ( $c == 1 ) {
            echo '<tr><td class="swaplocal-sumblock-col swaplocal-sumblock-col1">';
        }
        elseif ( $c == $columns ) {
            echo '<td class="swaplocal-sumblock-col swaplocal-sumblock-col-last">';
        }
        else {
            echo '<td class="swaplocal-sumblock-col swaplocal-sumblock-col-' . $c . '">';
        }
        
        
        $row =& $this->items[$i];
        $link = JRoute::_( 'index.php?option=com_swaplocal&view=group&cid=' . $row->id );
        ?>
        
        <table class="googlegroup-summary">
            <tr class="googlegroup-summary-row1">
                <td rowspan="2" class="googlegroup-summary-col1">
                    <a href="<?php echo $link; ?>">
                    <img src="<?php echo JURI::base().'components/com_swaplocal/assets/group.png'; ?>"/>
                    </a>
                </td>
                <td>
                   <a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
                </td>
            <tr>
                <td>
                    <?php echo $row->description; ?>
                </td>
            </tr>
        </table>
        <?php
        
        if ( $c == $columns ) {
            echo '</td></tr>';
            $c = 1;
        }
        else {
            echo '</td>';
            $c++;
        }
        
        
        $k = 1 - $k;
    }


?>

</table>
