<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User;

use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.login', [
            'title' => 'FarmPOST - Login'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        $username = $credentials['username'];
        $password = $credentials['password'];
        $remember = isset($credentials['remember']) ? true : false;

        $user = User::firstWhere('username', $username);

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user, $remember || false);

            return redirect('/');
        }

        return back()->withErrors([
            'auth' => 'Usuario o contraseña incorrectos'
        ])->onlyInput('username', 'remember');
    }

    public function logout()
    {
        if (!Auth::check()) {
            return redirect('/login')
                ->with('error', 'Debe iniciar sesión primero');
        }
        
        Auth::logout();

        return redirect('/login');
    }

    private function auxUser()
    {
        $users = User::all();

        if (count($users) == 0) {
            $role = Role::firstWhere('name', 'DEV');

            if (!$role) {
                $role = new Role();
                $role->name = 'DEV';
                $role->save();
            }

            $user = new User();
            $user->name = 'DEV-USER';
            $user->username = 'dev-user';
            $user->password = Hash::make('123456');
            $user->role_id = $role->id;
            $user->save();

            return $user;
        }

        return false;
    }

    public function seed($token)
    {
        if ($token != 'dev-seed') {
            return 'token inválido';
        }

        $roles = ['DEV', 'ADMIN', 'USER'];

        $response = [];

        $exists = Role::all();
        $users = User::all();

        if (count($exists) == 0 || count($users) == 0) {
            if (count($exists) == 0) {
                $rolesResponse = [];

                foreach ($roles as $role) {
                    $aux = new Role();
                    $aux->name = $role;
                    $aux->save();
        
                    array_push($rolesResponse, $aux);
                }

                array_push($response, [
                    'roles' => $rolesResponse
                ]);
            }

            if (count($users) == 0) {
                $user = $this->auxUser();

                if ($user) {
                    array_push($response, [
                        'user' => $user
                    ]);
                }
            }

            return $response;
        }

        return 'data existente';
    }
}
