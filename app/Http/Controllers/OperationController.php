<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\ClientOperationRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\OperationRequest;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesLine;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bread = [
            [
                'text' => 'Nueva venta',
                'link' => '/sale'
            ]
        ];

        $dni = $request->query('dni', false);
        $client_id = $request ->query('client_id', false);

        if ($dni != false && is_numeric($dni) && intval($dni) > 0) {

            $client = Client::where('dni', '=', $dni)->first();

            if (is_null($client)) {
                return view('operation', [
                    'bread' =>$bread,
                    'allow' => false,
                    'dni_disabled' => false,
                    'dni_readonly' => true,
                    'client_disabled' => false,
                    'dni' => $dni
                ]);
            }

            return redirect('/sale?client_id='.$client->id);
        }

        if ($client_id != false && is_numeric($client_id) && intval($client_id) > 0) {

            $client = Client::find($client_id);

            return view('operation', [
                'bread' => $bread,
                'allow' => false,
                'dni_disabled' => true,
                'dni_readonly' => true,
                'client_disabled' => true,
                'client' => $client
            ]);
        }

        return view('operation')->with([
            'bread' => $bread,
            'allow' => false,
            'dni_disabled' => false,
            'dni_readonly' => false,
            'client_disabled' => true,
            'title' => 'FarmPOST - Panel de ventas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle_client(ClientOperationRequest $request)
    {
        $data = $request->validated();

        $client = Client::where('dni', '=', $data['dni'])->first();
        
        if (is_null($client)) {
            return redirect('/sale?dni='.$data['dni']);
        }

        return redirect('/sale?client_id='.$client->id);
    }

    public function store_client(ClientRequest $request)
    {
        $data = $request->validated();

        $find = Client::where('dni', '=', $data['dni'])->first();

        if (is_null($find)) {
            $client = new Client($data);
            $client->save();
    
            return redirect('/sale?client_id='.$client->id);
        }

        return redirect('/sale?client_id='.$find->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationRequest $request)
    {
        $data = $request->validated();

        $sale = new Sale();
        $sale->user_id = Auth::user()->id;
        $sale->client_id = $data['client_id'];
        $sale->save();

        foreach ($data['cart'] as $cartline) {
            $product = Product::find($cartline['id']);
            $product->stock = $product->stock - $cartline['quantity'];
            $product->save();

            $salesline = new SalesLine();
            $salesline->sale_id = $sale->id;
            $salesline->product_id = $product->id;
            $salesline->quantity = $cartline['quantity'];
            $salesline->current_buy_price = $product->buy_price;
            $salesline->current_price = $product->sell_price;
            $salesline->save();
        }

        return redirect('/sale/'.$sale->id);
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
                'text' => 'Nueva venta',
                'link' => '/sale'
            ],
            [
                'text' => 'Venta #'.$sale->id,
                'link' => '/sale/'.$sale->id
            ]
        ];

        return view('operation-results', [
            'bread' => $bread,
            'sale' => $sale,
            'title' => 'FarmPOST - Panel de ventas'
        ]);
    }
}
