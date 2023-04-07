<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();

        $title = 'Listado de Usuarios';

        // return view('users', [
        //     'users' => $users,
        //     'title' => $title
        // ]);

        // return view('users')
        //     ->with('users', $users)
        //     ->with('title', $title);
        
        // dd(compact('title', 'users'));
        
        // return view('users')->with('users', $users) Forma alternativa para hacer el llamado
        return view('users.index', compact('title', 'users'));
    }

    function create()
    {
        return view('users.new_user');
    }

    function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:6' // Could be empty
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El correo debe ser válido',
            'email.unique' => 'El correo no está disponible',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'Debe ser mayor a 6 carácteres'
        ]);

        // $data = request()->all();

        // if(empty($data['name'])) {
        //     return redirect()->route('users.create')->withErrors([
        //         'name' => 'The name field is required'
        //     ]);
        // }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('users.index');
        // return redirect()->route('users.index')->withInput(); // Para devolver con datos formulario
    }

    function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    function update(User $user)
    {   
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)], 
            // 'email' => 'required|email|unique:App\Models\User,email,'.$user->id,
            'password' => ''
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);

        return redirect("usuarios/{$user->id}");
    }

    function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    function show($id)
    {
        $user = User::findOrFail($id); // Launch errors.404 if fail

        // if ($user == null) {
        //     return response()->view('errors.404', [], 404);
        // }

        return view('users.show_user', compact('user'));
    }

    function welcome($name, $nickname=null)
    {
        $name = ucfirst($name);

        return view('users.welcome_user', compact('name', 'nickname'));
    }
}