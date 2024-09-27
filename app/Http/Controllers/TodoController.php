<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(){
        // $todos = Todo::orderBy('title')->get();
        $todos = Todo::all();
        return view('todos.index',['todos'=>$todos]);
    }
    public function create(){
       $dotos = Todo::all();
        return view('todos.create');
    }
    public function edit(){
        return view('todos.edit');
    }
    public function store(TodoRequest $request){
        // $todos = new Todo();
        // $todos->title = request('title');
        // $todos->description = request('description');
        // $todos->is_completed = 2;

        // $todos->save();
        Todo::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'is_completed' => 0
        ]);
        
        $request -> session()->flash('alert-success','To Do created succesfully');

        return to_route('todos.index');
    }
    public function show($id){
        return $id;
    }
}
