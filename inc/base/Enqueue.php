<?php
/**
 * Created by PhpStorm.
 * User: niko
 * Date: 23/07/2018
 * Time: 18:13
 */

namespace inc\base;

use \inc\base\BaseController;

class Enqueue extends BaseController
{
    public function register() {
        // Actions to call the enqueue
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        // Enqueue all our scripts
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/mystyle.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/myscript.js');
    }
}
