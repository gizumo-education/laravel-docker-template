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
   $todo = new Todo();
    $todo->content = $content;
    $todo->save();

     return redirect()->route('todo.index');
}
}

