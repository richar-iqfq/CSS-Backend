<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        if (request()->has('empty')) {
            $users = [];
        } else {
            $users = [
                'Joel',
                'Ellie',
                'Tess',
                'Tommy',
                'Bill',
                '<script>alert("Clicker")</script>'
            ];    
        }

        $title = 'Listado de Usuarios';

        // return view('users', [
        //     'users' => $users,
        //     'title' => $title
        // ]);

        // return view('users')
        //     ->with('users', $users)
        //     ->with('title', $title);
        
        // dd(compact('title', 'users'));

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