<?php
/**
 * @package FahaniPlugin
 */

namespace inc;

class Activate {

    public static function activate() {
        flush_rewrite_rules();
    }
}