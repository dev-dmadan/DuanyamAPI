<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app('path'). '/Helpers/ColorConstantaHelper.php';
        require_once app('path'). '/Helpers/ColumnTypeConstantaHelper.php';
        require_once app('path'). '/Helpers/OrderTypeConstantaHelper.php';
    }
}
