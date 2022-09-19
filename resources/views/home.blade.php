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
                            <tr>
                                <td>Thread 1</td>
                                <td>Open</td>
                                <td><i class="bi bi-file-earmark-pdf"></i> download</td>
                            </tr>
                            <tr>
                                <td>Thread 2</td>
                                <td>Assigned</td>
                                <td><i class="bi bi-file-earmark-pdf"></i> download</td>
                            </tr>
                            <tr>
                                <td>Thread 3</td>
                                <td>Closed</td>
                                <td><i class="bi bi-file-earmark-pdf"></i> download</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
