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
        return 'Procesando información...';
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