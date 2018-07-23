<?php
/**
 * Created by PhpStorm.
 * User: niko
 * Date: 23/07/2018
 * Time: 18:13
 */

namespace inc\base;

use \inc\base\BaseController;

class SettingsLinks extends BaseController
{

    public function register() {
        // Add the link
        add_filter( "plugin_action_links_" . $this->plugin, array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {
        // Add custom settings link in the plugin
        $links[] = '<a href="options-general.php?page=fahani_plugin">Settings</a>';
        //array_push( $links, $settings_link );
        return $links;
    }

}