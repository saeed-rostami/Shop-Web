<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Breadcrumbs\Breadcrumbs;

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
        Schema::defaultStringLength(191);
        Request::macro('breadcrumbs' , function (){
            return new Breadcrumbs($this);
        });

        View::composer(['Layouts.Header' , 'Layouts.Footer'], function ($view){
            $view->with('cats', Category::all());
        });

        View::composer('Main.Slider', function ($view){
            $view->with('prods', Product::query()->latest()->take(9)->get());
        });
    }
}