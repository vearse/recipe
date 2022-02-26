<?php

function decagon_recipe_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "recipe";
    // $id = $_GET["id"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    //update  recipe 
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('description' => $description), //data
                array('category' => $category), //data
                array('name' => $name), //data
                array('ID' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }
    //delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $recipes = $wpdb->get_results($wpdb->prepare("SELECT id,name,description,category from $table_name where id=%s", $id));
        foreach ($recipes as $s) {
            $name = $s->name;
        }
    }
    ?>
    <div class="wrap">
        <h2>Recipe</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Recipe deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=decagon_recipe_list') ?>">&laquo; Back to recipe list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Recipe updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=decagon_recipe_list') ?>">&laquo; Back to recipe list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'> 
                    <tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
                    <tr><th>Category</th><td><input type="text" name="category" value="<?php echo $category; ?>"/></td></tr>
                    <tr><th>Description</th><td><input type="text" name="description" value="<?php echo $description; ?>"/></td></tr>
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>

    </div>
    <?php
}