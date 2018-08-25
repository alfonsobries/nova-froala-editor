<?php

namespace Vexilo\NovaFroalaEditor;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class NovaFroalaEditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('froala-editor', __DIR__.'/../dist/js/field.js');
            Nova::style('froala-editor', __DIR__.'/../dist/css/field.css');
        });

        $this->publishes([
            __DIR__.'/../dist/fonts/' => public_path('nova-assets/fonts')
        ], 'froala-editor-fonts');
    }
}
