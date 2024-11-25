<?php

namespace App\Http\Controllers\Client;

use App\Models\Sale;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();

        $categories = Category::all();
        $topSuppliers = Supplier::withCount('products')->orderBy('products_count', 'desc')->take(15)->get();
        $brands = Brand::all();
        $topSellingProducts = Product::select('products.*')
            ->addSelect(DB::raw('COUNT(sales.id) as total_sales'))
            ->leftJoin('sales', 'products.id', '=', 'sales.product_id')
            ->groupBy(
                'products.id',
                'products.brand_id',
                'products.category_id',
                'products.supplier_id',
                'products.name',
                'products.sku',
                'products.stock',
                'products.price',
                'products.description',
                'products.image',
                'products.created_at',
                'products.updated_at'
            )
            ->orderByDesc('total_sales')
            ->with(['category', 'brand', 'supplier'])
            ->paginate(15);

        $totalProducts = Product::count();

        $totalSales = Sale::where('user_id', $currentUser->id)->where('status', 'completed')->sum('total_amount');
        $completedSales = Sale::where('user_id', $currentUser->id)->where('status', 'completed')->count();
        $pendingSales = Sale::where('user_id', $currentUser->id)->where('status', 'pending')->count();
        $processingSales = Sale::where('user_id', $currentUser->id)->where('status', 'processing')->count();
        $cancelledSales = Sale::where('user_id', $currentUser->id)->where('status', 'cancelled')->count();

        $currentYear = now()->year;

        $userRegistrationData = User::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->all();

        $saleData = Sale::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->where('user_id', $currentUser->id)
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->all();

        $chartData = [
            'users' => array_replace(array_fill(1, 12, 0), $userRegistrationData),
            'sales' => array_replace(array_fill(1, 12, 0), $saleData)
        ];

        $saleStatusData = [
            'pending' => $pendingSales,
            'processing' => $processingSales,
            'completed' => $completedSales,
            'cancelled' => $cancelledSales
        ];

        return view('client.dashboard', compact(
            'topSellingProducts',
            'topSuppliers',
            'categories',
            'brands',
            'currentUser',
            'totalProducts',
            'totalSales',
            'completedSales',
            'processingSales',
            'pendingSales',
            'chartData',
            'saleStatusData'
        ));
    }
}
