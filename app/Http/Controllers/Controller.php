<?php

namespace App\Http\Controllers;

use App\Models\Todo;

abstract class Controller
{
    public function welcome()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }
}
