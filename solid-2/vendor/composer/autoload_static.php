<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60f80049b288b0431db557c251e83e96
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60f80049b288b0431db557c251e83e96::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60f80049b288b0431db557c251e83e96::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
