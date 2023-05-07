<?php

namespace App\Casts;

enum Stage:int {
    case IMPLEMENT = 1;
    case CANCEL = 2;
    case RECEIPT = 3;

    public function name()
    {
        return match($this) {
            self::IMPLEMENT => __('Implement'),
            self::CANCEL => __('Cancel'),
            self::RECEIPT => __('Receipt'),
        };
    }

    public function color()
    {
        return match($this) {
            self::IMPLEMENT => 'primary',
            self::CANCEL => 'danger',
            self::RECEIPT => 'success',
        };
    }
}