<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf31106cdfff166b8ad492ea7d5be6f46
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf31106cdfff166b8ad492ea7d5be6f46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf31106cdfff166b8ad492ea7d5be6f46::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf31106cdfff166b8ad492ea7d5be6f46::$classMap;

        }, null, ClassLoader::class);
    }
}