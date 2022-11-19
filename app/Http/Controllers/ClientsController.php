<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('name')->paginate(12);

        $bread = [
            [
                'text' => 'Clientes',
                'link' => '/clients'
            ]
        ];

        return view('clients.list', [
            'bread' => $bread,
            'clients' => $clients,
            'title' => 'FarmPOST - Clientes'
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
                'text' => 'Clientes',
                'link' => '/clients'
            ],
            [
                'text' => 'Nuevo cliente',
                'link' => '/clients/create'
            ]
        ];
        
        return view('clients.create', [
            'bread' => $bread,
            'title' => 'FarmPOST - Clientes'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        
        $client = new Client($data);
        $client->save();
        
        return redirect('clients/'.$client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        $bread = [
            [
                'text' => 'Clients',
                'link' => '/clients'
            ],
            [
                'text' => $client->name,
                'link' => '/clients/'.$client->id
            ]
        ];

        return view('clients.show', [
            'bread' => $bread,
            'client' => $client,
            'title' => 'FarmPOST - Clientes'
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
        $client = Client::findOrFail($id);

        $bread = [
            [
                'text' => 'Clientes',
                'link' => '/clients'
            ],
            [
                'text' => $client->name,
                'link' => '/clients/'.$client->id
            ],
            [
                'text' => 'Editar',
                'link' => '/clients/'.$client->id.'/edit'
            ]
        ];

        return view('clients.edit', [
            'bread' => $bread,
            'client' => $client,
            'title' => 'FarmPOST - Clientes'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data = $request->validated();

        $client = Client::findOrFail($id);

        $client->dni = $data['dni'];
        $client->name = $data['name'];
        $client->address = $data['address'];
        $client->phone = $data['phone'];
        $client->save();

        return redirect('/clients/'.$client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();

        return redirect('/clients')
            ->with('deleted', 'El cliente: '.$client->name.'. Ha sido eliminado satisfactoriamente');
    }
}
