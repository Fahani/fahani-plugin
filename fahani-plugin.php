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

// If this file is called outside wordpress structure, abort
if ( ! defined( 'ABSPATH' ) ) // Making sure we are coming from WP
{
    die( 'Hold your horses.' );
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__  ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__  ) . '/vendor/autoload.php';
}

// Constants to use along our plugin
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

function activate_fahani_plugin() {
    inc\base\Activate::activate();
}
// The register_activation and register_deactivation needs to be outside of a Class thats why they are here
register_activation_hook( __FILE__, 'activate_fahani_plugin' );

function deactivate_fahani_plugin() {
    inc\base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_fahani_plugin' );


if ( class_exists( 'inc\\Init' ) ) {
    inc\Init::register_services();
}