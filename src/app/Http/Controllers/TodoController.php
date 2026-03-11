<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
     public function index()
    {
    
        $todo = new Todo();
          $todos = $todo->all();
           $todos;

        return view('todo.index', ['todos' => $todos]);
    }

    
public function create()
{
   return view('todo.create'); 
}

public function store(Request $request)
{
$inputs = $request->all(); // 変更

    $todo = new Todo();
    $todo->user_id = Auth::id(); 
    $todo->fill($inputs);
    $todo->save();

    return redirect()->route('todo.index');
}
}

