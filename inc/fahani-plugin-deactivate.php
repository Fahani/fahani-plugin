<?php
/**
 * @package FahaniPlugin
 */

class FahaniPluginDeactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}