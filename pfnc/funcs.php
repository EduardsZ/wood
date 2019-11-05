<?php
date_default_timezone_set('Europe/Riga');

function ddd($arr, $die = true){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($die) die;
}

function renderSimpleTag($name, $value, $attr = '') {
    if ($attr == 'shorttag'){
        echo '<' . $name . '>';
    } else {
        echo '<' . $name . $attr . '>' . $value . '</' . $name . '>';
    }
}

function renderSimpleLink($ref, $name, $attr = '', $title =''){
    echo '<a href="' . $ref . '" ' . $attr . ' title="' . $title . '">' . $name . '</a>';
}

$sett = [
    'lang' => 'lv',
];

$langFile = [
    'en' => [
        'name' => 'Woodart workers page',
        'descParagraph' => 'This page shows who is at work but who does nothing:',
        'ActiveUsers' => 'Active users',
        'InactiveUsers' => 'Inactive users',
        'Pullin' => 'Pull in',
        'Throwout' => 'Throw out',
        'None' => 'none',
        'showDetails' => 'Show',
        'hideDetails' => 'Hide',
    ],
    'lv' => [
        'name' => 'Woodart darbinieku lapa',
        'descParagraph' => 'Šī lapa parāda, kas strādā, bet kuršs nē...',
        'ActiveUsers' => 'Tie, kas strādā',
        'InactiveUsers' => 'Kas nestrādā',
        'Pullin' => 'Lai strādā',
        'Throwout' => 'Izmest ārā',
        'None' => 'nav',
        'showDetails' => 'Rādīt',
        'hideDetails' => 'Slēpt',
    ],
];

if (array_key_exists ($_COOKIE['lang'], $langFile)) {
    $sett['lang'] = $_COOKIE['lang'];
} else {
    $sett['lang'] = 'en';
    setcookie('lang', 'en');
}