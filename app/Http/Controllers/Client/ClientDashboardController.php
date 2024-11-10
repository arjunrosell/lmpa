<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();
        $products = Product::with(['category', 'brand', 'supplier'])->latest()->paginate(15);
        $users = User::with('roles')->get(); // Fetch users with their roles
        return view('client.dashboard', compact(['products', 'suppliers', 'categories', 'brands', 'users']));
    }
}
