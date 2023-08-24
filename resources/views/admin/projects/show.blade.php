@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-start align-items-end my-5">
                <h1>{{ $project->title }}</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-end my-5">
                <a href="{{ Route('admin.projects.index') }}" class="btn btn-primary">Lista Progetti</a>
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
                    <div class="card-body text-center">
                        <p class="card-text my-5">{{ $project->description }}</p>
                        <h6 class="card-subtitle my-5">{{ $project->date_of_creation }}</h6>
                        @if (empty($project->cover_image))
                            <span class="text-center">Immagine non disponibile</span>
                        @else
                            <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}-cover-image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection