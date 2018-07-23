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

class FahaniPlugin {

    function activate() {
        // Generate a custom post type
        // Flush rewrite rules
    }

    function deactivate() {
        // Flush rewrite rules
    }

    function uninstall() {
        // Delete Custom post type
        // Delete custom database data
    }
}

// Check if the class we are writing doesn't exist
if ( class_exists( 'FahaniPlugin' ) )
{
    $fahaniPlagin = new FahaniPlugin(); // Instancing the class
}

// Lifecycle of a plugin
// Activation
register_activation_hook( __FILE__, array( $fahaniPlagin, 'activate' ) );

// Deactivation
register_deactivation_hook( __FILE__, array( $fahaniPlagin, 'deactivate' ) );

// Uninstall
