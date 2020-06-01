<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        $todos = $user->todos;

        return view('todos.index', compact('user', 'todos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Todo $todo)
    {

    }

    public function edit(Todo $todo)
    {
        //
    }

    public function update(Request $request, Todo $todo)
    {
        //
    }

    public function destroy(Todo $todo)
    {
        //
    }
}
