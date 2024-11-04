<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf31106cdfff166b8ad492ea7d5be6f46
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf31106cdfff166b8ad492ea7d5be6f46', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf31106cdfff166b8ad492ea7d5be6f46', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf31106cdfff166b8ad492ea7d5be6f46::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
