<?php

namespace App\Enums;

enum Keys: string
{
    case CITY = 'city';
    case LOGO = 'logo';
    case NAME = 'name';
    case BACKGROUND = 'background';

    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = $case->value;
        }
        return $array;
    }
}   
