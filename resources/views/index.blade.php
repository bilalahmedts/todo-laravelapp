{{-- the extends brings the app.blade.php file which ensures the basic html structure --}}
@extends('layouts.app')

@section('content') {{-- This is used to define the random or dynamic content that keeps on changing --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-success fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-danger fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Whoops! There were some problems with your input.</strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1 class="h3 mt-3 mb-1 text-gray-800">To Do Task App</h1>
        <div class="card shadow mt-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTask">Add
                    Task</button>
                <div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTask">Add Tasks</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="card ">
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group">
                                                <label>Enter Task</label>
                                                <input type="text" class="form-control" name="taskName">
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="addTask">Add Task</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="m-0 font-weight-bold text-primary">List of Tasks</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th style="display: none;"></th>
                                <th class="text-center">Tasks</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($getTasks as $task)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td style="display: none;">{{ $task->taskId }}</td>
                                    <td class="text-center">{{ $task->taskName }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <form method="POST" action="/tasks/{{ $task->taskId }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="taskId" value="{{ $task->taskId }}">
                                                    <button class="btn btn-primary" type="submit"
                                                        name="deleteTask">Delete</button>
                                                </form>
                                            </div>
                                            {{-- Edit form modal starts below --}}
                                            <div class="col-md-3">
                                                <form method="POST">
                                                    <input type="hidden" name="taskId" value="{{ $task->taskId }}">

                                                    <button class="btn btn-primary editTaskButton" type="button"
                                                        name="editTask" data-toggle="modal"
                                                        data-target="#editTask">Edit</button>
                                                </form>
                                                <div class="modal fade" id="editTask" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editTask">Edit Tasks</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card ">
                                                                    <div class="card-body">
                                                                        <form method="POST"
                                                                            action="/tasks/{{ $task->taskId }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" name="taskId" id="taskId">
                                                                            <div class="form-group">
                                                                                <label>Enter Task</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="taskName" name="taskName">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                name="updateTask">Update Task</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
