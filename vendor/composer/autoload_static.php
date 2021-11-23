<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04bcc291c5a1ff00816674ca61941998
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04bcc291c5a1ff00816674ca61941998::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04bcc291c5a1ff00816674ca61941998::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04bcc291c5a1ff00816674ca61941998::$classMap;

        }, null, ClassLoader::class);
    }
}