@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="thread-messages" class="card">
                    <div class="card-header"><h2>{{$thread['thread_title']}}</h2></div>

                    <div class="card-body">
                        @foreach($messages as $message)
                            <div class="row thread-message"
                                 style="padding:0!important;min-width: 100%!important;margin-bottom: 20px;">
                                <div class="card">
                                    <div class="card-header"
                                         style="@if($message->type === "admin") background-color: lightcoral;color: white; @else text-align: right;background-color: antiquewhite; @endif">
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
            </div>
        </div>
    </div>
@endsection
