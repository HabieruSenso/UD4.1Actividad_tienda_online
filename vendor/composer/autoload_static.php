<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite096599f24759fe11ccb7f13e28fb3ee
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite096599f24759fe11ccb7f13e28fb3ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite096599f24759fe11ccb7f13e28fb3ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite096599f24759fe11ccb7f13e28fb3ee::$classMap;

        }, null, ClassLoader::class);
    }
}
