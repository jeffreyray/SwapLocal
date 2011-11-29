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

<div width="25%">
    I found a SwapLocal Bill. Show me where it's been.
</div>

<div width="25%">
    I want to track a bill. Show me where it's been.
</div>
