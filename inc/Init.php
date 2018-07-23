<?php
/**
 * @package FahaniPlugin
 */

namespace inc;

final class Init { // PHP avoid to extends this class in another class. Protect the methods

    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services() {
        return array(
            pages\Admin::class,
            base\Enqueue::class,
            base\SettingsLinks::class
        );
    }

    /**
     * Loop through the classes, initialize them and call the register() method if it exits
     */
    public static function register_services() {
        foreach (self::get_services() as $class) {
            $service = self::instantiate( $class );
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Create an object of the class
     * @param $class class from the services array
     * @return class new instance of the class
     */
    private static function instantiate( $class ) {
        return new $class;
    }
}