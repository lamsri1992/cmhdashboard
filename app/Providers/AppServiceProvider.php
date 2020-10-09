<?php

namespace App\Providers;

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
        $menuItems = \App\Models\MenuItem::where('group_active', 'Y')->get();
        view()->share('menuItems', $menuItems);

        $subItems = \App\Models\SubItem::where('sub_active', 'Y')->orderBy('sub_order', 'ASC')->get();
        view()->share('subItems', $subItems);
    }
}
