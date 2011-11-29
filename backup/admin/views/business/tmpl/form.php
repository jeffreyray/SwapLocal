<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="greeting">
                    <?php echo JText::_( 'Name' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="name" id="name" size="64" maxlength="255" value="<?php echo $this->group->name;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="category">
                    <?php echo JText::_( 'Category' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="category" id="category" size="64" maxlength="255" value="<?php echo $this->group->category;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="ggroup">
                    <?php echo JText::_( 'Google Group' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="ggroup" id="ggroup" size="64" maxlength="255" value="<?php echo $this->group->ggroup;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="image">
                    <?php echo JText::_( 'Image' ); ?>:
                </label>
            </td>
            <td>
                <input class="text" type="text" name="image" id="image" size="64" maxlength="255" value="<?php echo $this->group->image;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="description">
                    <?php echo JText::_( 'Description' ); ?>:
                </label>
            </td>
            <td>
                <textarea class="text_area" type="text" name="description" id="description" cols="80" rows="3"><?php echo $this->group->description;?></textarea>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="summary">
                    <?php echo JText::_( 'Summary' ); ?>:
                </label>
            </td>
            <td>
                <textarea class="text_area" type="text" name="summary" id="summary" cols="80" rows="8"><?php echo $this->group->summary;?></textarea>
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_swaplocal" />
<input type="hidden" name="id" value="<?php echo $this->group->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="groups" />
</form>