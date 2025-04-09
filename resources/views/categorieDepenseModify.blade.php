@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de la catégorie de dépense</h1>
    
    <form action="{{ route('categorieDepense.update', $categorieDepense->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $categorieDepense->description }}" required>
        </div>
        
        <div class="form-group">
            <label for="pourcentage">Pourcentage</label>
            <input type="number" step="0.01" id="pourcentage" name="pourcentage" class="form-control" value="{{ $categorieDepense->pourcentage }}" required>
        </div>
        
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('categorieDepense.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection 