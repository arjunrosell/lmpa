<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand', 'supplier'])
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('client.products.index', compact('products'));
    }
}
