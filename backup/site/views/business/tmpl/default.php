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
<iframe id="forum_embed"
 src="javascript:void(0)"
 scrolling="no"
 frameborder="0"
 style="width: 100%; height: 800px">
</iframe>

<script type="text/javascript">
 document.getElementById("forum_embed").src =
  "https://groups.google.com/forum/embed/?place=forum/<?php echo $this->group->ggroup; ?>" +
  "&showsearch=true&showpopout=true&parenturl=" +
  encodeURIComponent(window.location.href);
</script>
  </body>
</html>