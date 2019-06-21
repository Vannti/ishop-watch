<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Widgets\Widget;
use App;
use Blade;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton('widget', function(){
            return new Widget();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        * Регистрируется дирректива для шаблонизатора Blade
        * Пример обращаения к виджету: @widget('menu')
        * Можно передать параметры в виджет:
        * @widget('menu', [$data1,$data2...])
        */
        Blade::directive('widget', function ($name) {
            return "<?php echo app('widget')->show($name); ?>";
        });
        /*
         * Регистрируется (добавляем) каталог для хранения шаблонов виджетов
         * app\Widgets\view
         */
        $this->loadViewsFrom(app_path() .'/Widgets/view', 'Widgets');
    }
}
