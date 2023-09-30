<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsTest;
use Excel;
class ProductsTestController extends Controller
{
    public function index()
    {
        $products = ProductsTest::all();
        return view('products.index', compact('products'));
    }

}
