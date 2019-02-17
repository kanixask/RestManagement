<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit911bcb59d9e0b4de915292d30a80db7d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit911bcb59d9e0b4de915292d30a80db7d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit911bcb59d9e0b4de915292d30a80db7d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
