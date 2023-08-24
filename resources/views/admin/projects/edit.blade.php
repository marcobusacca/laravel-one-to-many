@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-start align-items-end mt-5">
                <h1>Modifica il Progetto "{{ $project->title }}"</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-end mt-5">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Lista Progetti</a>
            </div>
            <div class="col-12 my-5">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-4">
                        <label class="control-label my-2">Titolo:</label>
                        <input type="text" name="title" id="title" placeholder="Modifica il Titolo del Progetto" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $project->title }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label my-2">Descrizione:</label>
                        <textarea name="description" id="description" placeholder="Modifica la Descrizione del Progetto" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" required>{{ old('description') ?? $project->description }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label my-2">Data di Creazione:</label>
                        <input type="date" name="date_of_creation" id="date_of_creation" class="form-control @error('date_of_creation') is-invalid @enderror" value="{{ old('date_of_creation') ?? $project->date_of_creation }}" required>
                        @error('date_of_creation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label my-2">Tipologia:</label>
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror" value="">
                            <option value="">Modifica La Tipologia</option>
                            @foreach ($types as $type)
                                <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-4">
                        <div class="my-5">
                            @if (!empty($project->cover_image))
                                <label class="d-block my-3 control-label">Copertina Attuale:</label>
                                <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}-cover-image" class="d-block my-3">
                                <a href="{{ route('admin.projects.edit.delete-cover-image', $project) }}" class="btn btn-danger my-3">Cancella Copertina</a>
                            @endif
                        </div>
                        <div class="my-5">
                            @if (!empty($project->cover_image))
                                <label class="control-label my-2">Nuova Copertina:</label>
                            @else
                                <label class="control-label my-2">Copertina:</label>
                            @endif
                            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-5">
                        <button class="btn btn-warning fw-bold px-5" type="submit">MODIFICA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection