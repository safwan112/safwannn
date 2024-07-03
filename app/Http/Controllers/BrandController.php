<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all(); // Fetch all brands from the database

        return view('brands', compact('brands'));
    }

    // Other controller methods (e.g., show, store, update, delete) can be defined here
}
