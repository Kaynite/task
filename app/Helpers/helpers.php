<?php

if (!function_exists('blankAvatar')) {
    function blankAvatar()
    {
        return asset('/assets/media/avatars/blank.png');
    }
}

if (!function_exists('userAvatar')) {
    function userAvatar()
    {
        return blankAvatar();

        // if ($avatar = auth()->user()->getFirstMedia('avatar')) {
        //     return $avatar->getFullUrl('thumbnail');
        // } else {
        //     return blankAvatar();
        // }
    }
}

if (!function_exists('makeSlug')) {
    function makeSlug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }

        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Lower case everything
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: https://www.php.net/manual/en/function.mb-strtolower.php
        $string = mb_strtolower($string, "UTF-8");

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace('~[^\pL\d]+~u', ' ', $string);

        $string = trim($string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}

if (!function_exists('makeKeywords')) {
    function makeKeywords($string)
    {
        // return implode(', ', explode(' ', $string));

        // For string coming from Tagify plugin
        $ff = collect(json_decode($string))->map(function ($k) {
            return $k->value;
        })->toArray();

        return implode(', ', $ff);
    }
}

if (!function_exists('availableLocales')) {
    function availableLocales()
    {
        return collect([
            'en' => 'English',
        ]);
    }
}

if (!function_exists('locales')) {
    function locales()
    {
        return availableLocales()->keys()->toArray();
    }
}

if (!function_exists('generateRandomNumber')) {
    function generateRandomNumber(int $length)
    {
        $characters       = '0123456789';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 1; $i <= $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('randomPhoneNumber')) {
    function randomPhoneNumber()
    {
        return '01' . rand(0, 2) . generateRandomNumber(8);
    }
}

if (!function_exists('icons')) {
    function icons()
    {
        return collect([
            'fas fa-user'              => '&#xf007;',
            'fas fa-anchor'            => '&#xf13d;',
            'fas fa-archive'           => '&#xf187;',
            'fas fa-asterisk'          => '&#xf069;',
            'fas fa-award'             => '&#xf559;',
            'fas fa-balance-scale'     => '&#xf24e;',
            'fas fa-book-open'         => '&#xf518;',
            'fas fa-camera'            => '&#xf030;',
            'fas fa-chart-pie'         => '&#xf200;',
            'fas fa-check'             => '&#xf00c;',
            'fas fa-cog'               => '&#xf013;',
            'fas fa-cogs'              => '&#xf085;',
            'fas fa-comment'           => '&#xf075;',
            'fas fa-dollar-sign'       => '&#xf155;',
            'fas fa-envelope'          => '&#xf0e0;',
            'fas fa-exclamation'       => '&#xf12a;',
            'fas fa-fan'               => '&#xf863;',
            'fas fa-feather'           => '&#xf52d;',
            'fas fa-file'              => '&#xf15b;',
            'fas fa-file-alt'          => '&#xf15c;',
            'fas fa-fire'              => '&#xf06d;',
            'fas fa-flag'              => '&#xf024;',
            'fas fa-folder'            => '&#xf07b;',
            'fas fa-folder-open'       => '&#xf07c;',
            'fas fa-frog'              => '&#xf52e;',
            'fas fa-gem'               => '&#xf3a5;',
            'fas fa-gift'              => '&#xf06b;',
            'fas fa-glass-martini-alt' => '&#xf57b;',
            'fas fa-glasses'           => '&#xf530;',
            'fas fa-globe'             => '&#xf0ac;',
            'fas fa-globe-africa'      => '&#xf57c;',
            'fas fa-guitar'            => '&#xf7a6;',
            'fas fa-hamburger'         => '&#xf805;',
            'fas fa-hammer'            => '&#xf6e3;',
            'fas fa-eye'               => '&#xf06e;',
            'fas fa-hand-peace'        => '&#xf25b;',
            'fas fa-hashtag'           => '&#xf292;',
            'fas fa-headphones-alt'    => '&#xf58f;',
            'fas fa-heart'             => '&#xf004;',
            'fas fa-hourglass-half'    => '&#xf252;',
            'fas fa-image'             => '&#xf03e;',
            'fas fa-images'            => '&#xf302;',
            'fas fa-keyboard'          => '&#xf11c;',
            'fas fa-language'          => '&#xf1ab;',
            'fas fa-laptop'            => '&#xf109;',
            'fas fa-lightbulb'         => '&#xf0eb;',
            'fas fa-map-marker-alt'    => '&#xf3c5;',
            'fas fa-mobile-alt'        => '&#xf3cd;',
            'fas fa-moon'              => '&#xf186;',
            'fas fa-music'             => '&#xf001;',
            'fas fa-palette'           => '&#xf53f;',
            'fas fa-paper-plane'       => '&#xf1d8;',
            'fas fa-phone'             => '&#xf095;',
            'fas fa-play'              => '&#xf04b;',
            'fas fa-question'          => '&#xf128;',
            'fas fa-quote-right'       => '&#xf10e;',
            'fas fa-shield-alt'        => '&#xf3ed;',
            'fas fa-smile'             => '&#xf118;',
            'fas fa-sun'               => '&#xf185;',
            'fas fa-th'                => '&#xf00a;',
            'fas fa-times'             => '&#xf00d;',
            'fas fa-tv'                => '&#xf26c;',
            'fas fa-university'        => '&#xf19c;',
            'fas fa-video'             => '&#xf03d;',
        ]);
    }
}

function getTextColour($hex)
{
    list($red, $green, $blue) = sscanf($hex, "#%02x%02x%02x");
    $luma                     = ($red + $green + $blue) / 3;

    if ($luma < 128) {
        $textcolour = "white";
    } else {
        $textcolour = "black";
    }
    return $textcolour;
}
