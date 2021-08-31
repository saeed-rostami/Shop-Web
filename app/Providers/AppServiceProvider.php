<?php

namespace App\Providers;

use App\Breadcrumbs\Breadcrumbs;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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


        Schema::defaultStringLength(191);

//        breadcrumbs
        Request::macro('breadcrumbs' , function (){
            return new Breadcrumbs($this);
        });

//        composers
        View::composer(['Layouts.Header' , 'Layouts.Footer'], function ($view){
            $view->with('cats', Category::query()->whereNull('parent_id')->get());
        });

        View::composer('Main.Slider', function ($view){
            $view->with('prods', Product::query()->latest()->take(9)->get());
        });
    }
}
