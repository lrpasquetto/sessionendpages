<?php
namespace lrpasquetto\SessionsAndPages;


use Illuminate\Support\ServiceProvider;

class SessionsAndPagesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__.'/config/sessionsAndPages.php' => config_path('sessionsAndPages.php')]);
        $this->publishes([__DIR__.'/database/migrations/'  => database_path('/migrations')], 'migrations');
        $this->publishes([__DIR__.'/controllers/'  => app_path('/Http/Controllers')], 'controllers');
        $this->publishes([__DIR__.'/models/'  => app_path('/')], 'controllers');
        $this->publishes([__DIR__.'/resources/views/'  => resource_path('/views')], 'views');
        $this->publishes([__DIR__.'/requests/'  => app_path('/Http/Requests')], 'requests');
        $this->publishes([__DIR__.'/repositories/'  => app_path('/Libraries/Repositories')], 'repositories');
        $this->loadViewsFrom(__DIR__.'/resources/views','sessionsAndPages');
    }

    public function register()
    {
        //
    }
}