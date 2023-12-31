<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit94f5b8824edb1f58b29da6265097ada7
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit94f5b8824edb1f58b29da6265097ada7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit94f5b8824edb1f58b29da6265097ada7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit94f5b8824edb1f58b29da6265097ada7::$classMap;

        }, null, ClassLoader::class);
    }
}
