<?php
/**
* Simple autoloader, so we don't need Composer just for this.
*/
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = __DIR__ . '\\src\\' . $class . '.php';
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
            if (file_exists($file)) {
                include $file;
            }
        });
    }
}
Autoloader::register();
