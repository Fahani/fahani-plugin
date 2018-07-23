<?php
/**
 * @package FahaniPlugin
 */

/*
    Plugin Name: Fahani Plugin
    Plugin URI: https://github.com/Fahani/fahani-plugin
    Description: An amazing plugin!
    Version: 1.0.0
    Author: Nicolas
    Author URI: https://github.com/Fahani
    Licence: GPLv2 or later
    Text Domain: fahani-plugin
 */

/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) // Making sure we are coming from WP
{
    die( 'Hold your horses.' );
}

// Check if the class we are writing doesn't exist
if ( ! class_exists( 'FahaniPlugin' ) ) {

    class FahaniPlugin
    {

        function register()
        {
            // Actions to call the enqueue
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            $this->create_post_type();
        }

        protected function create_post_type()
        {
            // Calling the hook init on the method custom type, the one adding the ne post tye 'book'
            add_action('init', array($this, 'custom_post_type'));
        }

        /*Doing the uninstall in a separate file
         * static function uninstall()
        {
            // Delete Custom post type
            // Delete custom database data
        }*/

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            // Enqueue all our scripts
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
        }

        function activate()
        {
            require_once plugin_dir_path(__FILE__) . 'inc/fahani-plugin-activate.php';
            FahaniPluginActivate::activate();
        }
    }

    $fahaniPlugin = new FahaniPlugin(); // Instancing the class
    $fahaniPlugin->register();


    // Lifecycle of a plugin
    // Activation. Using the activate method in the class
        register_activation_hook(__FILE__, array($fahaniPlugin, 'activate'));

    // Deactivation
    // Using directly the class and the static method
        require_once plugin_dir_path(__FILE__) . 'inc/fahani-plugin-deactivate.php';
        register_deactivation_hook(__FILE__, array('FahaniPluginDeactivate', 'deactivate'));

    // Uninstall
    //register_uninstall_hook( __FILE__, array( $fahaniPlugin, 'uninstall' ) );
    // Alternative we can create an uninstall.php file and perform the uninstall operations over there. This file will called
    // by wordpress.

}