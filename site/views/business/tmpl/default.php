<?php
defined('_JEXEC') or die('Restricted access');

// current user
$user = & JFactory::getUser();
$params = &JComponentHelper::getParams( 'com_swaplocal' );

?>


<h1><?php echo $this->item->name;?></h1>

<div>
<?php echo $this->item->street;?><br/>
<?php echo $this->item->city;?>, <?php echo $this->item->state;?> <?php echo $this->item->zipcode;?>
</div>

<div>
<?php echo $this->item->phone;?><br/>
<?php echo $this->item->url;?><br/>
<?php echo $this->item->email;?><br/>
</div>

<div>
<?php echo $this->item->description;?><br/>
</div>

<div class="clr"></div>
 
