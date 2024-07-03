<?php
// File: app/Http/ViewComposers/NavbarComposer.php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class NavbarComposer
{
    public function compose(View $view)
    {
        $categories = Category::with('subcategories')->get();
        $view->with('categories', $categories);
    }
}
