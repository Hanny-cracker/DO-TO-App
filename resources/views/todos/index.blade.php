@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('To Do List') }}</div>

                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}!
                            </div>
                        @endif

                        @if (count($todos) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Completed</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <th scope="row">{{ $todo->title }}</th>
                                            <td>{{ $todo->description }}</td>
                                            <td>
                                                @if ($todo->is_completed == 1)
                                                    <a class="btn btn-sm btn-success" href="">Completed</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger" href="">in Completed</a>
                                                @endif
                                            </td>
                                            <td id="outer">
                                                <a class="inner btn btn-sm btn-success" href="{{ route('todos.show',$todo->id)}}">Edit</a>
                                                <a class="inner btn btn-sm btn-info" href="{{ route('todos.show',$todo->id)}}">View</a>
                                                <form class="inner">
                                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>No To Do's created yet</h4>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
