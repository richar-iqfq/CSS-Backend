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
        return view('users', compact('title', 'users'));
    }

    function new()
    {
        return view('new_user');
    }

    function show($id)
    {
        return view('show_user', compact('id'));
    }

    function welcome($name, $nickname=null)
    {
        $name = ucfirst($name);

        return view('welcome_user', compact('name', 'nickname'));
    }
}