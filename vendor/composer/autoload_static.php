<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e0905c13c247bf4aa903a520b76ed7e
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chillerlan\\Settings\\' => 20,
            'chillerlan\\QRCode\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chillerlan\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-settings-container/src',
        ),
        'chillerlan\\QRCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-qrcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e0905c13c247bf4aa903a520b76ed7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e0905c13c247bf4aa903a520b76ed7e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9e0905c13c247bf4aa903a520b76ed7e::$classMap;

        }, null, ClassLoader::class);
    }
}
