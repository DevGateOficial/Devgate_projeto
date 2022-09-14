<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2baec8ca33bd676ee34890ce685a9dde
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sts\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/sts',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2baec8ca33bd676ee34890ce685a9dde::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2baec8ca33bd676ee34890ce685a9dde::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2baec8ca33bd676ee34890ce685a9dde::$classMap;

        }, null, ClassLoader::class);
    }
}
