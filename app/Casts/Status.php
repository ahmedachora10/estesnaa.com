<?php

namespace App\Casts;

enum Status:int {
    case ENABLED = 1;
    case DISABLED = 2;

    public function name()
    {
        return match($this) {
            self::ENABLED => __('Enabeld'),
            self::DISABLED => __('Disabled'),
        };
    }

    public function color()
    {
        return match($this) {
            self::ENABLED => 'primary',
            self::DISABLED => 'danger',
        };
    }
}