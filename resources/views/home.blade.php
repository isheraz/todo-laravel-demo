@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo List</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <form action="#" class="col-12" method="POST" id="create-list">

                            <div class="input-group mb-3 task-container">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="text" disabled class="form-control task" name="task[]"
                                    aria-label="text description">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div id="task-list" class="col-12">
                            @foreach ($tasks as $task)
                            <div class='input-group mb-3 task-container' id="{{ $task->id }}">
                                <div class='input-group-prepend'>
                                    <span class="input-group-text">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i><i class="fa fa-ellipsis-v"
                                            aria-hidden="true"></i>
                                    </span></div><input type="text" disabled class="form-control task" name="task[]"
                                    value="{{ $task->description }}" aria-label="text description">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="fa fa-times " aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
