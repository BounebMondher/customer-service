@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="thread-messages" class="card">
                    <div class="card-header"><h2>{{$thread['thread_title']}}</h2></div>

                    <div class="card-body">
                        @foreach($messages as $message)
                            <div class="row thread-message @if($message->type === "admin") admin-message @else client-message @endif">
                                <div class="card">
                                    <div class="card-header">
                                        {{$message->user()->first()->name}}
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>{{$message->message}}</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="add-message-block row">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('threads.storemessage') }}">
                        @csrf
                        <div class="form-group{{ $errors->has('message') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"
                                  id="input-message" required="true" aria-required="true">{{old('message')}}</textarea>
                            @if ($errors->has('message'))
                                <span id="name-error" class="error text-danger"
                                      for="input-message">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="thread_id" value="{{$thread['id']}}"/>
                        <input type="hidden" name="type" value="{{Auth::user()->role}}"/>
                        <button type="submit" class="btn btn-outline-success">{{ __('Add reply to thread') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
