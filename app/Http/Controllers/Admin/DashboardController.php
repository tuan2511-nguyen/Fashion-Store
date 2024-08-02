<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Today's sales and orders
        $totalSales = Order::whereDate('created_at', today())->sum('total_amount');
        $totalOrders = Order::whereDate('created_at', today())->count();

        // Previous day's sales for comparison
        $previousDaySales = Order::whereDate('created_at', today()->subDay())->sum('total_amount');
        $salesChangePercent = $previousDaySales > 0 ? (($totalSales - $previousDaySales) / $previousDaySales) * 100 : 0;

        // Total users and new users this month
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', date('m'))->count();

        // Previous month's users for comparison
        $previousMonthUsers = User::whereMonth('created_at', date('m') - 1)->count();
        $usersChangePercent = $previousMonthUsers > 0 ? (($totalUsers - $previousMonthUsers) / $previousMonthUsers) * 100 : 0;

        // Total profit and previous period's profit for comparison
        $totalProfit = Order::sum('total_amount'); // Adjust this if you have a separate 'profit' column
        $previousPeriodProfit = Order::whereDate('created_at', '<', now()->subMonth())->sum('total_amount'); // Example for previous month
        $profitChangePercent = $previousPeriodProfit > 0 ? (($totalProfit - $previousPeriodProfit) / $previousPeriodProfit) * 100 : 0;

        // Monthly Sales and Order Data
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        $monthlyData = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(id) as total_orders'), DB::raw('SUM(total_amount) as total_amount'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare data for charts
        $months = $monthlyData->pluck('month')->map(fn ($month) => Carbon::create()->month($month)->format('M'))->toArray();
        $ordersPerMonth = $monthlyData->pluck('total_orders')->toArray();
        $amountsPerMonth = $monthlyData->pluck('total_amount')->toArray();

        return view('admin.pages.dashboard', compact(
            'totalSales',
            'totalOrders',
            'salesChangePercent',
            'totalUsers',
            'newUsersThisMonth',
            'usersChangePercent',
            'totalProfit',
            'profitChangePercent',
            'months',
            'ordersPerMonth',
            'amountsPerMonth'
        ));
    }
}
