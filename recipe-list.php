<?php

// Fetch all created recipe
function decagon_recipe_list(){
    ?>
   
    <div class="wrap">
        <h2>Recipes</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=decagon_recipe_create'); ?>">Add New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "recipe";

        $rows = $wpdb->get_results("SELECT id,name,category,description from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Name</th>
                <th class="manage-column ss-list-width">Category</th>
                <th class="manage-column ss-list-width">Desciption</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?> 
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->category; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->description; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=decagon_recipe_update&id=' . $row->id); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}