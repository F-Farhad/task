<?php

namespace App\Enums;

enum EnumStatus:string
{
    case ACTIVE = 'active';
    case DONE = 'done';
    case CHECK = 'check';
    case REJECT = 'reject';
    case CANCELLED = 'cancelled';
}
