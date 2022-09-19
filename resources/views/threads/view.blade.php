@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thread title') }}</div>

                    <div class="card-body">
                        <div class="row thread-message admin-message">
                                <div class="card">
                                    <div class="card-header">
                                        Quote
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>A well-known quote, contained in a blockquote element.</p>
                                        </blockquote>
                                    </div>
                                </div>
                        </div>
                        <div class="row thread-message client-message">
                                <div class="card">
                                    <div class="card-header">
                                        Quote
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>A well-known quote, contained in a blockquote element.</p>
                                        </blockquote>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
