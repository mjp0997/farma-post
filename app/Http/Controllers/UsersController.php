<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')
            ->whereRelation('role', 'name', '!=', 'DEV')
            ->orderBy('name')
            ->paginate(12);

        $bread = [
            [
                'text' => 'Usuarios',
                'link' => '/users'
            ]
        ];

        return view('users.list', [
            'bread' => $bread,
            'users' => $users,
            'title' => 'FarmPOST - Usuarios'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'DEV')
            ->orderBy('name')
            ->get();

        $bread = [
            [
                'text' => 'Usuarios',
                'link' => '/users'
            ],
            [
                'text' => 'Nuevo usuario',
                'link' => '/users/create'
            ]
        ];
        
        return view('users.create', [
            'bread' => $bread,
            'roles' => $roles,
            'title' => 'FarmPOST - Usuarios'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        
        $user = new User($data);
        $user->password = Hash::make($data['password']);

        $user->save();
        
        return redirect('users/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $bread = [
            [
                'text' => 'Usuarios',
                'link' => '/users'
            ],
            [
                'text' => $user->name,
                'link' => '/users/'.$id
            ]
        ];

        return view('users.show', [
            'bread' => $bread,
            'user' => $user,
            'title' => 'FarmPOST - Usuarios'
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
        $user = User::findOrFail($id);

        $roles = Role::where('name', '!=', 'DEV')
            ->orderBy('name')
            ->get();

        $bread = [
            [
                'text' => 'Usuarios',
                'link' => '/users'
            ],
            [
                'text' => $user->name,
                'link' => '/users/'.$id
            ],
            [
                'text' => 'Editar',
                'link' => '/users/'.$id.'/edit'
            ]
        ];

        return view('users.edit', [
            'bread' => $bread,
            'user' => $user,
            'roles' => $roles,
            'title' => 'FarmPOST - Usuarios'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $data = $request->validated();

        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->username = $data['username'];
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->role_id = $data['role_id'];
        $user->save();

        return redirect('/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/users')
            ->with('deleted', 'El usuario: '.$user->name.'. Ha sido eliminado satisfactoriamente');
    }
}
