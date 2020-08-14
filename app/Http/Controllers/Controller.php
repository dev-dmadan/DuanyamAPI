<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public static $COLORS = [
        'BLUE' => 'link',
        'SOFT_BLUE' => 'info',
        'GREEN' => 'success',
        'SOFT_GREEN' => 'primary',
        'RED' => 'danger',
        'YELLOW' => 'warning',
        'BLACK' => 'default'
    ];
}
