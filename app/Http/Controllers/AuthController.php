<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function welcome()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }
}