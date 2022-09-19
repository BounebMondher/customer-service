@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Threads') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="threads" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($threads as $thread)
                            <tr>
                                <td><a href="{{ route('threads.show',['id' => $thread['id']]) }}">{{$thread['thread_title']}}</a></td>
                                <td>{{$thread['status']}}</td>
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
