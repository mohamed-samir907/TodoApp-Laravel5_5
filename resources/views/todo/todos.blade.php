@extends('layout')

@section('content')

@section('modal')
@include('todo.modal-add')
@endsection


<h1 class="h1">My Todos</h1>
<ul class="collapsible">
    @foreach($todos as $todo)
        <li>
            <div class="collapsible-header">
                @if($todo->completed)
                <del>{{ $todo->todo }}</del>
                @else
                {{ $todo->todo }}
                @endif
                <span class="pull-right">
                    <a class="waves-effect" href="todo/delete/{{ $todo->id }}">
                        <i class="material-icons">delete</i>
                    </a>
                    <a class="waves-effect" href="todo/edit/{{ $todo->id }}">
                        <i class="material-icons">edit</i>
                    </a>
                    @if(!$todo->completed)
                    <a class="waves-effect" href="todo/completed/{{ $todo->id }}">
                        <i class="material-icons">done</i>
                    </a>
                    @else
                    <a class="waves-effect" href="">
                        <i class="material-icons">sentiment_satisfied_alt</i>
                    </a>
                    @endif

                </span>
            </div>
            <div class="collapsible-body">
                <span style="display: flex;">
                    <strong>Details:&nbsp;&nbsp;</strong>
                    <span style="color: #FFF">{{ $todo->details }}</span><br>
                </span>
                <span style="display: flex;">
                    <strong>Todo Time:&nbsp;&nbsp;</strong>
                    <span style="color: #FFF">{{ $todo->time }}</span>
                </span>
            </div>
        </li>
    @endforeach
</ul>
{!! $todos->render() !!}

@endsection