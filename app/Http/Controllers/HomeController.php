<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SalesLine;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role->name == 'USER') {
            return redirect('/sale');
        }

        $bread = [
            [
                'text' => 'Inicio',
                'link' => '/'
            ]
        ];

        $current_date = date_format(now()->tz('UTC'), 'Y-m-d');

        $today_sales_lines = SalesLine::where('created_at', '>=', $current_date)->get();

        $earnings = 0;

        $today_sales = 0;

        $today_total_products = 0;

        foreach ($today_sales_lines as $sales_line) {
            $earnings += ($sales_line->current_price - $sales_line->current_buy_price) * $sales_line->quantity;

            $today_sales += $sales_line->current_price * $sales_line->quantity;

            $today_total_products += $sales_line->quantity;
        }
        
        $today_clients = Sale::where('created_at', '>=', $current_date)->distinct()->count();

        $new_clients = Sale::with('client')->whereRelation('client', 'created_at', '>=', $current_date)->distinct()->count();

        $today_products_stats = SalesLine::where('created_at', '>=', $current_date)
            ->groupBy('product_id')
            ->with('product')
            ->selectRaw('sum(quantity) as sold_quantity, product_id')
            ->orderBy('sold_quantity', 'DESC')
            ->limit('6')
            ->get();

        $today_products_stats = collect($today_products_stats)->map(function ($item) use ($today_total_products) {
            $item->percent_quantity = ($item->sold_quantity / $today_total_products) * 100;

            return $item;
        });

        return view('home', [
            'bread' => $bread,
            'earnings' => number_format($earnings, 2, ',', '.'),
            'clients' => $today_clients,
            'new_clients' => $new_clients,
            'today_sales' => number_format($today_sales, 2, ',', '.'),
            'today_products_stats' => $today_products_stats
        ]);
    }
}
