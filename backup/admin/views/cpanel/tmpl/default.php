<?php
/*
 * @component SwapLocal
 * @copyright Copyright (C) 2011 Jeffrey Ray, Chronosoft
 * @license : GNU/GPL
 * @Website : http://chronosoft.info
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

$app = JFactory::getApplication();
$template	= $app->getTemplate();

echo "<ul>";
$link = JRoute::_( 'index.php?option=com_swaplocal&controller=categories' );
echo "  <li><a href='$link'>Categories</a></li>";
$link = JRoute::_( 'index.php?option=com_swaplocal&controller=groups' );
echo "  <li><a href='$link'>Groups</a></li>";
echo "</ul>";
?>
