<?php
/**
 * @version $Id$
 * @author CHNM
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @copyright Center for History and New Media, 2010
 * @package Contribution
 */

$h1 = 'Contribution';
$h2 = 'Types';
$head = array('title' => "$h1 | $h2",
              'bodyclass' => 'contribution primary',
              'content_class' => 'horizontal-nav');
head($head);
echo js('jquery');
?>
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function() {
    jQuery('#add-type').click(function() {
        jQuery('#types-table-body').append('<tr><td><input type="text"/></td></tr>');
        return false;
    });
});
</script>
<h1><a href="<?php echo uri('contribution'); ?>"><?php echo $h1; ?></a> | <?php echo $h2; ?></h1>
<p class="add-button"><a href="<?php echo uri('contribution/types/add');?>" class="add" id="add-type">Add a Type</a></p>
<ul id="section-nav" class="navigation">
<?php echo nav(array('Start' => uri('contribution/index'), 'Settings' => uri('contribution/settings'), 'Types' => uri('contribution/types'))); ?>
</ul>
<div id="primary">
    <?php echo flash(); ?>
    <table>
        <thead id="types-table-head">
            <tr>
                <th>Name</th>
                <th>Item Type</th>
                <th>Contributed Fields</th>
                <th>File Upload</th>
            </tr>
        </thead>
        <tbody id="types-table-body">
<?php foreach ($typeInfoArray as $typeInfo): ?>
    <tr>
        <td><a href="<?php echo uri('contribution/types/edit/id/'.$typeInfo['id']); ?>"><?php echo html_escape($typeInfo['display_name']); ?></a></td>
        <td><?php echo html_escape($typeInfo['item_type_name']); ?></td>
        <td></td>
        <td><?php echo html_escape($typeInfo['file_permissions']); ?></td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php foot();