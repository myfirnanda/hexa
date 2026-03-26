<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Project;
use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $inProgressOrders = Order::where('status', 'in_progress')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $rejectedOrders = Order::where('status', 'rejected')->count();
        $totalServices = Service::count();
        $totalProjects = Project::count();
        $totalClients = Client::count();
        $totalTestimonials = Testimonial::count();
        $recentOrders = Order::latest()->take(5)->get();

        // Monthly orders for the last 6 months
        $monthlyOrders = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyOrders[] = [
                'month' => $date->translatedFormat('M'),
                'count' => Order::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        // Orders by category distribution
        $allCategories = Order::whereNotNull('categories')->pluck('categories')->flatten()->countBy()->sortDesc()->take(5);

        return view('admin.dashboard', compact(
            'totalOrders', 'pendingOrders', 'inProgressOrders', 'completedOrders',
            'rejectedOrders', 'totalServices', 'totalProjects', 'totalClients',
            'totalTestimonials', 'recentOrders', 'monthlyOrders', 'allCategories'
        ));
    }
}
