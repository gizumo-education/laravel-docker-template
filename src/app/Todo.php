<?php

namespace Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
}

namespace App\Http\Controllers;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // 追加
        $todo = new Todo();
        $todoList = $todo->all();

        return view('todo.index');
    }
}

