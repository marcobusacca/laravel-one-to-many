@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex justify-content-start align-items-end mt-5">
                <h1>Crea una Nuova Tipologia</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-end mt-5">
                <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Lista Tipologie</a>
            </div>
            <div class="col-12 my-5">
                <form action="{{ route('admin.types.store') }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-4">
                        <label class="control-label my-2">Nome:</label>
                        <input type="text" name="name" id="name" placeholder="Inserisci il Nome della Tipologia" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-5">
                        <button class="btn btn-success fw-bold px-5" type="submit">CREA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection