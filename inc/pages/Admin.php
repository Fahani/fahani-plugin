<?php
/**
 * @package FahaniPlugin
 */

namespace inc\pages;

class Admin
{
    public function register() {
        // Setting admin page
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }

    // Hook to add a new page in the admin panel
    public function add_admin_pages() {
        add_menu_page( 'Fahani Plugin', 'Fahani', 'manage_options', 'fahani_plugin' /* slug */, array( $this, 'admin_index'), 'dashicons-store', 110 /* position */);
    }

    // Load the template for the admin panel page
    public function admin_index() {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}