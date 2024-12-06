<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoApi extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json(['success'=>true,'todolist'=>$todos,200]);
    }



    public function save(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'priority' => 'required|string|max:10',
                'is_completed' => 'required|string',
            ]);

            $todo = Todo::create([
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'is_completed' => $request->is_completed,
                'user_id' => $request->user()->id,
            ]);

            return response()->json(['success' => true, 'todo' => $todo], 201);
        }
        catch (\Exception $e)
        {
            return response()->json(['success' => false, 'message' => 'failed to create todo', 'error' => $e->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $request->validate([
            'priority' => 'string',
            'is_completed' => 'string',
        ]);

        $todo->update($request->all());
        return response()->json(['success' => true, 'todo' => $todo]);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(['success' => true, 'message' => 'todo deleted']);
    }
}
