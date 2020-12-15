<?php

namespace App\Providers;

use App\Utils\DateFormatter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('formatDate', function ($expression) {
            dd($expression);
            $date = DateFormatter::formatFromTimestamp($expression);
            return "<?php echo \"$date\"; ?>";
        });
    }
}
