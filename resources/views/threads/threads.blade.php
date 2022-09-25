@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if (Auth::user()->role != "admin"){{ __('My Threads') }}@else {{ __('All client Threads') }} @endif</div>

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
                        @if (Auth::user()->role != "admin")
                            <div class="add-thread">
                                <a class="btn btn-outline-primary" href="{{ route('threads.create') }}">Create
                                    thread</a>
                            </div>
                        @endif
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
                                    <td>@if ($thread->assignedTo()->first() !== null){{$thread->assignedTo()->first()->name}}@else
                                            - @endif</td>
                                    <td><a target="_blank" href="{{ route('threads.generatepdf',['id' => $thread['id']]) }}"><i class="bi bi-file-earmark-pdf"></i> download</a> @if ($thread['status'] != "closed")- <a href="{{ route('threads.close',['id' => $thread['id']]) }}"><i class="bi bi-x-circle"></i> close</a>@endif</td>
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
