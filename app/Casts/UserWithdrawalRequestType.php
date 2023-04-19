<?php

namespace App\Casts;

enum UserWithdrawalRequestType:int {
    case PENDING = 1;
    case COMPLETED = 2;
    case CANCELED = 3;

    public function name()
    {
        return match($this) {
            self::PENDING => 'في الانتظار',
            self::COMPLETED => 'مكتمل',
            self::CANCELED => 'ملغى',
        };
    }

    public function color()
    {
        return match($this) {
            self::PENDING => 'primary',
            self::COMPLETED => 'success',
            self::CANCELED => 'danger',
        };
    }
}
