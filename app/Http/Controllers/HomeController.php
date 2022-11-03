<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: verificar rol del usuario autenticado y redireccionar

        $bread = [
            [
                'text' => 'Inicio',
                'link' => '/'
            ]
        ];

        return view('home', [
            'bread' => $bread
        ]);
    }
}
