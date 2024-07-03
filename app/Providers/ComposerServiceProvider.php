<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category; // Make sure to use your actual Category model

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Using closure based composers...
        View::composer('include.footer', function ($view) {
            $categories = Category::all(); // Fetch all categories
            $view->with('categories', $categories);
        });
    }
}

