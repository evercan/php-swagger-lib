<?php
namespace SwaggerLib;

use Illuminate\Support\ServiceProvider;
use SwaggerLib\Console\GenerateSwaggerCommand;

class LaravelSwaggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('swagger.generator', function () {
            return new SwaggerGenerator(
                [base_path('app/Http/Controllers')],
                public_path('docs/swagger.json')
            );
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateSwaggerCommand::class,
            ]);
        }
    }
}