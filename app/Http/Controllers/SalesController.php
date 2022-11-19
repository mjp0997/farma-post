<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with('saleslines', 'saleslines.product', 'client')->orderBy('created_at', 'DESC')->paginate(12);

        $bread = [
            [
                'text' => 'Ventas',
                'link' => '/sales'
            ]
        ];

        return view('sales.list', [
            'bread' => $bread,
            'sales' => $sales
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::findOrFail($id);

        $bread = [
            [
                'text' => 'Ventas',
                'link' => '/sales'
            ],
            [
                'text' => 'Venta #'.$sale->id,
                'link' => '/sales/'.$id
            ]
        ];

        return view('sales.show', [
            'bread' => $bread,
            'sale' => $sale
        ]);
    }
}
