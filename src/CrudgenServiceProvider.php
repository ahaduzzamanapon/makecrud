<?php

namespace ahaduzzamanapon\makecrud;

use Illuminate\Support\ServiceProvider;
use ahaduzzamanapon\makecrud\Console\MakeApiCrud;
use ahaduzzamanapon\makecrud\Console\MakeCommentable;
use ahaduzzamanapon\makecrud\Console\MakeCrud;
use ahaduzzamanapon\makecrud\Console\MakeService;
use ahaduzzamanapon\makecrud\Console\MakeViews;
use ahaduzzamanapon\makecrud\Console\RemoveApiCrud;
use ahaduzzamanapon\makecrud\Console\RemoveCommentable;
use ahaduzzamanapon\makecrud\Console\RemoveCrud;
use ahaduzzamanapon\makecrud\Console\RemoveService;

class makecrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //publish config file
        $this->publishes([__DIR__.'/../config/makecrud.php' => config_path('makecrud.php')]);

        //default-theme
        $this->publishes([__DIR__.'/stubs/default-theme/' => resource_path('makecrud/views/default-theme/')]);

        //default-layout
        $this->publishes([__DIR__.'/stubs/default-layout.stub' => resource_path('views/default.blade.php')]);

        //and commentable stub
        $this->publishes([
            __DIR__.'/stubs/commentable/views/comment-block.stub' => resource_path('makecrud/commentable/comment-block.stub')
        ], 'commentable-stub');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/makecrud.php', 'makecrud');

        $this->commands(
            MakeCrud::class,
            MakeViews::class,
            RemoveCrud::class,
            MakeApiCrud::class,
            RemoveApiCrud::class,
            MakeCommentable::class,
            RemoveCommentable::class,
            MakeService::class,
            RemoveService::class
        );
    }
}
