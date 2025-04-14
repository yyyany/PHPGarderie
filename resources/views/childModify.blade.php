@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de l'enfant</h1>
    
    <form action="{{ route('child.update', $child->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $child->nom }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $child->prenom }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ $child->date_naissance->format('Y-m-d') }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $child->adresse }}" required>
        </div>
        
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" class="form-control" value="{{ $child->ville }}" required>
        </div>
        
        <div class="form-group">
            <label for="province">Province</label>
            <select id="province" name="province" class="form-control">
                <option value="Alberta" {{ $child->province == 'Alberta' ? 'selected' : '' }}>Alberta</option>
                <option value="Colombie-Britannique" {{ $child->province == 'Colombie-Britannique' ? 'selected' : '' }}>Colombie-Britannique</option>
                <option value="Manitoba" {{ $child->province == 'Manitoba' ? 'selected' : '' }}>Manitoba</option>
                <option value="Nouveau-Brunswick" {{ $child->province == 'Nouveau-Brunswick' ? 'selected' : '' }}>Nouveau-Brunswick</option>
                <option value="Nouvelle-Écosse" {{ $child->province == 'Nouvelle-Écosse' ? 'selected' : '' }}>Nouvelle-Écosse</option>
                <option value="Ontario" {{ $child->province == 'Ontario' ? 'selected' : '' }}>Ontario</option>
                <option value="Québec" {{ $child->province == 'Québec' ? 'selected' : '' }}>Québec</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ $child->telephone }}" required>
        </div>
        
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('child.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection 