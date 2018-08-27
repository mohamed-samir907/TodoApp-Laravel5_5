@extends('layout')

@section('content')

@section('modal')
@include('todo.modal-add')
@endsection

<h1 class="center">Edit Todo</h1>
<div class="card">
	<div class="card-content">
<form method="POST" action="{{ url('/todo/update') . '/' . $data->id }}">
	{!! csrf_field() !!}
	<div class="input-field col s12">
        <input id="todo" type="text" name="todo" class="validate" value="{{ $data->todo }}">
        <label for="todo">Todo Title</label>
    </div>
    <div class="input-field col s12">
    	<input type="text" name="time" class="timepicker col s12" value="{{ $data->time }}">
    	<label for="time">Todo Time</label>
    </div>
    <div class="input-field col s12">
      	<textarea id="textarea1" name="desc" class="materialize-textarea">{{ $data->details }}</textarea>
      	<label for="textarea1">Description (Optional)</label>
    </div>
    <div class="center">
    	<button class="btn btn-lg waves-effect center-margin">Update</button>
    </div>
</form>
</div>
</div>
@endsection