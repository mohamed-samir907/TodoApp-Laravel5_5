<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
	/**
	 * Render the Todo Dashboard
	 * 
	 * @return Illuminate\Http\Response
	 */
    public function index()
    {
    	$id = auth()->user()->id;
    	$todos = Todo::where(['owner' => $id])->orderBy('id', 'desc')->paginate(5);
    	return view('todo.todos', ['todos' => $todos]);
    }

    /**
     * Handle Data comming from add todo form
     * 
     * @return Illuminate\Http\Reponse|RedirectResponse
     */
    public function add(Request $request)
    {
    	$valid = $this->validate($request, [
    		'todo' => 'required|string',
    		'time' => 'required',
    		'desc' => empty($request->desc) ? '' : 'string'
    	]);

    	$data = Todo::create([
    		'todo' 		=> htmlentities($valid['todo']),
    		'time' 		=> $valid['time'],
    		'details' 	=> htmlentities($valid['desc']),
    		'owner' 	=> \Auth::user()->id
    	]);

    	session()->flash('success', 'Todo Added Successfuly.');
    	return back();
    }

    /**
     * Delete Todo by ID
     * 
     * @param int $id
     * @return Illuminate\Http\Response|RedirectResponse
     */
    public function delete($id)
    {
    	$todo = Todo::find($id);
    	$todo->delete();
    	session()->flash('success', 'Todo Deleted Successfuly.');
    	return back();
    }

    /**
     * Render Edit Page and get data with the attached id
     * 
     * @param int $id
     * @return Illuminate\Http\Response|RedirectResponse
     */
    public function edit($id)
    {
    	$todo = Todo::find($id);

    	return view('todo.edit-todo', ['data' => $todo]);
    }

    /**
     * Update Todo by ID
     * 
     * @param Illuminate\Http\Request $request
     * @param int $id
     * @return Illuminate\Http\Response|RedirectResponse
     */
    public function update(Request $request, $id)
    {
    	$todo = Todo::find($id);

    	$valid = $this->validate($request, [
    		'todo' => 'required|string',
    		'time' => 'required',
    		'desc' => empty($request->desc) ? '' : 'string'
    	]);

    	$todo->todo = $valid['todo'];
    	$todo->time = $valid['time'];
    	$todo->details = $valid['desc'];

    	$todo->save();
    	session()->flash('success', 'Todo Updated Successfuly.');
    	return redirect()->to('home');
    }

    /**
     * Mark Todo as Completed
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function completed($id)
    {
    	$todo = Todo::find($id);

    	$todo->completed = 1;
    	$todo->save();

    	session()->flash('success', 'Todo Completed Successfuly.');
    	return back();
    }
}
