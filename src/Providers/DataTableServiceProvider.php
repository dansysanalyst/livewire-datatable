<?php

namespace LuanFreitasDev\LivewireDataTables\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LuanFreitasDev\LivewireDataTables\Commands\DataTableCommand;

class DataTableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([DataTableCommand::class]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'livewire-datatables');

        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/laravel-datatables')], 'datatable-views');

        Blade::directive('datatableStyles', function () {
            return "<?php echo view('livewire-datatables::assets.styles')->render(); ?>";
        });

        Blade::directive('datatableScripts', function () {
            return "<?php echo view('livewire-datatables::assets.scripts')->render(); ?>";
        });

        $this->publishes([
            __DIR__ . '/../../resources/config/livewire-datatables.php' => config_path('livewire-datatables.php'),
        ], 'livewire-datatables');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/livewire-datatables')
        ], 'livewire-datatables-lang');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'livewire-datatables');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../resources/config/livewire-datatables.php', 'livewire-datatables'
        );
    }
}
