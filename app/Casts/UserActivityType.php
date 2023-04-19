<?php

namespace App\Casts;

enum UserActivityType:int {
    case RECEIVED = 1;
    case PULL = 2;

    public function name()
    {
        return match($this) {
            self::RECEIVED => 'تلقي',
            self::PULL => 'سحب',
        };
    }

    public function color()
    {
        return match($this) {
            self::RECEIVED => 'primary',
            self::PULL => 'success',
        };
    }

    public function type()
    {
        return match($this) {
            self::RECEIVED => '+',
            self::PULL => '-',
        };
    }
}
