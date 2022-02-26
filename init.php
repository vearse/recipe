<?php
/*
    Plugin Name:  Recipe
    Author: Kabiru Wahab

*/

function ss_options_install()
{
    global $wpdb;

    $table_name = $wpdb->prefix . "recipe";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) NOT NULL AUTO_INCREMENT,
            `name` varchar(50)  CHARACTER SET utf8  NOT NULL,
            `category` varchar(50)  CHARACTER SET utf8  NOT NULL,
            `description` Text  CHARACTER SET utf8  NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}
 
// Install Plugin
register_activation_hook(__FILE__, 'ss_options_install');

// Menu
function decagon_recipe_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Recipe', //page title
	'Recipe', //menu title
	'manage_options', //capabilities
	'decagon_recipe_list', //menu slug
	'decagon_recipe_list' //function
	);
	
	//Submenu
	add_submenu_page('decagon_recipe_list', //parent slug
	'Add New Recipe', //page title
	'Add New', //menu title
	'manage_options', //capability
	'decagon_recipe_create', //menu slug
	'decagon_recipe_create'); //function
	
}

// Add Menu
add_action('admin_menu','decagon_recipe_modifymenu');

// Import Recipe Functionalities
define('ROOTDIR', plugin_dir_path(__FILE__));

require_once(ROOTDIR . 'recipe-list.php');
require_once(ROOTDIR . 'recipe-create.php');
require_once(ROOTDIR . 'recipe-update.php');