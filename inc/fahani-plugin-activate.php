<?php
/**
 * @package FahaniPlugin
 */

class FahaniPluginActivate {

    public static function activate() {
        flush_rewrite_rules();
    }
}