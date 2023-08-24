@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-start align-items-end my-5">
                <h1>{{ $type->name }}</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-end my-5">
                <a href="{{ Route('admin.types.index') }}" class="btn btn-primary">Lista Tipologie</a>
            </div>
            @if (isset($message))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="card w-100">
                    <div class="card-body">
                        <!-- Type Slug  -->
                        <div class="my-5 text-center">
                            <label class="fw-bold">Slug:</label>
                            <span class="d-inline-block">{{ $type->slug }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection