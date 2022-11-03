<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\StockRequest;

use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name')->paginate(12);

        $bread = [
            [
                'text' => 'Productos',
                'link' => '/products'
            ]
        ];

        return view('products.list', [
            'bread' => $bread,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bread = [
            [
                'text' => 'Productos',
                'link' => '/products'
            ],
            [
                'text' => 'Nuevo producto',
                'link' => '/products/create'
            ]
        ];
        
        return view('products.create', [
            'bread' => $bread
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        
        $product = new Product($data);

        $product->save();
        
        return redirect('products/1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        $bread = [
            [
                'text' => 'Productos',
                'link' => '/products'
            ],
            [
                'text' => $product->name,
                'link' => '/products/'.$id
            ]
        ];

        return view('products.show', [
            'bread' => $bread,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $bread = [
            [
                'text' => 'Productos',
                'link' => '/products'
            ],
            [
                'text' => $product->name,
                'link' => '/products/'.$id
            ],
            [
                'text' => 'Editar',
                'link' => '/products/'.$id.'/edit'
            ]
        ];

        return view('products.edit', [
            'bread' => $bread,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        $product = Product::findOrFail($id);

        $product->name = $data['name'];
        $product->buy_price = $data['buy_price'];
        $product->sell_price = $data['sell_price'];
        $product->stock = $data['stock'];
        $product->save();

        return redirect('/products/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')
            ->with('deleted', 'El producto: '.$product->name.'. Ha sido eliminado satisfactoriamente');
    }

    public function addStock($id, StockRequest $request)
    {
        $data = $request->validated();

        $product = Product::findOrFail($id);

        $product->increment('stock', $data['stock']);
        $product->save();

        return redirect('/products/'.$id);
    }
}
