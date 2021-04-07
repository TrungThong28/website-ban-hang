<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;

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

        //Lay danh muc menu cha
        $all_categories = Category::where(['parent_id' => 0, 'is_active' => 1, 'position' => 1])->select('id', 'slug', 'name')->get();

        $article_categories = Category::where(['parent_id' => 0, 'is_active' => 1, 'position' => 0])->select('id', 'slug', 'name')->get();


        //menu cap 2
        $get_categories = Category::where('parent_id', '>', 0)->where('is_active', 1)->select('id', 'slug', 'name', 'parent_id')->get();


        View()->share([
            'all_categories' => $all_categories,
            'get_categories' => $get_categories,
            'article_categories' => $article_categories,
        ]);
    }
}
