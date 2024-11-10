<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use App\Models\Brand;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StaffDashboardController extends Controller
{
    public function index()
    {
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

        // Fetch users with their roles
        $users = User::with('roles')->get();

        // Fetch dynamic data
        $totalClients = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->count();

        $totalSales = Sale::where('status', 'completed')->sum('total_amount');
        $completedSales = Sale::where('status', 'completed')->count();
        $pendingSales = Sale::where('status', 'pending')->count();
        $processingSales = Sale::where('status', 'processing')->count();
        $cancelledSales = Sale::where('status', 'cancelled')->count();

        // Fetch current year
        $currentYear = now()->year;

        //Registrations data per month
        $userRegistrationData = User::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->all();

        //sales data per month
        $saleData = Sale::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->all();

        // Data for user registration data and order data
        $chartData = [
            'users' => array_replace(array_fill(1, 12, 0), $userRegistrationData),
            'sales' => array_replace(array_fill(1, 12, 0), $saleData)
        ];

        // Data for order status bar chart
        $saleStatusData = [
            'pending' => $pendingSales,
            'processing' => $processingSales,
            'completed' => $completedSales,
            'cancelled' => $cancelledSales
        ];

        //Return to view
        return view('staff.dashboard', compact(
            'topSellingProducts',
            'topSuppliers',
            'categories',
            'brands',
            'users',
            'totalClients',
            'totalSales',
            'completedSales',
            'processingSales',
            'pendingSales',
            'chartData',
            'saleStatusData'
        ));
    }
}
