<?php

function decagon_recipe_create() {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "recipe";
 
        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name, 'category' => $category, 'description' => $description), //data
                array('%s', '%s') //data format			
        );
        $message.="Recipe inserted";
    }
    ?>
    <div class="wrap">
        <h2>Add New Recipe</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <!-- <p>Three capital letters for the ID</p> -->
            <table class='wp-list-table widefat fixed'>
             
                <tr>
                    <th class="ss-th-width">Recipe</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Category</th>
                    <td><input type="text" name="category" value="<?php echo $category; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Description</th>
                    <td><input type="text" name="description" value="<?php echo $description; ?>" class="ss-field-width" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
    <?php
}