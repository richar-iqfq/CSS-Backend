<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'email' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'field name is required'
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