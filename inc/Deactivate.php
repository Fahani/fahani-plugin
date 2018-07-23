<?php
/**
 * @package FahaniPlugin
 */

namespace inc;

class Deactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}