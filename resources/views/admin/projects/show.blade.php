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
            @if (session('message'))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="card w-100">
                    <div class="card-body">
                        <!-- Project Description  -->
                        <div class="my-5">
                            <label class="fw-bold">Descrizione:</label>
                            <p class="py-2">{{ $project->description }}</p>
                        </div>
                        <!-- Project Date of Creation  -->
                        <div class="my-5">
                            <label class="fw-bold">Data di Creazione:</label>
                            <h6 class="d-inline-block">{{ $project->date_of_creation }}</h6>
                        </div>
                        <!-- Project Type  -->
                        <div class="my-5">
                            @if (empty($project->type->name))
                                <span>Tipologia non disponibile</span>
                            @else
                                <label class="fw-bold">Tipologia:</label>
                                <span>{{ $project->type->name }}</span>
                            @endif
                        </div>
                        <!-- Project Cover Image  -->
                        <div class="my-5">
                            @if (empty($project->cover_image))
                                <span>Immagine non disponibile</span>
                            @else
                                <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}-cover-image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection