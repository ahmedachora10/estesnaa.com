<?php

namespace App\Utils;

enum CategoryType:int {
    case SERVICES = 1;
    case EVENTS = 2;
    case INVENTIONS = 3;

    public function name()
    {
        return match($this) {
            self::SERVICES => 'خدمات',
            self::EVENTS => 'فعاليات',
            self::INVENTIONS => 'اختراعات',
        };
    }

    public function color()
    {
        return match($this) {
            self::SERVICES => 'primary',
            self::EVENTS => 'info',
            self::INVENTIONS => 'danger',
        };
    }
}