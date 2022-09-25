@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Threads') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('status')}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        <div class="add-thread">
                            <a class="btn btn-outline-primary" href="{{ route('threads.create') }}">Create thread</a>
                        </div>
                        <table id="threads" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Assigned to</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($threads as $thread)
                                <tr>
                                    <td>
                                        <a href="{{ route('threads.show',['id' => $thread['id']]) }}">{{$thread['thread_title']}}</a>
                                    </td>
                                    <td>{{$thread['status']}}</td>
                                    <td>{{$thread['created_at']}}</td>
                                    <td>@if ($thread->assignedTo()->first() !== null){{$thread->assignedTo()->first()->name}}@else - @endif</td>
                                    <td><i class="bi bi-file-earmark-pdf"></i> download</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
